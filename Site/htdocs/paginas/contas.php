<?php

$conn = new Conexao(); 
$error = false;
$sucesso = false;
$msg = "";
if(isset($_POST['addUser'])){
	$nome = $_POST['nome'];
	$user = $_POST['usuario'];
	$senha = $_POST['senha'];
	if($conn->Inserir($nome, $user, $senha)){
		$msg = "Usuario criado com sucesso!";
		$sucesso = true;
	}else{
		$error = true;
		$msg = "Nao foi possivel criar usuario!";
	}
}
if(isset($_POST['delUser'])){
	$id = $_POST['id'];
	if(!$conn->Deletar($id)){
		$msg = "ID Invalido!";
		$error = true;
	}else{
		$msg = "Usuario deletado com sucesso!";
		$sucesso = true;
	}
}
if(isset($_POST['altUser'])){
	$id = $_POST['id'];
	$senha = $_POST['senha'];
	if(!$conn->AlterarSenha($id, $senha)){
		$msg = "ID Invalido!";
		$error = true;
	}else{
		$msg = "Senha alterada com sucesso!";
		$sucesso = true;
	}
}



?>
<div class="panel panel-default">
	<div class="panel-heading">
		<center>
               	<h3>Contas</h3>
    	</center>
    </div>
    <div class="panel-body">
    	<?php if($error)
            			Alerta(3, "ERROR", $msg);
            		  if($sucesso)
            		  	Alerta(1, "SUCESSO", $msg);
            	 ?>
    	<div class="panel panel-default col-sm-3">  

            <div class="panel-body preto"> 
            	<h4><i class="glyphicon glyphicon-plus"></i> Adicionar usuario</h4>
            	<hr>            	
            	<form action="#" method="POST">
            		<input type="hidden" name="fcontas" value="1">
    				<input type="hidden" value="1" name="addUser">
    				<label>Nome *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-italic"></i></span>
   						<input  type="text" class="form-control" name="nome" required>
  					</div><br> 
  					<label>Usuario *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   						<input  type="text" class="form-control" name="usuario" required>
  					</div><br>
  					<label>Senha *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
   						<input  type="password" class="form-control" name="senha" required>
  					</div><br>
  					<center><input type="submit" class="btn btn-default" value="Criar conta"></center>
    			</form>
           	</div>
        </div>
        <div class=" caixa panel panel-default col-sm-3 col-sm-offset-1">    			
            <div class="panel-body preto"> 
            	<h4><i class="glyphicon glyphicon-trash"></i> Remover usuario</h4>
            	<hr>
            	<form action="#" method="POST">
            		<input type="hidden" name="fcontas" value="1">
    				<input type="hidden" value="1" name="delUser">
    				<label>ID *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
   						<input  type="number" class="form-control" name="id" required>
  					</div><br>
  					<center><input type="submit" class="btn btn-default" value="Deletar"></center>
    			</form>
           	</div>
        </div>
        <div class="caixa panel panel-default col-sm-3 col-sm-offset-1 " >  			
            <div class="panel-body preto"> 
            	<h4><i class="glyphicon glyphicon-pencil"></i> Alterar Senha</h4>
            	<hr>
            	<form action="#" method="POST">
            		<input type="hidden" name="fcontas" value="1">
    				<input type="hidden" value="1" name="altUser">
    				<label>ID *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
   						<input  type="number" class="form-control" name="id" required>
  					</div><br>
					<label>Senha *:</label><br>
  					<div class="input-group">  									
    					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
   						<input  type="password" class="form-control" name="senha" required>
  					</div><br>
  					<center><input type="submit" class="btn btn-default" value="Alterar"></center>
    			</form>
           	</div>
        </div>
    	<table class="table table-striped table-bordered">
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Nome</th>
    				<th>Login</th>
    				<th>Senha</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php
    				$Usuarios = $conn->PegarUsuarios();
    				for($i = 0; $i < count($Usuarios);$i++){
    					$conta = $Usuarios[$i];
    					echo "<tr>\n";
    					echo "<td>" . $conta[0] . "</td>";
    					echo "<td>" . $conta[1] . "</td>";
    					echo "<td>" . $conta[2] . "</td>";
    					echo "<td>" . $conta[3] . "</td>";
    					echo "</tr>\n";
    				}

    			?>
    		</tbody>
    	</table>
    </div>
</div>