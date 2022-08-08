<?php

include_once "../base.php";

$table=$_POST['table'];
$DB=new DB($table);
$DB->del($_POST['id']);
