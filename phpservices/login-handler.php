<?php
  //print "Hello";

  $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

  if($username) {
    header("Location : index.php");
    exit;    
  }

  $action = empty($_POST['action']) ? '' : $_POST['action'];


  if($action == 'continue') {
    logIn();
  }
  else {
    sendBack();
  }

  function logIn() {
      
        //connect to db
        
        $link = mysqli_connect("localhost", "root", "my_password", "my_db"); // change shit

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            sendback("Error Connecting to Database!");
        }
        else {
            
        

            $username = empty($_POST['username']) ? '' : $_POST['username'];
            $password = empty($_POST['password']) ? '' : $_POST['password']; 

            //search for entered username
            //if valid, continue. if not, gtfo.
            //pull: user, hashedpass, permLevel, and hash from db
            //hash entered password
            //compare passwords


            if ($username == "test" && $password == "pass") {
                setcookie('username', $username);
                header("Location: index.php");
                exit;
            } else {
                $error = 'Incorrect username or password. Please try again.';
                require "login.php";
            }		    

        }
  }

  function sendBack($errorText) {
    
 		$username = "";
		$error = $errorText;
		require "login.php";
    
  }



?>