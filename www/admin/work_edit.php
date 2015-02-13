<?php
// аутентификация пользователя 
include ("lock.php");
// константы
include("../blocks/const.php");
// подключение к бд
include("../blocks/db.php");
// верификация элементов управления
if (isset($_POST['id'])) {$id = $_POST['id']; if ($id == '') unset($id);}
if (isset($_POST['isVisited'])) {$isVisited = $_POST['isVisited']; if ($isVisited == '') unset($isVisited);}

if (isset($_POST['desc'])) {$desc = $_POST['desc']; if ($desc == '') unset($desc);}
if (isset($_POST['sense'])) {$sense = $_POST['sense']; if ($sense == '') unset($sense);}
if (isset($_POST['category'])) {$category = $_POST['category']; if ($category == '') unset($category);}
if (isset($_POST['select'])) {$select = $_POST['select']; if ($select == '') unset($select);}
if (isset($_POST['text'])) {$text = $_POST['text']; if ($text == '') unset($text);}
if (isset($_POST['link'])) {$link = $_POST['link']; if ($link == '') unset($link);}
if (isset($_POST['date'])) {$date = $_POST['date']; if ($date == '') unset($date);}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>gee12 - Изменить работу</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../images/icon.png" rel="shortcut icon" type="image/png">
	<script src="../js/slogans.js" type="text/javascript"></script>
	
	<link href="../css/validationEngine.jquery.css" rel="stylesheet" type="text/css" media="screen" title="no title" charset="utf-8" />
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>

<table id="main_table">

  <!-- Верхний блок -->
  <?php include ("../blocks/top.php"); ?>
	
  <!-- Блок меню -->
  <?php include("blocks/menu.php"); ?>
      
  <td id="main_cell">
		<p class="main_title" >ИЗМЕНИТЬ</p>
		<blockquote>
			<?
			// обновляем запись, если все поля (POST) заполнены
			if (isset($id) && isset($desc) && isset($sense) && isset($category) && isset($select) && isset($text) && isset($link) && isset($date)) {

				$result = mysql_query("UPDATE works SET `desc`='$desc', `sense`='$sense', `category`='$category', `select`='$select', `text`='$text', `link`='$link', `date`='$date' WHERE `id`='$id'");
				//
				if ($result == 'true') { 
					$res = "Работа успешно обновлена в базе данных!"; 
				} else { 
					$res = "Работа не обновлена в базе данных!"; 
				}
			}
			// не все поля были заполнены
			else if (isset($isVisited)) { 
				$res = "Поля не должны быть пустыми!"; 
				$_GET["id"] = $id;
			}
			?>
			
			<!-- Выводим результат -->
			<div class="font_error" align="left">
				<?=$res?>
			</div>
			<br>
					
			<?php
			// если id (GET) не указан - выводим список работ
			if (!isset($_GET["id"])) {
				// Создаем SQL-запрос на выборку
				$result = mysql_query ("SELECT `id`,`desc` FROM works", $db);
				$i = 1;
				while ($myrow = mysql_fetch_array ($result)) {
					printf("<p align='left'><a href='work_edit.php?id=%s'>%s %s [id=%s]</a></p>", 
						$myrow["id"], $i++, $myrow["desc"], $myrow["id"]);
				}
				
			}
			// id (GET) указан - заполняем поля данными
			else {
				$id = $_GET['id'];
				// Создаем SQL-запрос на выборку
				$result = mysql_query("select * from works", $db);
				$i = 0;
				$rows_num = mysql_num_rows($result);
				//
				while ($myrow = mysql_fetch_array($result)) {
					if ($myrow['id'] == $id) {
						// предыдущий id
						$prev_i = (($i == 0) ? $rows_num-1 : $i-1);
						$prev_id = mysql_result($result, $prev_i, 'id');
						// следующий id
						$next_i = (($i == $rows_num-1) ? 0 : $i+1);
						$next_id = mysql_result($result, $next_i, 'id');
						
						break;
					}
					$i++;
				}

				// поля для ввода
				print <<<END
					<form action="work_edit.php?id=$id" method="post" name="form1" class="font_norm" style="color:SlateGray;" align="left" >
						<input type="hidden" name="isVisited" value="visited"/>
						Id: <br />
						<input type="text" name="id" size="5" id="text_field" value="$myrow[id]" disabled/>
						<input name="id" type="hidden" value="$myrow[id]" />
						<p>
						Полное название:<br />
						<input type="text" name="desc" size="100" id="text_field" value="$myrow[desc]" 
							class="validate[required,length[0,255]] text-input" />
						<p>
						Ключевая фраза: <br />
						<input type="text" name="sense" size="100" id="text_field" value="$myrow[sense]"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Категория: <br />
						<input type="text" name="category" size="100" id="text_field" value="$myrow[category]"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Выборка: <br />
						<select size="1" name="select" id="text_field">
END;
				print("		<option ".(($myrow['select'] == SELECT_DEV) ? ' selected ' : '')." value='".SELECT_DEV."'>Разработка</option>
							<option ".(($myrow['select'] == SELECT_STUDY) ? ' selected ' : '')." value='".SELECT_STUDY."'>Обучение</option>
							<option ".(($myrow['select'] == SELECT_HOBBY) ? ' selected ' : '')." value='".SELECT_HOBBY."'>Хобби</option>
							");
				print <<<END
						</select>
						<p>
						Краткое описание (в формате HTML): <br />
						<textarea name="text" cols="102" rows="15" wrap="hard" id="text_field"
							class="validate[required] text-input" >$myrow[text]</textarea>
						<p>
						Ссылка на файл: <br />
						<input type="text" name="link" size="100" id="text_field" value="$myrow[link]"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Дата создания: <br />
						<input type="date" name="date" id="text_field" value="$myrow[date]"/>
						</p>
END;
				print("
						<br>
						<table id='table_empty_border' width='100%'>
							<td align='left'><button id='button'><a href='work_edit.php?id=$prev_id'>Предыдущая запись</a></button></td>
							<td align='right'><button type='submit' id='button'><a>Сохранить</a></button></td>
							<td align='left'><button type='reset' id='button'><a>Отменить</a></button></td>
							<td align='right'><button id='button'><a href='work_edit.php?id=$next_id'>Следующая запись</a></button></td>
						</table>
					</form>");
			}
			?>
			</blockquote>
		</td>
  </tr>
	  
  <!-- Нижний блок -->
  <?php include ("../blocks/bottom.php"); ?>
  
</table>
</body>
</html>
