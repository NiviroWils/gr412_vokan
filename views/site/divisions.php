<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список подразделений</title>
    <style>
        .division-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
            width: ;
        }

        .division-card {
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

        .division-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .division-type {
            font-size: 14px;
            color: #666;
        }
        .division-head{
            margin-left: 650px;
            margin-top: 20px;
        }
        .add-division-btn{
            width: 381px;
            height: 82px;
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
</body>
</html>
