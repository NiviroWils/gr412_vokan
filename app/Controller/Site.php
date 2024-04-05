<?php
namespace Controller;
use Model\Role;
use Model\Phone;
use Model\Subscriber;
use Model\Room;
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


    public function newroom(Request $request): string
    {
        if ($request->method === 'POST') {
            if (isset($_POST['room_name'], $_POST['type_id'], $_POST['division_id'])) {
                $room = new Room();
                $room->room_name = $_POST['room_name'];
                $room->type_id = $_POST['type_id'];
                $room->division_id = $_POST['division_id'];
                $room->save();
                app()->route->redirect('/newroom?message=Помещение успешно добавлено');
            } else {
                app()->route->redirect('/newroom?error=Необходимо заполнить все поля');
            }
        }
        $room_types = Room_type::all();
        $divisions = Division::all(); // Получаем список подразделений для выпадающего списка
        return new View('site.new_room', ['room_types' => $room_types, 'divisions' => $divisions]);
    }



    public function newsub(Request $request): string
    {
        if ($request->method === 'POST') {
            if (isset($_POST['name'], $_POST['surname'], $_POST['patronymic'], $_POST['birth_date'], $_POST['division_id'])) {
                $subscriber = new Subscriber();
                $subscriber->name = $_POST['name'];
                $subscriber->surname = $_POST['surname'];
                $subscriber->patronymic = $_POST['patronymic'];
                $subscriber->birth_date = $_POST['birth_date'];
                $subscriber->division_id = $_POST['division_id'];
                $subscriber->save();
                app()->route->redirect('/newsub?message=Абонент успешно добавлен');
            } else {
                app()->route->redirect('/newsub?error=Необходимо заполнить все поля');
            }
        }
        $divisions = Division::all(); // Получаем список подразделений для выпадающего списка
        return new View('site.new_sub', ['divisions' => $divisions]);
    }
    public function newphone(Request $request): string
    {
        if ($request->method === 'POST') {
            // Проверяем наличие всех необходимых параметров
            if (isset($_POST['phone'], $_POST['subscriber_id'], $_POST['room_id'])) {
                // Создаем новый объект Phone и сохраняем его в базу данных
                $phone = new Phone();
                $phone->phone = $_POST['phone'];
                $phone->subscriber_id = $_POST['subscriber_id'];
                $phone->room_id = $_POST['room_id'];
                $phone->save();
                // Перенаправляем пользователя на страницу с сообщением об успешном добавлении
                app()->route->redirect('/newphone?message=Номер телефона успешно добавлен');
            } else {
                // Если какие-то из параметров отсутствуют, перенаправляем на страницу с ошибкой
                app()->route->redirect('/newphone?error=Необходимо заполнить все поля');
            }
        }

        // Получаем список помещений и абонентов для выпадающих списков
        $rooms = Room::all();
        $subscribers = Subscriber::all();

        // Возвращаем представление для страницы с формой добавления номера телефона
        return new View('site.new_phone', ['rooms' => $rooms, 'subscribers' => $subscribers]);
    }

    public function divisions(): string
    {
        $divisions = Division::all();
        return (new View())->render('site.divisions', ['divisions' => $divisions]);
    }
    public function subscribers(): string
    {
        // Получаем список всех подразделений
        $divisions = Division::all();

        // Получаем значение параметра division из глобального массива $_GET
        $divisionId = isset($_GET['division']) ? $_GET['division'] : null;

        // Если передан параметр division, фильтруем абонентов по подразделению
        if ($divisionId) {
            $subscribers = Subscriber::where('division_id', $divisionId)->get();
        } else {
            // Иначе получаем всех абонентов
            $subscribers = Subscriber::all();
        }

        // Возвращаем представление для страницы с абонентами
        return new View('site.subscribers', [
            'subscribers' => $subscribers,
            'divisions' => $divisions,
        ]);
    }

    public function rooms(): string
    {
        $rooms = Room::all();
        return (new View())->render('site.rooms', ['rooms' => $rooms]);
    }
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

//$roles = Role::all();
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
