<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Search A User</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Search A User</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Home_Page.php">Home</a>  |  <a href="UserAuth_Search.php"> Refresh</a></p>
            <form action="UserAuth_Search.php" method="post"> <!--starts the form and gives provides the method of which the form will be handles-->
                <div> <!--'div' Tag used to style text (in this case it is styling line by line in conjunction with the style sheet-->
					<label>Search</label> <!--'label' Tag is used to label/print next to an input (in this case it is labeling the input 'Email Address')-->
					<input type="text" name="query" placeholder="Enter Search Request" Required> <!--This creates an input field where the user can fill in information in a text format. The 'name' gets assigned the value that was input. 
						The 'placeholder' is the faint text which appears over the text box and 'required' makes the user have to enter information inorder to submit the form-->
                </div> <!--'/div' closes the div container and stops styling anything below unless its in another div tag or is listed in the style sheet-->
                <input type="submit" class="btn btn-primary" name="search" value="search"> <!--'type-"submit"' is used to create a button where the 'value' is set to submit-->
			</form> <!--'/form' Tag closes the form container-->
            <?php
				include "MYSQLLINK_CONFIG.php"; ///Includes the MYSQLLINK_CONFIG.php file which contains the server logon details and database information needed to connect///

                if (isset($_POST['search'])) ///This if statement is checking if submit has been pressed if so it will carry out the code below///
                    {
                        $query = $_REQUEST ['query']; ///Variable '$query' is being assigned the value 'query' through the global variable '$_REQUEST' ///
                        $MYSQL = "SELECT * FROM `UserAuth_Table` WHERE `UserAuth_ID` LIKE '%$query%' OR `UserAuth_Email_Address` LIKE '%$query%' OR `UserAuth_Password` LIKE '%$query%' OR `UserAuth_First_Name` LIKE '%$query%' OR `UserAuth_Last_Name` LIKE '%$query%' OR `UserAuth_Telephone_Number` LIKE '%$query%' OR `UserAuth_Creation_DateTime` LIKE '%$query%' OR `UserAuth_Adjustment_Timestamp` LIKE '%$query%'"; ///prepared MYSQL statement to query everything from the table///
                        $MYSQLQUERY = mysqli_query($MYSQLLINK, $MYSQL); ///assigns varibale '$MYSQLQUERY' the my sql query with the prepared statement above '$MYSQL'///
                        $num_of_rows = mysqli_num_rows($MYSQLQUERY);
                        if ($num_of_rows == 0) /// If the number of rows output is = 0 then it will output the message below///
                            {
                                echo "<p>There was no result found";
                            }
                
                        else ///If the output is anything other than 0 then the code below will execute///
                            {
                                echo "<table border='1'>"; ///Creates a table with a border of 1///
                                    echo "<tr>"; ///Opening of container 'tr' for the data being output from the database///
                                        echo "<th> UserAuth ID </th>"; ///Prints the table header///
                                        echo "<th> UserAuth Email Address </th>";
                                        echo "<th> UserAuth Password </th>";
                                        echo "<th> UserAuth First Name </th>";
                                        echo "<th> UserAuth Last Name </th>";
                                        echo "<th> UserAuth Telephone Number </th>";
                                        echo "<th> UserAuth Creation DateTime </th>";
                                        echo "<th> UserAuth Adjustment Timestamp </th>";
                                    echo "</tr>"; ///Closing of 'tr' container///
                                    
                                    while($row = mysqli_fetch_array($MYSQLQUERY)) ///The while loop is used to assign the variable '$row" with the values output by 'mysqli_fetch_array' in '$OUTPUT'///
					                    {
						                    echo "<tr>"; ///Opening of container 'tr' for the data being output from the database///
							                    echo "<td>" . $row['UserAuth_ID'] . "</td>"; ///prints 'UserAuth_ID' into the tables 'UserAuth_ID' column as this is going in order'
    							                echo "<td>" . $row['UserAuth_Email_Address'] . "</td>";
	    						                echo "<td>" . $row['UserAuth_Password'] . "</td>";
		    					                echo "<td>" . $row['UserAuth_First_Name'] . "</td>";
			    				                echo "<td>" . $row['UserAuth_Last_Name'] . "</td>";
				    			                echo "<td>" . $row['UserAuth_Telephone_Number'] . "</td>";
					    		                echo "<td>" . $row['UserAuth_Creation_DateTime'] . "</td>";
						    	                echo "<td>" . $row['UserAuth_Adjustment_Timestamp'] . "</td>";                                          
						                    echo "</tr>"; ///Closing of container 'tr'///
					                    }    
                                }
                    }
                mysqli_close($MYSQLLINK); ///'mysqli_close' Closes the connection with the server///
            ?>
        </center> <!--Closing Tag for center container-->
    </body> <!--Closing Tag for body container-->
</html> <!--Closing Tag for html container-->