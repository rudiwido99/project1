<?php

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

Route::get('/', function () {
    return view('welcome',['title' => 'Fearles Sablon']);
});

Route::get('home', function (){
    return view('home');
});

Route::get('produk','ProdukController@data');
Route::get('produk/add','ProdukController@add');
Route::post('produk','ProdukController@addProcess');
Route::get('produk/edit/{id}', 'ProdukController@edit');
Route::patch('produk/{id}','ProdukController@editProcess');
Route::delete('produk/{id}', 'ProdukController@delete');
//Route
//Test
//Contoh

Route::resource('detail','DetailController');

