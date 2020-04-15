<?php  
	/**
	 * 
	 */
	class Register extends Controllers
	{
		public function load()
		{
			$this->views("layout1",["page"=>"register"]);
		}

		public function verify()
		{
			if(isset($_POST["btnRegister"]))
			{
				$Account = $this->models("AccountModels");
				$flag = 0;
				$error = "";
				// get data
				$username = trim($_POST["username"]);
				$images = trim($_FILES['up_images']['name']);
				
				// Check username
				if($Account->checkUsername($username)==false)
				{
					$flag = 1;
					$error = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác";
				}

				// Check Pass
				$password = trim($_POST["password"]);
				$repassword = trim($_POST["repass"]);
				if($password!=$repassword)
				{
					$flag = 1;
					$error = "Mật khẩu không khớp. Vui lòng nhập lại";
				}

				// Images
				$images = $this->uploadImages($images);


				if($flag == 0)
				{
					$password = password_hash(trim($_POST["password"]),PASSWORD_DEFAULT);
					$name = trim($_POST["name"]);
					$age = trim($_POST["age"]);
					$address = trim($_POST["address"]);
					$phone = trim($_POST["phone"]);
					$email = trim($_POST["email"]);
					$amount = 0;
					$edit_user = "htnam";
					$edit_time = date("YmdHis");
					$rule = 0;
					// insert to DB
					
					$Account->createAccount($username,$password,$name,$age,$address,$phone,$email,$images,$amount,$rule,$edit_user,$edit_time);
					echo '<script type = "text/javascript">
		            alert("Tạo tài khoản Thành Công!!!");window.location ="/bookstore/Main/Login"; 
		            </script>';	
				}
				else
				{
					echo '<script type = "text/javascript">
		            alert("'.$error.'");window.location ="/bookstore/Main/Register"; 
		            </script>';	
				}
			}
		}
	}
?>