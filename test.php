<?php
/*
require './phpservices/connectDB.php';


print $SQLUSER;
print "<br>";

print $SQLHOST;
print "<br>";

print $SQLPASS;
print "<br>";

print $SQLDB;
print "<br>";

$password = 'password';
$hardCode = '$2y$10$Ig2vrkrMSFr1HuN5MvrNQOOvCl8/d16RufFO1tUDhnHD6Wel8AQIe';


$newPass = 'capstone';
$newHash = password_hash($newPass, PASSWORD_BCRYPT);

print 'new pass: ' . $newHash . '<br>';


print 'password is: ' . $password . '<br>';

$hashPass = password_hash($password, PASSWORD_BCRYPT);

print 'hashed password is: ' . $hashPass . '<br>';

print '<br>';

$link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

if(!$link){
    print 'it broke<br>';
}
else{
    print 'connected<br>';
}


if(password_verify($password, $hardCode)) {
    print 'verified<br>';
}
else {
    print 'fuck this project<br>';
}
*/

/*
    $dateTime = '2017-11-14 00:00:00';
    $dtArray = explode(' ', $dateTime);
        
    $date = $dtArray[0];
    $time = $dtArray[1];
    
    echo $date .' '. $time;

    
*/






?>

<!DOCTYPE html>
<html>

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
    
<hr>



<div class='row'>
            <div class='col-md-4 col-md-offset-5'>
                <form action="./test.php" method="POST">
                    
                    <div class='form-group'>
                         
                        
                    <select class='form-control'>
                        <option value='1'>Hello<input type='hidden' name='nameText' value='hello'></option>
                        <option value='4'>Hello<input type='hidden' name='nameText' value='helkj'></option> 
                    </select>
                        
                    <button type="submit" class="btn btn-primary">Game On!</button>

                    </div> <!-- /form-group -->        
                </form>
            </div> <!-- /column -->
        
        </div> <!-- /row -->


    
    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>