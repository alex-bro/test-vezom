<div class="text-left">
    <p><a class="btn btn-primary" href="/guestbooks/addguest">ДОБАВИТЬ ОТЗЫВ</a></p>
</div>

<?php
if(isset($data)) {
    foreach($data as $item ){ ?>

        <p> <span id="book">От:</span> <?php echo $item['name']; ?>
        <span id="book">Email: </span><?php echo $item['email']; ?></p>
        <p><pre><?php echo $item['body']; ?></pre></p>
<?php
    }
}

echo $pagination;