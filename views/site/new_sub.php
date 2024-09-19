<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый абонент</title>
    <style>
        .auth_div{
            height: 724px;
            width: 964px;
            background-color: #AAAAAA;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
            margin-left: 480px;
            margin-top: 15px;
        }
        input{
            width: 829px;
            height: 97px;
            background-color: #CCCCCC;
            border-style: none;
            border-radius: 30px;
            font-size: 25px;
            margin-bottom: 15px;
        }
        input::placeholder{
            font-size: 25px;
        }
        input:focus{
            background-color: #787878;
            color: white;
        }
        .auth_form{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 15px;
        }
        button{
            width: 381px;
            height: 82px;
            border-style: none;
            border-radius: 30px;
            background-color: #787878;
            color: white;
            font-size: 25px;
        }
        button:hover{
            cursor: pointer;
        }
        .auth_head{
            margin-left: 820px;
            margin-top: 60px;
            font-size: 40px;
        }
        select{
            width: 829px;
            height: 97px;
            background-color: #CCCCCC;
            border-style: none;
            border-radius: 30px;
            font-size: 25px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<h2 class="auth_head">Новый абонент</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="auth_div">
    <form class="auth_form" method="post" enctype="multipart/form-data" >
        <input type="text" placeholder="Имя" name="name" required>
        <input type="text" placeholder="Фамилия" name="surname" required>
        <input type="text" placeholder="Отчество" name="patronymic" required>
        <input type="date" name="birth_date" required>
        <label for="image">Загрузить изображение:</label>
        <input type="file" name="image" id="image" accept="image/*">
        <select name="division_id" id="division" required>
            <option value="">Выберите подразделение</option>
            <?php foreach ($divisions as $division): ?>
                <option value="<?= $division->division_id ?>"><?= $division->division_name ?></option>
            <?php endforeach; ?>
        </select>
        <button >Добавить абонента</button>
    </form>
</div>
</body>
</html>
