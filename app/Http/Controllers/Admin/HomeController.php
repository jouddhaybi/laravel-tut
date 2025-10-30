<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', [
            'users' => $users
        ]);
    }
}
