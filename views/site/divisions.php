<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список подразделений</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .division-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            justify-content: center;
            margin-top: 30px;
        }

        .division-card {
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 200px;
            height: 200px;
        }

        .division-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .division-type {
            font-size: 14px;
            color: #666;
        }

        .division-head {
            margin-top: 20px;
        }

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
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="division-head">Список подразделений</h1>
    <div class="division-cards">
        <?php foreach ($divisions as $division): ?>
            <div class="division-card">
                <div class="division-name"><?= $division->division_name ?></div>
                <div class="division-type">Вид подразделения: <?= $division->type->type ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="add-division-btn" href="<?= app()->route->getUrl('/newdivision') ?>">Добавить</a>
</div>
</body>
</html>
