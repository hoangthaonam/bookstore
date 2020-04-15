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

		public function getInfor($id)
		{
			# code...
			$sql = "Select * from account where id = '$id'";
			return $this->get_row($sql);
		}

		public function getRule($username)
		{
			# code...
			$sql = "Select * from account where username = '$username'";
			$result = $this->get_row($sql);
			return $result["rule"];
		}

		public function getAccount($id)
		{
			# code...
			$sql = "Select * from account where id = '$id'";
			return $this->get_row($sql);
		}

		public function getNumberAccount()
		{
			# code...
			$sql = "Select * From account";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function getVIP()
		{
			# code...
			$sql = "Select * from account order by amount desc limit 5";
			return $this->do_sql($sql);
		}	

		public function updateRule($id,$rule)
		{
			$sql = "Update account set rule='$rule' where id = '$id'";
			$this->do_sql($sql);
			return true;
		}	

		public function deleteAccount($username)
		{
			$sql = "Delete from account where username = '$username'";
			$this->do_sql($sql);
			return true;
		}	
	}
?>