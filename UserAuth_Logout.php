<?php ///Starts PHP Code///
    session_start(); ///starts the session if it already isnt started///
    if(session_destroy()) ///destroys the session///
        {
            header("Location: UserAuth_Login.php"); ///redirects to the Login page///
        }
?> <!--Ends PHP Code-->
