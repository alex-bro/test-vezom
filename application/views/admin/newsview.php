<p class="text-left">
    <a class="btn btn-primary" href="/admin/add">Добавить новость</a>
</p>

<?php
$confirm="onclick=\"return confirm('Удалить?')\"";
if(isset($data)) {
    foreach($data as $item ){
        echo "<p id='new'>".$item['name'] . "<a href='/admin/view/".$item['id']."'> смотреть ...</a>".
            "<a href='/admin/del/".$item['id']."' $confirm > удалить </a>".
            "</p>";
    }
}

echo $pagination;