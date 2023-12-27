<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

use App\Models\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


/* Route::get('/', function () {
    return redirect(route('urls.index'));
}); */


Route::get('/', function () {
    return view('urls.index', [
        'urls' => Url::get()->reverse(),
    ]);
})->name('index');;


/* for all - CRUD */
Route::resource('urls', UrlController::class);

Route::get('delete', [UrlController::class, 'destroy']);


/* for ajax edit url currently*/
Route::post('updateid', [UrlController::class, 'updatejs']);
