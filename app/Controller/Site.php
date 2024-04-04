<?php
namespace Controller;
use Model\Division_type;
use Model\Division;
use Model\Post;
use Model\Room_type;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;


class Site
{
    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
    public function newdivision(Request $request): string
    {
        if ($request->method === 'POST') {
            if (isset($_POST['division_name'], $_POST['type_id'])) {
                $division = new Division();
                $division->division_name = $_POST['division_name'];
                $division->type_id = $_POST['type_id'];
                $division->save();
                app()->route->redirect('/newdivision?message=Подразделение успешно добавлено');
            } else {
                app()->route->redirect('/newdivision?error=Необходимо заполнить все поля');
            }
        }
        $division_types = Division_type::all();
        return new View('site.new_division', ['division_types' => $division_types]);
    }


    public function newroom(): string
    {
        $room_types = Room_type::all();
        return new View('site.new_room', ['room_types' => $room_types]);
    }
    public function newsub(): string
    {
        return new View('site.new_sub');
    }

    public function divisions(): string
    {
        $divisions = Division::all();
        return (new View())->render('site.divisions', ['divisions' => $divisions]);
    }
    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            app()->route->redirect('/hello');
        }
        return new View('site.signup');
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
