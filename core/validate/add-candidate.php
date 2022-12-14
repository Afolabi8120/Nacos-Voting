<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_candidate']) && !empty($_POST['btn_save_candidate'])){
        // passing data received from user into variable
        $fullname = $_POST['fullname'];
        $post = $_POST['post'];

        // Form Validation 
        if(empty($fullname) || empty($post)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $fullname = $stu->validateInput($fullname);
            $post = $stu->validateInput($post);

            $image_name = $_FILES['candidate_image']['name'];
            $target = '../candidate_image/' . $_FILES['candidate_image']['name'];

            //specifying the supported file extension
            $validextensions = ['jpg', 'png', 'jpeg'];
            $ext = explode('.', basename($_FILES['candidate_image']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);

            if(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                return;
            }else{
                if($admin->registerCandidate($fullname,$post,$image_name) === true){
                    move_uploaded_file($_FILES['candidate_image']['tmp_name'], $target); // move image to student_img
                    $_SESSION['SuccessMessage'] = "Candidate Added Successfully";
                }else{
                    $_SESSION['SuccessMessage'] = "Failed To Add";
                }
            }
        }

    }elseif(isset($_POST['btn_delete_candidate']) && !empty($_POST['btn_delete_candidate'])){ // to delete account
        $candidate_id = $_POST['candidate_id'];

        if($admin->deleteCandidate($candidate_id)){
            $_SESSION['SuccessMessage'] = "Account has been deleted successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to delete account";
        }
    }


?>