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
    // Controller/Site.php

    public function phones(Request $request): string
    {
        // Получаем список всех номеров телефонов
        $phones = Phone::query();

        // Получаем значение параметров division_id и subscriber_id из запроса
        $divisionId = $request->get('division_id');
        $subscriberId = $request->get('subscriber_id');

        // Если выбрано конкретное подразделение, фильтруем номера телефонов по нему
        if ($divisionId) {
            $phones->whereHas('subscriber', function ($query) use ($divisionId) {
                $query->where('division_id', $divisionId);
            });
        }

        // Если выбран конкретный абонент, фильтруем номера телефонов по нему
        if ($subscriberId) {
            $phones->where('subscriber_id', $subscriberId);
        }

        // Получаем список всех подразделений и абонентов для формы фильтрации
        $divisions = Division::all();
        $subscribers = Subscriber::all();

        // Завершаем запрос и получаем коллекцию номеров телефонов
        $phones = $phones->get();

        // Возвращаем представление для страницы с номерами телефонов
        return new View('site.phones', ['phones' => $phones, 'divisions' => $divisions, 'subscribers' => $subscribers]);
    }

        public function newdivision(Request $request): string
    {
        if ($request->method === 'POST') {
            // Проверяем, получены ли все необходимые данные
            if (isset($_POST['division_name'], $_POST['type_id'])) {
                // Создаем нового пользователя, включая role_id
                if (Division::create($request->all())) {
                    app()->route->redirect('/hello');
                }
            } else {
                // Если какие-то данные отсутствуют, перенаправляем на страницу с ошибкой
                return new View('site.signup', ['message' => 'Необходимо заполнить все поля']);
            }
        }
        $division_types = Division_type::all();
        return new View('site.new_division', ['division_types' => $division_types]);
    }
    public function newroom(Request $request): string
    {
        if ($request->method === 'POST') {
            // Проверяем, получены ли все необходимые данные
            if (isset($_POST['room_name'], $_POST['type_id'], $_POST['division_id'])) {
                // Создаем нового пользователя, включая role_id
                if (Room::create($request->all())) {
                    app()->route->redirect('/hello');
                }
            } else {
                // Если какие-то данные отсутствуют, перенаправляем на страницу с ошибкой
                return new View('site.signup', ['message' => 'Необходимо заполнить все поля']);
            }
        }
        $room_types = Room_type::all();
        $divisions = Division::all(); // Получаем список подразделений для выпадающего списка
        return new View('site.new_room', ['room_types' => $room_types, 'divisions' => $divisions]);
    }
    public function newsub(Request $request): string
    {
        if ($request->method === 'POST') {
            // Проверяем, получены ли все необходимые данные
            if (isset($_POST['name'], $_POST['surname'], $_POST['patronymic'], $_POST['birth_date'], $_POST['division_id'])) {
                // Создаем нового пользователя, включая role_id
                if (Subscriber::create($request->all())) {
                    app()->route->redirect('/hello');
                }
            } else {
                // Если какие-то данные отсутствуют, перенаправляем на страницу с ошибкой
                return new View('site.signup', ['message' => 'Необходимо заполнить все поля']);
            }
        }
        $divisions = Division::all(); // Получаем список подразделений для выпадающего списка
        return new View('site.new_sub', ['divisions' => $divisions]);
    }
    public function newphone(Request $request): string
    {
        if ($request->method === 'POST') {
            // Проверяем, получены ли все необходимые данные
            if (isset($_POST['phone'], $_POST['subscriber_id'], $_POST['room_id'])) {
                // Создаем нового пользователя, включая role_id
                if (Phone::create($request->all())) {
                    app()->route->redirect('/hello');
                }
            } else {
                // Если какие-то данные отсутствуют, перенаправляем на страницу с ошибкой
                return new View('site.signup', ['message' => 'Необходимо заполнить все поля']);
            }
        }
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


}
