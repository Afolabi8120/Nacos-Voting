<?php

	class Admin {

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

		public function checkEmail($email){
        	$stmt = $this->pdo->prepare("SELECT email FROM tblstudent WHERE email = :email");
        	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkUsername($username){
        	$stmt = $this->pdo->prepare("SELECT username FROM tblstudent WHERE username = :username");
        	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

		// this will generate the image name for the student based on its gender
		public function setImageName($name){
            if($name == "Male"){
                $stu_img = "male.jpg";
            }elseif($name == "Female"){
                $stu_img = "female.jpg";
            }

            return $stu_img;
        }

		public function registerAdmin($username,$fullname,$email,$gender,$password,$usertype,$picture){
			$stmt = $this->pdo->prepare("INSERT INTO tblstudent (matricno,fullname,email,gender,password,usertype,status,picture) VALUES(:username,:fullname,:email,:gender,:password,:usertype,'Active',:picture)");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
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
					$fileRoot = '../admin/admin_img/' . $filename;
					move_uploaded_file($fileTmp, $fileRoot);
					return $filename;
				}
			}else{
				return false;
			}
		}

		public function updateImage($user_id,$picture){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET picture=:picture WHERE id=:id");
			$stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updatePassword($user_id,$password){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET password=:password WHERE id=:id");
			$stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function submitVote($student_id,$candidate_id,$post,$student_level){

			$stmt = $this->pdo->prepare("SELECT student_id, post FROM tblvote WHERE student_id='$student_id' AND post='$post' ");
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return false;
			}else{
				$stmt = $this->pdo->prepare("INSERT INTO tblvote (student_id,candidate_id,post,student_level) VALUES(:student_id,:candidate_id,:post,:student_level)");
				$stmt->bindParam(":student_id", $student_id, PDO::PARAM_STR);
				$stmt->bindParam(":candidate_id", $candidate_id, PDO::PARAM_STR);
				$stmt->bindParam(":post", $post, PDO::PARAM_STR);
				$stmt->bindParam(":student_level", $student_level, PDO::PARAM_STR);
				$stmt->execute();

				return true;
			}
			
		}

		public function addUserVoteStatus($student_id,$status){
			$stmt = $this->pdo->prepare("SELECT * FROM tblcount WHERE student_id='$student_id' AND status = 1 ");
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return false;
			}else{
				$stmt = $this->pdo->prepare("INSERT INTO tblcount (student_id,status) VALUES(:student_id,:status)");
				$stmt->bindParam(":student_id", $student_id, PDO::PARAM_STR);
				$stmt->bindParam(":status", $status, PDO::PARAM_STR);
				$stmt->execute();

				return true;
			}
		}

		// Add candidate
		public function registerCandidate($fullname,$post,$picture){
			$stmt = $this->pdo->prepare("INSERT INTO tblcandidate (fullname,post,picture) VALUES(:fullname,:post,:picture)");
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":post", $post, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function singleSelect($post){
			$stmt = $this->pdo->prepare("SELECT * FROM tblcandidate WHERE post=:post ORDER BY id ASC");
			$stmt->bindParam(":post", $post, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// get all candidate
		public function getAllCandidates(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblcandidate ORDER BY id ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getMyVotes($email){
			$stmt = $this->pdo->prepare("SELECT c.id, c.fullname, c.post FROM tblvote AS v INNER JOIN tblcandidate AS c ON v.candidate_id = c.id WHERE v.student_id = '$email' ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function forProgressBar($email){
			$stmt = $this->pdo->prepare("SELECT c.fullname, c.post FROM tblvote AS v INNER JOIN tblcandidate AS c ON v.candidate_id = c.id WHERE v.student_id = '$email' ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getTotalCandidateVote($can_id){
			$stmt = $this->pdo->prepare("SELECT candidate_id FROM tblvote WHERE candidate_id = '$can_id' ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getTotalVoteWhere($post){
			$stmt = $this->pdo->prepare("SELECT * FROM tblvote WHERE post = '$post' ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getCandidateVoteCount($post){
			$stmt = $this->pdo->prepare("SELECT c.picture, v.candidate_id, c.fullname, COUNT(v.candidate_id) AS vote_count FROM tblvote AS v INNER JOIN tblcandidate AS c ON c.id = v.candidate_id WHERE c.post = '$post' GROUP BY c.id ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getAdminData($username){
			$stmt = $this->pdo->prepare("SELECT * FROM tbluser WHERE username = :username");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getTotalVote(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblvote ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getStudentCount($table,$column,$value,$column2,$value2){
			$stmt = $this->pdo->prepare("SELECT COUNT(`$column`) FROM `$table` WHERE `$column` = '$value' AND `$column2` = '$value2'");
			$stmt->execute();

			$count = $stmt->fetchColumn();

			return $count;
		}

		public function getTotalAdmin(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		// counts the number of student that has paid
		public function getTotalCandidate(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblcandidate ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getTotalMaterial(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpastquestion");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function check($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value'");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function selectTwo($table,$column,$value,$column1,$value1){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value' AND `$column1` = '$value1'");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function get($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value'");
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function select($table,$column,$value,$email){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value' AND payment_status = '1' AND email = :email ");
			$stmt->bindParam(":email",$email, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function checkUserVoteStatus($email){
			$stmt = $this->pdo->prepare("SELECT * FROM `tblcount` WHERE `student_id` = :email AND status = '1' ");
			$stmt->bindParam(":email",$email, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function getAllAdmin($username){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE matricno !=:matricno AND usertype = 'Admin' OR usertype = 'User' ORDER BY id ASC");
			$stmt->bindParam(":matricno", $username, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function deleteAdmin($user_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblstudent WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// delete exco details
		public function deleteCandidate($candidate_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblcandidate WHERE id = :candidate_id ");
			$stmt->bindParam(":candidate_id", $candidate_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function enableAdmin($user_id){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='Active' WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableAdmin($user_id){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='In-Active' WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateSession($username,$session){
			$stmt = $this->pdo->prepare("UPDATE tbluser SET session=:session WHERE username = :username ");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":session", $session, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getSession($username){
			$stmt = $this->pdo->prepare("SELECT session FROM tbluser WHERE username = :username");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function isPaid($email){
			$stmt = $this->pdo->prepare("SELECT email,payment_status,receipt_no FROM tblpayment WHERE payment_status = '1' AND email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0)
				return true;
			else{
				return false;
			}
		}

	}

?>