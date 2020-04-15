<?php  
	/**
	 * 
	 */
	class Bill extends Controllers
	{
		
		function load()
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Bill = $this->models("BillModels","Admin");
					$numallbill = $Bill->getNumberBill();
					$numcombill = $Bill->getNumberCompleteBill(); 
					$numcanbill = $Bill->getNumberCancelBill();
					$newbill = $Bill->getNewBill();
					$allbill = $Bill->getAllBill();
					$combill = $Bill->getComBill();
					$transbill = $Bill->getTransBill();
					$canbill = $Bill->getCanBill();
					$this->views("layout2",[
						 "page"=>"ad_bill",
						 "numallbill"=>$numallbill,
						 "numcombill"=>$numcombill,
						 "numcanbill"=>$numcanbill,
						 "newbill"=>$newbill,
						 "allbill"=>$allbill,
						 "combill"=>$combill,
						 "transbill"=>$transbill,
						 "canbill"=>$canbill],"Admin");
				}
			}
			
		}

		public function updateBillStatus($id,$status)
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Bill = $this->models("BillModels","Admin");
					$Bill->updateBillStatus($id,$status);

					if($status == 4)
					{
						$number = $Bill->getNumber($id);
						$book = $Bill->getBookId($id);
						$Book = $this->models("BookModels","Admin");
						$Book->changeAmount($book,$number);
						$Book->changeCount($book,-1);
					}
					header("Location: http://localhost/bookstore/Admin/Bill");
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
					            window.location ="../../Bill"; 
					            </script>';
				}
			}
			
		}
	}
?>