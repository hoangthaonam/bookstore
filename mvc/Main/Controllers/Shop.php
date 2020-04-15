<?php  
	/**
	 * 
	 */
	class Shop extends Controllers
	{
		function load(){
			// load suggested book
			$Book = $this->models('BookModels');
			$book = $Book->getTopBook();

			// load all Book
			$all_books = $Book->getAllBooks();

			// call $ send data to Views
			$this->views("layout1",["page"=>"shop","book"=>$book,"all_books"=>$all_books]);
		}

		public function find()
		{
			if(isset($_POST["btn_Search"]))
			{
				$name = $_POST["txt_search"];
				$Book = $this->models('BookModels');

				// load all Book
				$all_books = $Book->getAllBooks();

				// result find
				$book = $Book->findBook($name);

				// call $ send data to Views
				$this->views("layout1",["page"=>"result","book"=>$book,"all_books"=>$all_books]);
			}
		}
	}
?>