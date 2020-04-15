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

		public function getAllBooks()
		{
			$sql = "Select * From book";
			return $this->do_sql($sql);
		}

		public function getDetailsBook($id)
		{
			$sql = "Select * From book Where id='$id'";
			return $this->get_row($sql);
		}

		public function getNumberBook()
		{
			$sql = "Select * From book";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function getNumberSaleBook()
		{
			$sql = "Select * from book where status = 1";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}
		public function getNumberNewBook()
		{
			$sql = "Select * from book where status = 0";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function insertBook($name,$author,$images,$type,$publisher,$amount,$des,$price,$edit_user,$status)
		{
			$sql = "Insert into book (name,author,images,type,publisher,amount,des,price,edit_user,status) values('$name','$author','$images','$type','$publisher','$amount','$des','$price','$edit_user','$status')";
			$this->do_sql($sql);
			return true;
		}

		public function updateBooks($id,$name,$author,$images,$type,$publisher,$amount,$des,$price,$edit_user,$status)
		{
			$sql = "Update book set name='$name',author='$author',images='$images',type='$type',publisher='$publisher',amount='$amount',des='$des',price='$price',edit_user='$edit_user',status='$status' where id = '$id'";
			$this->do_sql($sql);
			return true;
		}
		public function deleteBooks($id)
		{
			# code...
			$sql = "Delete from book where id='$id'";
			$this->do_sql($sql);
			return true;
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