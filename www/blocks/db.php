<?php 
// Подключаем константы
include ('const.php');

$db = mysql_connect(SERVER_NAME, DB_USER_NAME, DB_PASSWORD);// or trigger_error(mysql_error(),E_USER_ERROR);

mysql_query("SET NAMES 'utf8'");
mysql_select_db(DB_NAME, $db);
?>