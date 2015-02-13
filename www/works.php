<?php
// константы
include ('blocks/const.php');
// база данных
include ('blocks/db.php');

// получаем значение параметра select - категория работ
$select = (isset($_GET['select'])) ? $_GET['select'] : SELECT_ALL;
	
// получаем номер страницы
$cur_page = 1;
if (isset($_GET['page']) && $_GET['page'] > 0) {
	$cur_page = $_GET['page'];
}
//
$per_page = 5;
$start = ($cur_page - 1) * $per_page;

// формируем запрос на выборку и текст
$query = "SELECT * FROM ".DB_WORKS." WHERE `select`='$select' ORDER BY date DESC LIMIT $start, $per_page";
$query_for_num = "SELECT COUNT(*) FROM ".DB_WORKS." WHERE `select`='$select'";
switch($select) {
	case SELECT_ALL:
		$query = "SELECT * FROM ".DB_WORKS." ORDER BY date DESC LIMIT $start, $per_page";
		$query_for_num = "SELECT COUNT(*) FROM ".DB_WORKS;
		$title = "ВСЕ РАБОТЫ";
		$desc = "";
		/*$desc = "<div style='font-size:large'>
		Все работы
		</div>";*/
		break;
	case SELECT_DEV:
		$title = "РАБОТЫ - РАЗРАБОТКА";
		$desc = "<div>
		Работы, связанные непосредственно с <B>разработкой ПО</B>
		</div>";
		break;		  
	case SELECT_STUDY:
		$title = "РАБОТЫ - ОБУЧЕНИЕ";
		$desc = "<div>
		Работы <B>в рамках обучения в ВУЗе</B>:
		<LI>работы, предусмотренные программой
		<LI>работы, являющиеся результатом творческой деятельности, не предусмотренные программой (ПО, презентации, статьи)
		</div>";
		break;	
	case SELECT_HOBBY:
		$title = "РАБОТЫ - ХОББИ";			
		$desc = "<div>
		Работы, являющиеся результатом <B>творческой деятельности</B> (работа с графикой, дизайн, видеомонтаж и др.)
		</div>";
		break;
}
// выполняем запрос на выборку
$result = mysql_query($query, $db);

// выполняем запрос на количество записей
//$rows_num = mysql_num_rows($result);
$res = mysql_query($query_for_num);
$row = mysql_fetch_row($res);
$rows_num = $row[0];

// общее количество страниц
$pages_num = ceil($rows_num / $per_page);

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="images/icon.png" type="image/png">
	<!-- Слоган -->
	<script type="text/javascript" src="/js/slogans.js"></script>
	<!-- Combobox -->
	<script type="text/javascript" src="/js/combobox.js"></script>
	
	<title>gee12 - Работы</title>
</head>
<body>
<table id="main_table">

	<!-- Верхний блок -->
	<?php include ('blocks/top.php'); ?>
		
	<!-- Блок меню -->
	<?php include("blocks/menu.php"); ?>
	  
	<td id="main_cell">
		<p class="main_title" > <?=$title?> </p>
			
		<!-- Выбор направления деятельности -->
		<table id="table_empty_border" align="right" style="margin: 10px;">
			<tr>
				<td class="font_norm" >
					Направление деятельности:
				</td>
				<td width="50%" align="right">

					<div id="button" style="width: 200px">
					<select size="1" name="select" align="right" onchange="showOption(this)">
						<?php print("
						<option ".(($select == SELECT_ALL) ? ' selected ' : '')." value='".SELECT_ALL."'>Любое</option>
						<option ".(($select == SELECT_DEV) ? ' selected ' : '')." value='".SELECT_DEV."'>Разработка</option>
						<option ".(($select == SELECT_STUDY) ? ' selected ' : '')." value='".SELECT_STUDY."'>Обучение</option>
						<option ".(($select == SELECT_HOBBY) ? ' selected ' : '')." value='".SELECT_HOBBY."'>Хобби</option>
						"); ?>
					</select>
					</div>
				</td>
			<tr>
				<td colspan="2" class="font_norm" align="right">
					Найдено работ: <b><?=$rows_num?></b><br>
				</td>
		</table>
				
			
		<!-- Описание работ -->
		<br><br>
		<blockquote class="font_norm" align="left">
			<?php echo($desc) ?> 
		</blockquote>

		<hr class="horiz_line" >

		<!-- Вывод работ -->
		<?php 
		$num = $start + 1;
		//
		while($row = mysql_fetch_array($result)) {
			$a = "work.php?id=$row[id]";
			$preview = "works/$row[id]/".IMAGE_PREVIEW_NAME;
			print("<table id='horiz_table' background='".IMAGE_BACK_WORK_FULLNAME."'>
				<tr>
					<td width='3%' align='center' valign='center' class='font_norm'>
						#".$num++."
					</td>
					<td width='33%'  align='center' valign='center'>
						<a href='$a'><img src='$preview' width='250'></a>
					</td>
					<td  valign='top' >
						<p align='center' class='font_desc'>$row[desc]</p>
						<p align='center' class='font_sense'>\"$row[sense]\"</p>
						<br><br>
						<div class='font_norm'>Категория:&nbsp;<b>$row[category]</b></div>
						<br>
						<div id='button'><a href='$a' align='center' >Подробнее ...</a></div>
						<br>     
						<div class='font_norm' align='right' >Дата создания: $row[date]</div>
					</td>
				</tr>
				</table>
				");
		} ?>
		
		<div class="font_norm" align="center" style="margin: 10px;">
		Страницы: 
		<?php
		$page = 0;
		while ($page++ < $pages_num) {
		if ($page != $cur_page)
		echo("<a href='?select=$select&page=$page'>$page</a>&nbsp");
		else echo("<b>$page</b>&nbsp");
		} ?>
		</div>
		
	</td>
	
	<!-- Нижний блок -->
	<?php include("blocks/bottom.php"); ?>
  
</table>
</body>
</html>