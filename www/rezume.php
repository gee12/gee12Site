<?php
// Подключаем константы
include ('blocks/const.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>gee12 - Резюме</title>
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
		<div id="main_cell_bottom_long">
		  <p class="main_title" >РЕЗЮМЕ</p>
		
		  <p class="font_desc" align="center"><b>БОНДАРЬ Иван Сергеевич</b></p>

		  <table id="horiz_table" class="font_norm">
			<tr>
			  <td><p class="font_head1">Год рождения:</p></td>
			  <td>1992</td>
			</tr>
			<tr>
			  <td class="font_head1">Место проживания:</td>
			  <td>г.Нижневартовск, Тюменская обл., РФ</td>
			</tr>
			<tr>
			  <td class="font_head1">Семейное положение:</td>
			  <td>Не женат, детей нет</td>
			</tr>
			<tr>
			  <td class="font_head1">Цель:</td>
				  <td><br>
				  Получить перспективную работу в сфере разработки программного обеспечения, чтобы реализовать свои амбиции, навыки и умения в новой интересной и активно развивающейся компании
				  <br><br>
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Образование:</td>
			  <td>
				  2011 – данный момент:<br>
				  Донецкий национальный университет<br>
				  Физико-технический факультет (г.Донецк, Украина)<br>
				  Специализация: Системы искусственного интеллекта<br>
				  Квалификация: Специалист<br>
				  <br> 
				  2007 – 2011:<br> 
				  Донецкий политехнический техникум (г.Донецк, Украина)<br>
				  Специальность: Программирование для электронно-вычислительной техники и автоматизированных систем
				  Квалификация: Младший специалист<br>
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Опыт работы: </td>
			  <td>
				  2014 – 2015<br>
				  Консультационный центр "Плимут" (г.Нижневартовск, РФ)<br>
				  Должность: Менеджер по работе с клиентами<br>
				  <br>
				  Должностные обязанности:
					<li>телефонный терроризм</li>
					<li>проведение лекций, практик</li>
					<li>зомбирование людей</li>
				  
				  <br>
				  2011 – 2012<br>
				  Компьютерный клуб "Vialan" (г.Донецк, Украина)<br>
				  Должность: администратор<br>
				  <br>
				  Должностные обязанности:
					<li>валять дурака</li>
					<li>играть в КС</li>	  
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Профессиональные навыки:</td>
			  <td >
					Языки: Java, C#, C/C++, PHP<br>
					<br>
					Разработка Windows-приложений:
					<li>GUI:  Java (Swing), C# (WinForms, WPF), C/C++ (WinAPI, MFC)</li>
					<li>клиент-сервер: Java (TCP/UDP), C# (Lidgren library)</li>				
					<li>БД: Java (Derby), C# (Entity Framework), C++ (ODBC)</li>
					<br>
					Разработка игровых приложений:
					<li>2D мобильные приложения (Android)</li>
					<li>2D Windows-приложения (DirectDraw, XNA Framework)</li>
					<li>3D-визуализатор (Java)</li>
					<br>
					Разработка для Web:
					<li>сайтостроение (CSS, PHP, MySQL, AJAX)</li>
					<li>интернет-приложения (ASP.Net)</li>
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Хобби:</td>
			  <td>
					<li>фотография </li>
					<li>видеомонтаж (Sony Vegas) </li>
					<li>рисование от руки, граффити </li>
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Личные качества: </td>
			  <td>
				  <li>пунктуальность, коммуникабельность</li>
				  <li>добросовестное отношение к работе</li>
				  <li>обладание творческими способностями</li>
				  <li>желание работать и зарабатывать</li>
			  </td>
			</tr>
			<tr>
			  <td class="font_head1">Прочее</td>
			  <td>
					Люблю спорт, активный образ жизни, вредных привычек нет
			  </td>
			</tr>
		</table>
		<br>
	  </div>
	</td>
	  
  <!--Подключаем нижний блок сайта-->
  <?php include ("blocks/bottom.php"); ?>
  
</table>
</body>
</html>
