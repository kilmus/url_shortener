<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('url/index', [UrlController::class, 'index'])->name('url.index');

Route::get('/', function () {
    return view('url.index');
});

Route::post('/url/store', [UrlController::class, 'store'])->name('url.store');
Route::get('/url/view/{url}', [UrlController::class, 'view'])->name('url.view');
Route::get('/url/{url}', [UrlController::class, 'shortUrl'])->name('url.url');
Route::get('/{url}', [UrlController::class, 'fetchUrl'])->name('url');
Route::get('/url/location/{url}', [UrlController::class, 'location'])->name('url.location');
Route::get('/layouts/main/{url}', [UrlController::class, 'main'])->name('layouts.main');



// Route::get('qr-code-g', function () {
//     QrCode::size(500)
//         ->format('png')
//         ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

//     return view('url.index');
// });
