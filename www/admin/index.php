<?php
// константы
include ('../blocks/const.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>gee12 - Админка</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../images/icon.png" type="image/png">
	<script type="text/javascript" src="../js/slogans.js"></script>
</head>
<body>

<table id="main_table">

  <!-- Верхний блок -->
  <?php include ("../blocks/top.php"); ?>
	
  <!-- Блок меню -->
  <?php include("blocks/menu.php"); ?>
      
	<td id="main_cell">	
		<p class="main_title" >АДМИНКА</p> 
		<table style="margin: 20px;" id="table_empty_border">

			<td valign="top">
				<div class="font_desc" align="center" >Админ!</div>
				<br>
				<div class="font_norm" align="left">
					Здесь можно заняться редактированием контента сайта - содержимого базы данных.
				</div>
			</td>
		</table>
	</td>
	  
  <!-- Нижний блок -->
  <?php include ("../blocks/bottom.php"); ?>
  
</table>
</body>
</html>
