<?php
header('Content-Type: text/html; charset=ISO-8859-1');

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "maps";
  
  error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
  mysql_connect($server, $username, $password) or die("No se encontro el servidor");
  mysql_select_db($database) or die("No se encontro la base de datos");
  mysql_set_charset('utf8');

if(isset($_POST['save'])) {
	$name = mysql_real_escape_string($_POST['name']);
	$address = mysql_real_escape_string($_POST['address']);
	$latitude = mysql_real_escape_string($_POST['latitude']);
	$longitude = mysql_real_escape_string($_POST['longitude']);
	// $type = mysql_real_escape_string($_POST['type']);
	
	$reg = mysql_query("INSERT INTO markers (name, address, lat, lng) 
		VALUES ('".$name."', '".$address."', '".$latitude."', '".$longitude."')")or die(mysql_error());
	if($reg) {
		print "<script>alert(\"Successful.\");window.location='../';</script>";
	}else {
		print "<script>alert(\"Error\");window.location='../';</script>";
	}
	
}else {}
?>