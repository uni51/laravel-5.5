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
        // $messages = Message::latest()->where('user_id', auth()->id())->get();

        return view('user.message.index')->with(compact('messages'));
    }

    /**
     * 自分宛のメッセージの詳細表示
     */
    public function show(Message $message)
    {
        // メッセージが他人宛の場合、見れないようにするために、MessagePolicy のviewメソッドでチェックする
        $this->authorize('view',$message);
        // $this->authorize($message);

        return view('user.message.show')->with(compact('message'));
    }
}
