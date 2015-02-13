<? 
// Подключаем константы
include ('blocks/const.php');
/* Подключаем базу данных */
include ('blocks/db.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	// получаем нужную запись БД по полю id
	$sql = "select * from ".DB_WORKS." WHERE id=".$id;
	$result = mysql_query ($sql, $db);
	$myrow = mysql_fetch_array ($result);
	$select = $myrow['select'];
	
	// формируем ссылки
	$a = "work.php?id=".$id;
	$preview = "works/$id/".IMAGE_PREVIEW_NAME;
	$load = "download.php?id=".$id;
	$prev = "works.php?select=".$select;
	
	// грузим галерею
	$gallery = array();
	$path = "works/$id/".DIR_GALLERY_NAME;
	foreach(glob("$path/{*.gif,*.jpg,*.JPG,*.png}", GLOB_BRACE) as $filename) {
		// преобразуем подировку из UTF-8 в Windows-1251 для кириллицы
		//$filename = mb_convert_encoding($filename, 'Windows-1251', 'UTF-8');
		$filename = iconv("windows-1251", "utf-8", $filename);
		// имя файла без расширения
		$withoutExt = pathinfo($filename, PATHINFO_FILENAME);
		// ассоциативный массив (ключ - withoutExt, значение - filename)
		$gallery[$withoutExt] = $filename;
	}
}
?>

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

	<!-- Слоган -->
	<script src="/js/slogans.js" type="text/javascript"></script>

	<!-- Gallery -->
	<script src="js/gallery/gallery.js" type="text/javascript" ></script>
	<link href="css/gallery.css" rel="stylesheet" type="text/css" media="screen" />
	
	<!--  -->
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="images/icon.png" rel="shortcut icon" type="image/png">
	
	<title>gee12 - Подробнее о работе</title>
</head>
<body onload="gallery()">

<!--Создаем главную таблицу-->
<table id="main_table">

	<!--Подключаем верхний блок сайта-->
	<?php include ('blocks/top.php'); ?>
		
	<!--Подключаем блок меню сайта-->
	<?php include("blocks/menu.php"); ?>
	
	<td id="main_cell">
		<div >
		<p class="main_title"> ПОДРОБНЕЕ </p>
		 
		<!--Создаем таблицу для работы-->
		<table id="horiz_table">
			<td valign='top' >
			
				<div id="gallery" class="work_images">
					<?php
					// основная картинка
					printf("<a href='%s' class='img' title=''><img src='%s' width='250' style='margin: 3px;'></a>", $preview, $preview);
					// картинки из галереи
					foreach($gallery as $k=>$v) {
						$title = $k;
						$path = $v;
						printf("<a href='%s' class='img' title='%s'><img src='%s' height='50' style='margin: 3px;'></a>", $path, $title, $path);
					}
					?>
				</div>
			
				<p align='center' class='font_desc'> <?php echo($myrow['desc']) ?> </p>
				<p align='center' class='font_sense'>" <?php echo($myrow['sense']) ?> "</p>
				<br>
				<div class='font_norm'>Категория:&nbsp;<b> <? echo($myrow['category']) ?> </b></div>
				<br>
				<div class='font_norm'><?php echo($myrow['text']) ?> </div>
				<br>
				<div align='right' class='font_norm'>Дата создания: <?php echo($myrow['date']) ?> </div>
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
					<a href=' <?php echo($load) ?> ' style='text-align:center' target='_blank' >Просмотреть</a>
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