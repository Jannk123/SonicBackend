<?php

use Illuminate\Support\Facades\Route;

// Diese Route sorgt dafür, dass dein Vue-Frontend geladen wird
Route::get('/', function () {
    return view('welcome');
});