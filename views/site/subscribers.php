<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список абонентов</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .subscriber-card {
            border-radius: 8px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            text-align: center;
        }
        .subscriber-card h3 {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .subscriber-card p {
            margin-bottom: 5px;
        }
        .add-subscriber-btn {
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
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Список абонентов</h2>

    <!-- Форма для подсчета абонентов по подразделению -->
    <form action="<?= app()->route->getUrl('/count_by_division') ?>" method="GET">
        <select name="division_id" id="division_select"> <!-- Ensure the name attribute is correct -->
            <?php foreach ($divisions as $division): ?>
                <option value="<?= $division->division_id ?>"><?= $division->division_name ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Подсчитать абонентов по подразделению</button>
    </form>

    <form action="<?= app()->route->getUrl('/count_by_room') ?>" method="GET">
        <select name="room_id" >
            <?php foreach ($rooms as $room): ?>
                <option value="<?= $room->room_id ?>"><?= $room->room_name ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Подсчитать абонентов по помещению</button>
    </form>


    <div class="subscriber-list">
        <?php foreach ($subscribers as $subscriber): ?>
            <div class="subscriber-card">
                <img src="/<?= $subscriber->image_path ?>" alt="Изображение подписчика" width="150">
                <h3><?= $subscriber->name ?> <?= $subscriber->surname ?></h3>
                <p>Подразделение: <?= $subscriber->division->division_name ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="add-subscriber-btn" href="<?= app()->route->getUrl('/newsub') ?>">Добавить абонента</a>
</div>
</body>
</html>
