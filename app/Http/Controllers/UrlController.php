<?php

namespace App\Http\Controllers;

use App\Models\url;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL as FacadesURL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class UrlController extends Controller
{

    public function main()
    {
        $urls = url::all();
        return view('layouts/main', compact('urls', $urls));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = url::all();
        return view('url/index', compact('urls', $urls));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$url = url::whereUrl($request->url_old);

        //$url_code = $this->generateShoutURL();



        //$stringImaageReFormat = base64_encode('_' . time());
        //$ext = $request->file('url_qrcode')->getClientOriginalExtension();
        //$imageName = $stringImaageReFormat . "." . $ext;
        //$imageEncoded = File::get($request->url_qrcode);

        $url = new url();

        //$qrcode = QrCode::generate("'.$url->url_old.'", storage_path('app/public/qrcodes/' . $url_code . '.png'));

        $url->url_old = $request->url_old;
        $url->url_code = FacadesURL::to('/') . '/' . Str::random(5);
        //$url->url_code = Str::random(5);
        //$url->url_qrcode = $qrcode;
        $url->save();
        return view('url.view', compact('url', $url));
    }

    public function fetchUrl($url)
    {
        $short_url = FacadesURL::to('/') . '/' . $url;
        //dd($short_url);
        $query = DB::table('urls')->where('url_code', '=', $short_url);

        if ($query->exists()) {
            return redirect($query->value('url_old'));
        } else {
            return 'not exists';
        }
    }

    public function shortUrl($url)
    {
        $url = url::find($url);
        //dd($url);
        return redirect($url->url_old);
    }

    public function generateShoutURL()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 10; $i++) {
            $index = substr(str_shuffle($characters), 0, 5);
            $randomString = $index;
        }



        //$randomString = base_convert(rand(1000, 99999), 10, 36);

        //dd($randomString);
        return $randomString;
    }


    public function location($url)
    {
        $url2 = url::find($url);
        //dd($url2);
        return redirect($url2->url_old);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\url  $url
     * @return \Illuminate\Http\Response
     */
    public function view(url $url)
    {
        $urls = url::find($url);
        return view('url/view', compact('urls', $urls));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(url $url)
    {
        //
    }
}
