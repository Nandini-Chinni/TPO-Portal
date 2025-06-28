 <?php
 
	session_start();
	
	if(isset($_SESSION['loggin_user']))
	{
		unset($_SESSION['loggin_user']);
		
		//session_destroy();
		if(!isset($_SESSION['loggin_user']))
		{
			header("location:alogin.php");
		}
	}
?>