<?php

    session_start();

    //grab the SESSION variables we need for this
    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];


    //now for the POST
    $when = $_POST['dateTime'];
    $what = $_POST['activity'];
    $where = $_POST['location'];




?>