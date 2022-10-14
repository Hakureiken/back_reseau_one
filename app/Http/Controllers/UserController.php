<?php

namespace App\Http\Controllers;

use App\Models\User;
use Config\cors;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(User $user)
    {
        return User::all();
    }

    public function getUser(User $user)
    {
        
        return $user;
    }
}
