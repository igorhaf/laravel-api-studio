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
    function getNodes($dir){
        $files = array();
        foreach(\File::directories($dir) as $dir) { // Get all the directories
            $files[$dir][] = pathinfo($dir);
        }
        foreach (\File::files($dir, true) as $file_path){
            $files[$dir][] = pathinfo($file_path);
        }
        return $files;
    }
    public function filetree(Request $request)
    {
        $files = $this->getNodes(base_path().$request->dir);
        return response()->json($files);
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
