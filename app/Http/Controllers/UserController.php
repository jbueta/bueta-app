<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService; 


class UserController extends Controller
{
    public function show() {
        $users = [
            [
                'name' => 'John Doe',
                'gender' => 'Male'
            ],
            [
                'name' => 'Jane Doe',
                'gender' => 'Female'
            ]
        ];
        return response()->json($users);
    }

    public function index(UserService $userService) {
        return $userService->listUsers();
    }
}
