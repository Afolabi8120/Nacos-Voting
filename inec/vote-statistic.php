<?php
    include('../core/validate/dashboard.php');

    $getAdmin = $stu->getStudentData($_SESSION['inec']);
    $getSession = $stu->getStudentData($_SESSION['inec']);

    if(isset($_SESSION['inec']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: '.BASE_URL.'login');
        }
    }else{
        header('location: '.BASE_URL.'login');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Election Summary</title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['./assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./css/css/fonts.min.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css/atlantis.css">
</head>
<body>
	<div class="wrapper">
		<?php require_once('./includes/header.php') ?>

		<?php require_once('./includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Election Summary</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="vote-statistic">Election Summary</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>
						<div class="row" id="candidate_stat">

                            


					    </div>
					</div>
				</div>
			</div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>

            <script type="text/javascript">
                function voteCounter(){
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function(){
                        document.getElementById("candidate_stat").innerHTML = this.responseText;
                    }

                    xhttp.open("POST", "fetchCounter.php");
                    xhttp.send();
                }

                setInterval(function(){
                   voteCounter();
                }, 1)
        
            </script>

		</div>
		
	</div>
  
</body>
</html>