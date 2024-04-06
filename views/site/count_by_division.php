<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подсчет абонентов по подразделению</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .result {
            margin-top: 20px;
            font-size: 20px;
        }
        .back-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #787878;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Подсчет абонентов по подразделению</h2>
    <div class="result">
        <?= $result ?>
    </div>
    <a class="back-btn" href="<?= app()->route->getUrl('/subscribers') ?>">Назад к списку абонентов</a>
</div>
</body>
</html>
