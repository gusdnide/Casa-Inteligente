<?php
define("vPORTA", "COM3");
define("vPORTA2", "COM4");
/*
2 Quarto 
3 Garagem
4 Cozinha
5 Sala
6 Piscina
*/


define("pQuarto", "2");
define("pCozinha", "4");
define("pSala", "5");
define("pGaragem", "3");
define("pPiscina", "6");

class ArduinoApi
{
    public $pvPorta;
    public $pvStatus;
    public function __construct($porta)
    {
        $this->pvPorta = $porta;
    }
    
    public function EnviarDado($cmd)
    {
        $porta = $this->pvPorta;
        return shell_exec("Arduino.exe $porta $cmd");
    }
    
    public function LigarPorta($porta)
    {
        if ($this->EnviarDado("$porta;1") == "Funcionou.")
            return true;
        else
            return false;
    }
    public function AbrirPortao(){
        $this->EnviarDado("0");
    }
    public function FecharPortao(){
        $this->EnviarDado("1");
    }
   
    public function Status()
    {
        $this->pvStatus = $this->EnviarDado("status");
    }
    public function DesligarPorta($porta)
    {
        if ($this->EnviarDado("$porta;0") == "Funcionou.")
            return true;
        else
            return false;
    }
    public function InfoPorta($porta)
    {
        if (substr($this->pvStatus, $porta - 2, 1) == "1")
            return true;
        else
            return false;
    }
}
class Conexao
{
    public $pdo;
    public function __construct()
    {
         $this->pdo = new PDO("mysql:host=localhost;dbname=dbbanco", "root", "");
    }
    public function Login($user, $senha)
    {
        try {
            $stmte = $this->pdo->prepare("SELECT * FROM tbllogin WHERE login = ? AND senha = ?");
            $stmte->bindParam(1, $user, PDO::PARAM_STR);
            $stmte->bindParam(2, $senha, PDO::PARAM_STR);
            $executa = $stmte->execute();
            
            if ($executa) {
                $dados = $stmte->fetchAll();
                if (count($dados) <= 0) {

                    return false;
                } else {
                	setcookie("nome", $dados[0][1]);
                	setcookie("isadmin", $dados[0][4]);
                    return true;
                }
            } else {
                return false;
            }
        }
        catch (PDOException $e) {
            return false;
        }
    }
    public function Inserir($nome, $login, $senha){
    	try{
    		$stmte = $this->pdo->prepare("INSERT INTO tbllogin (nome, login, senha, isadmin) VALUES(?, ?, ?, false)");
        	$stmte->bindParam(1, $nome, PDO::PARAM_STR);
        	$stmte->bindParam(2, $login, PDO::PARAM_STR);
        	$stmte->bindParam(3, $senha, PDO::PARAM_STR);
        	$executa = $stmte->execute();
        	if($executa){
        		return true;
      		}else{
     		 	return false;
        	}
    	}catch(PDOException $e){
    		return false;
    	}
    }
    public function Deletar($id){
    	try{
    		$stmte = $this->pdo->prepare("DELETE FROM tbllogin WHERE id=?");
    		$stmte->bindParam(1, $id, PDO::PARAM_STR);
    		if($stmte->execute())
    			return true;
    		else
    			return false;
    	}catch(PDOException $e){
    		return false;
    	}
    }
    public function AlterarSenha($id, $senha){
    	try{
    		$stmte = $this->pdo->prepare("UPDATE tbllogin SET senha=? WHERE id=?");
    		$stmte->bindParam(1, $senha, PDO::PARAM_STR);
    		$stmte->bindParam(2, $id, PDO::PARAM_STR);
    		if($stmte->execute())
    			return true;
    		else
    			return false;
    	}catch(PDOException $e){
    		return false;
    	}
    }
    public function PegarUsuarios(){
    	try{
    		$stmte = $this->pdo->prepare("SELECT * FROM tbllogin");
    		$stmte->bindParam(1, $id, PDO::PARAM_STR);
    		if($stmte->execute())
    		{
    			$dados = $stmte->fetchAll();
                if (count($dados) <= 0) {
                    return false;
                } else {
                	return $dados;
                }
    		}
    		else
    			return false;
    	}catch(PDOException $e){
    		return false;
    	}
    }
}

function Alerta($tipo, $titulo, $texto)
{
    switch ($tipo) {
        case 1:
            echo '<div class="alert alert-success">' . PHP_EOL;
            break;
        case 2:
            echo '<div class="alert alert-info">' . PHP_EOL;
            break;
        case 3:
            echo '<div class="alert alert-warning">' . PHP_EOL;
            break;
        case 4:
            echo '<div class="alert alert-danger">' . PHP_EOL;
            break;
        default:
            echo '<div class="alert alert-success">\n';
            break;
    }
    echo "<strong>$titulo</strong> $texto\n";
    echo "</div>";
}

?>