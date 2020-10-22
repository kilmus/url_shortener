<?php

namespace App\Http\Controllers;

use App\Models\url;
use Illuminate\Http\Request;

class UrlController extends Controller
{

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

        $url_code = $this->generateShoutURL();
        $url = new url();
        $url->url_old = $request->url_old;
        $url->url_code = $url_code;

        // if ($url == null) {
        //     $url_code = $this->generateShoutURL();
        //     url::create([
        //         'url_old' => $request->url_old,
        //         'url_code' => $url_code
        //     ]);
        //     $url = url::whereUrl($request->url_old);
        // }
        // dd($url);
        $url->save();
        return view('url.view', compact('url'));
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
