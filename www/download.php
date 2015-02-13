<?php
// Подключаем константы
include ('blocks/const.php');
/* Подключаем базу данных */
include ('blocks/db.php');

if (isset($_GET[DB_WORKS_ID])) { 
	//
	$id = $_GET[DB_WORKS_ID]; 
	// получаем нужную запись БД по полю id
	$sql = "select * from ".DB_WORKS." WHERE id=".$id;
	$result = mysql_query ($sql, $db);
	$myrow = mysql_fetch_array ($result);
	// достаем ссылку
	$link = $myrow[DB_WORKS_LINK];
	$prev = "work.php?id=".$id;
	// если ссылка == стандартному значению, то ищем работу на сервере
	if ($link == WORK_NAME) {
		$link = $_SERVER["DOCUMENT_ROOT"]."/works/".$id."/".WORK_NAME;
		if (is_file($link)) {
			// файл существует
			header("Content-Type: application/octet-stream"); 
			header("Accept-Ranges: bytes"); 
			header("Content-Length: ".filesize($link));  
			header("Content-Disposition: attachment; filename=".$link);   
			readfile($link);
			//
			$res = "Загрузка работы..";
		}	
		else {
			//
			$res = "Работа остутствует на сервере.";
		}				
	}
	else {
		header('Location:'.$link);
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>gee12 - Загрузка работы</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="images/icon.png" type="image/png">
	<script type="text/javascript" src="/js/slogans.js"></script>
</head>
<body>
<table id="main_table">

  <!--Подключаем верхний блок сайта-->
  <?php include ('blocks/top.php'); ?>
	
  <!--Подключаем блок меню сайта-->
  <?php include("blocks/menu.php"); ?>
      
	<td id="main_cell">
		<div id="main_cell_bottom">
		<p class="main_title"> ЗАГРУЗКА РАБОТЫ </p>
		
        <blockquote>
			<br/>
			<div class="font_norm" style="color: red; text-align: left;">
				<?php echo($res); ?>
			</div>
			<br/><br/>
			
			<div id='buttom'>
				<a href=' <?php echo($prev); ?> ' style='text-align:center'>Вернуться к просмотру работы</a>
			</div>
        </blockquote>
		
		</div>
	</td>
	  
	<!--Подключаем нижний блок сайта-->
	<?php include ("blocks/bottom.php"); ?>

</table>
</body>
</html>