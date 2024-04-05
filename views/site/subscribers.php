<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список абонентов</title>
</head>
<body>
<div class="container">
    <h2>Список абонентов</h2>
    <div class="division-select">
        <label for="division">Выберите подразделение:</label><br>
        <select id="division" name="division">
            <option value="">Все подразделения</option>
            <?php foreach ($divisions as $division): ?>
                <option value="<?= $division->id ?>" <?= ($_GET['division'] ?? '') == $division->id ? 'selected' : '' ?>>
                    <?= $division->division_name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="subscriber-list">
        <ul>
            <?php foreach ($subscribers as $subscriber): ?>
                <li><?= $subscriber->name ?> <?= $subscriber->surname ?>, подразделение: <?= $subscriber->division->division_name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
<script>
    // При загрузке страницы
    window.onload = function() {
        // Найти выпадающий список с подразделениями
        var divisionSelect = document.getElementById('division_select');
        // Добавить обработчик события для изменения значения в списке
        divisionSelect.addEventListener('change', function() {
            // Получить выбранное значение
            var selectedDivision = divisionSelect.value;
            // Отправить AJAX-запрос для получения абонентов с выбранным подразделением
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/subscribers?division_id=' + selectedDivision, true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Обновить список абонентов
                    document.getElementById('subscriber_list').innerHTML = xhr.responseText;
                } else {
                    console.error('Ошибка получения данных');
                }
            };
            xhr.send();
        });
    };

</script>
</html>
