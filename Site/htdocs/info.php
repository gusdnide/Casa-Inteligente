<?php
	require "tools.php";
	$Arduino = new ArduinoApi(vPORTA);
	$Arduino->Status();
	echo $Arduino->pvStatus;
?>