<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $root = public_path() . DIRECTORY_SEPARATOR;
        $postDir = rawurldecode(public_path($request->get('dir')));

        if (file_exists($postDir))
        {

            $files = scandir($postDir);
            $returnDir = substr($postDir, strlen($root));
            natcasesort($files);

            if (count($files) > 2)
            { // The 2 accounts for . and ..
                echo "<ul class='jqueryFileTree'>";
                foreach ($files as $file)
                {
                    $htmlRel = htmlentities($returnDir . $file);
                    $htmlName = htmlentities($file);
                    $ext = preg_replace('/^.*\./', '', $file);
                    if (file_exists($postDir . $file) && $file != '.' && $file != '..')
                    {
                        if (is_dir($postDir . $file))
                        {
                            echo "<li class='directory collapsed'><a rel='" . $htmlRel . "/'>" . $htmlName . "</a></li>";
                        }
                        else
                        {
                            echo "<li class='file ext_{$ext}'><a rel='" . $htmlRel . "'>" . $htmlName . "</a></li>";
                        }
                    }
                }
                echo "</ul>";
            }
        }
    }
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
    public function prot()
    {
        return view('prototip', [
            'name' => 'main',
            'ip' => '127.0.0.1',
            'port' => '22',
            'user' => 'root',
            'password' => '',
            'websocketurl' => env("WEBSOCKET_URL", "localhost"),
        ]);
    }
}
