<?php 
	/**
	 * 
	 */
	class Contact extends Controllers
	{
		
		function load()
		{
			# code...

		}
		public function replyContact($id='')
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					if(isset($_POST["btn_sendAnswer"]))
					{
						$answer = $_POST["answer"];
						$edit_user = $_SESSION["username"];
						$edit_time = date("YmdHis");
						$Contact = $this->models("ContactModels","Admin");
						$Contact->updateContact($id,$answer,$edit_user,$edit_time);
						echo '<script type = "text/javascript">
					            alert("Đã trả lời");window.location ="../../"; 
					            </script>';
		            }
				}	
			}	
			
		}
		public function deleteContact($id='')
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Contact = $this->models("ContactModels","Admin");
					$Contact -> removeContact($id);
					echo '<script type = "text/javascript">
					            alert("Đã xóa");window.location ="../../"; 
					            </script>';	
				}
			}
			
		}
	}
?>