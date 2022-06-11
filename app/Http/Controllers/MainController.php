<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        //$uniqid = Str::random(9);
        foreach(\File::directories($dir) as $dir) { // Get all the directories
            $uniqid = Str::random(9);
            $file =  pathinfo($dir);
            //$files[$dir][$uniqid]['folder'] = $file['dirname'];
            $files[$uniqid] = array();
            $files[$uniqid]['text'] = $file['filename'];
            $files[$uniqid]['custom']['prop'] = 0;
        }
        foreach (\File::files($dir, true) as $file_path){
            $uniqid = Str::random(9);
            $file =  pathinfo($file_path);
            //$files[$uniqid]['folder'] = $file['dirname'];
            $files[$uniqid] = array();
            $files[$uniqid]['text'] = $file['filename'].".".$file['extension'];
            $files[$uniqid]['custom']['prop'] = 1;

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
