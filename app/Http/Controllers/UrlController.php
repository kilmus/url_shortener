<?php

namespace App\Http\Controllers;

use App\Models\url;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL as FacadesURL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class UrlController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('checkpass');
    // }


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


        //dd($request);

        if ($request->url_code == null) {
            $input_code = Str::random(5);
            //dd($input_code);
        } else {
            $input_code = $request->url_code;
        }

        $url = new url();
        $url->url_old = $request->url_old;
        $url->url_code = $input_code;
        $url->url_password = $request->url_password;
        //$url->url_count = $request->url_count + 1;
        //$url->url_code = FacadesURL::to('/') . '/' . Str::random(5);

        $url->save();
        return view('url.view', compact('url', $url));
    }

    // public function fetchUrl($url)
    // {
    //     //$short_url = FacadesURL::to('/') . '/' . $url;
    //     //dd($url);
    //     $query = DB::table('urls')->where('url_code', '=', $url);

    //     //$query->url_count = $query->url_count + 1;
    //     //dd($query->url_count);
    //     $query->save();

    //     if ($query->exists()) {
    //         return redirect($query->value('url_old'));
    //     } else {
    //         return 'not exists';
    //     }
    // }

    public function countUrl($url)
    {


        // $count = url::where('url_code', $url)->firstORFail();
        // return view('url/password', [
        //     'count' => $count
        // ]);

        $count = url::where('url_code', $url)->firstORFail();
        $count->url_count = $count->url_count + 1;
        $count->save();
        return redirect()->away($count->url_old);
    }


    public function password($count)
    {

        $urls = url::find($count);
        //$url2 = url::where('id', $url)->firstORFail();
        //dd($urlss);
        // if ($urls->url_password != null) {
        //     dd($urls);
        //     return view('url.password', compact('urls', $urls));
        // }
        return view('url.password', [
            'urls' => $urls,
        ]);
    }


    public function checkUrl(Request $request, $check)
    {
        dd($request->url_password);
        $checks = url::where('url_code', $check)->firstORFail();
        //dd($checks->url_password);
        if ($checks->url_password == $request->url_password) {

            return redirect($checks->url_old);
        } else {
            //dd($checks->url_password, $request->url_password);
            return redirect()->back()->with('error', 'รหัสผ่านไม่ถูกต้อง');
        }
    }




    // public function checkUrl(Request $request, $url)
    // {
    //     dd($url);
    //     $urlCode = url::where('url_code', $url)->firstOrFail();
    //     if (Hash::check($request->url_code, $urlCode->url_code)) {
    //         return redirect($urlCode->urlcode);
    //     } else {
    //         return 'ไม่ได้ว่ะ';
    //     }
    // }

    // public function shortUrl($url)
    // {
    //     $url = url::find($url);
    //     //dd($url);
    //     return redirect($url->url_old);
    // }

    // public function generateShoutURL()
    // {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $randomString = '';

    //     for ($i = 0; $i < 10; $i++) {
    //         $index = substr(str_shuffle($characters), 0, 5);
    //         $randomString = $index;
    //     }
    //     return $randomString;
    // }


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
