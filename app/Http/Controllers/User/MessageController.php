<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * 自分宛のメッセージ一覧表示
     */
    public function index(Request $request)
    {
        $messages = auth()->user()->messages()->latest()->get();

        return view('user.message.index')->with(compact('messages'));
    }

    /**
     * 自分宛のメッセージの詳細表示
     */
    public function show(Message $message)
    {
        $this->authorize($message);

        return view('user.message.show')->with(compact('message'));
    }
}
