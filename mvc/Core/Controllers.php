<?php  
	/**
	 * 
	 */
	class Controllers
	{
		function __construct()
		{
			date_default_timezone_set("Asia/Ho_Chi_Minh");
		}
		public function models($models,$folder = "Main")
		{
			# code...
			require_once './mvc/'.$folder.'/Models/'.$models.'.php';
			return new $models;
		}

		public function views($views='',$data=[],$folder = "Main")
		{
			# code...
			require_once './mvc/'.$folder.'/Views/'.$views.'.php';
		}

		public function checkSession()
		{
			if(isset($_SESSION["username"]))
			{
				return true;
			}
			else
			{
				echo '<script type = "text/javascript">
		            alert("Bạn phải đăng nhập trước");window.location ="/bookstore/Main/Login"; 
		            </script>';
		            exit;
			}
		}

		public function checkRule($Account = null)
		{	
			$username = $_SESSION["username"];
			if($Account == null)
				$Account = $this->models("AccountModels");
			$result = $Account->getRule($_SESSION["username"]);
			if($result==1)
			{
				return true;
			}
			else
			{
				echo '<script type = "text/javascript">
		            alert("Bạn không thể thực hiện thao tác này");window.location ="/bookstore/Main"; 
		            </script>';
		            exit;
			}
		}

		public function uploadImages($images,$folder="account")
		{
			$flag = 0;
			if ($images != NULL)
			{
				$upload = $this->models("UploadModels");
				$upload->setFileExtension('gif|jpg|png');
				$upload->setFileSize(1000);
				$dir = 'images/'.$folder.'/';
				$upload->setUploadDir($dir);
				if($upload->isVail()==true){ 
					$flag = 1;
					$error = $upload->error;
					$images = "";
				}
				if($flag==0){
					$images = $upload->upload(false,'avt');
				}
			}
			return $images;
		}
	}
?>