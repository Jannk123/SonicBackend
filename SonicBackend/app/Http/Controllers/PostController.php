<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Gibt Beiträge aus (aktuell als strukturierte Platzhalter, damit das Frontend nicht leer ist)
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'title' => 'GTI Prüfungsvorbereitung - Wer lernt mit?',
                'author' => 'Max Mustermann',
                'tags' => ['Allgemein', 'Prüfungen'],
                'votes' => 12,
                'comments' => 5,
                'date' => 'vor 2 Std.'
            ],
            [
                'id' => 2,
                'title' => 'Wie binde ich Axios richtig in Vue 3 ein?',
                'author' => 'Laura Tech',
                'tags' => ['JavaScript', 'Laravel'],
                'votes' => 25,
                'comments' => 14,
                'date' => 'vor 1 Tag'
            ]
        ]);
    }

    // Speichert einen neuen Foren-Beitrag
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // Hier wird der Post später in der Datenbank gespeichert
        return response()->json(['message' => 'Beitrag erfolgreich erstellt!'], 201);
    }
}