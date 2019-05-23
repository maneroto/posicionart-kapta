<?php
	//error_reporting(E_ALL ^ E_DEPRECATED);
	$dbh=mysql_connect("188.121.44.188", "kaptauser2", "K@pt@db2017") or die ('No se puede Conectar a la base de datos error: ' . mysql_error());
	mysql_select_db("dbs_crm_kaptadb");
?>