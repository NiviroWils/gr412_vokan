<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Номера телефонов</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
        }
        .phone-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .phone-card {
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            width: 226px;
            height: 214px;
            flex-direction: column;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .phone-card h3 {
            margin-top: 0;
        }
        .phone-card p {
            margin-bottom: 5px;
        }
        .add-division-btn{
            width: 255px;
            height: 59px;
            border-style: none;
            border-radius: 30px;
            background-color: #787878;
            color: white;
            font-size: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Номера телефонов</h2>
    <div class="phone-list">
        <?php foreach ($phones as $phone): ?>
            <div class="phone-card">
                <h3>Номер: <?= $phone->phone ?></h3>
                <p>Абонент: <?= $phone->subscriber->name ?> <?= $phone->subscriber->surname ?></p>
                <p>Помещение: <?= $phone->room->room_name ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="add-division-btn" href="<?= app()->route->getUrl('/newphone') ?>">Добавить</a>
</div>
</body>
</html>
