<?php
	require "tools.php";
	$Arduino = new ArduinoApi(vPORTA);
	
	if(isset($_POST['porta']) && isset($_POST['onOff'])){
		$led = $_POST['porta'];
		$on = $_POST['onOff'];
		if($on == 1){
			$Arduino->LigarPorta($led);
		}else{
			$Arduino->DesligarPorta($led);
		}
	}

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Teste</title>
		</head>
		<body>
			<form action="#" method="post">
				<p>Porta: </p>
				<input type="number" value="2" min="2" max="12" name="porta">
				<p> Status </p>
				<input type="radio"  value="1" name="onOff" checked>Ligado<br>
				<input type="radio"  value="0" name="onOff">Desligado<br>
				<input type="submit" name="">
			</form>
			<table border="1">
				<tr >
					<th>Porta</th>
					<th>Status</th>
				</tr>
				<?php
					$Arduino->Status();
					for($i = 2; $i <= 12; $i++){
						echo "<tr>\n";
						echo "<td>$i</td>";
						if($Arduino->InfoPorta($i) == 1)
							echo "<td><font color=\"green\">Ligado</font></td>";
						else
							echo "<td><font color=\"red\">Desligado</font></td>";
						echo "</tr>\n";
					}
				?>
			</table>
		</body>
	</html>