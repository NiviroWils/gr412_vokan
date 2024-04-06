<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый номер телефона</title>
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
<div class="container">
    <h2>Новый номер телефона</h2>
    <form method="post">
        <label for="phone" class="form-label">Номер телефона:</label>
        <input type="text" id="phone" name="phone" class="form-input" required>

        <label for="room_id" class="form-label">Помещение:</label>
        <select id="room_id" name="room_id" class="form-select" required>
            <option value="">Выберите помещение</option>
            <?php foreach ($rooms as $room): ?>
                <option value="<?= $room->room_id ?>"><?= $room->room_name ?></option>
            <?php endforeach; ?>
        </select>

        <label for="subscriber_id" class="form-label">Абонент:</label>
        <select id="subscriber_id" name="subscriber_id" class="form-select" required>
            <option value="">Выберите абонента</option>
            <?php foreach ($subscribers as $subscriber): ?>
                <option value="<?= $subscriber->subscriber_id ?>"><?= $subscriber->name ?> <?= $subscriber->surname ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Добавить номер телефона" class="form-button">
    </form>
</div>
</body>
</html>
