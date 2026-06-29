<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Suche den Benutzer anhand der E-Mail
        $user = User::where('email', $request->email)->first();

        // 2. Prüfe, ob der Benutzer existiert UND ob das Passwort korrekt ist
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'E-Mail oder Passwort falsch.'], 401);
        }

        // 3. Wenn alles passt, schicke eine Erfolgsmeldung
        return response()->json(['message' => 'Login erfolgreich!', 'user' => $user], 200);
    }

    public function register(Request $request)
    {
        // 1. Validierung (E-Mail muss eindeutig sein)
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        // 2. Benutzer erstellen und Passwort hashen
        $user = \App\Models\User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Antwort senden
        return response()->json(['message' => 'Konto erfolgreich erstellt!'], 201);
    }
}