<?php

	$db=new mysqli("localhost","root","","auditoria");
	if (mysqli_connect_errno()) {
		echo "Existe un Problema en la Base de datos 🚫";
	}

	
 ?>