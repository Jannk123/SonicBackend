<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'E-Mail oder Passwort falsch.'], 401);
        }

        $token = $user->createToken('sonic-token')->plainTextToken;

        return response()->json([
            'message' => 'Login erfolgreich!',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Konto erfolgreich erstellt!'], 201);
    }

    // Gibt die Daten des aktuell eingeloggten Users zurück.
    // Wird vom Sanctum-Token in $request->user() automatisch aufgelöst.
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    // Aktualisiert Anzeigename und Semester des eingeloggten Users.
    // ANNAHME: die users-Tabelle hat eine Spalte "semester".
    // Falls nicht vorhanden, muss zuerst eine Migration dafür erstellt werden.
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'semester' => 'nullable|string|max:255',
        ]);

        $user = $request->user();
        $user->update($validated);

        return response()->json([
            'message' => 'Profil aktualisiert.',
            'user' => $user,
        ], 200);
    }
}