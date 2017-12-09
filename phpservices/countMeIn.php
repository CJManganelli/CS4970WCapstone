<?php

    //take in eventID from an event box and userID from the SESSION
    session_start();

    $eventID = $_POST['eventID'];
    $user = $_SESSION['username'];
    $userID = $_SESSION['userID'];

    print $eventID;
    print '<br>';
    print $user;
    print '<br>';
    print $userID;

//insert into rsvp (userID, eventID) values (?,?);


    require("./connectDB.php");
    $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);


    if(!$link) {
        print '<p>database error!</p>';
        print '<a href="../index.php">Try Again!</a>';
    }
    else {
        
        $sql = 'insert into rsvp (userID, eventID) values (?,?);';
        
        
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $userID, $eventID);
        
        
        if(mysqli_stmt_execute($stmt)) {
            print "<h2>Success!</h2>";
            print '<a href="../index.php">Go Home!</a>';
            
        }
        else {
            print '<p>Something Broke!</p>';
            print '<a href="../index.php">Try Again!</a>';
        }
        
        
        
        
    }






?>





<?php

    function formatEventDetails($result) {
        
        $eventID = 70;
        $event = 'Soccer';
        $location = 'Field 1';
        $time = '7:30pm';
        $date = '11/14/17';
        
        print '
        
            <div class="col-md-5">
                <form role="form" action="./phpservices/countMeIn.php" method="POST">
                    <input type="hidden" name="event" value="'.$eventID.'">

                    <h3>'. $event .'</h3>
                    <ul>
                        <li>Date:'.$date.'</li> 
                        <li>Time:'.$time.'</li>
                        <li>Location:'.$location.'</li>
                    </ul>

                    <button type="submit">Count Me In!</button>

                </form>
            </div>
        
        ';
        
        
        
        
    }





?>