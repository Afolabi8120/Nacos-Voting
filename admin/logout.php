<?php
	require('../core/init.php');;
	unset($_SESSION['username']);

	header('location: '.BASE_URL.'login');

?>