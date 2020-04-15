<?php  
	/**
	 * 
	 */
	class TypeModels extends DB
	{
		
		public function getType()
		{
			# code...
			$sql = "Select * from type";
			return $this->do_sql($sql);
		}
	}
?>