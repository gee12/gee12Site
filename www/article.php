<? 
// Подключаем константы
include ('blocks/const.php');
/* Подключаем базу данных */
include ('blocks/db.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!--  Для аутентификации Вконтакте -->
	<script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
	
	<!--  Для виджетов Вконтакте -->
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
	<script type="text/javascript">
		VK.init({apiId: 4070225, onlyWidgets: true});
	</script>
	
	<!--  Мне нравится Вконтакте -->
	<script type="text/javascript">
		VK.Widgets.Like("vk_like", {type: "button"});
	</script>
	
	<!--  Комментарии Вконтакте -->
	<script type="text/javascript">
		VK.Widgets.Comments("vk_comments", {width: 'auto', limit: 5, attach: "*"});
	</script>

<?
if (isset($_GET[DB_ARTICLES_ID]))
{
	$id = $_GET[DB_ARTICLES_ID];
	// получаем нужную запись БД по полю id
	$sql = "select * from ".DB_ARTICLES." WHERE id=".$id;
	$result = mysql_query ($sql, $db);
	$myrow = mysql_fetch_array ($result);
	
	$select = $myrow[DB_ARTICLES_SELECT];
	$a = "article.php?id=".$id;
	$preview = "articles/".$id."/".IMAGE_PREVIEW_NAME;
	$origin = "articles/".$id."/".IMAGE_ORIGIN_NAME;
	$load = "download.php?".DB_ARTICLES_ID.'='.$id;
	$prev = "articles.php?".DB_ARTICLES_SELECT.'='.$select;
}
?>
	<title>gee12 - Статья</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="images/icon.png" type="image/png">
	<script type="text/javascript" src="/js/slogans.js"></script>
</head>
<body>

<!--Создаем главную таблицу-->
<table id="main_table">

	<!--Подключаем верхний блок сайта-->
	<?php include ('blocks/top.php'); ?>
		
	<!--Подключаем блок меню сайта-->
	<?php include("blocks/menu.php"); ?>
	
	<td id="main_cell">
		<div >
		<p class="main_title"> СТАТЬЯ </p>
		 
		<!--Создаем таблицу для работы-->
		<table id="horiz_table">
			
			<td width='33%' align='center' valign='center'>
				<a href=' <?php echo($origin) ?> '>
					<img src=' <?php echo($preview) ?> '>
				</a>
			</td>
			<td  valign='top' colspan='3'>
				<p align='center' class='font_desc'> <?php echo($myrow[DB_ARTICLES_DESC]) ?> </p>
				<p align='center' class='font_sense'>" <?php echo($myrow[DB_ARTICLES_SENSE]) ?> "</p>
				<br><br>
				<div class='font_norm'>Категория:&nbsp;<b> <? echo($myrow[DB_ARTICLES_CATIGORY]) ?> </b></div>
				<br>
				<div class='font_norm'><?php echo($myrow[DB_ARTICLES_TEXT]) ?> </div>
				<br><br>
				<div align='right' class='font_norm'>Дата создания: <?php echo($myrow[DB_ARTICLES_DATE]) ?> </div>
			</td>
		</table>
		
		<!-- Создаем таблицу для элементов внизу -->
		<table id="work_table">
			<!-- Кнопка Вернуться -->
			<td width='50%'>
				<div id='button'>
					<a href=' <?php echo($prev) ?> ' style='text-align:center'>Вернуться к списку работ</a>
				</div>
			</td>
			<!-- Кнопка Скачать -->
			<td style=" width: 60%; padding-left: 10px; padding-right: 10px;">
				<div id='button'>
					<a href=' <?php echo($load) ?> ' style='text-align:center' target='_blank' >Приложение</a>
				</div>
			</td >
			<!--  Кнопка Мне нравится Вконтакте -->
			<td>
				<div id="vk_like"></div>
			</td>
		</table>

		<!--  Комментарии Вконтакте -->
		<div id="vk_comments"></div>

		</div>
	</td>
	
	<!--Подключаем нижний блок сайта-->
	<?php include ("blocks/bottom.php"); ?>
  
</table>
</body>
</html>