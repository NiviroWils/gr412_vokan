<?php

namespace Middlewares;

use Src\Request;
use Src\Auth\Auth;

class RoleMiddleware
{
    public function handle(Request $request)
    {
        // Получаем role_id пользователя из сессии
        $role_id = Auth::user()->role_id;

        // Если role_id не установлен или равен 1, перенаправляем пользователя на страницу hello
        if ($role_id == 1) {
            app()->route->redirect('/hello');
        }

    }
}
