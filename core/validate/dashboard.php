<?php
    include('../core/init.php');

    if(isset($_POST['btnSubmitVote']) && !empty($_POST['btnSubmitVote'])){
        #var_dump($_POST);exit();

        $president = $stu->validateInput($_POST['president']);
        $president_post = $stu->validateInput($_POST['president_post']);
        $vp = $stu->validateInput($_POST['vp']);
        $vp_post = $stu->validateInput($_POST['vp_post']);
        $gen_sec = $stu->validateInput($_POST['gen_sec']);
        $gs_post = $stu->validateInput($_POST['gs_post']);
        $fin_sec = $stu->validateInput($_POST['fin_sec']);
        $fs_post = $stu->validateInput($_POST['fs_post']);
        $treasurer = $stu->validateInput($_POST['treasurer']);
        $treasurer_post = $stu->validateInput($_POST['treasurer_post']);
        $auditor = $stu->validateInput($_POST['auditor']);
        $auditor_post = $stu->validateInput($_POST['auditor_post']);
        $software1 = $stu->validateInput($_POST['software1']);
        $software1_post = $stu->validateInput($_POST['software1_post']);
        $welfare1 = $stu->validateInput($_POST['welfare1']);
        $welfare1_post = $stu->validateInput($_POST['welfare1_post']);
        $social1 = $stu->validateInput($_POST['social1']);
        $social1_post = $stu->validateInput($_POST['social1_post']);
        $sport1 = $stu->validateInput($_POST['sport1']);
        $sport1_post = $stu->validateInput($_POST['sport1_post']);
        $pro1 = $stu->validateInput($_POST['pro1']);
        $pro1_post = $stu->validateInput($_POST['pro1_post']);
        $software2 = $stu->validateInput($_POST['software2']);
        $software2_post = $stu->validateInput($_POST['software2_post']);
        $welfare2 = $stu->validateInput($_POST['welfare2']);
        $welfare2_post = $stu->validateInput($_POST['welfare2_post']);
        $social2 = $stu->validateInput($_POST['social2']);
        $social2_post = $stu->validateInput($_POST['social2_post']);
        $sport2 = $stu->validateInput($_POST['sport2']);
        $sport2_post = $stu->validateInput($_POST['sport2_post']);
        $pro2 = $stu->validateInput($_POST['pro2']);
        $pro2_post = $stu->validateInput($_POST['pro2_post']);

        $getStudent = $stu->getStudentData($_SESSION['matricno']);
        $student_id = $getStudent->email;
        $student_level = $getStudent->level;

        $admin->submitVote($student_id,$president,$president_post,$student_level);
        $admin->submitVote($student_id,$vp,$vp_post,$student_level);
        $admin->submitVote($student_id,$gen_sec,$gs_post,$student_level);
        $admin->submitVote($student_id,$fin_sec,$fs_post,$student_level);
        $admin->submitVote($student_id,$treasurer,$treasurer_post,$student_level);
        $admin->submitVote($student_id,$auditor,$auditor_post,$student_level);
        $admin->submitVote($student_id,$software1,$software1_post,$student_level);
        $admin->submitVote($student_id,$welfare1,$welfare1_post,$student_level);
        $admin->submitVote($student_id,$social1,$social1_post,$student_level);
        $admin->submitVote($student_id,$sport1,$sport1_post,$student_level);
        $admin->submitVote($student_id,$pro1,$pro1_post,$student_level);
        $admin->submitVote($student_id,$software2,$software2_post,$student_level);
        $admin->submitVote($student_id,$welfare2,$welfare2_post,$student_level);
        $admin->submitVote($student_id,$social2,$social2_post,$student_level);
        $admin->submitVote($student_id,$sport2,$sport2_post,$student_level);
        $admin->submitVote($student_id,$pro2,$pro2_post,$student_level);      
        if($admin->addUserVoteStatus($student_id,'1') === true){
        ?>
                    <script>
                        Swal.fire({
                        title: 'VOTE SUCCESSFUL',
                        text: 'You have just cast your vote, Please wait for Election Result',
                        icon: 'success',
                        button: 'primary',
                        })
                    </script>
                <?php
            }else{
            ?>
                    <script>
                        Swal.fire({
                        text: 'You have casted your vote already',
                        icon: 'warning',
                        button: 'warning',
                        })
                    </script>
                <?php
                //echo "<script>alert('You have casted your vote already'); </script>";
            }
        }
       ?>