<?php
// аутентификация пользователя
include ("lock.php");
// подключение к бд
include("../blocks/db.php");
//
if (isset($_POST['id'])) {$id = $_POST['id']; if ($id == '') unset($id);}
if (isset($_POST['isVisited'])) {$isVisited = $_POST['isVisited']; if ($isVisited == '') unset($isVisited);}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>gee12 - Удалить работу</title>
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
		<p class="main_title" >УДАЛИТЬ</p>
		<blockquote>
		
			<?php
			// удаляем запись, если была выбрана
			if (isset($id) && isset($isVisited)) {
				$result = mysql_query("DELETE FROM works WHERE `id`='$id'");
				//
				if ($result == 'true') { 
					$res = "Работа успешно удалена из базы данных!"; 
				} else { 
					$res = "Работа не удалена из базы данных!"; 
				}
			}
			// не все поля были заполнены
			else if (isset($isVisited)) { 
				$res = "Работа не выбрана!"; 
			}
			?>
				
			<!-- Выводим результат -->
			<div class="font_norm" style="color: red; text-align: left;">
				<?=$res?>
			</div>
			<br>
							  
			<form action="work_delete.php" method="post" name="form1" class="font_norm" align="left">
				<input type="hidden" name="isVisited" value="visited"/>
				<?		
				// запрос на выборку
				$result = mysql_query("select `id`,`desc` from works", $db);
				$num = 1;
				while ($myrow = mysql_fetch_array($result)) {
					$_id = $myrow["id"];
					printf("<p class='radio_button'><input type='radio' name='id' value='%s' id='%s' /><label for='%s'><a>%s %s [id=%s]</a></label></p>", 
						$_id, $_id, $_id, $num++, $myrow["desc"], $_id);
				}
				?>
				<br>
				<div >
					<button type="submit" id="button"><a>Удалить работу</a></button>
				</div>
		  </form>
	  </blockquote>
  </tr>
	  
  <!-- Нижний блок -->
  <?php include("../blocks/bottom.php"); ?>
  
</table>
</body>
</html>
