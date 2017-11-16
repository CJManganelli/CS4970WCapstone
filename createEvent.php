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
      
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Custom CSS and JS -->
    <link href="./css/customCSS.css" rel="stylesheet">
    
      <!--jQueryUI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    
    <script>
        $( function() {
            //$("#eventDate").datepicker();  
        });
    </script>

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
            <li class="nav-item">
              <a class="nav-link" href="./searchEvents.php">Search</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./createEvent.php">Create<span class="sr-only">(current)</span></a>
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
      <h1 class="my-4">Create Event
        <small></small>
      </h1>

        <div class='row'>
            <div class='col-md-4 col-md-offset-5'>
                <form action="/createEvent.php" method="POST">
                    <div class='form-group'>
                        <label for='activity'>What are we doing?:</label>
                        <?php 
                            print '<select class="form-control" id="activity">';
                            getOptionsFromDB('activity');
                            print '</select>';
                        ?>
                        <label for='location'>Where are we doing it?:</label>
                        <?php 
                            print '<select class="form-control" id="location">';
                            getOptionsFromDB('location');
                            print '</select>';
                        ?>
                        <br>
                        <label for='eventDate'>When are we doing it?:</label>
                        <br>
                        <input type='datetime-local' class='form-control' name="dateTime">
                        <br>
                        <button type="submit" class="btn btn-primary">Game On!</button>




                    </div> <!-- /form-group -->        
                </form>
            </div> <!-- /column -->
        
        </div> <!-- /row -->
        
        




    </div>
    <!-- /.container -->

    <br>
      



  </body>

</html>



<?php

    function getOptionsFromDB($option) {
        
        $sql = '';
        
        if($option == 'activity'){
            $sql = 'SELECT name FROM event;';
        }
        else if ($option == 'location') {
            $sql = 'SELECT name FROM location;';
        }
        else {
            $sql = '';
        }
        
        require("./phpservices/connectDB.php");
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);
        
        if(!$link) {
            print '<option>database error!</option>';
        }
        else {
            
            //execute
            if($result = mysqli_query($link, $sql)) {
                
                
                $formatedResults = '';
                
                while($row = $result->fetch_array(MYSQLI_NUM)){
                    print '<option>'.$row[0].'</option>';
                }
                
                
            }
            else {
                
                print '<option>database error!</option>';
                
                
            } //if(mysqli_stmt_execute($sql))
            
            
            
            
        } // end if(!$link)
        
        
        
        
        
        
    } // end getOptionsFromDB












?>
