<?php

use Illuminate\Support\Facades\Route;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

//Service Container
    Route::get('/test-container', function (Request $request) {
      $input = $request-> input('key');
      return $input;
    });

//Service Provider
    Route::get('/test-provider', function (UserService $userService){
        return $userService->listUsers();
    });


//Service Provider
    Route::get('/test-users', [UserController::class, 'index']);


//Show Users
    Route::get('/show-users', [UserController::class, 'show']);


// Facades
    Route::get('/test-facades', function (UserService $userService) {
        return $userService->listUsers();
    });



