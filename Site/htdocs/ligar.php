<?php
	require "tools.php";
	
	if(isset($_GET['porta']) && isset($_GET['onOff'])){
		$Porta = $_GET['porta'];
		$Status = $_GET['onOff'];
		$Arduino = new ArduinoApi(vPORTA);
		if($Status == "On"){
			$Arduino->LigarPorta($Porta);
		}else{
			$Arduino->DesligarPorta($Porta);
		}
	}
?>