<?php

namespace App\Http\Controllers;

class NesController extends Controller
{
    public function index()
    {
        $aFile = [];
        if ($handle = opendir(public_path('/game'))) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $aFile[] = $entry;
                }
            }
            closedir($handle);
        }
        return view('nes.index', compact('aFile'));
    }

    public function detail($filename)
    {
        $url = env('APP_URL') . '/game/' . $filename;
        return view('nes.me', compact('url'));
    }


}
