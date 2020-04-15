<?php  
	/**
	 * 
	 */
	class App 
	{
		protected $folder = "Main";
		protected $controllers = "Home";
		protected $act = "load";
		protected $params = [];
		function __construct()
		{
			$arr = $this->GetURL();	

			// Folder
			
			if(isset($arr[0]))
			{
				if(file_exists('./mvc/'.$arr[0].''))
				{
					$this->folder = $arr[0];
				if($this->folder == "Admin")
					$this->controllers = "Dashboard";
				}
				
				unset($arr[0]);
			}

			// Controllers
			if(isset($arr[1]) && (file_exists("./mvc/Main/Controllers/".$arr[1].".php")||file_exists("./mvc/Admin/Controllers/".$arr[1].".php")))
			{
				$this->controllers = $arr[1];
			}
			unset($arr[1]);
			require_once './mvc/'.$this->folder.'/Controllers/'.$this->controllers.'.php';
			$this->controllers = new $this->controllers;

			// Action
			if(isset($arr[2])){
				if(method_exists($this->controllers,$arr[2]))
				{
					$this->act = $arr[2];
				}
				unset($arr[2]);
			}

			// Params
			if(isset($arr[3]))
			{
				$this->params = array_values($arr);
			}
			call_user_func_array([$this->controllers,$this->act], $this->params);
		}

		public function GetURL()
		{
			# code...
			if(isset($_GET['url'])){
				return explode("/",filter_var(trim($_GET['url'],"/")));
			}
		}

	}
?>