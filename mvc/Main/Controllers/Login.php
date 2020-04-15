<?php  
	/**
	 * 
	 */
	class Login extends Controllers
	{
		function load()
		{

			// call & send data Views
			$this->views('layout1',["page"=>"login"]);

		}

		public function verify()
		{
			if(isset($_POST["btnLogin"]))
			{
				// Check login
				$Account = $this->models("AccountModels");
				$username = trim($_POST["username"]);
				$password = trim($_POST["password"]);

				if($Account->checkAccount($username,$password))
				{
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					$_SESSION["id"] = $Account->getID($username);
					$_SESSION["email"] = $Account->getEmail($username);
					$_SESSION["images"] = $Account->getImages($username);
					$Cart = $this->models("CartModels");
					$_SESSION["quantity"] = $Cart->getQuantity($_SESSION["id"]);
					if(isset($_POST["check"]))
					{
						setcookie("username", $username, time()+1800, "/",'', 0, 0);
						setcookie("password", $password, time()+1800, "/",'', 0, 0);
					}
					if($Account->getRule($username) == 1)
						echo '<script type = "text/javascript">
			            alert("Đăng nhập thành công vào Admin!!!");window.location ="/bookstore/Admin"; 
			            </script>';
			        else
			        {
			        	echo '<script type = "text/javascript">
			            alert("Đăng nhập thành công!!!");window.location ="/bookstore/Main"; 
			            </script>';
			        }
				}
				else 
				{
					echo '<script type = "text/javascript">
		            alert("Tài khoản hoặc mật khẩu không chính xác!!!");window.location ="./"; 
		            </script>';
				}
			}
		}
	}
?>