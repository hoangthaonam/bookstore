<?php  
	/**
	 * 
	 */
	class MyAccount extends Controllers
	{
		function load($id)
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels");
				$myaccount = $Account->getAccount($id);
				$Bill = $this->models("BillModels");
				$mybill = $Bill->getMyBill($id);
				$this->views("layout1",["page"=>"account","infor"=>$myaccount,"bill"=>$mybill]);
			}
		}
		public function updateAccount($id)
		{
			# code...
			$Account = $this->models("AccountModels");
			if(isset($_POST["btnUpdate"]))
			{
				$name = trim($_POST["name"]);
				$age = (int)(trim($_POST["age"]));
				$address = trim($_POST["address"]);
				$phone = trim($_POST["phone"]);
				$email = trim($_POST["email"]);
				

				
				$edit_user = $_SESSION["username"];
				$edit_time = date("YmdHis");
				$Account->updateInforAccount($id,$name,$age,$address,$phone,$email,$edit_user,$edit_time);

				echo '<script type = "text/javascript">
		            alert("Cập Nhật Thành Công!!!");window.location ="/bookstore/Main/MyAccount/load/'.$id.'"; 
		            </script>';				
			}

		}

		public function updateImages($id)
		{	
			$Account = $this->models("AccountModels");
			if(isset($_POST["btnUpdateImages"]))
			{
				
				$images = trim($_FILES['up_images']['name']);
				

				$images = $this->uploadImages($images);
				$edit_user = $_SESSION["username"];
				$edit_time = date("YmdHis");
				$Account->updateImagesAccount($id,$images,$edit_user,$edit_time);

				echo '<script type = "text/javascript">
		            alert("Cập Nhật Thành Công!!!");window.location ="/bookstore/Main/MyAccount/load/'.$id.'"; 
		            </script>';				
			}
			else 
			{
				echo '<script type = "text/javascript">
		            alert("Cập Nhật Không Thành Công!!!");window.location ="/bookstore/Main/MyAccount/load/'.$id.'"; 
		            </script>';
			}
		}

		public function changePassword($id)
		{	
			$Account = $this->models("AccountModels");
			if(isset($_POST["btnChangePass"]))
			{
				
				$old_pwd = trim($_POST['old_pwd']);
				$new_pwd = trim($_POST['new_pwd']);
				$re_pwd = trim($_POST['re_pwd']);
				$edit_user = $_SESSION["username"];
				$edit_time = date("YmdHis");
				$flag = 0;
				$error = "";

				if($Account->checkPassword($id,$old_pwd))
				{
					if($new_pwd == $re_pwd)
					{
						$flag = 1;
						$password = password_hash($new_pwd,PASSWORD_DEFAULT);
					}
					else
					{
						$flag = 0;
						$error = "Mật khẩu không khớp!";
					}
				}
				else
				{
					$flag = 0;
					$error = "Mật khẩu cũ không chính xác!";
				}
				if($flag == 1)
				{
					$Account->changePass($id,$password);

					echo '<script type = "text/javascript">
			            alert("Đổi Mật Khẩu Thành Công!!!");window.location ="/bookstore/Main/MyAccount/load/'.$id.'"; 
			            </script>';	
				}
						
				else 
				{
					echo '<script type = "text/javascript">
			            alert("Lỗi: '.$error.'");window.location ="/bookstore/Main/MyAccount/load/'.$id.'"; 
			            </script>';
				}
			}
		}
	}
?>