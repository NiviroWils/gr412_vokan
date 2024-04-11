<?php
namespace Controller;

use Model\Role;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\RegistrationValidator;
use Src\View;
class UserController{
    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {
            // Валидируем данные регистрации
            $validator = new RegistrationValidator($request->all());

            // Если валидация не прошла, возвращаем сообщение об ошибках
            if ($validator->fails()) {
                return new View('site.signup', ['message' => 'Проверьте введенные данные', 'errors' => $validator->errors()]);
            }

            // Создаем нового пользователя только если валидация прошла успешно
            $userData = $request->all();
            $user = User::where('login', $userData['login'])->first();
            if ($user) {
                return new View('site.signup', ['message' => 'Пользователь с таким логином уже существует']);
            }

            if (User::create($userData)) {
                app()->route->redirect('/hello');
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
