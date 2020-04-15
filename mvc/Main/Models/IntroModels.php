<?php  
	/**
	 * 
	 */
	class IntroModels extends DB
	{
		// public function getIntro()
		// {
		// 	$sql = "Select * From intro limit 1";
		// 	return $this->do_sql($sql);
		// }

		public function getIntro()
		{
			$sql = "Select * From intro limit 1";
			return $this->get_row($sql);
		}
	}
?>