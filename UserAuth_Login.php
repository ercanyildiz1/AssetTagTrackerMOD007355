<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Add An Asset</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Add An Asset</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="UserAuth_Registration.php">Register</a>  |  <a href="UserAuth_Login.php"> Refresh</a></p>

            <p>Please Login with the requested details below for access to ITSERVICES.GROUP/ASSETTRACKER</p>
            <form action="UserAuth_Login.php" method="post"> <!--starts the form and gives provides the method of which the form will be handles-->
                <div> <!--'div' Tag used to style text (in this case it is styling line by line in conjunction with the style sheet-->
					<label>Email Address</label> <!--'label' Tag is used to label/print next to an input (in this case it is labeling the input 'Email Address')-->
					<input type="email" name="UserAuth_Email_Address" placeholder="Enter Email Address" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
						The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form in addition this input field type is set to email-->
                </div> <!--'/div' closes the div container and stops styling anything below unless its in another div tag or is listed in the style sheet-->
				<div>
					<label>Password</label>
					<input type="password" name="UserAuth_Password" placeholder="Enter Password" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
						The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form in addition this input field type is set to password-->
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Login"> <!--'type-"submit"' is used to create a button where the 'value' is set to Login-->
			</form> <!--'/form' Tag closes the form container-->

            <?php
				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///
                session_start(); ///Starts Session///

                if (isset($_POST['submit'])) ///This if statement is checking if submit has been pressed if so it will carry out the code below///
                    {
                        $UserAuth_Email_Address = $_REQUEST ['UserAuth_Email_Address']; ///Variable '$UserAuth_Email_Address' is being assigned the value 'UserAuth_Email_Address' through the global variable '$_REQUEST' ///
                        $UserAuth_Password = $_REQUEST ['UserAuth_Password'];
                        $MYSQL = "SELECT * FROM `UserAuth_Table` WHERE UserAuth_Email_Address='$UserAuth_Email_Address' AND UserAuth_Password='$UserAuth_Password'"; ///prepared MYSQL statement to see if there are any entrys in the table which match the email and password///
                        $MYSQLQUERY = mysqli_query($MYSQLLINK, $MYSQL); ///assigns varibale '$MYSQLQUERY' the my sql query with the prepared statement above '$MYSQL'///
                        $NUMBER_OF_ROWS = mysqli_num_rows($MYSQLQUERY); ///assigns variable '$NUMBER_OF_ROWS' the sql command to count the number of rows output into variable '$MYSQLQUERY'///
                        if ($NUMBER_OF_ROWS == 1) ///if statement where if variable '$NUMBER_OF_ROWS' == 1 then it will assign the below
                            {
                                $_SESSION['UserAuth_Email_Address'] = $UserAuth_Email_Address; /// assigns variable '$_SESSION['UserAuth_Email_Address']' with the value of '$UserAuth_Email_Address///
                                header("Location: Home_Page.php"); ///Redirect's to 'Home_Page.php///
                            } 
                        else ///if the above if statement doesnt apply then the below will apply///
                            {
                                echo "<div'>";
                                echo "<h3>Incorrect Email Address/Password.</h3><br/>";
                                echo "<p class='link'>Click here to <a href='UserAuth_Login.php'>Login</a> again.</p>";
                                echo "</div>"; ///prints out incorrect email address/password and gives the user a button to press to restart the page///
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