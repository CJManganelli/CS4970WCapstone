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
            echo "<p>Location</p>";
        }
        
        else {
            echo "<p>Ehh, The AJAX still worked</p>";
        }
        
    }
















?>