<?php  
	/**
	 * 
	 */
	class Account extends Controllers
	{
		public function load($id)
		{
			# code...
			// loading detail
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$account = $Account->getInfor($id);


			$this->views("layout2",
						["page" => "ad_profile", "admin"=>$account],
						"Admin");
				}
			}
			
			
		}
	}
?>