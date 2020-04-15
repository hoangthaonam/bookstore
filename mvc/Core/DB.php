<?php  
	/**
	 * 
	 */
	class DB
	{
		public $con = "";
		function __construct()
		{
			if (!$this->con){
            $this->con = mysqli_connect('localhost', 'root', '', 'bookstore') or die ('Lỗi kết nối');
           mysqli_query($this->con, "SET character_set_results = 'UTF-8', character_set_client = 'UTF-8', character_set_database = 'UTF-8', character_set_server = 'UTF-8', name = 'UTF-8'");
        	}
		}

		function do_sql($sql)
	    {
	        return mysqli_query($this->con, $sql);
	    }

	    function get_row($sql)
	    {       
	        $result = mysqli_query($this->con, $sql);
	        $row = mysqli_fetch_assoc($result);
	        mysqli_free_result($result);
	 
	        if($row){
				return $row;
	        } 
	        return false;
	    }
	  //   function get_list($sql)
	  //   {        
	  //       $result = mysqli_query($this->con, $sql);
	 
	  //       $return = array();
	 
			// // Lặp qua kết quả để đưa vào mảng
	  //       while ($row = mysqli_fetch_assoc($result)){
	  //           $return[] = $row;
	  //       }

			// // Xóa kết quả khỏi bộ nhớ
	  //       mysqli_free_result($result);

	  //       return $return;
	  //   }
	}
?>