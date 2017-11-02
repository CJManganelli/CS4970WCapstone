<?php
  //print "Hello<br>";

  //require './phpservices/connectDB.php';

  $SQLUSER = "queryUser";

  $SQLPASS = "WLMd8K0DxnRhk3gH";

  $SQLHOST = "localhost";

  $SQLDB = "mydb";



  //print "Hello<br>";

  $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

  if($username) {
    header("Location : ./index.php");
    exit;    
  }

  //$action = empty($_POST['action']) ? '' : $_POST['action'];
  
  $action = $_POST['action'];

  print $action;

  if($action == 'login') {
    print "login function<br>";
    //logIn();
  }
  else if ($action == 'register') {
    register();
  }
  else {
    sendBack();
  }

  function logIn() {
      
        //connect to db

        
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            sendback("Error Connecting to Database!", "login");
        }
        else {
            
        

            $username = empty($_POST['username']) ? '' : $_POST['username'];
            $password = empty($_POST['password']) ? '' : $_POST['password']; 
            
            $sql = ''; // query goes here.
            
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $user);

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    $array = mysqli_fetch_assoc($result);

                    $dbPass = $array['hashed_password'];          

                    if(password_verify($password, $dbPass)) {
                      echo '<div class = "alert alert-success"><h3>Success!</h3></div>';
                      header("Location : ./index.php");
                      exit;
                    }
                    else {
                      echo '<div class = "alert alert-danger"><h3>Login failed</h3></div>';
                      echo '<a href="./login.php" class="btn btn-info">Home</a>';

                    }

                }
                else {
                    echo '<h3>Something Broke!</h3>';
                    echo '<a href="./login.php" class="btn btn-info">Back</a>';
                }

            }

            //search for entered username
            //if valid, continue. if not, gtfo.
            //pull: user, hashedpass, permLevel, and hash from db
            //hash entered password
            //compare passwords


            /*if ($username == "test" && $password == "pass") {
                setcookie('username', $username);
                header("Location: index.php");
                exit;
            } else {
                $error = 'Incorrect username or password. Please try again.';
                require "login.php";
            }*/		    

        }
  }



  function register() {
      
      $user = empty($_POST['username']) ? '' : $_POST['username'];
      $password = empty($_POST['password']) ? '' : $_POST['password'];
      $fName = empty($_POST['fName']) ? '' : $_POST['fName'];
      $lName = empty($_POST['lName']) ? '' : $_POST['lName'];
      
      print $user;
      print '<br>';
      print $password;
      print '<br>';
      print $fName;
      print ' ';
      print $lName;
      
      
      
      
      $hashedpass = password_hash($password, PASSWORD_BCRYPT);
      
      $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);
      
      $query = ''; //waiting on a query
      
      if ($stmt = msqli_prepare($link, $query)) {
          mysqli_stmt_bind_param($stmt, "sss", $user, $salt, $hashedpass);
          
          if(mysqli_stmt_execute($stmt)) {
              echo '<div class = "alert alert-success"><h3>Success!</h3></div>';
              echo '<a href="./login.php" class="btn btn-info">Login</a>';
          }
          else {
              echo '<h3>Something Broke!</h3>';
              echo '<a href="./register.php" class="btn btn-info">Back</a>';
          }
      }
      else {
          echo '<h3>Something Broke!</h3>';
          echo '<a href="./register.php" class="btn btn-info">Back</a>';
      }
      
      
      
  }

  function sendBack($errorText, $page) {
    
 		$username = "";
		$error = $errorText;
      
        if($page == "login") {
		  require "./login.php";
        }
        else if ($page == "register") {
            require "./register.php";
        }
        else {
            require "./login.php";
        }
    
  }



?>