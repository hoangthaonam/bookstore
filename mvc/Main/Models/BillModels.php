<?php 
	/**
	 * 
	 */
	class BillModels extends DB
	{
		public function getNumberBill()
		{
			# code...
			$sql = "Select * From bill";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function getNumberCompleteBill()
		{
			# code...
			$sql = "Select * From bill where status='3'";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function getNumberCancelBill()
		{
			# code...
			$sql = "Select * From bill where status='4'";
			$result = $this->do_sql($sql);
			return mysqli_num_rows($result);
		}

		public function getNewBill()
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id, ship
					From bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id
					where bill.status = '1'";
			return $this->do_sql($sql);
		}

		public function getMyBill($id)
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id
					from bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id 
					where account.id = '$id'";
			return $this->do_sql($sql);
		}

		public function getAllBill()
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id, ship
					From bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id";
			return $this->do_sql($sql);
		}

		public function getComBill()
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id, ship
					From bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id
					where bill.status = '3'";
			return $this->do_sql($sql);
		}

		public function getCanBill()
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id, ship
					From bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id
					where bill.status = '4'";
			return $this->do_sql($sql);
		}

		public function getTransBill()
		{
			# code...
			$sql = "Select 
					book.name as bookname, book.status as status, book.images as bookimages, book.status as bookstatus,
					book.author as bookauthor, book.publisher as bookpublisher, book.price as bookprice,
					account.name as customername, account.email as accountemail, account.phone as accountphone, account.address as accountaddress,
					bill.amount as amount, bill.edit_time as edit_time , bill.number as number, bill.daycreate as daycreate, bill.status as billstatus, bill.id as bill_id, ship
					From bill 
					inner join book on bill.book = book.id
					inner join account on bill.customer = account.id
					where bill.status = '2'";
			return $this->do_sql($sql);
		}

		public function removeBill($id)
		{
			# code...
			$sql = "Delete from bill where id='$id'";
			$this->do_sql($sql);
			return true;
		}

		public function insertBill($book,$customer,$status,$number,$amount,$daycreate,$edit_user,$edit_time)
		{
			$sql = "INSERT INTO bill (book,customer,status,number,amount,daycreate,edit_user,edit_time) values ('$book','$customer','$status','$number','$amount','$daycreate','$edit_user','$edit_time')";
			$this->do_sql($sql);
			return true;
		}

		public function getNumber($id)
		{
			$sql = "Select * from bill where id='$id'";
			$row = $this->get_row($sql);
			return $row["number"];
		}

		public function getBookId($id)
		{
			$sql = "Select * from bill where id='$id'";
			$row = $this->get_row($sql);
			return $row["book"];
		}
	}
?>