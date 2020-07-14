<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::with(['role'])->get();
        return response([
            'success' => true,
            'message' => 'Find All User',
            'data' => $Users
        ], 200);
    }
}
