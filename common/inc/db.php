<?php
require_once('./common/inc/config.php');

$db_host = $database['host'];
$db_user = $database['user'];
$db_pass = $database['pass'];
$db_name = $database['name'];
$connect = mysql_connect("$db_host","$db_user","$db_pass") or die ("Keine Verbindung moeglich");
mysql_select_db("$db_name") or die ("Die Datenbank existiert nicht.");
?>