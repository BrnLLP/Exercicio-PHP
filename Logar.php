<html>
	<head>
		<meta charset="UTF-8"/>
		<script type="text/javascript" src="script.js"></script>
		<title> Login </title>
	</head>
	<body>
		<h1>Login</h1>
		<P></P>
		<form method="post" action="Logar.php" name="formulario">
			<label>Digite o Login para Logar: </label>
			<br/>
			<input type="text" name="login" size="20" value=""/>
			<p></p>
			<label>Digite a Senha: </label>
			<br/>
			<input type="password" name="senha" size="20" value="" />
			<p></p>
			<p></p> 
			<button value="Enviar" onclick="return validarCampo();">Enviar</button>
		</form>
		<script>
			function validarCampo(){
				var login = formulario.login.value;
				var senha = formulario.senha.value;
				if(login==""){
				alert("O Campo de Login não pode ficar vazio");
				return false;
				}
				else if(senha==""){
				alert("O Campo de Senha não pode ficar vazio");
				return false;
				}
				
				return true;
			}
		</script>
		<?php
		if(isset($_POST['login'])){
			session_start();
	require_once "conexao.php";
	
	$login=$_POST['login'];
	$senha=$_POST['senha'];
		$sql=mysqli_query($con,"SELECT * from usuario where login='$login' and senha='$senha'");
		$linha= mysqli_num_rows($sql);
		if($linha==0){
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			  echo '<script>
			  alert("Usuario ou Senha Incorreto");
			  window.location.href="Logar.php";
			  </script>';
		}
		else{
			$_SESSION['login']=$login;
			$_SESSION['senha']=$senha;
			header('Location: Menu.php');
		}
		}
?>
	</body>
</html>