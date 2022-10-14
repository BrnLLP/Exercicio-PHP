<html>
<head>
<title>Menu</title>
<meta charset="UTF-8"/>
</head>
<body>
<?php session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:Logar.php');
  }
 
$logado = $_SESSION['login'];
?>
<H1>Menu de funções</H1>
<a href="Listar.php">Listar</a>
<a href="Editar.php">Editar</a>
<a href="Cadastrar.php">Cadastrar</a>
<a href="Deletar.php">Deletar</a>
<a href="deslogar.php">Deslogar</a>
</body>
</html>