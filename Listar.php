<html>
<head>
<title> Lista de Usuario </title>
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
<h1>Lista de Usuário</h1>


<?php
include "Conexao.php";
?>
<form method='POST' action='Listar.php'>
<label> Digite o codigo que desejar: </label>
<br/>
<input type='text' name='codigo'/>
<p></p>
<input type='submit' value='Enviar'/>
<p></p>
</form>
<?php
	if(isset($_POST['codigo'])){
	$id=$_POST['codigo'];
	$cod="select * from usuario where cod=$id;";
	}
	if (empty($_POST['codigo'])) {
	$cod="select * from usuario";
	}
	$result=mysqli_query($con, $cod);
		echo '<table border="1px">
			<thead><th>Codigo:</th>
			<th>Login:</th>
			<th>Senha:</th>
			</thead>';
		while ($dados = mysqli_fetch_array($result)){
			
		
		echo '<tbody><tr><td>'.$dados["cod"].'</td>';
		echo '<td>'.$dados["login"].'</td>';
		echo '<td>'.$dados["senha"].'</td></tr>';
		
		}
		echo '</tbody></table>';
?>
<style>
	table{
		font-size:18px;
		font-family:'Times New Roman';
		
	}
</style>
</body>
</html>