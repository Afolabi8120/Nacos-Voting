<?php
	require('../core/init.php');;
	session_destroy();

	header('location: '.BASE_URL.'login');

?>