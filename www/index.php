<?php
// Подключаем константы
include ('blocks/const.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>gee12 - Главная</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="images/icon.png" type="image/png">
	<script type="text/javascript" src="/js/slogans.js"></script>
</head>
<body>

<table id="main_table">

  <!--Подключаем верхний блок сайта-->
  <?php include ("blocks/top.php"); ?>
	
  <!--Подключаем блок меню сайта-->
  <?php include("blocks/menu.php"); ?>
      
	<td id="main_cell">
		<div id="main_cell_bottom">
		<p class="main_title" >ГЛАВНАЯ</p> 
		<table style="margin: 20px;" id="table_empty_border">
			<td>
				<img src="images/photo.jpg" width="200" align="left" hspace="15" vspace="5" alt="gee12">
			</td>
			<td valign="top">
				<div class="font_desc" align="center" >Приветствую!</div>
				<br>
				<div class="font_norm" style="text-align:left;">

					Представлены работы по 3-м направлениям деятельности:
					<li style="padding: 5px 0px 5px 20px;">работы, связанные непосредственно с <B>разработкой ПО</B></li>
					<li style="padding: 5px 0px 5px 20px;">работы <B>в рамках обучения в ВУЗе</B>:
						<LI style="padding: 5px 0px 5px 50px;">работы, предусмотренные программой
						<LI style="padding: 5px 0px 5px 50px;">работы, являющиеся результатом творческой деятельности, не предусмотренные программой (ПО, презентации, статьи)
					<li style="padding: 5px 0px 5px 20px;">работы, являющиеся результатом <B>творческой деятельности</B> (работа с графикой, дизайн, видеомонтаж и др.)
				
					<!--Я долго ленился, чтобы создать собственное портфолио. Потому что если создавать, то так, чтобы не стыдно было показать. И вот этот судный день настал, когда отлаживать на потом уже просто нет смысла.
					<br><br>Если не сейчас, то когда же?!-->
				</div>
			</td>
		</table>
		
        <!--blockquote>	
		<div class="font_desc" align="center" >Приветствую!</div>
		<p align="justify">
			<img src="images/photo.jpg" width="200" align="left" hspace="15" vspace="5" alt="BONDStyle">
			<div class="font_norm" align="left">
				Я долго ленился, чтобы создать собственное портфолио. Потому что если создавать, то так, чтобы не стыдно было показать. И вот этот судный день настал, когда отлаживать на потом уже просто нет смысла.
				<br><br>Если не сейчас, то когда же?!
			</div>
		</p>
		</blockquote-->
		</div>
	</td>
	  
  <!--Подключаем нижний блок сайта-->
  <?php include ("blocks/bottom.php"); ?>
  
</table>
</body>
</html>
