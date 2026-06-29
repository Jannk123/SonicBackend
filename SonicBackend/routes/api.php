<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StreamController;

// --- Video Routen ---
Route::get('/videos', [VideoController::class, 'index']);
Route::post('/videos', [VideoController::class, 'store']);
Route::post('/videos/{id}/comments', [VideoController::class, 'addComment']); // Für Video-Kommentare

// --- Diskussions/Foren Routen ---
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);

// --- Live-Stream Routen ---
Route::get('/streams', [StreamController::class, 'index']);

// --- Authentifizierung ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);