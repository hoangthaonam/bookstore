<?php 
	/**
	 * 
	 */
	class CustomerModels extends DB
	{
		public function getNumberAccount()
		{
			# code...
			$sql = "Select * From account";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}
		public function getNumberAdmin()
		{
			# code...
			$sql = "Select * From account where rule = '1'";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}
		public function getNumberMember()
		{
			# code...
			$sql = "Select * From account where rule = '0'";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}
		public function get5Member()
		{
			# code...
			$sql = "Select * From account where rule = '0'";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}
		public function getVIP()
		{
			# code...
			$sql = "Select * from account where rule='0' order by amount desc limit 5";
			return $this->do_sql($sql);
		}	
		public function getAllCustomer()
		{
			# code...
			$sql = "Select * from account where rule='0'";
			return $this->do_sql($sql);
		}	
		public function getAllAdmin()
		{
			# code...
			$sql = "Select * from account where rule='1'";
			return $this->do_sql($sql);
		}	
	}
?>