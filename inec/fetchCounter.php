<?php

	include('../core/validate/dashboard.php');

    $getAdmin = $stu->getStudentData($_SESSION['inec']);
    $getSession = $stu->getStudentData($_SESSION['inec']);


?>
    <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title fw-bold h4 text-dark">President</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach($admin->getCandidateVoteCount('President') as $getuser){ ?>
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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
                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <div class="card-body text-center mb-0">
                                                        <img src="../candidate_image/<?php echo $getuser->picture; ?>" alt="candidate image" height="150px" width="150px">
                                                        <p class="text-center small fw-bold mt-2"><?php echo $getuser->fullname; ?></p>
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

