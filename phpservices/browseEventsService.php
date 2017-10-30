<?php


    $sort = $_GET['sortBy'];

    if($sort == "") {
        echo "<p>Error</p>";
    }
    else {
        
        if($sort == "activity") {
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
        }
        
    }
















?>