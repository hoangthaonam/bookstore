<?php  
	/**
	 * 
	 */
	class CartModels extends DB
	{
		public function insertCart($user_id,$content,$edit_user,$edit_time)
		{
			# code...
			$sql = "Select * from cart where user_id = '$user_id'";
			$result = $this->do_sql($sql);
			if(mysqli_num_rows($result)>0)
			{
				
				$sql = "Update cart set content = '$content' where user_id='$user_id'";
			}
			else
			{
				$sql = "Insert into cart(user_id,content,edit_user,edit_time) values('$user_id','$content','$edit_user','$edit_time')";
			}
			
			$this->do_sql($sql);
			return true;
		}
		public function getCart($user_id)
		{
			$sql = "Select content from cart where user_id = '$user_id'";
			$result = $this->get_row($sql);
			$result = json_decode($result["content"],true);
			return $result;
		}
		public function getQuantity($user_id)
		{
			# code...
			if($this->hasCart($user_id))
			{
				$temp = $this->getCart($user_id);
				return count($temp);
			}
			else return 0;
		}
		public function hasCart($user_id)
		{
			# code...
			$sql = "Select * from cart where user_id='$user_id'";
			$result = $this->do_sql($sql);
			if(mysqli_num_rows($result)>0) return true;
			else return false;
		}
		public function updateCart($user_id,$content,$edit_user,$edit_time)
		{
			$sql = "Update cart set content = '$content', edit_user='$edit_user', edit_time='$edit_time' where user_id='$user_id'";
			$this->do_sql($sql);
		}

		
	}
?>