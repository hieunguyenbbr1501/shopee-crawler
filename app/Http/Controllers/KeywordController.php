<?php

namespace App\Http\Controllers;

use App\Category;
use App\Keyword;
use Google\GTrends;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * List keywords by search form
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchByRelevant(Request $request) {
        $categories = Category::all();
        $keywords = Keyword::query();
        if ($request->has('category') && $request->get('category') != null) {
            $keywords->category($request->get('category'));
        }
        $keyword_prompt = Keyword::where('name', '=', $request->get('keyword'))->first();
        if ($keyword_prompt == null) {
            $data = $this->LoginShopee('hieu15011', 'Thangnao?123', $request->get('keyword'));
            foreach ($data["data"] as $word) {
                $category = Category::firstOrCreate([
                    'name' => 'Khác'
                ]);

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
            }
        }
        $keywords = $keywords->search($request->request->get("keyword"));
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
        $keywords = $keywords->limit(10)->get();
        return view('listing')->with(compact('keywords', 'categories'));
    }

    public function show($keyword)
    {
        $data = Keyword::where(['name' => $keyword])->first();
        $options = [
            'hl' => 'en-US',
            'tz' => -60,
            'geo' => 'IE'
        ];
        $gt = new GTrends($options);

        dd($gt->interestOverTime(['Donald Trump']));
        if ($data) {
            $products = $data->products()->get();
            return view('welcome')->with(compact('data', 'products'));
        } else {
            $response = $this->LoginShopee('hieu15011', 'Thangnao?123', $keyword);
            dd(($response["data"]));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $keyword)
    {
        //
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keyword $keyword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword)
    {
        //
    }
}
