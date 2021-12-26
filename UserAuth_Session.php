<?php ///Starts PHP Code///
    session_start(); ///start session///
    if(!isset($_SESSION["UserAuth_Email_Address"])) ///if the global variable '$_SESSION' contains a no value 'UserAuth_Email_Address' then it will recirect to the login screen///
        {
            header("Location: UserAuth_Login.php"); ///login screen redirect///
        }
?> <!--Ends PHP Code-->
