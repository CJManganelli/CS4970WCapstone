<?php

    //take in eventID from an event box and userID from the SESSION
    session_start();

    $eventID = $_POST['eventID'];
    $user = $_SESSION['username'];

    print $eventID;
    print '<br>';
    print $user;

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