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
	<FORM method="post" action="Deletar.php">
	<label>Digite o Codigo desejado: </label>
	<br/>
	<input type="text" name="codigo"/>
	<p></p>
	<button value="Enviar" onclick="return validarCampo();">Enviar</button>
	</form>
	<script>
			function validarCampo(){
			var ID = formID.codigo.value;
			if(ID==""){
				alert("O Campo codigo não pode ficar vazio");
				return false;
			}
				return true;
			}
		</script>
	<?php
	require_once 'conexao.php';
	if(isset($_POST['codigo'])){
	$id=$_POST['codigo'];
	$sql=mysqli_query($con,"delete from usuario where cod=$id");
	if($sql){
		echo '<script> alert("Usuario Deletado com sucesso");
		window.location.href="Deletar.php"; </script>
		';
		
	}
	else{
		echo '<script> alert("Ocorreu algum erro"); </script>';
	}
	}
	?>
</body>
</html>