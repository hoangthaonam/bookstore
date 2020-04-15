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
			$sql = "Select * From intro where id = '1'";
			return $this->get_row($sql);
		}
		public function updateIntro($content)
		{
			$sql = "Update intro set content = '$content' where id = '1'";
			return $this->get_row($sql);
		}
	}
?>