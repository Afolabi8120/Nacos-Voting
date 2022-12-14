<?php
    require('../core/init.php');
    
    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);

	if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: '.BASE_URL.'login');
        }
        else {
            if($getStudent->usertype == "Student"){
                $_SESSION['matricno'] = $getStudent->matricno;
                header('location: dashboard');
            }else{
                header('location:'.BASE_URL.'login');
            }
        }
    }else{
        header('location:'.BASE_URL.'login');
    }
?>