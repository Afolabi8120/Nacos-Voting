<?php
    include('../core/validate/add-candidate.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllCandidate = $admin->getAllCandidates();

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
	<title>Vote Data</title>
	
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
						<h4 class="page-title">Vote Data</h4>
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
								<a href="add-candidate">Vote Data</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-primary w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="" role="tab" aria-selected="true">List of Candidate(s)</a> </li>
                                            </ul>
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tab" aria-selected="true">
                                                <a href="export-list" onclick="return confirm('Download this data?');" class="mt-2 mb-2 btn btn-md btn-success">Download</a>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <!-- table striped -->
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-hover mb-0 data-table-export">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Candidate</th>
                                                        <th>Post</th>
                                                        <th>Percentage</th>
                                                        <th>Votes</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i = 1; foreach($admin->fetchAllVotes() as $getvote): 
                                                    ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++; ?></td>
                                                        <td class="text-bold-500"><?php echo $getvote->fullname; ?></td>
                                                        <td><?php echo $getvote->post; ?></td>
                                                        <td>
                                                            <span class="badge bg-dark text-white">
                                                            <?php
                                                                $totalVote = $admin->getTotalVoteWhere($getvote->post);
                                                                $candidateVote = $admin->getTotalCandidateVote($getvote->id);

                                                                $vote = ($candidateVote / $totalVote) * 100;

                                                                echo round($vote);
                                                                ?> %
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php echo $admin->getTotalCandidateVote($getvote->id); ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
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