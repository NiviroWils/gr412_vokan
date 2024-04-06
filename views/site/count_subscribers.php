<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подсчет абонентов</title>
</head>
<body>
<h2>Количество абонентов по <?= $type ?>:</h2>
<p><?= $count ?></p>
<a href="<?= app()->route->getUrl('/subscribers') ?>">Назад</a>
</body>
</html>
