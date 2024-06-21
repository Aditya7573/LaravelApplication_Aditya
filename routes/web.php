<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;



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

/*Que 4*/
Route::get('/', function () {
    return view('welcome');
});
/*
/*Que 5
Route::get('/contact/{user?}', function($user = "Aditya Suthar") {
    return "Username: $user";
});*/


/*Que 6*/
Route::get('/detail/{info?}', function($info = "Laravel makes it easy to develop websites!") {
    return $info;
});

/*Que 7*/
Route::get('uid/{id}', function ($id) {
    return "ID: $id";
})->where('id', '[0-9]+');

/*Que 8*/
Route::get('/users/{user?}', function($user = "batman") {
    return "Name: $user";
})->where('user.show', '[A-Za-z][%20]+');

/*Que 9*/
Route::get('/users/{user}/images/{image}', function($user, $image) {
    return "Name: $user Image: $image";
})->where('users.images.show', '[0-9]+');

/*Que 10*/
Route::group(['as' => 'users.', 'prefix' => 'users'], function() {
    Route::get('{user?}/images/{image}', function ($user = "batman", $image) {
        return "Name: $user Image: $image";
    })->name('images.show')
        ->where(['users' => '[A-Za-z][%20]+',
            'image' => '[0-9]+']);
});

//Assignment 2
// about route
// web.php

Route::get('aboutme', function () {
    $name = ['fullName' => 'Aditya Suthar  Hello my application '];
    return view('pages.about', $name);
})->name('about.show');

// langs.php

Route::get('/thingsiknow', function () {
    // List of programming languages
    $items = ['PHP', 'JavaScript', 'Python', 'Java'];

    // Pass the array to the view using compact
    return view('pages.langs', compact('items'));
});

//contact route
Route::get('contact', function () {
    $emailId = ['email' => 'w0835715@myscc.ca'];
    return view('pages/contact', $emailId);
})->name('pages/contact.show');

//Assignment 3
//Route::get('articles', 'ArticleController@index')->name('articles.index');

//Route::get('/articles', [ArticleController::class, 'index']);
//Route::get('/articles/{article}',[ArticleController::class, 'show']);

//Assignment4


//Route::get('/categories', [CategoryController::class, 'index']);
//Route::get('/categories/{category}', [CategoryController::class, 'show']);

//Assignment 5
//categories
// routes/web.php
//Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');

//Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');

//Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

//Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');


//Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

//Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

//Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

//Assignment_6
// web.php
//Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');




// Assignment_7

Route::get('categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');


Route::get('categories/{category}/forceDelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');





Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::post('categories', 'CategoryController@store');



// Assignment _7
//Route::resource('articles', ArticleController::class)->except(['destroy']);
//Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

//Route::resource('categories', CategoryController::class)->except(['destroy']);
//Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
