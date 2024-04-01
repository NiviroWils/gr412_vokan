<h2 class="auth_head">Новое помещение</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="auth_div">
    <form class="auth_form" method="post">
        <input type="text" placeholder="Название или номер помещения" name="division_name">
        <select name="type" id="division_type">
            <option class="" value="">Вид помещения</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <select name="type" id="division_type">
            <option class="" value="">Подразделение</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button>Добавить помещение</button>
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
        margin-left: 755px;
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
    }

</style>

