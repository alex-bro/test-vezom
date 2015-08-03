
<div class="text-left">
   <p><a class="btn btn-primary" href="/admin">администратративная панель</a></p>
</div>

<form action="" method="post">
    <div>
        <input type="text" name="name" class="form-control" placeholder="название новости" />
    </div>
    <div style="width: 102%">
        <?php echo HTML::wysiwyg($textareaName = 'body', $value = ''); ?>
    </div>
    <div class="text-right">
        <p style="margin-top: 1em"><input class="btn btn-success" type="submit" value="Добавить" name="btnSubmit" /></p>
    </div>
</form>

