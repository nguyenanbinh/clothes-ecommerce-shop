<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard() {
        return view('vendor.dashboard');
    }

    public function login() {
        return view('admin.auth.login');
    }
}
