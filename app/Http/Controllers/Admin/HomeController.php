<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Patient;

class HomeController extends Controller
{
    public function index()
    {
        $patient = Patient::get();
        $users = User::where('role_id', '2')->get();
        return view('home', compact('patient', 'users'));
    }
}
