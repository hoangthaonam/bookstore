<?php 
	/**
	 * 
	 */
	class Customer extends Controllers
	{
		public function load()
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Customer = $this->models("CustomerModels","Admin");
					$numberAccount = $Customer->getNumberAccount();
					$numberMember = $Customer->getNumberMember();
					$numberAdmin = $Customer->getNumberAdmin();
					$VIP = $Customer->getVIP();
					$customer = $Customer->getAllCustomer();
					$admin = $Customer->getAllAdmin();
					$this->views("layout2",["page"=>"ad_customer",
											"numaccount"=>$numberAccount,
											"nummember"=>$numberMember,
											"numadmin"=>$numberAdmin,
											"VIP"=>$VIP,
											"customer"=>$customer,
											"admin"=>$admin
										],"Admin");
				}
			}
			
		}
		public function removeCustomer($username)
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					
					if($username!=$_SESSION["username"])
					{
						$Account->deleteAccount($username);
						echo '<script type = "text/javascript">window.location ="../"; 
				            </script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Không thể xóa");window.location ="../"; 
				            </script>';	
					}
				}
			}
			
		}
		public function updateAccountRule($id)
		{
			# code...
			if($this->checkSession())
			{
				if($id == $_SESSION["id"])
				echo '<script type = "text/javascript">alert("Không thể thao tác");window.location ="../"; 
				            </script>';	 
				else
				{
					$rule = $_POST["rule"];
					echo $rule;
					echo $id;
					$Account = $this->models("AccountModels","Admin");
					if($this->checkRule($Account))
					{
						
						$Account->updateRule($id,$rule);

						header("Location: http://localhost/bookstore/Admin/Customer");
					}
				}
			}
		}
		
	}
?>