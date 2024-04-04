<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/newdivision', [Controller\Site::class, 'newdivision'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/newroom', [Controller\Site::class, 'newroom'])
    ->middleware('auth');
Route::add(['GET', 'POST'],'/newsub', [Controller\Site::class, 'newsub'])
    ->middleware('auth');
Route::add(['GET', 'POST'],'/newphone', [Controller\Site::class, 'newphone'])
    ->middleware('auth');
Route::add('GET', '/divisions', [Controller\Site::class, 'divisions'])
    ->middleware('auth');
Route::add('GET', '/rooms', [Controller\Site::class, 'rooms'])
    ->middleware('auth');