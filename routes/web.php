<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('role2');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/newdivision', [Controller\Site::class, 'newdivision'])
    ->middleware('role');
Route::add(['GET', 'POST'], '/newroom', [Controller\Site::class, 'newroom'])
    ->middleware('role');
Route::add(['GET', 'POST'],'/newsub', [Controller\Site::class, 'newsub'])
    ->middleware('role');
Route::add(['GET', 'POST'],'/newphone', [Controller\Site::class, 'newphone'])
    ->middleware('role');
Route::add('GET', '/divisions', [Controller\Site::class, 'divisions'])
    ->middleware('role');
Route::add('GET', '/rooms', [Controller\Site::class, 'rooms'])
    ->middleware('role');
Route::add('GET', '/subscribers', [Controller\Site::class, 'subscribers'])
    ->middleware('role');