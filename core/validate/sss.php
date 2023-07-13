<?php
    include('../core/init.php');

    if(isset($_POST['btnSubmitVote']) && !empty($_POST['btnSubmitVote'])){
        // passing data received from user into variable
        $candidate_id = $_POST['can_id'];
        $post = $_POST['can_post'];

        $getStudent = $stu->getStudentData($_SESSION['matricno']);
        $student_id = $getStudent->email;
        $student_level = $getStudent->level;

        // Form Validation 
        if(empty($candidate_id) || empty($post) || empty($student_id)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{

            $candidate_id = $stu->validateInput($candidate_id);
            $student_id = $stu->validateInput($student_id);
            $post = $stu->validateInput($post);
            $student_level = $stu->validateInput($student_level);

            if($admin->submitVote($student_id,$candidate_id,$post,$student_level) === true){
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

    }


?>