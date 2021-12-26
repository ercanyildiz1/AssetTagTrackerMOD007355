<?php ///Starts PHP Code///
	
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///

	include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///

	$UserAuth_ID = $_GET['UserAuth_ID']; ///Assigns variable '$UserAuth_ID' with the value given from 'UserAuth_ID' in UserAuth_Update.php///

	$User_Delete = mysqli_query($MYSQLLINK,"delete from UserAuth_Table where UserAuth_ID = '$UserAuth_ID'"); ///Deletes row where 'UserAuth_ID' column = value of '$UserAuth_ID'///

	if($User_Delete) ///if '$User_Delete' runs successfully it will run the code below///
		{
			mysqli_close($MYSQLLINK); ///Close the connection to the database///
			header("location:UserAuth_Update.php"); ///redirect to 'UserAuth_Update.php'///
			exit; ///exit the code///
		}
	
	else ///if '$User_Delete' fails to run it outputs the error message below///
		{
    		echo "!!!!!Error deleting user!!!!!";
  		}

?> <!--Ends PHP Code-->
