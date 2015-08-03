
<?php

if(isset($data)) {
    foreach($data as $item ){
        echo "<p id='new'>".$item['name'] . "<a href='/news/view/".$item['id']."'> смотреть ...</a> </p>";
    }
}
?>

<div class="text-right">
    <?php echo $pagination; ?>
</div>