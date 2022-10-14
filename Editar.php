<html>
<head>
		<meta charset="UTF-8"/>
		<title> Edição de Usuario</title>
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
	<h1> Edição de Usuário </h1>
		<form method="post" action="Editarr.php" >
			<label> Digite o código: </label>
			<br/>
			<input type="text" name="CODIGO"/>
			<p></p>
			<button value="Enviar" onclick="return validarCampo();">Enviar</button>
			</form>
		<script>
			function validarCampo(){
			var ID = formID.CODIGO.value;
			if(ID==""){
				alert("O Campo Codigo não pode ficar vazio");
				return false;
			}
				return true;
			}
		</script>
		</body>
</html>