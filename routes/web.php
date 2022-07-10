<?php

use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

Route::get('/', [GameController::class, 'index']);

Route::resource('/games', GameController::class);

Route::get('/categories', function () {
   return view('categories', [
      'title' => 'Game Categories',
      'categories' => Category::all()
   ]);
});

Route::get('/publishers', function () {
   return view('publishers', [
      'title' => 'Game Publishers',
      'publisher' => Publisher::all()
   ]);
});

Route::get('/createSlug', [GameController::class, 'createSlug']);
