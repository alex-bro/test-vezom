<div class="text-left">
    <p><a class="btn btn-primary" href="/guestbooks/addguest">ДОБАВИТЬ ОТЗЫВ</a></p>
</div>
<?php
$confirm="onclick=\"return confirm('Удалить?')\"";
if(isset($data)) {
    foreach($data as $item ){ ?>
        <div class="thumbnail">
            <p> <span id="book">От:</span> <?php echo $item['name']; ?>
            <span id="book">Email: </span><?php echo $item['email']; ?></p>
            <pre id="book"><?php echo $item['body']; ?></pre>
            <a id="book" href='/adminbook/editbook/<?php echo $item['id'] ?>'> Редактировать </a>
            <a id="book" href='/adminbook/del/<?php echo $item['id']; echo "'".$confirm; ?>> Удалить </a>
            <br/>
        </div>
<?php
    }
}

echo $pagination;