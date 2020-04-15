<?php  
	/**
	 * 
	 */
	class Order extends Controllers
	{
		public function load($array=[])
		{
			$array = explode(",",$array);
			$Account = $this->models("AccountModels");
			$myaccount = $Account->getAccount($_SESSION["id"]);


			$Cart = $this->models('CartModels');
			$books = $Cart->getCart($_SESSION["id"]);
			
			foreach ($books as $key => $value) {
				if(!in_array($key,$array)) unset($books[$key]);
			}
			
			// $books = array();
			// foreach ($array as $book_id) {
			// 	# code...
			// 	$books[$book_id] = $Cart->getDetailsBook($book_id);
			// }

			
			
			$this->views("layout1",["page"=>"order","books"=>$books,"account"=>$myaccount]);
		}
	}
?>