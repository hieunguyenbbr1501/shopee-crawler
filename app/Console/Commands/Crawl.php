<?php

namespace App\Console\Commands;

use App\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;

class Crawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:begin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl data';

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
        $keyword = "áo";
        $quantity = "20";
//        $link = "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword=".$keyword."&limit=".$quantity."&newest=0&order=desc&page_type=search";
//        $client = new Client();
//        $response = $client->request('GET', $link);
//        echo $response;
        $response = $this->LoginShopee('hieu15011', 'Thangnao?123', $keyword, $quantity);
        $data = $response["items"];
        foreach ($data as $item) {
            $product = Product::firstOrCreate([
                'id' => $item["itemid"]
            ]);
            $product->name = $item["name"];
            $product->sold = $item["sold"];
            $product->history_sold = $item["historical_sold"];
            $product->price_min = $item["price_min"];
            $product->price_max = $item["price_max"];
            $product->rating  =$item["item_rating"]["rating_star"];
            $product->liked = $item["liked_count"];
            $product->save();

    }

        return 0;
    }

    function LoginShopee($SP_Username, $SP_Pass, $keyword, $quantity)
    {

        //Khởi tạo chung cho toàn bộ request bên dưới
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0");
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
            "login_key" => $SP_Username,
            "login_type" => "username",
            "password_hash" => $this->CryptPass($SP_Pass),
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
        // echo $response;
        curl_setopt($ch, CURLOPT_POST, 0);
        echo "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword=" . urlencode($keyword)
            . "&limit=" . urlencode($quantity) . "&match_id=8595&newest=0&order=desc&page_type=search&version=2";
        curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword="
            . urlencode($keyword) . "&limit=" . $quantity . "&match_id=8595&newest=0&order=desc&page_type=search&version=2");
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
