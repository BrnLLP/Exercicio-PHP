<html>
<head>
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
		<h1> Cadastro de Contato </h1>
		<form method="post" action="Cadastrar.php" name="formulario">
		<p></p>
		<label>Digite o Login: </label>
		<br/>
		<input type="text" name="loggg"/>
		<p></p>
		<label>Digite o senha: </label>
		<br/>
		<input type="text" name="sennn"/>
		<p></p>
		<button value="Enviar" onclick="return validarCampo();">Cadastrar</button>
		</form>
		<script>
			function validarCampo(){
			var n = formulario.loggg.value;
			var e = formulario.sennn.value;
			if(n==""){
				alert("O Campo login está vazio");
				return false;
			}
			else if(e==""){
				alert("O Campo senha está vazio");
				return false;
			}
				return true;
			}
		</script>
		<?php
	require_once 'conexao.php';
	if(isset($_POST['loggg'])){
		$login=$_POST['loggg'];
		$senha=$_POST['sennn'];
		$sql = "insert into usuario values(0,'$login','$senha');";
		if(mysqli_query($con, $sql)){
			echo '<script> alert("Usuario Salvo");</script>';
		}
		else{
			echo '<script> die("Ocorreu algum erro");</script>';
		}
	}
?>
			
</body>
</html>