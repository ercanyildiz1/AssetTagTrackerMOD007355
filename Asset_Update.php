<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Update An Asset</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Update An Asset</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Home_Page.php">Home</a>  |  <a href="Asset_Update.php"> Refresh</a></p>

			<?php

				echo "<table border='1'>"; ///Creates a table with a border of 1///
					echo "<tr>"; ///Opening of 'tr' container///
						echo "<th>Asset Tag ID</th>"; ///Prints table header///
						echo "<th>Device Type</th>";
						echo "<th>Brand</th>";
						echo "<th>Model</th>";
						echo "<th>Serial Number</th>";
						echo "<th>IMEI Number</th>";
						echo "<th>Assigned To FirstName</th>";
						echo "<th>Assigned To LastName</th>";
						echo "<th>Assigned To EmailAddress</th>";
						echo "<th>Assigned To Employee Number</th>";
						echo "<th> Asset Entered Into Database </th>";
						echo "<th> Asset Adjustment Timestamp </th>";
						echo "<th>Update</th>";
						echo "<th>Delete</th>";
					echo "</tr>"; ///Closing of 'tr' container///

					include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and rowbase information needed to connect///

					$OUTPUT = mysqli_query($MYSQLLINK,"SELECT * FROM Assets_Table"); ///'$OUTPUT' varibale is assigned a mysql query to select everything from the 'Assets_Table'///

					while($row = mysqli_fetch_array($OUTPUT)) ///The while loop is used to assign the variable '$row" with the values output by 'mysqli_fetch_array' in '$OUTPUT'///
						{
							echo "<tr>"; ///Opening of container 'tr' for the data being output from the database///
								echo "<td>" . $row['Device_Asset_Tag_ID'] . "</td>"; ///prints 'Device_Asset_Tag_ID' into the tables 'Device Asset Tag ID' column as this is going in order'
								echo "<td>" . $row['Device_Type'] . "</td>";
								echo "<td>" . $row['Device_Brand'] . "</td>";
								echo "<td>" . $row['Device_Model'] . "</td>";
								echo "<td>" . $row['Device_Serial_Number'] . "</td>";
								echo "<td>" . $row['Device_IMEI_Number'] . "</td>";
								echo "<td>" . $row['Device_Assigned_To_First_Name'] . "</td>";
								echo "<td>" . $row['Device_Assigned_To_Last_Name'] . "</td>";
								echo "<td>" . $row['Device_Assigned_To_Email_Address'] . "</td>";
								echo "<td>" . $row['Device_Assigned_To_Employee_Number'] . "</td>";
								echo "<td>" . $row['Device_Time_Stamp'] . "</td>";
								echo "<td>" . $row['Device_Adjustment_Timestamp'] . "</td>";
								echo '<td><a href="Asset_Update_Form.php?action=update&Device_Asset_Tag_ID='.$row['Device_Asset_Tag_ID'].'">Update</a></td>'; /// Creates link button to execute the update///
								echo '<td><a href="Asset_Delete_Form.php?action=delete&Device_Asset_Tag_ID='.$row['Device_Asset_Tag_ID'].'">Delete</a></td>'; /// Creates link button to execute delete///
							echo "</tr>"; ///Closing of container 'tr'///
						}
			
				echo "</table>"; ///Closing of the table///
	
				if($MYSQLLINK === false) ///The if statement is being used to check if $MYSQLLINK which is the variable used in MYSQLLINK_CONFIG.php to setup the connection is working///
					{
						die("<p>!!!!! ERROR: Could Not Establish Link Successfully. ".mysqli_connect_error(). " !!!!!"); ///'die' will end the if statement if there is an error and will output the error message///
					}

				else 
					{
						echo "<p>!!!!! MySql Database Link Test: Link Established Successfully. Host Info: ".mysqli_get_host_info($MYSQLLINK); ///'mysqli_get_host_info' prints the SQL status and the IP address///
					}

				mysqli_close($MYSQLLINK); ///'mysqli_close' Closes the connection with the server///
			?>
		</center> <!--Closing Tag for center container-->
	</body> <!--Closing Tag for body container-->
</html> <!--Closing Tag for html container-->