<?php

namespace App\Http\Controllers;

use App\Models\Message;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin');
    }

    public function feedback()
    {
        $messages = Message::latest()->get();

        return view('feedback', compact('messages'));
    }
}
