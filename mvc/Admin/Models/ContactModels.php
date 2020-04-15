<?php  
	/**
	 * 
	 */
	class ContactModels extends DB
	{
		public function getContact()
		{
			$sql = "Select * from contact where answer != ''";
			return $this->do_sql($sql);
		}

		public function getTopContact()
		{
			$sql = "Select * from contact left join account on customer = account.id where answer = '' order by edit_time_ct desc";
			return $this->do_sql($sql);
		}

		public function updateContact($id,$answer,$edit_user,$edit_time)
		{
			
			$sql = "Update contact set answer = '$answer', edit_user = '$edit_user', edit_time_ct = '$edit_time' where id_ct = '$id'";
			$this->do_sql($sql);
			return true;
		}

		public function removeContact($id)
		{
			$sql = "Delete from contact where id_ct = '$id'";
			$this->do_sql($sql);
			return true;
		}
	}
?>