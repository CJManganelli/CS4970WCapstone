<?php



    $sqlSTMT = '
                SELECT 
                    event.id AS eventID,
                    event.name AS event, 
                    event.eventTime AS dateTime, 
                    location.name AS location, 
                    location.address AS address, 
                    type.name AS name
                FROM 
                    event INNER JOIN location ON event.locationId = location.id INNER JOIN type ON event.typeId = type.id
                ORDER BY 
                    location.name ASC;

 
    ';
    
    require("./phpservices/connectDB.php");

    $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);


    if(!$link) {
        echo 'No link';
        exit;
    }
    else {
        
        if($result = mysqli_query($link, $sqlSTMT)) {
            
            $formattedStr = '';
            
            while($row = mysqli_fetch_assoc($result)){
                
                $eventID = $row['eventID'];
                $event = $row['event'];
                $name = $row['name'];
                $location = $row['location'];
                $dateTime = $row['dateTime'];
                
                /*
                print $eventID;
                print ' ';
                print $event;
                print ' ';
                print $name;
                print ' ';
                print $location;
                print ' ';
                print $dateTime;
                */
                
                $new_dateTime = explode(" ",$dateTime);
        
                $time = $new_dateTime[0];
                $date = $new_dateTime[1];
                
                
                
                $formattedStr .= '
                
                <div class="col-md-5">
                    <form role="form" action="./phpservices/countMeIn.php" method="POST">
                        <input type="hidden" name="eventID" value="'.$eventID.'">

                        <h3>'. $name .'</h3>
                        <ul>
                            <li>What?:'.$event.'</li>
                            <li>When?:'.$date.' @ '.$time.'</li> 
                            <li>Where?:'.$location.'</li>
                        </ul>

                        <button type="submit" class="btn btn-primary">Count Me In!</button>

                    </form>
                </div>
                
                ';
            }
            echo $formattedStr;
            echo 'done!';
            exit;
            
        }
        else {
            echo 'query did not run';
            exit;
        }
        
        
        
        
    }


    function formatEventDetails($eventID, $event, $name, $location, $dateTime) {
        
        $dtArray = explode(" ", $dateTime);
        
        $date = $dtArray[0];
        $time = $dtArray[1];
        
        $returnString = '
        
            <div class="col-md-5">
                <form role="form" action="./phpservices/countMeIn.php" method="POST">
                    <input type="hidden" name="eventID" value="'.$eventID.'">

                    <h3>'. $name .'</h3>
                    <ul>
                        <li>What?:'.$event.'</li>
                        <li>When?:'.$date.' @ '.$time.'</li> 
                        <li>Where?:'.$location.'</li>
                    </ul>

                    <button type="submit" class="btn btn-primary">Count Me In!</button>

                </form>
            </div>
        
        ';
            
    }

?>