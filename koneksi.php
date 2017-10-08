<?php
	//session_start();
	//mysqli_connect("localhost", "root", "");
	//mysqli_select_db("db-sie") or die ('not connected........!')
	//$db = new PDO('mysqli:host=localhost;dbname=siedb;charset=utf8mb4', 'root', '') or die ('not connected');
	define('HOST','localhost');
  	define('USER','root');
	define('PASS','');
	define('DB','siedb');

	$db = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable to Connect');
?>