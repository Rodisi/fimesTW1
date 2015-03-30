<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('nao ligou: ' . mysql_error());
}

$db_selected = mysql_select_db('filmes', $link);
if (!$db_selected) {
    die ('nao pode usar a base de dados : ' . mysql_error());
}
?>
