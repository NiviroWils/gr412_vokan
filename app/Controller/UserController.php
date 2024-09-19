<?php
namespace Controller;

use Model\Role;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;
class UserController{
    public function signup(Request $request): string
{
    if ($request->method === 'POST') {
        // Проверяем, получены ли все необходимые данные
        if (isset($_POST['name'], $_POST['login'], $_POST['password'], $_POST['role_id'])) {
            // Создаем нового пользователя, включая role_id
            if (User::create($request->all())) {
                app()->route->redirect('/hello');
            }
        } else {
            // Если какие-то данные отсутствуют, перенаправляем на страницу с ошибкой
            return new View('site.signup', ['message' => 'Необходимо заполнить все поля']);
        }
    }
    $roles = Role::all();
    // Если метод запроса не POST, отображаем форму регистрации
    return new View('site.signup', ['roles' => $roles]);
}

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}
