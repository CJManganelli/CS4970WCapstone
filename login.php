<?php
	/*if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}*/
	session_start();

        $loggedIn = empty($_SESSION['username']) ? false : $_SESSION['username'];
	      if ($loggedIn) {
		  header("Location: ./index.php");
		  exit;
	}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">
      
    <!-- Custom CSS and JS -->
    <link href="css/customCSS.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">GameOn-Mizzou</a>

      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Please Sign in:
        <small></small>
      </h1>
        
      <div class="row">
        
        <div class="col-md-5">
            <form role="form" action="./phpservices/login-handler.php" method="POST">

                <input type="hidden" name="action" value="login">

                <div class="form-group">
                  <label for="user">Username:</label>
                  <input type="user" name="username" class="form-control" id="user">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" name="password" class="form-control" id="pwd">
                </div>
                        <?php

                            $error = $_SESSION['authError'];

                            if($error) {
                                print "<div class='alert alert-warning'>$error</div>\n";
                                $_SESSION['authError'] = NULL;

                            }
                            else {
                                //echo '<p>message should go here</p>';
                            }
                        ?>
                
                <button type="submit" class="btn btn-default">Login</button>
                <a href="./register.php">New? Sign up today!</a>
                
            </form>
        </div>
     </div>
      <!-- /.row -->

      <hr>






    </div>
    <!-- /.container -->

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>