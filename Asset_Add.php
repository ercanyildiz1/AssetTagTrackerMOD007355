<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Add An Asset</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Add An Asset</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Home_Page.php">Home</a>  |  <a href="Asset_Add.php"> Refresh</a></p>

			<p>Please Fill In The Details Below To Add A New Asset To The Database!</p>
			<form action="Asset_Add.php" method="post"> <!--starts the form and gives provides the method of which the form will be handles-->
				<div> <!--'div' Tag used to style text (in this case it is styling line by line in conjunction with the style sheet-->
					<label>Device Type</label> <!--'label' Tag is used to label/print next to an input (in this case it is labeling the input 'Device Type)-->
					<input type="text" name="Device_Type" placeholder="Enter Device Type" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
						The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form-->
                </div> <!--'/div' closes the div container and stops styling anything below unless its in another div tag or is listed in the style sheet-->
				<div>
					<label>Device Brand</label>
					<input type="text" name="Device_Brand" placeholder="Enter Device Brand" Required>
                </div>
                <div>
					<label>Device Model</label>
					<input type="text" name="Device_Model" placeholder="Enter Device Model" Required>
				</div>
				<div>
                    <label>Device Serial Number</label>
					<input type="text" name="Device_Serial_Number" placeholder="Enter Serial Number" Required>
				</div>
                <div>
                	<label>Device IMEI</label>
                	<input type="tel" name="Device_IMEI" placeholder="Enter IMEI Number" pattern="[0-9]{8-20}"> <!--'type="tel"' ensures that the user can only enter numbers, although 'tel' is meant to be used forr telephone numbers it has been
					repurposed to enter the IMEI number, the 'pattern="[0-9]{8-20}"' attribute is used to limit what is entered in this case the '0-9' is allowing numbers 0-9 to be used and '8-20' is only allowing the length of the phone number to be between 8-20 numbers-->
                </div>
				<div>
					<label>Device Assigned To First Name</label>
					<input type="text" name="Device_Assigned_To_First_Name" placeholder="Enter First Name" Required>
				</div>
				<div>
            		<label>Device Assigned To Last Name</label>
            		<input type="text" name="Device_Assigned_To_Last_Name" placeholder="Enter Last Name" Required>
				</div>
				<div>
                	<label>Device Assigned To Email Address</label>
                	<input type="email" name="Device_Assigned_To_Email_Address" placeholder="Enter Email Address" Required>
				</div> <!--'type="email"' is used to only allow the user to input a valid format email address into the box therefore helps reduce mistakes-->
				<div>
					<label>Device Assigned To Employee #</label>
					<input type="tel" name="Device_Assigned_To_Employee_Number" placeholder="Enter Employee Number" pattern="[0-9]{5-8}" Required>
				</div>
				<input type="submit" class="btn btn-primary" name="submit" value="submit"> <!--'type-"submit"' is used to create a button where the 'value' is set to submit-->
			</form> <!--'/form' Tag closes the form container-->

			<?php
				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///

				if(isset($_POST['submit'])) ///This if statement is checking if submit has been pressed if so it will carry out the code below///
					{    
     					$Device_Type = $_POST['Device_Type']; ///variable '$Device_Type' if being assigned the value of 'Device_Type' from the user inputs in the form above///
     					$Device_Brand = $_POST['Device_Brand'];
     					$Device_Model = $_POST['Device_Model'];
     					$Device_Serial_Number = $_POST['Device_Serial_Number'];
     					$Device_IMEI = $_POST['Device_IMEI'];
     					$Device_Assigned_To_First_Name = $_POST['Device_Assigned_To_First_Name'];
     					$Device_Assigned_To_Last_Name = $_POST['Device_Assigned_To_Last_Name'];
     					$Device_Assigned_To_Email_Address = $_POST['Device_Assigned_To_Email_Address'];
     					$Device_Assigned_To_Employee_Number = $_POST['Device_Assigned_To_Employee_Number'];
						$Device_Time_Stamp = date("d-m-y H:i:s");
						$Device_Adjustment_Timestamp = date("d-m-y H:i:s");;
						$MYSQL = "INSERT INTO Assets_Table (Device_Type, Device_Brand, Device_Model, Device_Serial_Number, Device_IMEI_Number, Device_Assigned_To_First_Name, Device_Assigned_To_Last_Name, Device_Assigned_To_Email_Address, Device_Assigned_To_Employee_Number, Device_Time_Stamp, Device_Adjustment_Timestamp)
							VALUES ('$Device_Type','$Device_Brand','$Device_Model','$Device_Serial_Number','$Device_IMEI','$Device_Assigned_To_First_Name','$Device_Assigned_To_Last_Name','$Device_Assigned_To_Email_Address','$Device_Assigned_To_Employee_Number','$Device_Time_Stamp','$Device_Adjustment_Timestamp')";
     					/////variable '$MYSQL' is being assigned the values above, the values above are a MYSQL command which is not being executed yet, it will when used insert into 'Assets_Table' where the columns = 'Device_Type......' with 'VALUES' '$Device_Type'///
						if (mysqli_query($MYSQLLINK, $MYSQL))///This if statement is running within an if statement and is going to run the '$MYSQL' above with the '$MYSQLLINK' variable which is in the MYSQLLINK_CONFIG.php file using 'mysqli_query'///
     						{
        						echo "<br>!!!!!The new Asset has been added successfully!!!!!"; ///if the MYSQL command runs correctly it will output the text on the left///
     						} 
     					else 
     						{
        						echo "<br>!!!!!Error unable to add new asset " . $MYSQL . " - " . mysqli_error($MYSQLLINK); //if the MYSQL command fails it will 'else' and output the error and the mysql error message///
     						}
					}

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