<?php
  echo "Hello<br>";

  //require './phpservices/connectDB.php';

  $SQLUSER = "queryUser";

  $SQLPASS = "WLMd8K0DxnRhk3gH";

  $SQLHOST = "localhost";

  $SQLDB = "mydb";



  echo "Hello again<br>";
/*
  $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

  if($username) {
    header("Location : ./index.php");
    exit;    
  }
*/
  //$action = empty($_POST['action']) ? '' : $_POST['action'];
  
  //$action = $_POST['action'];

  //$action = 'login';

  //echo $action . '<br>';

  logIn();

  
  function logIn() {
      
        //connect to db
        echo 'inside login()<br>';

        //require './phpservices/connectDB.php';
      
        global $SQLHOST, $SQLUSER, $SQLPASS, $SQLDB;
      
      
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

        if (!$link) {
            echo 'fuuuuuuuuuuuuuuuu<br>';
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            sendback("Error Connecting to Database!", "login");
        }
        else {
            
            echo 'Hello?';

            $username = empty($_POST['username']) ? '' : $_POST['username'];
            $password = empty($_POST['password']) ? '' : $_POST['password'];
            
            
            
            ///* This is temporary while I wait for authentication queries
            //  However, possibly make this just an if($verified === true) after comparing with DB
            
            //$username = 'admin';
            //$password = 'password';
            
            
            //Define the query
            $sql = '
            
                SELECT
                    id as userID,
                    fName,
                    lName,
                    passhash
                FROM
                    profile
                WHERE
                    username = ?;
            
            ';
            
            //prepare
            
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $username);
                
                //execute
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    $array = mysqli_fetch_assoc($result);

                    $dbPass = $array['passhash'];
                    $userID = $array['userID'];
                    $fName = $array['fName'];
                    $lName = $array['lName'];
                    
                    

                    if(password_verify($password, $dbPass)) {
                        echo '<h1>It works!</h1>';
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['userID'] = $userID;
                        header("Location: ../index.php");
                        exit;
                    }
                    else {
                        echo '<h1>Something broke!</h1>';
                        sendBack('Invaild username or password!<br>Please try again.', 'login');

                    }

                }
                else {
                    echo '<h3>Something Broke!</h3>';
                    echo '<a href="./login.php" class="btn btn-info">Back</a>';
                }

            }
            else {
                echo 'fuck the police, coming straight from the underground';
            }
            
        
            
            
            
            
            
            /*
            if($username == 'admin' && $password == 'password'){
                echo '<h1>It works!</h1>';
                session_start();
                $_SESSION['username'] = $username;
                header("Location: ../index.php");
                exit;
            }
            else {
                echo '<h1>Something broke!</h1>';
                sendBack('Invaild username or password!<br>Please try again.', 'login');
                
            }
            */
            
            //*/
            
            
            /*
            $sql = ''; // query goes here.
            
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $user);

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    $array = mysqli_fetch_assoc($result);

                    //$dbPass = $array['hashed_password'];          

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
            
            */

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
      
      echo 'I should not be here<br>';
  }


  function sendBack($errorText, $page) {
    
 		$username = "";
		$error = $errorText;
      
        if($page == "login") {
          session_start();
          $_SESSION['authError'] = $error;
          header("Location: ../login.php");
          exit;
            
		  //require "../login.php";
          
        }
        else if ($page == "register") {
            session_start();
            $_SESSION['authError'] = $error;
            header("Location: ../register.php");
            exit;
        }
        else {
            require "/login.php";
        }
    
  }



?>