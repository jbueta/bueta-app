<?php

use Illuminate\Support\Facades\Route;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\UserController;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;
use App\Http\Controllers\ProductController;
use App\Services\ProductService;

Route::get('/', function () {
    //return view('welcome');
    return view('welcome', ['name' => 'bueta-app']);
});


//Service Container
        Route::get('/test-container', function (Request $request) {
            $input = $request-> input('key');
            return $input;
        });

//Service Provider
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

//Service Provider
Route::get('/test-users', [UserController::class, 'index']);

// Show users
Route::get('/show-users', [UserController::class, 'show']);

// Facades
Route::get('/test-facades', function (UserService $userService) {
    return $userService->listUsers();
});

//Exercise #3

//Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $commentId) {
    return "Post ID: " . $postId . ", Comment: " . $commentId;
});

Route::get('/port/{id}', function (string $id) {
    return "Port ID: " . $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

//Named Routes or Route Aliases
Route::get('/test/route/sample', function () {
    return route('test-route');
})->name('test-route');

//Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function () {
        echo 'second';
    });
});

//Route -> Controller Group
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});

//CSRF
Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});

Route::get('users', [UserController::class, 'index'])->middleware('user-middlware');

Route::resource('products', ProductController::class);

Route::get('/products-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});