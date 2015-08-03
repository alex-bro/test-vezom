<form class="form-signin" method="post" action="" >
    <h3 class="form-signin-heading">Добавить отзыв</h3>
    <input name="name" type="text" class="input-block-level" placeholder="Имя">
    <input name="email" type="text" class="input-block-level" placeholder="Емаил"><br/>
    <textarea name="body" cols="45" rows="10" maxlength="1024"></textarea><br/>
    <?php echo $captcha; ?>
    <input name="captcha" type="text" class="input-block-level" placeholder="Капча">
    <button class="btn btn-primary" type="submit" name="btnSubmit">Добавить</button>
</form>
<?php if(isset($data['page']))echo "<a href='/guestbooks?page=". $data['page'] ."'>к записям</a>"; ?>