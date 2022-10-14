<?php
		require_once 'conexao.php';
		?>
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
		<form method="post" action="Editar.php" name="formulario">
		<?php
		$id=$_POST['CODIGO'];
		$cod= "SELECT * from usuario where cod=$id";
		$result=mysqli_query($con, $cod);
		while ($dados = mysqli_fetch_array($result)){
			echo '<label>Codigo: </label>
				<br/>
				<input type="text" name="CODIGO" value='.$dados["cod"].'>';
				
			echo '<p></p>';
			
			echo '<label>Nome: </label>
				<br/>
				<input type="text" name="LOGIN" value='.$dados["login"].'>';
				
			echo '<p></p>';
			
			echo '<label>Senha: </label>
				<br/>
				<input type="text" name="SENHA" value='.$dados["senha"].'>';
				
			echo '<p></p>';
		}
		?>
			<button value="Enviar" onclick="return validarCampo();">Enviar</button>
			</form>
		<script>
			function validarCampo(){
			var COD = formulario.cod.value;
			var LOGIN = formulario.login.value;
			var SENHA = formulario.senha.value;
			if(COD==""){
				alert("O Campo cod está vazio");
				return false;
			}
			else if(SENHA==""){
				alert("O Campo senha está vazio");
				return false;
			}
			else if(LOGIN==""){
				alert("O Campo login está vazio");
				return false;
			}
				return true;
			}
		</script>
		<?php
		if (isset($_POST['LOGIN'])){
		$cod=$_POST['CODIGO'];
		$login=$_POST['LOGIN'];
		$senha=$_POST['SENHA'];
		
	
		$command = "UPDATE usuario SET cod = $cod, login = '$login', senha = '$senha' where cod=$cod;";
		if(mysqli_query($con, $command)){
		echo '<script> alert("Usuario atualizado com sucesso!");
		window.location.href="Editar.html"
		</script>';
		}
		
		else{
		echo '<script> die("Ocorreu algum erro");
		window.location.href="Editar.html"</script>';
		
	}
		}
	?>
		
		
		</body>
</html>