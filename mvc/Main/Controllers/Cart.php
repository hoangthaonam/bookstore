<?php  
	/**
	 * 
	 */
	class Cart extends Controllers
	{
		public function load($user_id='')
		{
			if($this->checkSession())
			{


				$Book = $this->models("BookModels");
				$Cart = $this->models("CartModels");
				$cart = $Cart->getCart($user_id);
				$number = array();
				$images = array();
				foreach ($cart as $key => $value) {
					# code...
					$number[$key] = $Book->getAmountBook($key);
					$images[$key] = $Book->getImagesBook($key);
				}
				$this->views("layout1",["page"=>"cart","cart"=>$cart,"number"=>$number,"images"=>$images]);
			}

		}
		public function addCart($book_id='')
		{
			# code...
			if($this->checkSession())
			{


			if(isset($book_id))
			{
				$Book = $this->models('BookModels');
				$book = $Book->getDetailsBook($book_id);
				$Cart = $this->models('CartModels');
				$user_id = $_SESSION["id"];
				$edit_user = $_SESSION["username"];
				$edit_time = date('YmdHis');
				if($Cart->hasCart($user_id)) $_SESSION["cart"][$user_id] = $Cart->getCart($user_id);
				if(isset($_SESSION["cart"][$user_id])) // $_SESSION["cart"] == json_decode
				{
					if(isset($_SESSION["cart"][$user_id][$book_id]))
					{
						// echo "áaa";
						$_SESSION["cart"][$user_id][$book_id]=array(
						"number"=>$_SESSION["cart"][$user_id][$book_id]["number"]+1,
						"name"=>$book["name"],
						"price"=>$book["price"]
						);
					}
					else
					{
						// echo "kkkk";
						$_SESSION["cart"][$user_id][$book_id]=array(
						"number"=>1,
						"name"=>$book["name"],
						"price"=>$book["price"]
						);
					}
				}
				else 
				{
					$_SESSION["cart"][$user_id][$book_id]=array(
						"number"=>1,
						"name"=>$book["name"],
						"price"=>$book["price"]
					);
				}
				$content = json_encode($_SESSION["cart"][$user_id],JSON_UNESCAPED_UNICODE);
				$Cart->insertCart($user_id,$content,$edit_user,$edit_time);
				$_SESSION["quantity"] = $Cart->getQuantity($_SESSION["id"]);
				// print_r($content);
			}
			header("Location: http://localhost/bookstore/Main/Cart/load/".$_SESSION["id"]);
		}
		}
		public function removeItem($user_id,$book_id='')
		{
			# code...
			$Cart = $this->models("CartModels");
			$cart = $Cart->getCart($user_id);
			unset($cart[$book_id]);
			$edit_user = $_SESSION["username"];
			$edit_time = date('YmdHis');
			$content = json_encode($cart,JSON_UNESCAPED_UNICODE);
			$Cart->updateCart($user_id,$content,$edit_user,$edit_time);
			$_SESSION["quantity"] = $Cart->getQuantity($_SESSION["id"]);

			header("Location: http://localhost/bookstore/Main/Cart/load/".$_SESSION["id"]);
		}
		public function updateCartItem($user_id,$book_id,$quantity)
		{
			# code...
			$Cart = $this->models("CartModels");
			$cart = $Cart->getCart($user_id);
			$edit_user = $_SESSION["username"];
			$edit_time = date('YmdHis');
			$Book = $this->models("BookModels");
			$number = $Book->getAmountBook($book_id);	
			if($quantity>$number) $cart[$book_id]["number"] = $number;
			else $cart[$book_id]["number"] = $quantity;
			$content = json_encode($cart,JSON_UNESCAPED_UNICODE);
			$Cart->updateCart($user_id,$content,$edit_user,$edit_time);
			$_SESSION["quantity"] = $Cart->getQuantity($_SESSION["id"]);
			header("Location: http://localhost/bookstore/Main/Cart/load/".$_SESSION["id"]);
		}
	}

?>