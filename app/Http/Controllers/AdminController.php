<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{

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
