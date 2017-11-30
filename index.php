<?php
	/*if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}*/
	session_start();

      $loggedIn = empty($_SESSION['username']) ? false :       $_SESSION['username'];
      if (!$loggedIn) {
        header("Location: ./login.php");
        die;
	  }
      else {
        $user = $_SESSION['username'];
        //$fname = 'Jason';
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
            <li class="nav-item active">
              <a class="nav-link" href="./index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./searchEvents.php">Search</a>
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
        
        
        
      <h2 class="my-4">Welcome Back <?php print $user; ?>!</h2>
      <hr>

      <!-- Page Heading -->
      <h1 class="my-4">Upcomming Events:
        <small></small>
      </h1>

      <!-- Event Template --> <!-- PHP will generate all the upcoming events -->
      <div class="row">
        <?php
          //connect to db
          //pull upcoming events
          //list them out
          //lol jk, I made a function for this.
          
          displayEvents();
          
        ?>        
          
      </div>
      <!-- /.row -->

      <hr>
      <!-- /Event Template -->





    </div>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

<?php

    function displayEvents() {
        
        
        //connect to DB
        require("./phpservices/connectDB.php");
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);
        
        if(!$link) {
            echo "<p>ERROR CONNECTING TO DATABASE</p>";
            exit;
        }
        else {
            
            $sqlSTMT = '
            
                SELECT 
                    event.id AS eventID, 
                    event.eventTime AS dateTime, 
                    location.name AS location, 
                    location.address,
                    type.name AS name
                FROM 
                    event INNER JOIN location ON event.locationId = location.id INNER JOIN type ON event.typeId = type.id
                ORDER BY 
                    event.eventTime ASC 
                LIMIT 10;
            
            ';
            
            if($result = mysqli_query($link, $sqlSTMT)) {
                
                //echo 'am I here?';
                
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    $eventID = $row['eventID'];
                    $event = $row['event'];
                    $name = $row['name'];
                    $location = $row['location'];
                    $dateTime = $row['dateTime'];
                    
                    $new_dateTime = explode(" ",$dateTime);
        
                    $time = $new_dateTime[0];
                    $date = $new_dateTime[1];

                    //add row to the return
                    print '
                
                    <div class="col-md-5">
                        <form role="form" action="./phpservices/countMeIn.php" method="POST">
                            <input type="hidden" name="eventID" value="'.$eventID.'">

                            <h3>'. $name .'</h3>
                            <ul>
                                <li>What?:'.$event.'</li>
                                <li>When?:'.$date.' @ '.$time.'</li> 
                                <li>Where?:'.$location.'</li>
                            </ul>

                            <button type="submit" class="btn btn-primary">Count Me In!</button>

                        </form>
                    </div>
                
                    ';
                    
                } // end while($row = $result->fetch_array(MYSQLI_ASSOC))
                
            }
            else {
                
                print '<p>Something Broke!</p>';
                
            } // end ($result = mysqli_query($link, $sqlSTMT))
            
        } // end if(!$link)
        
        
    } // end displayEvents()








    function formatEventDetails($eventID, $event, $location, $time, $date) {
        
        //$eventID = 70;
        //$event = 'Soccer';
        //$location = 'Field 1';
        //$time = '7:30pm';
        //$date = '11/14/17';
        
        print '
        
            <div class="col-md-5">
                <form role="form" action="./phpservices/countMeIn.php" method="POST">
                    <input type="hidden" name="eventID" value="'.$eventID.'">

                    <h3>'. $event .'</h3>
                    <ul>
                        <li>Date:'.$date.'</li> 
                        <li>Time:'.$time.'</li>
                        <li>Location:'.$location.'</li>
                    </ul>

                    <button type="submit" class="btn btn-primary">Count Me In!</button>

                </form>
            </div>
        
        ';
            
    }


?>
