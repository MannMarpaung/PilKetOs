<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $userCount = User::where('role', 'user')->get()->count();

        return view('pages.admin.index', compact('userCount'));
    }
}
