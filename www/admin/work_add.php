<?php
// аутентификация пользователя
include("lock.php");
// константы
include("../blocks/const.php");
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
	<title>gee12 - Добавить работу</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../images/icon.png" type="image/png">
	<script type="text/javascript" src="../js/slogans.js"></script>
	
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
		<p class="main_title" >ДОБАВИТЬ</p>
		<blockquote>
		
			<?php
			// добавляем запись, если все поля заполнены
			if (isset($desc) && isset($sense) && isset($category) && isset($select) && isset($text) && isset($link) && isset($date)) {
				//
				include("../blocks/db.php");
				
				$result = mysql_query("INSERT INTO works (`desc`, `sense`, `category`, `select`, `text`, `link`, `date`)	VALUES ('$desc','$sense','$category', '$select', '$text','$link','$date')");
				//
				if ($result == 'true') { 
					$res = "Работа успешно добавлена в базу данных!"; 
				} else { 
					$res = "Работа не добавлена в базу данных!"; 
				}
			}
			// не все поля были заполнены
			else if (isset($isVisited)) { 
				$res = "Поля не должны быть пустыми!"; 
			}
			?>
			
			<div class="font_norm" style="color: red; text-align: left;">
				<?=$res?>
			</div>
			<br>
			
			<?php
			// Поля для ввода
				print <<<END
					<form action="work_add.php" method="post" name="form1" class="font_norm" style="color:SlateGray;" align="left" >
						<input type="hidden" name="isVisited" value="visited"/>
						<input name="id" type="hidden" value="$id" />
						<p>
						Полное название:<br />
						<input type="text" name="desc" size="100" id="text_field" value="$desc"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Ключевая фраза: <br />
						<input type="text" name="sense" size="100" id="text_field" value="$sense"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Категория: <br />
						<input type="text" name="category" size="100" id="text_field" value="$category"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Выборка: <br />
						<select size="1" name="select" id="text_field">
END;
				print("		<option ".(($select == SELECT_DEV) ? ' selected ' : '')." value='".SELECT_DEV."'>Разработка</option>
							<option ".(($select == SELECT_STUDY) ? ' selected ' : '')." value='".SELECT_STUDY."'>Обучение</option>
							<option ".(($select == SELECT_HOBBY) ? ' selected ' : '')." value='".SELECT_HOBBY."'>Хобби</option>
							");
				print <<<END
						</select>
						<p>
						Краткое описание (в формате HTML): <br />
						<textarea name="text" cols="102" rows="15" wrap="hard" id="text_field"
							class="validate[required] text-input" >$text</textarea>
						<p>
						Ссылка на файл: <br />
						<input type="text" name="link" size="100" id="text_field" value="$link"
							class="validate[required,length[0,255]] text-input" />
						<p>
						Дата создания: <br />
						<input type="date" name="date" id="text_field" value="$date"/>
						</p>
						<p><br>
						<button type='submit' id='button'><a>Добавить новую работу</a></button>
						</p>
					</form>
END;
		?>
  		</blockquote>
		</td>
  </tr>
	  
  <!-- Нижний блок -->
  <?php include ("../blocks/bottom.php"); ?>
  
</table>
</body>
</html>
