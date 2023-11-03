<?php

namespace App\Http\Controllers;

use App\Events\ChatsBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
    {
        broadcast(new ChatsBroadcast($request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
}


