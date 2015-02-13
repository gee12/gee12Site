<?php
// имена файлов и каталогов
define('IMAGE_PREVIEW_NAME', "preview.png");
define('DIR_GALLERY_NAME', "gallery");
define('IMAGE_BACK_WORK_FULLNAME', "images/back_work.png");
define('WORK_NAME', "work.rar"); 
define('SLOGANS_FINE_NAME', $_SERVER["DOCUMENT_ROOT"]."/slogans.txt");
define('IMAGE_LOGO_NAME', "/images/logo.png");
define('IMAGE_ICON_NAME', "/images/icon.png");

// БД
define('SERVER_NAME', "localhost"); 
define('DB_USER_NAME', "gee12"); 
define('DB_PASSWORD', "123"); 
define('DB_NAME', "gee12db"); 

// таблицы БД
define('DB_WORKS', DB_NAME.".works"); 
define('DB_ARTICLES', DB_NAME.".articles");

// значения поля select
define('SELECT_ALL', "all"); 
define('SELECT_DEV', "dev"); 
define('SELECT_STUDY', "study"); 
define('SELECT_HOBBY', "hobby"); 

?>