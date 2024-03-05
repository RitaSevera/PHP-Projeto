<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $isAdmin = Auth::user()->user_type == User::TYPE_ADMIN ? true : false;

        $message = null;
        if ($isAdmin) {
            $message = "";
        }

        return view('dashboard.dashboard', compact('message'));
    }
}
