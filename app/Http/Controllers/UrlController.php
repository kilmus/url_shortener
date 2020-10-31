<?php

namespace App\Http\Controllers;

use App\Models\url;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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

        return view('url/index');
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

        $urlss = DB::table('urls')->select('*')->where('url_code', $request->url_code)->get();
        if ($request->url_code == null) {
            $input_code = Str::random(5);
        } else {
            $input_code = $request->url_code;
        }

        // dd($urlloop->url_code);

        $url = new url();
        $url->url_old = $request->url_old;
        $url->url_code = $input_code;
        $url->url_password = $request->url_password;

        foreach ($urlss as $urlloop) {
            //$urlloop->url_code;
            //dd($urlloop->url_code);
            if ($input_code == $urlloop->url_code) {
                //dd($urlloop->url_code);
                session()->flash('error', "ลิงค์ที่คุณกำหนดมาซ้ำกับที่มีในระบบ กรุณาระบุใหม่!! ");
                return redirect('url/index');
            }
        }
        Session()->flash("success", "ทำการย่อลิ้งค์เสร็จสิ้น!! ");
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
        $count = url::where('url_code', $url)->firstORFail();

        if ($count->url_password != null) {
            //dd($count->url_password);
            //dd($count);
            return view('url.password', [
                'url' => $count,
            ]);
        } else {
            $count->url_count = $count->url_count + 1;
            $count->save();
            return redirect()->away($count->url_old);
        }
    }

    public function checkUrl(Request $request, $check)
    {
        //dd($request->url_password);
        $checks = url::where('url_code', $check)->firstORFail();
        //dd($checks->url_password);
        if ($checks->url_password == $request->url_password) {
            $checks->url_count = $checks->url_count + 1;
            $checks->save();
            return redirect($checks->url_old);
        } else {
            //dd($checks->url_password, $request->url_password);
            session()->flash('error', "ลิงค์ที่คุณกำหนดมาซ้ำกับที่มีในระบบ กรุณาระบุใหม่!! ");
            return redirect()->back()->with('error', 'รหัสผ่านไม่ถูกต้อง');
        }
    }


    public function password($url)
    {
        //dd($count);
        $count = url::where('url_code', $url)->firstORFail();
        //$id = Crypt::decrypt($count);

        //dd($id->id);
        $urls = url::find($count->id);
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
