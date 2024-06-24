<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Collect\AuthMiddlewareModule\AuthMiddleware::class,
        'role' => \Middlewares\RoleMiddleware::class,
        'role2' => \Middlewares\Role2Middleware::class,
    ],
    'validators' => [
        'registration' => \Src\Validator\RegistrationValidator::class,
    ]
];
