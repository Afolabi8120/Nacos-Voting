<?php
	require('../core/init.php');;
	unset($_SESSION['matricno']);

	header('location: '.BASE_URL.'login');

?>