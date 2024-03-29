<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="auth_div">
<form class="auth_form" method="post">
    <input placeholder="Имя" type="text" name="name">
    <input placeholder="Email" type="text" name="login">
    <input placeholder="Пароль" type="password" name="password">
    <button>Зарегистрироваться</button>
</form>
</div>
<style>
    .auth_div{
        height: 475px;
        width: 964px;
        background-color: #333333;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30px;
        margin-left: 480px;
        margin-top: 100px;

    }
    input{
        width: 829px;
        height: 97px;
        background-color: #CCCCCC;
        border-style: none;
        border-radius: 30px;
        font-size: 25px;
    }

    input::placeholder{
        font-size: 25px;
    }
    input:focus{
        background-color: #787878;
        color: white;
        font-size: 25px;
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



</style>