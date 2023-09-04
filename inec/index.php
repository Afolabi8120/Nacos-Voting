<?php
    require('../core/init.php');
    
    $getAdmin = $stu->getStudentData($_SESSION['inec']);
    $getSession = $stu->getStudentData($_SESSION['inec']);

	if(isset($_SESSION['inec']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: '.BASE_URL.'login');
        }
        else {
            if($getAdmin->usertype == "User"){
                header('location: dashboard');
            }else{
                header('location: '.BASE_URL.'login');
            }
        }
    }else{
        header('location: '.BASE_URL.'login');
    }
?>