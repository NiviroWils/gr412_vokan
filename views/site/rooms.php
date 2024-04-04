<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список помещений</title>
    <style>
        .room-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
            width: 100%;
        }

        .room-card {
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .room-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .room-type {
            font-size: 14px;
            color: #666;
        }

        .room-head {
            text-align: center;
            margin-top: 20px;
        }

        .add-room-btn {
            width: 200px;
            height: 50px;
            border-style: none;
            border-radius: 30px;
            background-color: #787878;
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<h1 class="room-head">Список помещений</h1>
<div class="room-cards">
    <?php foreach ($rooms as $room): ?>
        <div class="room-card">
            <div class="room-name"><?= $room->room_name ?></div>
            <div class="room-type">Тип помещения: <?= $room->type->type ?></div>
            <div class="room-type">Подразделение: <?= $room->division->division_name ?></div>
        </div>
    <?php endforeach; ?>
</div>
<a class="add-room-btn" href="<?= app()->route->getUrl('/newroom') ?>">Добавить помещение</a>
</body>
</html>
