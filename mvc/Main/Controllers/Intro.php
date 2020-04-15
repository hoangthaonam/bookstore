<?php  
	/**
	 * 
	 */
	class Intro extends Controllers
	{
		public function load()
		{
			// loading Intro
			$Intro = $this->models("IntroModels");
			$intro = $Intro->getIntro();

			// call & send data to Views
			$this->views("layout1",["page"=>"intro","intro"=>$intro]);
		}
	}
?>