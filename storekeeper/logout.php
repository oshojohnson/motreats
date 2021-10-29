<?php
		include "dbconf.php";
		session_destroy();
		unset($_SESSION['email']);
		header("location:login.php");
?>