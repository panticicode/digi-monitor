<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function index()
    {
        $url = env("APP_URL").'/register?ref='.\Auth::user()->unique_id; 

        return view('dashboard.invites.index', [
            'url' => $url
        ]);
    }
}
