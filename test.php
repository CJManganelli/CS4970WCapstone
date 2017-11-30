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


    $dateTime = '2017-11-14 00:00:00';
    $dtArray = explode(' ', $dateTime);
        
    $date = $dtArray[0];
    $time = $dtArray[1];
    
    echo $date .' '. $time;

    







?>