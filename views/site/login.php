<h2 class="auth_head">Авторизация</h2>
<p class="auth_p">Добро пожаловать!</p>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
<div class="auth_div">
    <form class="auth_form" method="post">
        <input type="text" placeholder="Email" name="login">
        <input type="password" placeholder="Пароль" name="password">
        <button>Войти</button>
    </form>
</div>
<style>
    .auth_div{
        height: 475px;
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

    .auth_head{
        margin-left: 830px;
        margin-top: 60px;
        font-size: 40px;
    }
.auth_p{
    font-size: 24px;
    margin-left: 850px;
    color: #4E4E4E;
}
</style>
<?php endif;
