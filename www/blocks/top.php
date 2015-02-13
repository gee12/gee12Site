<?php
// Подключаем константы
include($_SERVER["DOCUMENT_ROOT"]."/blocks/const.php");
/*
// Слоган
if (is_file(SLOGANS_FINE_NAME)) {
	$f = fopen(SLOGANS_FINE_NAME, "r");
	$slogans = array();
	while(!feof($f)) {
		array_push($slogans, fgets($f));
	}
	fclose($f);
	// перемешиваем
	//shuffle($slogans);
	$rand_num = rand(0, count($slogans));
	$rand_slogan = $slogans[$rand_num];
}*/
?>

<tr>
	<td id="top_cell" colspan="2">
    	<table width="100%" height="100%" id="table_empty_border" >
			
			<!-- Логотип -->
			<td width="20%" align="center">
				<a href="index.php">
					<img src=" <?php echo(IMAGE_LOGO_NAME); ?> " align="left" width="100" hspace="15" alt="gee12">
				</a>
            </td>
			
			<!-- Слоган -->
        	<td width="80%" align="center" valign="bottom">
            	<div id="sloganField" class="font_slogan" ></div>
            </td>
			
			<!-- Аутентификация ВКонтакте -->
            <td valign="top" >
                <script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
                <div id="login_button" onclick="VK.Auth.login(authInfo);"></div>
                <script language="javascript">
                    VK.init({
                      apiId: 4070225
                    });
                    function authInfo(response) {
                    }
                    VK.Auth.getLoginStatus(authInfo);
                    VK.UI.button('login_button');
                </script>
                
            </td>
        </table>
    </td>
</tr>
