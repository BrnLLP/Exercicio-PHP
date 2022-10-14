<?php
	$host="localhost:3307";
	$usu="root";
	$senha="";
	$banco="webtrab";
	$con;
	$con = mysqli_connect($host,$usu,$senha,$banco)or die("Erro na conexao");
?>
