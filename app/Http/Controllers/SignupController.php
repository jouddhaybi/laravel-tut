<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function create()
    {
        return view("auth.signup");
    }

    public function registerUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $hashPassword = Hash::make($password);
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phone = $request->phone;

        User::create([
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashPassword,
        ]);

        // dd($firstName . " " . $lastName . " " . $phone . " " . $email . " " . $password . " " . $hashPassword);
        return redirect("/")->with("success", "");
    }

}
