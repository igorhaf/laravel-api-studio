<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class MainController extends Controller
{
    public function connectssh($id)
    {
        return view('index', [
            'name' => 'main',
            'ip' => '127.0.0.1',
            'port' => '22',
            'user' => 'root',
            'password' => '',
            'websocketurl' => env("WEBSOCKET_URL", "localhost"),
        ]);
    }

    public function sharessh()
    {
        return view('ssh/share-ssh', [
            'websocketurl' => env("WEBSOCKET_URL", "localhost"),
        ]);
    }
    public function filetree(Request $request)
    {
        $files = Storage::disk('public')->listContents('/');
        var_dump($files);
    }

    //tailwind
    public function index()
    {
        return view('index', [
            'name' => 'main',
            'ip' => '127.0.0.1',
            'port' => '22',
            'user' => 'root',
            'password' => '',
            'websocketurl' => env("WEBSOCKET_URL", "localhost"),
        ]);
    }
}
