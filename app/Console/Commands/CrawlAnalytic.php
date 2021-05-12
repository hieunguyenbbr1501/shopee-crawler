<?php

namespace App\Console\Commands;

use App\Category;
use App\CategoryAnalytic;
use App\Keyword;
use Illuminate\Console\Command;

class CrawlAnalytic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:analytic {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if ($this->option('type') == 'keyword') {
            $keywords = Keyword::all();
            foreach ($keywords as $keyword) {
                if ($keyword->volume_analytic != null) {
                    $crawl_analytic = unserialize($keyword->volume_analytic);

                } else {
                    $crawl_analytic = [];
                }
                var_dump($crawl_analytic);

                $analytic_data = $this->LoginShopee($keyword->name);
//            dd($analytic_data["data"][0]["search_volume"]);
                try {
                    if (sizeof($crawl_analytic) == 30) {
                        array_pop($crawl_analytic);
                        array_push($crawl_analytic, $analytic_data["data"][0]["search_volume"]);
                    } else {
                        array_push($crawl_analytic, $analytic_data["data"][0]["search_volume"]);
                    }
                    $keyword->volume_analytic = serialize($crawl_analytic);
                    $keyword->volume = $analytic_data["data"][0]["search_volume"];
                    $keyword->save();
                } catch (\Exception $exception) {
                    echo $exception->getMessage();
                }
            }
        }
        if ($this->option('type') == 'category') {
            $categories = Category::all();
            foreach ($categories as $category) {
                $category_analytic = CategoryAnalytic::firstOrCreate([
                    'name' => $category->name
                ]);
                $total_volume = 0;
                $total_price = 0;
                $total_keywords = 0;
                foreach ($category->keywords as $keyword) {
                    $total_volume += $keyword->volume;
                    $total_price += $keyword->price;
                    $total_keywords += 1;
                }
                $category_analytic->total_volume = $total_volume;
                $category_analytic->total_price = $total_price;
                $category_analytic->total_keywords = $total_keywords;
                $category_analytic->save();
            }
        }

    }

    function LoginShopee($keyword)
    {

        $source = "keywords.txt";
        $contents = file_get_contents($source);
        $contents = trim($contents);
        $contents = explode("\n", $contents);
        $SP_Username = "hieu15011";
        $SP_Pass = "Thangnao?123";
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
        curl_setopt($ch, CURLOPT_POST, 0);

        //Khởi tạo chung cho toàn bộ request bên dưới

        curl_setopt($ch, CURLOPT_URL, "https://banhang.shopee.vn/api/marketing/v3/pas/suggest/keyword/?SPC_CDS=1&SPC_CDS_VER=2&keyword=" .$keyword . "&count=100&placement=0&itemid=6967948430");
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        return (json_decode($body, true));
        curl_close($ch);
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
