<?php ///Starts PHP Code///
	include "UserAuth_Session.php"; ///Includes the session php file to lock out unregistered users///
?> <!--Ends PHP Code-->

<!DOCTYPE html> <!--Lets the browser know the type of document (in this case html 5)-->
<html> <!--html Tag is a container used to contain all the HTML Code together-->
	<head> <!--head Tag is a container used to contain everything below in the header-->
		<title>ITSERVICES.GROUP/ASSETTRACKER | Home</title> <!--title Tag is used to give the website a name on the tab of the browser--> 
		<link rel="icon" type="image/x-icon" href="favicon.ico"> <!--the link here links the page to the favicon image in the folder of the page and is used for the small image seen in the browsers tab-->
	</head> <!--/head Tag closes the head container-->

	<link href="StyleSheet.css" rel="stylesheet"> <!--'link href' Tag is being used to refer the website to an external CSS style sheet to make styling the website easier and more streamlined and the 'rel' defines the relationship between this document and the one being linked (in this case its a stylesheet)-->

	<body> <!--'body' Tag is a container used to contain the main part of the website which users interact with-->
		<?php ///Starts PHP Code///
			echo "<h4>User: " .$_SESSION['UserAuth_Email_Address']. " is logged in!"; ///This prints on the screen the details of the person logged in, this is done with global variable $_SESSION which is being reffered to from line 2 when UserAuth_Session.php is included///
		?> <!--Ends PHP Code-->
		<center> <!--'center' Tag is a container which centralises all displayed text within tbe container-->
			<h1>ITSERVICES.GROUP/ASSETTRACKER</h1> <!--'h1' Tag is a used to display text in large format (in this case the title) and is styled in the style sheet with sizing, font and colour--> 
			<h2>Landing Page</h2><!--'h2'Tag is a used to display text in large format (in this case a header) and is styled in the style sheet with sizing, font and colour--> 
			<br><!--the 'br' tag is used to 'break' (space out) whats printed on the website -->
			<p><a href="Asset_Display.php"> See Current List Of Assets </a> </p> <!--'p' tag is used to print text onto the webpage and is styled in the style sheet with sizing, font and colour, the 'a href' tag is used to implement hyper links and in this case its pointing to 'Asset_Display.php'-->
			<p><a href="Asset_Search.php"> Search Current List Of Assets </a> </p> 
			<p><a href="Asset_Add.php">Add A New Asset </a> </p>
			<p><a href="Asset_Update.php" > Update A Current List Of Assets </a> </p>
			<br>
			<p><a href="UserAuth_Display.php"> See Current List Of Registered Users </a> </p> <!--'p' tag is used to print text onto the webpage and is styled in the style sheet with sizing, font and colour, the 'a href' tag is used to implement hyper links and in this case its pointing to 'Asset_Display.php'-->
			<p><a href="UserAuth_Search.php"> Search Current Registered Users </a> </p> 
			<p><a href="UserAuth_Update.php" > Update A Current Registered User </a> </p>
			<p><a href="UserAuth_Logout.php">Logout</a></p>
		</center> <!--'/centre' Tag closes the centre container-->
	</body>	<!--'/body; Tag closes the body container-->
</html> <!--'/html' Tag closes the html container-->