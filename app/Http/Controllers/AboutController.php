<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'About Me',
            'content' => [
                'name' => "Muhammad 'Illiyyin Syam Aldero",
                'hobby' => 'bermain game, membaca',
                'repository' => 'https://github.com/Enigma1226',
            ],
        ];

      return view('about', $data);
    }
}
