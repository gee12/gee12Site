<?php
// 
include("../blocks/const.php");
//include("../blocks/db.php");
// 
function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
} 

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
	Header ("HTTP/1.0 401 Unauthorized");
	//header('Location:'.getUrl());
	exit();
}
else {
	// 
	if (!get_magic_quotes_gpc()) {
		// 
		$_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
		$_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
	}
	// 
	if ($_SERVER['PHP_AUTH_USER'] != DB_USER_NAME || $_SERVER['PHP_AUTH_PW'] != DB_PASSWORD) {
		Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
		Header ("HTTP/1.0 401 Unauthorized");
		exit();
	}
	// 
	/*$query = "SELECT password FROM userlist WHERE user='".$_SERVER['PHP_AUTH_USER']."'";
	$lst = @mysql_query($query);
	// 
	$pass =  @mysql_fetch_array($lst);
	// 
	if (!$lst || mysql_num_rows($lst) == 0 || $_SERVER['PHP_AUTH_PW']!= $pass['password'])
	{
		Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
		Header ("HTTP/1.0 401 Unauthorized");
		exit();
	}*/

}
?>