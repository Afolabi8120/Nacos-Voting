<?php
    include('../core/validate/dashboard.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno'])){
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
    <title><?php echo $getStudent->fullname; ?>'s Dashboard </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="./assets/js/plugin/webfont/webfont.min.js"></script>
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
    <link rel="stylesheet" href="../assets/css/fonts.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link rel="stylesheet" href="../assets/css/atlong.css">
</head>
<body>
    <div class="wrapper">
        <?php include('../includes/header.php'); ?>

        <?php include('../includes/sidebar.php'); ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="dashboard">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <h4><?php echo $getdate . ", " . $getStudent->fullname; ?></h4>
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
                                            <?php foreach($admin->singleSelect('President') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','President') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Vice President') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Vice President') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('General Secretary') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','General Secretary') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Financial Secretary') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Financial Secretary') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Treasurer') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Treasurer') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Auditor') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Auditor') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Software Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Software Director 1') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Welfare Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Welfare Director 1') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Social Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Social Director 1') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Sport Director 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Sport Director 1') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('PRO 1') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','PRO 1') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Software Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Software Director 2') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Welfare Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Welfare Director 2') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Social Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Social Director 2') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('Sport Director 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','Sport Director 2') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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
                                            <?php foreach($admin->singleSelect('PRO 2') as $getuser){ ?>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <span class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if($admin->selectTwo('tblvote','student_id',$getStudent->email,'post','PRO 2') === true): ?>
                                                            <span class="badge text-center bg-success text-white fw-bold">You have casted your vote for this category</span>
                                                        <?php else: ?>
                                                            <form method="POST">
                                                                <input type="text" name="can_id" value="<?php echo $getuser->id; ?>" hidden>
                                                                <input type="text" name="can_post" value="<?php echo $getuser->post; ?>" hidden>
                                                                <input type="submit" onclick="return confirm('Submit this Vote?');" name="btnSubmitVote" class="btn-block btn btn-md btn-dark" value="Vote">
                                                            </form>
                                                        <?php endif; ?>
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

            <?php include_once('../includes/footer.php'); ?>
            <?php include_once('../includes/js.php'); ?>
        </div>
        
    </div>

</body>
</html>