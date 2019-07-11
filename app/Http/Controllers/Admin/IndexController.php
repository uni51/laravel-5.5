<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 管理者画面TOPを表示
     */
    public function index(Request $request)
    {
        return view('admin.index');
    }
}
