<?php
    include('core/validate/login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nacos TPI - Login</title>
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Files -->
    <?php require_once('includes/css.php') ?>
</head>
<body class="login">
	<div class="wrapper wrapper-login">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center><a href="index"><img src="./assets/img/icon.png" height="60px" width="60px" class="mb-3"></a></center>
                            <h3 class="text-center text-dark fw-bold">NACOS Decide 2023</h3>
                            <h6 class="text-center">Log in with the details you provided on the <strong>NACOS Portal</strong> during registration</h6>
                            <?php
                                echo ErrorMessage();
                                echo SuccessMessage();
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input name="email" type="email" class="form-control" placeholder="Enter your Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Enter your Password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" name="login" class="btn-block btn btn-lg btn-success" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>

    <?php include_once('includes/js.php'); ?>

</body>
</html>