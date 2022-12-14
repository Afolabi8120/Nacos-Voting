<?php
    include('../core/validate/all_user.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);

    if(isset($_SESSION['username']))
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
						<div class="row">

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">President</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('President') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Vice President</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Vice President') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">General Secretary</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('General Secretary') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Financial Secretary</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Financial Secretary') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Treasurer</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Treasurer') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Auditor</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Auditor') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Software Director 1</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Software Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Welfare Director 1</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Welfare Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Social Director 1</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Social Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Sport Director 1</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Sport Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">PRO 1</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('PRO 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Software Director 2</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Software Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Welfare Director 2</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Welfare Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Social Director 2</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Social Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">Sport Director 2</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('Sport Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">PRO 2</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('PRO 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h1 class="text-center fw-bold"><?php echo $getuser->vote_count; ?></h1>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <?php } ?>
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