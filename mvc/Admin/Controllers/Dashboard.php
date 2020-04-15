<?php  
	/**
	 * 
	 */
	class Dashboard extends Controllers
	{
		function load()
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					// load number book
					$Book = $this->models("BookModels","Admin");
					$book = $Book->getNumberBook();

					// load number account
					
					$account = $Account->getNumberAccount();

					// load number bill
					$Bill = $this->models("BillModels","Admin");
					$bill = $Bill->getNumberBill();

					// load new bill
					$newbill = $Bill->getNewBill();

					// load contact
					$Contact = $this->models("ContactModels","Admin");
					$contact = $Contact->getTopContact();

					// load VIP member
					$vip = $Account->getVIP();

					// call & send data to Views
					$this->views("layout2",
						["page" => "dashboard", "numbook" => $book,
						"numaccount" => $account, "numbill" => $bill,
						"newbill" => $newbill,"contact" => $contact,"vip"=>$vip],
						"Admin");
				}

				
				
			}
		}

		public function deleteBill($id)
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Bill = $this->models("BillModels","Admin");
					$bill = $Bill->removeBill($id);

					echo '<script type = "text/javascript">
					            window.location ="../../"; 
					            </script>';
				}
			}
			
		}
		
	}
?>