<?php

namespace App\Http\Controllers;

use App\Category;
use App\Keyword;
use Google\GTrends;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class KeywordController extends Controller
{


    /**
     * List keywords by search form
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchByRelevant(Request $request) {
        $categories = Category::all();
        $keywords = Keyword::query();
        $keyword_prompt = Keyword::where('name', '=', $request->get('keyword'))->first();
        $res = $request->get('keyword');
        if ($keyword_prompt == null) {
            $data = $this->LoginShopee('hieu15011', 'Thangnao?123', $request->get('keyword'));
            $category_data = $this->crawlProduct($request->get('keyword'), 1)["items"][0];
            $item = $this->detail($category_data["itemid"], $category_data["shopid"], "https://shopee.vn/.-i." . $category_data["shopid"] . "." . $category_data["itemid"]);
            $category = Category::firstOrCreate([
                'name' => $item["item"]["categories"][0]["display_name"]
            ]);
            foreach ($data["data"] as $word) {

                $keyword = Keyword::where('name', '=', $word["keyword"])->first();
                if ($keyword == null) {
                    $keyword = Keyword::firstOrCreate([
                        'name' => $word["keyword"],
                        'category_id' => $category->id
                    ]);
                }
                $keyword->price = $word["recommend_price"];
                $keyword->volume = $word["search_volume"];
                $keyword->save();
                $res = $keyword->keyword;
            }
        }
        $keywords = $keywords->search($request->request->get("keyword"));
        if ($request->has('category') && $request->get('category') != null) {
            $keywords->category($request->get('category'));
        }
        if ($request->has('sorting')) {
            switch ($request->get('sorting')) {
                case 'priceDesc': {
                    $keywords->orderBy('price', 'desc');
                }
                case 'priceAsc': {
                    $keywords->orderBy('price', 'asc');
                }
                case 'volumeDesc': {
                    $keywords->orderBy('volume', 'desc');
                }
                case 'volumeAsc': {
                    $keywords->orderBy('volume', 'asc');
                }
            }
        }
        $keywords = $keywords->get();
        return view('listing')->with(compact('keywords', 'categories','res'));
    }

    public function show($keyword)
    {
        $data = Keyword::where(['name' => $keyword])->first();
        try {
            $client = new Client(
                ['headers' => ['User-Agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36"]]
            );
            $response = $client->get("https://www.google.com/search?q=".rawurlencode($keyword));
            $body = $response->getBody()->getContents();
            $crawler = new Crawler($body);
            $google_volume = $this->extractGoogleVolume($crawler->filter('div#result-stats')->text());
        } catch (\Exception $exception) {
        $service_url = 'https://www.googleapis.com/customsearch/v1?q='.urlencode($keyword).'&gl=VN&cx=017576662512468239146%3Aomuauf_lfve&key='
            .env("API_KEY");
        $url = $service_url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $service_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $google_volume = ($response["searchInformation"]["totalResults"]);
    }


        $options = [
            'hl'  => 'en-US',
            'tz'  => -60, # last hour
            'geo' => 'VN',
        ];
        $gt = new GTrends($options);
        //dd($gt->getRealTimeSearchTrends());
        $categories = Category::all();
        $google_analytic = $gt->interestOverTime($keyword, 0, 'today 1-m');
        if ($data) {
            $products = $data->products()->get();
            return view('detail')->with(compact('data', 'products', 'google_analytic', 'categories', 'google_volume'));
        } else {
            $response = $this->LoginShopee('hieu15011', 'Thangnao?123', $keyword);
            dd(($response["data"]));
        }


    }

    /**
     * Extract search volume of keyword.
     * @param $result
     * @return number of results.
     */
    public function extractGoogleVolume($result)
    {
        //
        $matches = array();
        preg_match("/\d+.\d+.\d+/", $result, $matches);
         return str_replace('.','',$matches[0]);
    }

    function LoginShopee($SP_Username, $SP_Pass, $keyword)
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
        curl_setopt($ch, CURLOPT_URL, "https://banhang.shopee.vn/api/marketing/v3/pas/suggest/keyword/?SPC_CDS=1&SPC_CDS_VER=2&keyword=" .$keyword . "&count=100&placement=0&itemid=6967948430");
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        return (json_decode($body, true));
        curl_close($ch);
    }

    function crawlProduct($keyword, $quantity)
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
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_URL, "https://shopee.vn/api/v2/search_items/?by=relevancy&keyword="
            . urlencode($keyword) . "&limit=" . $quantity . "&newest=0&sortBy=sales&order=desc&page_type=search&version=2");
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        return (json_decode($body, true));
    }

    private function detail($itemid, $shopid, $url)
    {
        $params = 'itemid=' . $itemid . '&shopid=' . $shopid;
        $text = md5($params);
        $text2 = '55b03' . $text . '55b03';
        $ifNoneMatch = '55b03-' . md5($text2);
        //Shopee API V2
        $curl_url = 'https://shopee.vn/api/v2/item/get?itemid=' . $itemid . '&shopid=' . $shopid;
        //Header
        $headers = [
            'if-none-match-:' . $ifNoneMatch,   //65ec5a9faeb0ff2bbb8f1badb502f6e1', //55b03-'.$this->getToken(32),
            'referer: https://shopee.vn/' . $url,
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36',
            'x-api-source: pc',
            'x-requested-with: XMLHttpRequest',
            'x-shopee-language:vi',
        ];
        //Setting CURL
        $option = array(
            //CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => 1, //1: return data
            CURLOPT_URL => $curl_url,
            //CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER => $headers
        );
        //Create curl
        $curl_ch = curl_init();
        //Set curl
        curl_setopt_array($curl_ch, $option);
        //Get curl
        $output_curl = curl_exec($curl_ch);
        $output_curl = json_decode($output_curl, true);
        return $output_curl;
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
