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

    <div class="subscriber-list">
        <?php foreach ($subscribers as $subscriber): ?>
            <div class="subscriber-card">
                <h3><?= $subscriber->name ?> <?= $subscriber->surname ?></h3>
                <p>Подразделение: <?= $subscriber->division->division_name ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="add-subscriber-btn" href="<?= app()->route->getUrl('/newsub') ?>">Добавить абонента</a>
</div>
</body>
</html>
