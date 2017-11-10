<?php
	/*if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}*/
	session_start();

        $loggedIn = empty($_SESSION['username']) ? false : $_SESSION['username'];
	      if (!$loggedIn) {
		  header("Location: ./login.php");
		  die;
	}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GameOn-MU</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">
      
    <!-- Custom CSS and JS -->
    <link href="./css/customCSS.css" rel="stylesheet">
    <script src="./javascript/searchEvents.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">GameOn-Mizzou</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Home
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./searchEvents.php">Search<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./createEvent.php">Create</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./phpservices/logout.php">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Browse Events
        <small></small>
      </h1>
      
      <!-- Search Options -->
      <div class="row">
        
        <!--<form action="./searchEvents.html" method="GET" class="col-md-4 col-md-offset-5">
            <div class="form-group">
                <label for="sortBy">Sort By:</label>
                <select name="sortBy" onchange="sortEvents(this.value)">
                    <option value="activity">Activity</option>
                    <!-- PHP to generate the options
                    <option value="location">Location</option>
                </select>
            </div>

        </form>-->
        
          
        <button class="btn btn-primary" onclick="sortEvents('activity')">Activity</button>
        <button class="btn btn-primary" onclick="sortEvents('location')">Location</button>
        
      </div>

      <hr>
      <!-- /Search Options -->
        
        <div class="row">
        
            <!-- Event Template --> <!-- PHP will generate all the upcoming events -->
               
                <div class="col-md-4 col-md-offset-5">
                  <h3>Event One</h3>
                  <ul>
                    <li>Date:</li> 
                    <li>Time:</li>
                    <li>Location:</li>
                  </ul>
                  <a class="btn btn-primary" href="#">Count Me In!</a>
                </div>
            

          <!-- /Event Template -->
        
        </div>
        <hr>
        <div class="row" id="eventDisplay"></div>


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="footer py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>