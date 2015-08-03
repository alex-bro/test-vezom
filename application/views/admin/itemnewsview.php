<?php
if(isset($data)) {
    echo "<a href='".$_SERVER['HTTP_REFERER']."'>к новостям</a>";
    echo "<p class='well well-sm'> {$data['name']} </p>";
    echo "<p > {$data['body']} </p>";
    echo "<a href='".$_SERVER['HTTP_REFERER']."'>к новостям</a>";

}
