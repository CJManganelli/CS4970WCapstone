<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">
      
    <!-- Custom CSS and JS -->
    <link href="./css/customCSS.css" rel="stylesheet">
    <script src="./javascript/formCheck.js"></script>
    <script>
      function submitText() {
        
        var str1 = document.getElementById("pwd").value;
        var str2 = document.getElementById("pwdCnfm").value;
        
        console.log(str1);
        console.log(str2);
          
          
        formCheck(str1, str2);
          
        
      };
      
    </script>

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
      <h1 class="my-4">Sign Up Today!:
        <small></small>
      </h1>
        
      <div class="row">
        
        <div class="col-md-5">
            <form role="form" action="./phpservices/login-handler.php" method="POST">

            <input type="hidden" name="action" value="register">
                
            <div class="form-group">
              <label for="user">First Name:</label>
              <input type="user" name="fName" class="form-control" id="fName">
            </div>  
            <div class="form-group">
              <label for="user">Last Name:</label>
              <input type="user" name="lName" class="form-control" id="lName">
            </div>
            <div class="form-group">
              <label for="user">Username:</label>
              <input type="user" name="username" class="form-control" id="user">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" name="password" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="pwdCnfm">Confirm:</label>
              <input type="password" name="confirm" class="form-control" onkeyup="submitText()" id="pwdCnfm">
            </div>
            <div class="form-group" id="passMatch"></div>
            
            <?php
                $error = $_SESSION['regError'];
                        
                if($error) {
                    print "<div class='alert alert-warning'>$error</div>\n";
                    $_SESSION['regError'] = NULL;

                }
                else {
                    //echo '<p>message should go here</p>';
                }
            ?>

            <button type="submit" class="btn btn-default disabled" id="registerBtn">Register</button>
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