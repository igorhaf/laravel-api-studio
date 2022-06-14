<?php

namespace App\Http\Controllers;

class SshController extends Controller
{
    public function connectssh($id)
    {
        return view('ssh/ssh', [
            'name' => 'main',
            'ip' => '127.0.0.1',
            'port' => '22',
            'user' => 'root',
            'password' => '',
            'websocketurl' => env('WEBSOCKET_URL', 'localhost'),
        ]);
    }

    public function sharessh()
    {
        return view('ssh/share-ssh', [
            'websocketurl' => env('WEBSOCKET_URL', 'localhost'),
        ]);
    }
}
