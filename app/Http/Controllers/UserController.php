<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService; 
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function show(UserService $userService) {
        return response()->json($userService->listUsers());
    }

    public function index(UserService $userService) {
        return $userService->listUsers();
    }

    public function first(UserService $userService) {
        return collect($userService->listUsers())->first();
    }

    public function get(UserService $userService, $id) {
        $user = collect($userService->listUsers())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
        })->first();

        return $user;
    }
}