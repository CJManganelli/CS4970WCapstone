<?php

    
    //$sort = 'activity';
    $sort = $_GET['sortBy'];

    if($sort == "") {
        echo "<p>INPUT ERROR</p>";
        exit;
    }
    else {
        
        //connect to DB
        require("./connectDB.php");
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);
        
        if(!$link) {
            echo "<p>ERROR CONNECTING TO DATABASE</p>";
            exit;
        }
        else{
            
            $sqlSTMT = '';
            
            if($sort == "activity") {
                $sqlSTMT = querySelect($sort);
                
            }
            
            else if ($sort == "location") {
                $sqlSTMT = querySelect($sort);
                
            }
            
            else {
                echo 'I really should not be here.';
                
            } //end selecting the query to run
            
            if ($result = mysqli_query($link, $sqlSTMT)) {
                
                //echo 'am I here?';
                
                $formattedStr = '';
                
                while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                    $eventID = $row['eventID'];
                    $event = $row['event'];
                    $name = $row['name'];
                    $location = $row['location'];
                    $dateTime = $row['dateTime'];
                    
                    $new_dateTime = explode(" ",$dateTime);
        
                    $time = $new_dateTime[0];
                    $date = $new_dateTime[1];

                    //add row to the return
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
                exit;
                
                
                /* I don't need this... maybe
                //execute
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    
                    $formatedStr = ''; //AJAX return
                    
                    while($array = mysqli_fetch_assoc($result)) {
                        
                        $eventID = '';
                        $name = '';
                        $location = '';
                        $date = '';
                        $time = '';
                        
                        //add row to the return
                        $formatedStr .= formatEventDetails($eventID, $event, $location, $time, $date);
                        
                        
                    }
                    
                    
                    //return preformatted string
                    echo $formatedStr;
                    
                    //$eventID
                    //$name
                    //$location
                    //$date
                    //$time
                    
                    

                            


                }
                else {
                    echo '<h3>Something Broke!</h3>';
                    
                }*/ //I don't need this... maybe

            }
            else {
                echo '<h3>Something broke!</h3>';
            }
            
             
            
        } //end if(!$link)
        

        
    }



    function querySelect($input) {
        
        $queryReturn;
        
        if($input == 'activity'){
            $queryReturn = '
            
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
                    type.name ASC;
            
            ';
            return $queryReturn;
        }
        
        else if ($input == 'location') {
            $queryReturn = '
            
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
            return $queryReturn;
        }
        
        else {
            $queryReturn = '';
            return $queryReturn;
            
        }
        
        
        
        
    } // end of querySelect($input)


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