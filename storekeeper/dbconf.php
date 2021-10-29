<?php 
		//$db= mysqli_connect("localhost","eaglepo1_samuel","#Samuel11","eaglepo1_motreats");
		$db= new mysqli("localhost","root","","motreats");
		if($db->connect_error){
			die("Connection Failed: ".$db->connect_error);
		}
		session_start();
?>