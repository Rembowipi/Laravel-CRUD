<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Yayasan extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user->level != 2) {
            return redirect()->intended('login');
        }
        return redirect()->to(url('/supplier'));
    }
}
