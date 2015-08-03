<?php
if (is_array($data)){
    foreach($data as $items){
        if(is_array($items)){
            foreach($items as $item){
                echo $item.'</br>';
            }
        } else echo $items.'</br>';
    }

} else{
    echo $data.'</br>';
}
?>
<style>
    .form-signin {
        max-width: 219px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;

        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin ,
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 14px;
        height: auto;
        margin-bottom: 7px;
        padding: 7px 9px;
    }
    .form-signin-heading{
        text-align: center;
        margin-left: 0;
    }
</style>

        <form class="form-signin" method="post">
            <h3 class="form-signin-heading">Авторизация</h3>
            <input name="login" type="text" class="input-block-level" placeholder="Имя">
            <input name="password" type="password" class="input-block-level" placeholder="Пароль">
            <button class="btn btn-primary" type="submit" name="btnsubmit">Войти</button>
        </form>

</div>


