<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Update A User</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Update A User</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Home_Page.php">Home</a>  |  <a href="UserAuth_Update.php">Back</a>  |  <a href="UserAuth_Update_Form.php"> Refresh</a></p>
			<?php
 
				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and rowbase information needed to connect///

				$UserAuth_ID = $_GET['UserAuth_ID']; ///Grabs UserAuth_ID from previous page and assigns value to '$UserAuth_ID'///
				$MYSQL = "select * from UserAuth_Table where UserAuth_ID='$UserAuth_ID'"; ///Prepared statement to be used to carry out MYSQL query///
				$MYSQLQUERY = mysqli_query($MYSQLLINK,$MYSQL); ///Querying Database and assigning output to variable '$MYSQLQUERY'///
				$data = mysqli_fetch_array($MYSQLQUERY); ///converts '$MYSQLQUERY' into an array//

				if(isset($_POST['update'])) ///This if statement is checking if update has been pressed if so it will carry out the code below///
					{
						$UserAuth_Email_Address = $_POST['UserAuth_Email_Address']; ///Assigning variable '$UserAuth_Email_Address' with value 'UserAuth_Email_Address'///
						$UserAuth_Password = $_POST['UserAuth_Password'];
						$UserAuth_First_Name = $_POST['UserAuth_First_Name'];
						$UserAuth_Last_Name = $_POST['UserAuth_Last_Name'];
						$UserAuth_Telephone_Number = $_POST['UserAuth_Telephone_Number'];
						$UserAuth_Adjustment_Timestamp = date("d-m-y H:i:s");
						$MYSQL2 = "update UserAuth_Table set UserAuth_Email_Address='$UserAuth_Email_Address', UserAuth_Password='$UserAuth_Password',UserAuth_First_Name='$UserAuth_First_Name',UserAuth_Last_Name='$UserAuth_Last_Name',UserAuth_Telephone_Number='$UserAuth_Telephone_Number',UserAuth_Adjustment_Timestamp='$UserAuth_Adjustment_Timestamp' where UserAuth_ID='$UserAuth_ID'";
						$MYSQLQUERY2 = mysqli_query($MYSQLLINK, $MYSQL2);
						if($MYSQLQUERY2) ///if variable '$MYSQLQUERY2' is assigned a value then the code below will exit///
							{
								mysqli_close($MYSQLLINK);
								header("location:UserAuth_Update.php");
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
						<label>UserAuth Email Address</label> <!--'label' Tag is used to label/print next to an input (in this case it is labeling the input 'UserAuth Email Address)-->
						<input type="text" name="UserAuth_Email_Address" value="<?php echo $data['UserAuth_Email_Address'] ?>" placeholder="UserAuth Email Address" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
							The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form in addition the field will be prefilled-->
					</div> <!--'/div' closes the div container and stops styling anything below unless its in another div tag or is listed in the style sheet-->
					<div>
						<label>UserAuth Password</label>
						<input type="text" name="UserAuth_Password" value="<?php echo $data['UserAuth_Password'] ?>" placeholder="UserAuth Password" Required>
					</div>
					<div>
						<label>UserAuth First Name</label>
						<input type="text" name="UserAuth_First_Name" value="<?php echo $data['UserAuth_First_Name'] ?>" placeholder="UserAuth First Name" Required>
					</div>
					<div>
						<label>UserAuth Last Name</label>
						<input type="text" name="UserAuth_Last_Name" value="<?php echo $data['UserAuth_Last_Name'] ?>" placeholder="UserAuth Last Name" Required>
					</div>
					<div>
						<label>UserAuth Telephone Number</label>
						<input type="tel" name="UserAuth_Telephone_Number" value="<?php echo $data['UserAuth_Telephone_Number'] ?>" placeholder="UserAuth Telephone Number" pattern="[0-9]{5-20}">
					</div>
					<div>
						<input type="hidden" name="UserAuth_Adjustment_Timestamp" value="<?php date("d-m-y H:i:s"); ?>" Required>
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