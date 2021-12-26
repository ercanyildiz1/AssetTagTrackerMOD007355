<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | List of current Users</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>List of current Users</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Home_Page.php">Home</a>  |  <a href="UserAuth_Display.php"> Refresh</a></p>

			<?php

				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///
				if($MYSQLLINK === false) ///The if statement is being used to check if $MYSQLLINK which is the variable used in MYSQLLINK_CONFIG.php to setup the connection is working///
					{
						die("<p>!!!!! ERROR: Could Not Establish Link Successfully. ".mysqli_connect_error(). " !!!!!"); ///'die' will end the if statement if there is an error and will output the error message///
					}

				echo "<table border='1'>";
					echo "<tr>"; ///Opening of container 'tr' for the data being output from the database///
						echo "<th> UserAuth ID </th>"; ///Prints the table header///
						echo "<th> UserAuth Email Address </th>";
						echo "<th> UserAuth Password </th>";
						echo "<th> UserAuth First Name </th>";
						echo "<th> UserAuth Last Name </th>";
						echo "<th> UserAuth Telephone Number </th>";
						echo "<th> UserAuth Creation Date & Time  </th>";
						echo "<th> UserAuth Adjustment Timestamp </th>";
					echo "</tr>"; ///Creates the table with a border and the above columb names///

				$MYSQLQUERY = mysqli_query($MYSQLLINK,"SELECT * FROM UserAuth_Table"); ///'$MYSQLQUERY' varibale is assigned a mysql query to select everything from the 'UserAuth_Table'///

				while($row = mysqli_fetch_array($MYSQLQUERY)) ///The while loop is used to assign the variable '$row" with the values output by 'mysqli_fetch_array' in '$OUTPUT'///
					{
						echo "<tr>"; ///Opening of container 'tr' for the data being output from the database///
							echo "<td>" . $row['UserAuth_ID'] . "</td>"; ///prints 'UserAuth_ID' into the tables 'UserAuth ID' column as this is going in order'
							echo "<td>" . $row['UserAuth_Email_Address'] . "</td>";
							echo "<td>" . $row['UserAuth_Password'] . "</td>";
							echo "<td>" . $row['UserAuth_First_Name'] . "</td>";
							echo "<td>" . $row['UserAuth_Last_Name'] . "</td>";
							echo "<td>" . $row['UserAuth_Telephone_Number'] . "</td>";
							echo "<td>" . $row['UserAuth_Creation_DateTime'] . "</td>";
							echo "<td>" . $row['UserAuth_Adjustment_Timestamp'] . "</td>";                                    
						echo "</tr>"; ///Closing of container 'tr'///
					}
				echo "</table>"; ///Closing of the table///

				mysqli_close($MYSQLLINK); ///'mysqli_close' Closes the connection with the server///
			?>
		</center> <!--Closing Tag for center container-->
	</body> <!--Closing Tag for body container-->
</html> <!--Closing Tag for html container-->