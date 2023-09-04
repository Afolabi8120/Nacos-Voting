<?php
	require('../core/init.php');;
	unset($_SESSION['inec']);

	header('location: '.BASE_URL.'login');

?>