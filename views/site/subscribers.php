<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список абонентов</title>
    <style>
        .add-division-btn {
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
            margin-left: 960px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Список абонентов</h2>
    <form method="get" action="/subscribers">
        <div class="division-select">
            <label for="division">Выберите подразделение:</label><br>
            <select id="division" name="division">
                <option value="">Все подразделения</option>
                <?php foreach ($divisions as $division): ?>
                    <option value="<?= $division->division_id ?>" <?= ($_GET['division'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                        <?= $division->division_name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Фильтровать</button>
        </div>
    </form>
    <div class="subscriber-list">
        <ul>
            <?php foreach ($subscribers as $subscriber): ?>
                <li><?= $subscriber->name ?> <?= $subscriber->surname ?>, подразделение: <?= $subscriber->division->division_name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a class="add-division-btn" href="<?= app()->route->getUrl('/newsub') ?>">Добавить</a>
</div>
</body>
</html>
