<?php  

  echo "Hello<br>";

  //require './phpservices/connectDB.php';

  $SQLUSER = "queryUser";

  $SQLPASS = "WLMd8K0DxnRhk3gH";

  $SQLHOST = "localhost";

  $SQLDB = "mydb";



  echo "Hello again<br>";


  register();




function register() {
      
      
      
      /*
      print $user;
      print '<br>';
      print $password;
      print '<br>';
      print $fName;
      print ' ';
      print $lName;
      */
      
        print 'ayyyyyyy';
    

      
        global $SQLHOST, $SQLUSER, $SQLPASS, $SQLDB;
    
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

    
        if (!$link) {
            echo 'fuuuuuuuuuuuuuuuu<br>';
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            sendback("Error Connecting to Database!", "register");
        }
        else {
            
          /*  
          $user = 'testuser';
          $password = 'qwerty123';
          $fName = 'jason';
          $lName = 'test';
          */
            
          $user = empty($_POST['username']) ? '' : $_POST['username'];
          $password = empty($_POST['password']) ? '' : $_POST['password'];
          $fName = empty($_POST['fName']) ? '' : $_POST['fName'];
          $lName = empty($_POST['lName']) ? '' : $_POST['lName'];
      
          $hashedpass = password_hash($password, PASSWORD_BCRYPT);


          $query = '
                    INSERT into profile (
                        username,
                        fName,
                        lName,
                        passhash
                        ) 
                        VALUES (?,?,?,?);

                    '; //waiting on a query

        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $user, $fName, $lName, $hashedpass);    
            
          if(mysqli_stmt_execute($stmt)) {
              session_start();
              $_SESSION['authError'] = 'Welcome aboard! Please Sign in to get your Game-On!';
              header("Location: ../register.php");
              exit;
          }
          else {
              sendback('Something Broke!', 'register');
          }
            
         /* 
          if ($stmt = msqli_prepare($link, $query)) {
              mysqli_stmt_bind_param($stmt, "ssss", $user, $fName, lName, $hashedpass);

              if(mysqli_stmt_execute($stmt)) {
                  echo '<div class = "alert alert-success"><h3>Success!</h3></div>';
                  echo '<a href="../login.php" class="btn btn-info">Login</a>';
              }
              else {
                  sendback('Something Broke!', 'register');
              }
          }
          else {
              echo '<h3>Something Broke!</h3>';
              echo '<a href="./register.php" class="btn btn-info">Back</a>';
          }*/

      } //end of if(!$link)
    
}

  function sendBack($errorText, $page) {
    
 		$username = "";
		$error = $errorText;
          
        
            session_start();
            $_SESSION['authError'] = $error;
            header("Location: ../register.php");
            exit;
        
       
  }




?>