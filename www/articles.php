<?php
// Подключаем константы
include ('blocks/const.php');
// Подключаем базу данных
include ('blocks/db.php');

$query = "SELECT * FROM ".DB_ARTICLES." ORDER BY date DESC ";
$desc = "<div style='font-size:large'>
	Все статьи..
	</div>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>gee12 - Статьи</title>
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
		<div >
		<p class="main_title" > СТАТЬИ </p>

		<blockquote class="font_norm" align="left"> <?php echo($desc) ?> </blockquote>

		<hr class="horiz_line" >

		<?php 
		// SQL-запрос на выборку
		$result = mysql_query($query, $db);
		$num = 1;
		//
		while($myrow = mysql_fetch_array ($result)) {
			$a = "article.php?id=".$myrow[DB_ARTICLES_ID];
			$preview = "articles/".$myrow[DB_ARTICLES_ID]."/".IMAGE_PREVIEW_NAME;
			print("<table id='horiz_table' background='".IMAGE_BACK_WORK_FULLNAME."'>
				<tr>
					<td width='3%' align='center' valign='center' class='font_norm'>
						#".$num++."
					</td>
					<td width='33%'  align='center' valign='center'>
						<a href='".$a."'><img src='".$preview."'></a>
					</td>
					<td  valign='top' >
						<p align='center' class='font_desc'>".$myrow[DB_ARTICLES_DESC]."</p>
						<p align='center' class='font_sense'>\"".$myrow[DB_ARTICLES_SENSE]."\"</p>
						<br><br>
						<div class='font_norm'>Категория:&nbsp;<b>".$myrow[DB_ARTICLES_CATIGORY]."</b></div>
						<br>
						<div id='button'><a href='".$a."' align='center' >Подробнее ...</a></div>
						<br>     
						<div class='font_norm' align='right' >Дата создания: ".$myrow[DB_ARTICLES_DATE]."</div>
					</td>
				</tr>
				</table>
				");
		}
		?>
		</div>
	</td>
	
	<!--Подключаем нижний блок сайта-->
	<?php include("blocks/bottom.php"); ?>
  
</table>
</body>
</html>