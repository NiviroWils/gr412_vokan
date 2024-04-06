<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup'])
    ->middleware('role2','auth');
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class,  'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);
Route::add(['GET', 'POST'], '/newdivision', [Controller\Site::class, 'newdivision'])
    ->middleware('role', 'auth');
Route::add(['GET', 'POST'], '/newroom', [Controller\Site::class, 'newroom'])
    ->middleware('role', 'auth');
Route::add(['GET', 'POST'],'/newsub', [Controller\Site::class, 'newsub'])
    ->middleware('role', 'auth');
Route::add(['GET', 'POST'],'/newphone', [Controller\Site::class, 'newphone'])
    ->middleware('role', 'auth');
Route::add('GET', '/divisions', [Controller\Site::class, 'divisions'])
    ->middleware('role', 'auth');
Route::add('GET', '/rooms', [Controller\Site::class, 'rooms'])
    ->middleware('role', 'auth');
Route::add('GET', '/subscribers', [Controller\Site::class, 'subscribers'])
    ->middleware('role', 'auth');
Route::add('GET', '/phones', [Controller\Site::class, 'phones'])
    ->middleware('role', 'auth');
Route::add('GET', '/count_by_division', [Controller\Site::class, 'countByDivision'])
    ->middleware('role', 'auth');
Route::add('GET', '/count_by_room', [Controller\Site::class, 'countByRoom'])
    ->middleware('role', 'auth');