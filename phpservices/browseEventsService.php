<?php

    

    $sort = $_GET['sortBy'];

    if($sort == "") {
        echo "<p>INPUT ERROR</p>";
        exit;
    }
    else {
        
        //connect to DB
        require("./phpservices/connectDB.php");
        $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);
        
        if(!$link) {
            echo "<p>ERROR CONNECTING TO DATABASE</p>";
            exit;
        }
        else{
            
            $sqlSTMT
            
            if($sort == "activity") {
                $sqlSTMT = querySelect($sort);
                
            }
            
            else if ($sort == "location") {
                $sqlSTMT = querySelect($sort);
                
            }
            
            else {
                
                
            } //end selecting the query to run
            
            if ($stmt = mysqli_prepare($link, $sqlSTMT)) {
                //mysqli_stmt_bind_param($stmt, "s", $user);
                
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
                    
                }

            }
            else {
                echo '<h3>Something broke!</h3>';
            }
            
            
            
            
            
            
            
        } //end if(!$link)
        

        
    }



    function querySelect($input) {
        
        $queryReturn;
        
        if($input == 'activity'){
            $queryReturn = '';
            return $queryReturn;
        }
        
        else if ($input == 'location') {
            $queryReturn = '';
            return $queryReturn;
        }
        
        else {
            $queryReturn = '';
            return $queryReturn;
            
        }
        
        
        
        
    } // end of querySelect($input)


    function formatEventDetails($eventID, $event, $location, $time, $date) {
        
        //$eventID = 70;
        //$event = 'Soccer';
        //$location = 'Field 1';
        //$time = '7:30pm';
        //$date = '11/14/17';
        
        $returnString = '
        
            <div class="col-md-5">
                <form role="form" action="./phpservices/countMeIn.php" method="POST">
                    <input type="hidden" name="eventID" value="'.$eventID.'">

                    <h3>'. $event .'</h3>
                    <ul>
                        <li>Date:'.$date.'</li> 
                        <li>Time:'.$time.'</li>
                        <li>Location:'.$location.'</li>
                    </ul>

                    <button type="submit" class="btn btn-primary">Count Me In!</button>

                </form>
            </div>
        
        ';
            
    }














?>