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

		public function createContact($question, $customer, $name, $email, $edit_user, $edit_time)
		{
			$sql = "Insert into contact (question, customer, name_cs, email, edit_user, edit_time_ct) values ('$question', '$customer', '$name', '$email', '$edit_user', '$edit_time')";
			$this->do_sql($sql);
			return true;
		}
	}
?>