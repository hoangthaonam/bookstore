<?php  
	/**
	 * 
	 */
	class AccountModels extends DB
	{
		public function createAccount($username,$password,$name,$age,$address,$phone,$email,$images,$amount,$rule,$edit_user,$edit_time)
		{
			$sql = "INSERT INTO account (username,password,name,age,address,phone,email,images,amount,rule,edit_user,edit_time) 
			VALUES ('$username','$password','$name','$age','$address','$phone','$email','$images','$amount','$rule','$edit_user','$edit_time')";
			$this->do_sql($sql);
			return true;
		}

		public function checkUsername($username)
		{
			$sql = "Select * from account where username = '$username'";
			$result = $this->do_sql($sql);
			if(mysqli_num_rows($result)<=0){
				return true;
			}else{
				return false;
			}
		}

		public function checkAccount($username,$password)
		{
			if(!$this->checkUsername($username))
			{
				$sql = "Select * from account where username = '$username'";
				$result = $this->get_row($sql);
				if(password_verify($password, $result["password"]))
				{
					return true;
				}
				else {
					return false;
				}
			}
			else return false;
		}

		public function checkPassword($id,$password)
		{
			$sql = "Select * from account where id = '$id'";
			$result = $this->get_row($sql);
			if(password_verify($password, $result["password"]))
			{
				return true;
			}
			else {
				return false;
			}
			
		}

		public function changePass($id,$password)
		{
			# code...
			$sql = "Update account set password = '$password' where id = '$id'";
			$this->do_sql($sql);
			return true;
		}

		public function getRule($username)
		{
			# code...
			$sql = "Select * from account where username = '$username'";
			$result = $this->get_row($sql);
			return $result["rule"];
		}

		public function getID($username)
		{
			# code...
			$sql = "Select * from account where username = '$username'";
			$result = $this->get_row($sql);
			return $result["id"];
		}

		public function getEmail($username)
		{
			# code...
			$sql = "Select * from account where username = '$username'";
			$result = $this->get_row($sql);
			return $result["email"];
		}

		public function getImages($username)
		{
			# code...
			$sql = "Select * from account where username = '$username'";
			$result = $this->get_row($sql);
			return $result["images"];
		}

		public function getAccount($id)
		{
			# code...
			$sql = "Select * from account where id = '$id'";
			return $this->get_row($sql);
		}


		public function updateInforAccount($id,$name,$age,$address,$phone,$email,$edit_user,$edit_time)
		{
			# code...
			$sql = "Update account set name = '$name', age = '$age', address = '$address', phone = '$phone', email = '$email', edit_user = '$edit_user', edit_time = '$edit_time' 
			where id = '$id'";
			$this->do_sql($sql);
			return true;
		}

		public function updateImagesAccount($id,$images,$edit_user,$edit_time)
		{
			# code...
			$sql = "Update account set images = '$images', edit_user = '$edit_user', edit_time = '$edit_time' 
			where id = '$id'";
			$this->do_sql($sql);
			return true;
		}
	}
?>