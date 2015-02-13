<?php
// Подключаем константы
include ('blocks/const.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>gee12 - Контакты</title>
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
        <p class="main_title" >КОНТАКТЫ</p>
        <blockquote class="font_norm" align="left">
			<div class="font_head1">Телефон: </div> +7982581517[два]
            <div class="font_head1">e-mail: </div> yagee12[собака]gmail.com <br> 
                                                    truebondar[собака]gmail.com
            <div class="font_head1">vk.com: </div> truebondar
            <div class="font_head1">Skype: </div> igee12
        </blockquote>
		</div>
	</td>
	  
  <!--Подключаем нижний блок сайта-->
  <?php include ("blocks/bottom.php"); ?>
  
</table>
</body>
</html>