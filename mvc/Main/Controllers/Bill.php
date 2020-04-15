<?php  
	/**
	 * 
	 */
	class Bill extends Controllers
	{
		public function addBill()
		{
			$bill = $_SESSION["bill"];
			$Bill = $this->models("BillModels");
			$Book = $this->models("BookModels");
			foreach ($bill as $key => $value) {
				$book = $key;
				$customer = $_SESSION["id"];
				$status = 1;
				$number = $value["number"];
				$amount = $number*$value["price"];
				$daycreate = date('YmdHis');
				$edit_time = $daycreate;
				$edit_user = $_SESSION["username"];
				# code...
				$Bill->insertBill($book,$customer,$status,$number,$amount,$daycreate,$edit_user,$edit_time);
				$Book->changeAmount($book,-$number);
				$Book->changeCount($book);

				$Cart = $this->models("CartModels");
				$cart = $Cart->getCart($customer);
				unset($cart[$key]);
				$edit_user = $_SESSION["username"];
				$edit_time = date('YmdHis');
				$content = json_encode($cart,JSON_UNESCAPED_UNICODE);
				$Cart->updateCart($customer,$content,$edit_user,$edit_time);
				$_SESSION["quantity"] = $Cart->getQuantity($_SESSION["id"]);
				}
			echo '<script type = "text/javascript">
		            alert("Đơn hàng đang được xử lý!");window.location ="/bookstore/Main/Shop"; 
		            </script>';
		}
		public function removeBill($id='')
		{
			$Bill = $this->models("BillModels");
			$number = $Bill->getNumber($id);
			$book = $Bill->getBookId($id);
			$Bill->removeBill($id);

			$Book = $this->models("BookModels");
			$Book->changeAmount($book,$number);
			$Book->changeCount($book,-1);
			echo '<script type = "text/javascript">window.location ="/bookstore/Main/MyAccount/load/'.$_SESSION["id"].'"; 
		            </script>';
		}
	}
?>