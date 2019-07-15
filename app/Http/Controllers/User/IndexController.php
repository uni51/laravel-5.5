<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * ユーザー画面TOPを表示
     */
    public function index(Request $request)
    {
        return view('user.index');
    }
}
