<?php
// Подключаем константы
include ('const.php');
?>

<tr>
	<td id="menu_cell">
		<div id="menu_cell_bottom">
			<p class="main_title">Навигация</p>
			<p id="main_menu">
				<a href="index.php">Главная</a>
				<a href="rezume.php">Резюме</a>
				<a href="works.php?select=<?=SELECT_ALL?>">Работы</a>
				<a href="articles.php">Статьи</a>
				<a href="contacts.php">Контакты</a>
			</p>
		</div>
	</td>
