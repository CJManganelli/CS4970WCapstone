<?php
///*
    session_start();

    //grab the SESSION variables we need for this
    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];


    //now for the POST
    $when = $_POST['dateTime'];
    $what = $_POST['activity'];
    $where = $_POST['location'];

    $whatExpl = explode('|', $what);
    $whatText = $whatExpl[1];
    $whatVal = $whatExpl[0];

    $whereExpl = explode('|', $where);
    $whereText = $whereExpl[1];
    $whereVal = $whereExpl[0];
///*

////Debugging bullshit////////////
/*
    $username = 'admin';
    $userID = 4;


    //now for the POST
    $when = '2017-11-14 00:00:00';
    //$what = $_POST['activity'];
    //$where = $_POST['location'];

    //$whatExpl = explode('|', $what);
    $whatText = 'Stuff';
    $whatVal = 1;

    //$whereExpl = explode('|', $where);
    $whereText = 'fuckingwork';
    $whereVal = 2;
*/
//////////////////////////////////



    print $username;
    print '<br>';
    print $userID;
    print '<br>';
    print $when;
    print '<br>';
    print $what;
    print '<br>';
    print $where;




    require("./connectDB.php");
    $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);


    if(!$link) {
        print '<p>database error!</p>';
        print '<a href="../createEvent.php">Try Again!</a>';
    }
    else {
        
        
        
        
        $sql ='
            INSERT INTO event (
                name,
                eventTime, 
                locationId, 
                hostId, 
                typeId
                )
            VALUES (?, ?, ?, ?, ?);
        ';
        
        // $whatText
        // $when
        // $whereVal
        // $userID
        // $whatVal
        
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssiii", $whatText, $when, $whereVal, $userID, $whatVal);
        
        
        if(mysqli_stmt_execute($stmt)) {
            print "<h2>Success!</h2>";
            print '<a href="../index.php">Go Home!</a>';
            
        }
        else {
            print '<p>Something Broke!</p>';
            print '<a href="../createEvent.php">Try Again!</a>';
        }
        
        
        
        
        
        
        
        
    } // end if(!$link)






?>