<?php  
	/**
	 * 
	 */
	class Book extends Controllers
	{
		public function load()
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Book = $this->models("BookModels","Admin");
					// load numallbook
					$numbook = $Book->getNumberBook();
					$salebook = $Book->getNumberSaleBook();
					$newbook = $Book->getNumberNewBook();
					$allbook = $Book->getAllBooks();
					$Type = $this->models("TypeModels","Admin");
					$type = $Type->getType();
					$array = array();
					while ($row = mysqli_fetch_assoc($type)) {
						# code...
						$array[] = $row;
					}

					$this->views("layout2",
							["page"=>"ad_product",
							 "numbook"=>$numbook,
							 "salebook"=>$salebook,
							 "newbook"=>$newbook,
							 "book"=>$allbook,
							 "type"=>$array],"Admin");
				}
			}
			
		}
		public function addBook()
		{
			if($this->checkSession())
			{

				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					if(isset($_POST["btnUpdate"]))
					{
						$name = trim($_POST["name"]);
						$author = trim($_POST["author"]);
						$type = trim($_POST["type"]);
						$publisher = trim($_POST["publisher"]);
						$amount = trim($_POST["amount"]);
						$des = trim($_POST["des"]);
						$price = trim($_POST["price"]);
						$edit_user = $_SESSION["username"];
						$status = trim($_POST["status"]);

						//images
						$images = trim($_FILES['up_images']['name']);
						$images = $this->uploadImages($images,"books");


						$Book = $this->models("BookModels","Admin");
						$Book-> insertBook($name,$author,$images,$type,$publisher,$amount,$des,$price,$edit_user,$status);


						echo '<script type = "text/javascript">window.location ="../"; 
				            </script>';	
					}
				}	
			}
			
		}
		public function updateBook($id='')
		{
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					if(isset($_POST["btnUpdate"]))
					{
						$name = trim($_POST["name"]);
						$author = trim($_POST["author"]);
						$type = trim($_POST["type"]);
						$publisher = trim($_POST["publisher"]);
						$amount = trim($_POST["amount"]);
						$des = trim($_POST["des"]);
						$price = trim($_POST["price"]);
						$edit_user = $_SESSION["username"];
						$status = trim($_POST["status"]);

						//images
						$images = trim($_FILES['up_images']['name']);
						$images = $this->uploadImages($images,"books");


						$Book = $this->models("BookModels","Admin");
						$Book-> updateBooks($id,$name,$author,$images,$type,$publisher,$amount,$des,$price,$edit_user,$status);


						echo '<script type = "text/javascript">window.location ="../"; 
				            </script>';	
					}
				}
			}
			
		}
		public function removeBook($id)
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Book = $this->models("BookModels","Admin");
					$Book->deleteBooks($id);
					echo '<script type = "text/javascript">
				            window.location ="../"; 
				            </script>';	
				}
			}
			
		}
	}
?>