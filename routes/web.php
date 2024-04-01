<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/newdivision', [Controller\Site::class, 'newdivision'])
    ->middleware('auth');
Route::add('GET', '/newroom', [Controller\Site::class, 'newroom'])
    ->middleware('auth');
Route::add('GET', '/newsub', [Controller\Site::class, 'newsub'])
    ->middleware('auth');