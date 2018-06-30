<?php
	require "tools.php";
  if(isset($_COOKIE['logado']) && $_COOKIE['logado'] == "1")
    header("Location: painel.php");
  $error = false;
	if(isset($_POST['usuario']) && isset($_POST['senha'])){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $conn = new Conexao();
    if(!$conn->Login($usuario, $senha)){
      $error = true;
    }else{
      if(isset($_POST['relembrar']))
        setcookie("relembrar", $usuario);
      else
        setcookie("relembrar");

      setcookie("logado", "1");
      header("Location: painel.php");
    }
  }
?>
<html>
	<head>
		<title>Login Page</title>
    <link rel="icon" href="imgs/icon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

		<div class="container-fluid cont">
			<div class="row">				
				<div class="col-sm-6  col-sm-offset-3 boxLogin">
					<div class="panel panel-primary">
  						<div class="panel-heading "><h3>Login</h3></div>
  						<div class="panel-body formLogin">  							
  							<form action="#" class="col-sm-8  col-sm-offset-2" method="post">
  								<label>Usuario:</label><br>
  								<div class="input-group">  									
    								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   									<input id="login" type="text" class="form-control" name="usuario" <?php if(isset($_COOKIE['relembrar']))echo 'value="' . $_COOKIE['relembrar'] . '" ' ;?>  placeholder="Digite aqui seu  usuario" required="">
  								</div><br>
  								<label>Senha:</label><br>
 								<div class="input-group">
   									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    								<input id="senha" type="password" class="form-control" name="senha"  required="">
  								</div>
  								<div class="checkbox">
    								<label><input type="checkbox" name="relembrar" <?php if(isset($_COOKIE['relembrar']))echo "checked"; ?> >Lembrar usuario.</label>
  								</div>
  								<button type="submit" class="btn btn-default">Logar</button></right>  								
  							</form>  							
  						</div>
  						<div class="panel-footer">  
  							<?php if($error)Alerta(4, "Error", "Usuario ou Senha incorreto!"); ?>
  						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
  <script src="js/bootstrap.min.js"></script>
</html>