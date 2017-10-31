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
            
            
            
            
            
            
            
            
            
        } //end if(!$link)
        
        
        
        
        
        
        
        
        
        
        
        
        /*if($sort == "activity") {
            echo "<p>Activity</p>";
        }
        
        else if($sort == "location") {
            echo '
                <div class="col-md-4 col-md-offset-5">
                  <h3>Event One</h3>
                  <ul>
                    <li>Date:</li> 
                    <li>Time:</li>
                    <li>Location:</li>
                  </ul>
                  <a class="btn btn-primary" href="#">Count Me In!</a>
                </div>
            ';
        }
        
        else {
            echo "<p>Ehh, The AJAX still worked</p>";
        }*/
        
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














?>