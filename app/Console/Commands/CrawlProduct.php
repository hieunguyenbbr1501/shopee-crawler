<?php

namespace App\Console\Commands;

use App\Keyword;
use App\Product;
use Buzz\Browser;
use Buzz\Client\FileGetContents;
use Dapphp\TorUtils\ControlClient;
use Dapphp\TorUtils\TorCurlWrapper;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Nyholm\Psr7\Factory\Psr17Factory;

class CrawlProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Product data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36");
        $cookie_jar = 'cookie_shopee.txt';
        curl_file_create($cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);


        // Request lấy cookie ban đầu
        curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v0/buyer/login/");
        curl_exec($ch);
        // echo file_get_contents($cookie_jar) .'<br><br>';


        //Khởi tạo các dữ liệu đầu vào cho request Login
        $csrf_token = $this->csrftoken();

        $header = array(
            'x-csrftoken: ' . $csrf_token,
            'x-requested-with: XMLHttpRequest',
            'referer: https://shopee.vn/api/v0/buyer/login/',
        );

        $data = array(
            "login_key" => 'hieu15011',
            "login_type" => "username",
            "password_hash" => $this->CryptPass('Thangnao?123'),
            "captcha" => "",
            "remember_me" => "true"
        );
        $data = http_build_query($data);

        //Request login
        curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v0/buyer/login/login_post/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, false);
        curl_setopt($ch, CURLOPT_COOKIE, "csrftoken=" . $csrf_token);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($ch, CURLOPT_POSTFIELDSIZE, strlen($data));
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);

        // Request lấy thông tin tài khoản sau khi đã đăng nhập thành công
        curl_setopt($ch, CURLOPT_URL, "https://banhang.shopee.vn/api/v2/login/");
        $response = curl_exec($ch);
        $quantity = "20";

        $keywords = Keyword::all();
        foreach ($keywords as $keyword) {
            echo $keyword->name."\n";
//            $client = new Client();
//            dd($client->get("https://shopee.vn/api/v2/search_items/?by=relevancy&keyword="
//                . ($keyword) . "&limit=" . $quantity . "&newest=0&sortBy=sales&order=desc&page_type=search&version=2")->getBody()->getContents());
            $response = $this->LoginShopee($keyword["name"], $quantity, $ch);
            $data = $response["items"];
            if ($data != null) {
                foreach ($data as $item) {
                    $product = Product::firstOrCreate([
                        'code' => $item["itemid"]
                    ]);
                    if (isset($item["image"])) {
                        try {
                            $url = "https://cf.shopee.vn/file/" . $item["image"] . "_tn";
                            $temp_img = file_get_contents($url);
                            $name = $item["image"] . ".jpg";
                            Storage::put("public/" . $name, $temp_img);
                            $product->thumbnail = $item["image"];
                        } catch (\Exception $e) {
                            echo $e->getMessage();
//                            curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v2/item/get?itemid=" . $item["itemid"] . "&shopid=" . $item["shopid"]);
//                            $client = new \Goutte\Client();
//                            $crawler = $client->request('GET', "https://shopee.vn/api/v2/item/get?itemid=" . $item["itemid"] . "&shopid=" . $item["shopid"]);
//                            dd($crawler->html());
                        }
                    }
                    $product->code = $item["itemid"];
                    $product->name = $item["name"];
                    $product->sold = $item["sold"];
                    $product->history_sold = $item["historical_sold"];
                    $product->price_min = $item["price_min"];
                    $product->price_max = $item["price_max"];
//                $product->rating  =$item["item_rating"]["rating_star"];
                    if ($item["item_rating"]["rating_count"][0] == 0) {
                        $product->rating = 0;
                    } else {
                        $product->rating = ($item["item_rating"]["rating_count"][1] + 2 * $item["item_rating"]["rating_count"][2]
                                + 3 * $item["item_rating"]["rating_count"][3] + 4 * $item["item_rating"]["rating_count"][4]
                                + 5 * $item["item_rating"]["rating_count"][5])
                            / $item["item_rating"]["rating_count"][0];

                    }
                    $product->liked = $item["liked_count"];
                    $product->view = $item["view_count"];
                    $product->slug = "https://shopee.vn/.-i." . $item["shopid"] . "." . $item["itemid"];
                    $product->keywords()->attach([$keyword->id]);
                    $product->save();

                }

            }
        }
        return 0;
    }

    function LoginShopee($keyword, $quantity, $ch)
    {

        //Khởi tạo chung cho toàn bộ request bên dưới;
        // echo $response;
        curl_setopt($ch, CURLOPT_POST, 0);
        echo "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword="
            . urlencode($keyword) . "&limit=" . $quantity . "&newest=0&sortBy=sales&order=desc&page_type=search&version=2";
        echo "\n";
        curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword="
            . urlencode($keyword) . "&limit=" . $quantity . "&newest=0&sortBy=sales&order=desc&page_type=search&version=2");
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        return (json_decode($body, true));
    }

    function CryptPass($pass)
    {
        return hash("sha256", md5($pass));
    }

    function csrftoken()
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $PanjangKarakter = strlen($karakter);
        $acakString = '';
        for ($i = 0; $i < 32; $i++) {
            $acakString .= $karakter[rand(0, $PanjangKarakter - 1)];
        }
        return $acakString;
    }
}
