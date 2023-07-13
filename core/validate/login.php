<?php
    include('./core/init.php');

    if(isset($_POST['login']) && !empty($_POST['login'])){
        // passing data received from user into variable
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Form Validation 
        if(empty($email) || empty($password)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $email = $stu->validateInput($email);
            $password = $stu->validateInput($password);

            if($stu->login($email)){
                $getStudentDetails = $stu->getPassword($email); // get student password
                $checkPay = $admin->isPaid($email); // return true if paid while false if not paid
                
                if(password_verify($password, $getStudentDetails->password)){
                    if($getStudentDetails->usertype == 'Student'){
                        if($getStudentDetails->status == 'Active'){
                            if($checkPay === true){
                                $_SESSION['session_id'] = session_id();
                                $_SESSION['matricno'] = $getStudentDetails->email;
                                $stu->updateSession($_SESSION['matricno'], $_SESSION['session_id']);
                                $_SESSION['SuccessMessage'] =  "Login Successful";
                                header('location:'.BASE_URL.'student/dashboard'); 
                            }
                            else{
                                $_SESSION['ErrorMessage'] = "You're Yet to Pay Your Nacos Due";
                            }
                        }else{
                            $_SESSION['ErrorMessage'] = "Your Account Has Been Deactivated";
                        }
                    }elseif($getStudentDetails->usertype == 'Super Admin' || $getStudentDetails->usertype == 'Admin'){
                        if($getStudentDetails->status == 'Active'){
                            $_SESSION['session_id'] = session_id();
                            $_SESSION['username'] = $getStudentDetails->email;
                            $stu->updateSession($_SESSION['username'], $_SESSION['session_id']);
                            header('location: '.BASE_URL.'admin/dashboard');
                        }
                    }
                }elseif(!password_verify($password, $getStudentDetails->password)){
                    $_SESSION['ErrorMessage'] = "Invalid Details Provided";
                }
            }else{
                $_SESSION['ErrorMessage'] = "Invalid Details Provided";
            }
        }
    }

    #if($getStudentDetails->payment_status == 'Active'){


    
?>