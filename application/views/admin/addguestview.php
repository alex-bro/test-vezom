<form class="form-signin" method="post" action="" >
    <h3 class="form-signin-heading">Добавить отзыв</h3>
    <input name="name" type="text" class="input-block-level" placeholder="Имя" value="<?php echo $data['name']; ?>">
    <input name="email" type="text" class="input-block-level" placeholder="Емаил" value="<?php echo $data['email']; ?>"><br/>
    <textarea name="body" cols="45" rows="10" maxlength="1024"><?php echo $data['body']; ?></textarea><br/>
    <button class="btn btn-primary" type="submit" name="btnSubmit">Добавить</button>
</form>
<?php if(isset($data['page'])) echo "<a href='/adminbook?page=". $data['page'] ."'>к записям</a>"; ?>