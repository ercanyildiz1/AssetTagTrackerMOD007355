<?php ///Starts PHP Code///
	
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///

	include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///

	$Device_Asset_Tag_ID = $_GET['Device_Asset_Tag_ID']; ///Assigns variable '$Device_Asset_Tag_ID' with the value given from 'Device_Asset_Tag_ID' in Asset_Update.php///

	$Asset_Delete = mysqli_query($MYSQLLINK,"delete from Assets_Table where Device_Asset_Tag_ID = '$Device_Asset_Tag_ID'"); ///Deletes row where 'Device_Asset_Tag_ID' column = value of '$Device_Asset_Tag_ID'///

	if($Asset_Delete) ///if '$Asset_Delete' runs successfully it will run the code below///
		{
			mysqli_close($MYSQLLINK); ///Close the connection to the database///
			header("location:Asset_Update.php"); ///redirect to 'Asset_Update.php'///
			exit; ///exit the code///
		}
	
	else ///if '$Asset_Delete' fails to run it outputs the error message below///
		{
    		echo "!!!!!Error deleting asset!!!!!";
  		}

?> <!--Ends PHP Code-->
