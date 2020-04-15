<?php  
	/**
	 * 
	 */
	class Logout extends Controllers
	{
		
		function load()
		{
			# code...
			unset($_SESSION["username"]);
			unset($_SESSION["password"]);
			unset($_SESSION["id"]);
			if(isset($_SESSION["cart"])) unset($_SESSION["cart"]);
			if(isset($_SESSION["quantity"])) unset($_SESSION["quantity"]);
			echo '<script type = "text/javascript">
			            alert("Đã đăng xuất!!!");window.location ="/bookstore/Main"; 
			            </script>';
		}
	}
?>