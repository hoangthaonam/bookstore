<?php  
	/**
	 * 
	 */
	class Contact extends Controllers
	{
		public function load()
		{
			// loading Contact
			$Contact = $this->models("ContactModels");
			$contact = $Contact->getContact();

			// call & send data to Views
			$this->views("layout1",["page"=>"contact","contact"=>$contact]);
		}

		public function Create()
		{
			if(isset($_POST["btn_Send"]))
			{
				
				$question = trim($_POST["content"]);
				$name = trim($_POST["name"]);
				$email = trim($_POST["email"]);
				$edit_user = "";
				$customer = null;
				if(isset($_SESSION["username"]))
				{
					$edit_user = $_SESSION["username"];
					$customer = $_SESSION["id"];
				}
				$edit_time = date("YmdHis");
				$Contact = $this->models("ContactModels");
				$contact = $Contact->createContact($question, $customer, $name, $email, $edit_user, $edit_time);
				echo '<script type = "text/javascript">
			            alert("Tạo Thành Công!");window.location ="/bookstore/Main"; 
			            </script>';
			}
		}
	}
?>