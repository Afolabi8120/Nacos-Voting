<?php

	class Student {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function validateInput($var){
			$var = htmlspecialchars($var);
			$var = trim($var);
			$var = stripcslashes($var);
			return $var;
		}

		public function register($matricno,$fullname,$email,$phone,$gender,$program,$level,$password,$picture,$nacos_id,$usertype){
			$stmt = $this->pdo->prepare("INSERT INTO tblstudent (matricno,fullname,email,phone,gender,program,level,password,status,picture,nacos_id,usertype) VALUES(:matricno,:fullname,:email,:phone,:gender,:program,:level,:password,'Active',:picture,:nacos_id,:usertype)");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->bindParam(":nacos_id", $nacos_id, PDO::PARAM_STR);
			$stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function login($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
		}

		public function getPassword($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function updateProfile($matricno,$fullname,$email,$phone,$gender,$program,$level){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET fullname=:fullname,email=:email,phone=:phone,gender=:gender,program=:program,level=:level WHERE matricno=:matricno");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateStudentEditProfile($id,$matricno,$fullname,$email,$phone,$gender,$program,$level){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET matricno=:matricno,fullname=:fullname,email=:email,phone=:phone,gender=:gender,program=:program,level=:level WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function uploadImage($file){
			$filename = basename($file['name']);
			$fileTmp = $file['tmp_name'];
			$fileSize = $file['size'];

			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
			$allowed_ext = array('jpg', 'png', 'jpeg');

			if(in_array($ext, $allowed_ext) === true){
				if($fileSize <= 209272152){
					$fileRoot = '../student_img/' . $filename;
					move_uploaded_file($fileTmp, $fileRoot);
					return $filename;
				}
			}else{
				return false;
			}
		}

		public function getStudentData($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		// to check and fetch the student if the student has paid
		public function fetchStudentDataAndPaymentStatus($email){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.password, s.nacos_id, s.status, s.usertype, p.email, p.receipt_no, p.date_paid, p.payment_status FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '1' AND p.email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);;
		}

		public function getStudentPasswordByEmail($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getResetEmail($token){
			$stmt = $this->pdo->prepare("SELECT * FROM tblreset WHERE token = :token");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function isFound($id){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE id = :id AND usertype='Student' ");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

			if($count > 0){
				return true;
			}else{
				return false;
			}
		}

		// edit student details
		public function editStudentInfo($sid){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE id = :sid AND usertype='Student' ");
			$stmt->bindParam(":sid", $sid, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function updateSession($email,$session){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET session=:session WHERE email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":session", $session, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getSession($email){
			$stmt = $this->pdo->prepare("SELECT session FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}


	}

?>