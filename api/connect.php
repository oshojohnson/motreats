<?php
		$db= new mysqli("localhost","root","","motreats");
		if($db->connect_error){
			die("Connection Failed: ".$db->connect_error);
		}
		session_start();
?>