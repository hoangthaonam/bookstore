<?php  
	/**
	 * 
	 */
	class Details extends Controllers
	{
		public static function load($id)
		{
			// load details books
			$Book = $this->models("BookModels");
			$book = $Book->getDetailsBook($id);

			// load suggested books
			$Book = $this->models('BookModels');
			$sg_book = $Book->getTopBook();

			// call & send data to Views
			$this->views("layout1",["page"=>"details","book"=>$book, "sg_book"=>$sg_book, "id" => $id]);
		}
	}
?>