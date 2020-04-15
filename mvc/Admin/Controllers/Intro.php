<?php  
	/**
	 * 
	 */
	class Intro extends Controllers
	{
		public function load()
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					$Intro = $this->models("IntroModels","Admin");
					$intro = $Intro->getIntro();
					$this->views("layout2",["page"=>"ad_intro","intro"=>$intro],"Admin");
				}
			}
			
		}
		public function update()
		{
			# code...
			if($this->checkSession())
			{
				$Account = $this->models("AccountModels","Admin");
				if($this->checkRule($Account))
				{
					if(isset($_POST["btnUpdate"]))
					{
						$content = $_POST["content"];
						$Intro = $this->models("IntroModels","Admin");
						$Intro->updateIntro($content);
						header("Location: ./Admin/Intro");
					}
				}
			}
			
		}
	}
?>