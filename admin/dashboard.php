<?php
    include('../core/init.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    
    if(isset($_SESSION['username'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: '.BASE_URL.'login');
        }else{

        }

    }else{
        header('location: '.BASE_URL.'login');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $getAdmin->fullname; ?>'s Dashboard </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
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
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="dashboard.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <h4><?php echo $getdate . ", ". $getAdmin->fullname; ?></h4>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                    
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>

                        <div class="row mt-5">
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-info card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-user-shield"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">No. of Candidates</p>
                                                    <h4 class="card-title">
                                                    <?php echo $admin->getTotalCandidate(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-danger card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Total Votes</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getTotalVote(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-warning card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-file"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Expected Vote</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getTotalCandidate() * $admin->getTotalVote(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    </div>
                </div>
            </div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>



        </div>
        
    </div>

</body>
</html>