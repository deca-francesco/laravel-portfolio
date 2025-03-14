<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    // importante importare facades e non attributes

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user->name;
    }

    public function profile()
    {
        return "Admin profile";
    }
}
