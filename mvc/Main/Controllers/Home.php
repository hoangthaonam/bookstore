<?php  
	/**
	 * 
	 */
	class Home extends Controllers
	{
		function load()
		{
			// loading suggested books
			$Book = $this->models('BookModels');
			$book = $Book->getTopBook();
			
			// loading 10 books
			$tenbook = $Book->getTop10Books();

			// loading intro post
			$Intro = $this->models('IntroModels');
			$intro = $Intro->getIntro();

			// call & send data Views
			$this->views('layout1',["page"=>"index", "intro"=>$intro, "book" => $book, "tenbook" =>$tenbook]);

		}
	}
?>