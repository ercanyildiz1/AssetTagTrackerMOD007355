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
			<p><a href="Home_Page.php">Home</a>  |  <a href="Asset_Update.php">Back</a>  |  <a href="Asset_Update_Form.php"> Refresh</a></p>
			<?php
 
				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and rowbase information needed to connect///

				$Device_Asset_Tag_ID = $_GET['Device_Asset_Tag_ID']; ///Grabs Device_Asset_Tag_ID from previous page and assigns value to '$Device_Asset_Tag_ID'///
				$MYSQL = "select * from Assets_Table where Device_Asset_Tag_ID='$Device_Asset_Tag_ID'"; ///Prepared statement to be used to carry out MYSQL query///
				$MYSQLQUERY = mysqli_query($MYSQLLINK,$MYSQL); ///Querying Database and assigning output to variable '$MYSQLQUERY'///
				$data = mysqli_fetch_array($MYSQLQUERY); ///converts '$MYSQLQUERY' into an array//

				if(isset($_POST['update'])) ///This if statement is checking if update has been pressed if so it will carry out the code below///
					{
						$Device_Type = $_POST['Device_Type']; ///Assigning variable '$Device_Type' with value 'Device_Type'///
						$Device_Brand = $_POST['Device_Brand'];
						$Device_Model = $_POST['Device_Model'];
						$Device_Serial_Number = $_POST['Device_Serial_Number'];
						$Device_IMEI_Number = $_POST['Device_IMEI_Number'];
						$Device_Assigned_To_First_Name = $_POST['Device_Assigned_To_First_Name'];
						$Device_Assigned_To_Last_Name = $_POST['Device_Assigned_To_Last_Name'];
						$Device_Assigned_To_Email_Address = $_POST['Device_Assigned_To_Email_Address'];
						$Device_Assigned_To_Employee_Number = $_POST['Device_Assigned_To_Employee_Number'];
						$Device_Adjustment_Timestamp = date("d-m-y H:i:s");
						$update = mysqli_query($MYSQLLINK,"update Assets_Table set Device_Type='$Device_Type', Device_Brand='$Device_Brand',Device_Model='$Device_Model',Device_Serial_Number='$Device_Serial_Number',Device_IMEI_Number='$Device_IMEI_Number',Device_Assigned_To_First_Name='$Device_Assigned_To_First_Name',Device_Assigned_To_Last_Name='$Device_Assigned_To_Last_Name',Device_Assigned_To_Email_Address='$Device_Assigned_To_Email_Address',Device_Assigned_To_Employee_Number='$Device_Assigned_To_Employee_Number',Device_Adjustment_Timestamp = '$Device_Adjustment_Timestamp' where Device_Asset_Tag_ID='$Device_Asset_Tag_ID'");
						if($update) ///if variable '$update' is assigned a value then the code below will exit///
							{
								mysqli_close($MYSQLLINK);
								header("location:Asset_Update.php");
								exit;
							}
						else ///if there is an error the code below displays the error///
							{
								echo mysqli_error();
							}    	
					}
			?>
			
			<h3>Update Data</h3> <!--the 'h3' Tag is used for formatting text and in this case its being styled externally by the stylesheet linked at the top. the tag is being used in this case to subtitle the form-->
	
			<form method="POST"> <!--starts the form and gives provides the method of which the form will be handles-->
				<div> <!--'div' Tag used to style text (in this case it is styling line by line in conjunction with the style sheet-->
					<label>Device Type</label> <!--'label' Tag is used to label/print next to an input (in this case it is labeling the input 'Device Type)-->
					<input type="text" name="Device_Type" value="<?php echo $data['Device_Type'] ?>" placeholder="Device Type" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
						The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form in addition the field will be prefilled-->
				</div> <!--'/div' closes the div container and stops styling anything below unless its in another div tag or is listed in the style sheet-->
				<div>
					<label>Device Brand</label>
					<input type="text" name="Device_Brand" value="<?php echo $data['Device_Brand'] ?>" placeholder="Device Brand" Required>
				</div>
				<div>
					<label>Device Model</label>
					<input type="text" name="Device_Model" value="<?php echo $data['Device_Model'] ?>" placeholder="Device Model" Required>
				</div>
				<div>
					<label>Device Serial Number</label>
					<input type="text" name="Device_Serial_Number" value="<?php echo $data['Device_Serial_Number'] ?>" placeholder="Serial Number" Required>
				</div>
				<div>
					<label>Device IMEI Number</label>
					<input type="tel" name="Device_IMEI_Number" value="<?php echo $data['Device_IMEI_Number'] ?>" placeholder="IMEI Number" pattern="[0-9]{8-20}"> <!--'type="tel"' ensures that the user can only enter numbers, although 'tel' is meant to be used forr telephone numbers it has been
					repurposed to enter the IMEI number, the 'pattern="[0-9]{8-20}"' attribute is used to limit what is entered in this case the '0-9' is allowing numbers 0-9 to be used and '8-20' is only allowing the length of the phone number to be between 8-20 numbers-->
				</div>
				<div>
					<label>Device Assigned To First Name</label>
					<input type="text" name="Device_Assigned_To_First_Name" value="<?php echo $data['Device_Assigned_To_First_Name'] ?>" placeholder="First Name" Required>
				</div>
				<div>
					<label>Device Assigned To Last Name</label>
					<input type="text" name="Device_Assigned_To_Last_Name" value="<?php echo $data['Device_Assigned_To_Last_Name'] ?>" placeholder="Last Name" Required>
				</div>
				<div>
					<label>Device Assigned To Email Address</label>
					<input type="email" name="Device_Assigned_To_Email_Address" value="<?php echo $data['Device_Assigned_To_Email_Address'] ?>" placeholder="Email Address" Required> <!--'type="email"' is used to only allow the user to input a valid format email address into the box therefore helps reduce mistakes-->
				</div>
				<div>
					<label>Device Assigned To Employee Number</label>
					<input type="tel" name="Device_Assigned_To_Employee_Number" value="<?php echo $data['Device_Assigned_To_Employee_Number'] ?>" placeholder="Employee Number" pattern="[0-9]{5-8}" Required>
				</div>
				<input type="submit" name="update" value="Update"/> <!--'type-"submit"' is used to create a button where the 'value' is set to update-->
			</form> <!--'/form' Tag closes the form container-->
			<?php
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