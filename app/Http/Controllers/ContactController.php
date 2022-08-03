<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    public function store(MessageRequest $request)
    {
        $message            = new Message();
        $message->email     = request('email');
        $message->message   = request('message');

        $message->save();

        return redirect('/');
    }
}
