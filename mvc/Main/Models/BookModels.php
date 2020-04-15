<?php  
	/**
	 * 
	 */
	class BookModels extends DB
	{
		public function getTopBook()
		{
			$sql = "Select * From book Order By count DESC limit 4";
			return $this->do_sql($sql);
		}

		public function getTop10Books()
		{
			$sql = "Select * From book limit 10";
			return $this->do_sql($sql);
		}

		public function getAllBooks($value='')
		{
			$sql = "Select * From book";
			return $this->do_sql($sql);
		}

		public function getDetailsBook($id)
		{
			$sql = "Select * From book Where id='$id'";
			return $this->get_row($sql);
		}
		public function getAmountBook($id)
		{
			$sql = "Select * From book Where id='$id'";
			$result = $this->get_row($sql);
			return $result["amount"];
		}
		public function getImagesBook($id)
		{
			$sql = "Select * From book Where id='$id'";
			$result = $this->get_row($sql);
			return $result["images"];
		}
		public function findBook($name)
		{
			# code...
			$sql = "Select * from book where name like '%$name%'";
			return $this->do_sql($sql);
		}
		public function changeAmount($id,$number)
		{
			# code...
			$sql = "Select * from book where id = '$id'";
			$result = $this->get_row($sql);
			$amount = $result["amount"]+$number;
			$sql = "Update book set amount='$amount' where id = '$id'";
			$this->do_sql($sql);
			return true;
		}
		public function changeCount($id,$number = 1)
		{
			# code...
			$sql = "Select * from book where id = '$id'";
			$result = $this->get_row($sql);
			$count = $result["count"]+$number;
			$sql = "Update book set count='$count' where id = '$id'";
			$this->do_sql($sql);
			return true;
		}
	}
?>