<?php

include_once "../base.php";

$table=$_POST['table'];
$DB=new DB($table);
$DB->del($_POST['id']);

// 縮減成2行
// $DB=new ($_POST['table']);
// $DB->del($_POST['id']);