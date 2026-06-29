<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'title' => 'Programmieren 1 - Live Übung zu Schleifen',
                'host' => 'Prof. Dr. Code',
                'category' => 'Prog1',
                'viewers' => 42,
                'startedSince' => '15 Min.',
                'thumbnail' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=500&q=80',
                'link' => '#'
            ]
        ]);
    }
}