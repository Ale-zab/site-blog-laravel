<?php

namespace App\Http\Controllers;

use App\Models\Message;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function feedback()
    {
        $messages = Message::latest()->get();

        return view('admin.feedback', compact('messages'));
    }
}
