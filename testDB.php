<?php



    $option = 'activity';

    if($option == 'activity'){
        print 'yo';
        $sql = 'SELECT name FROM event;';
    }
    else if ($option == 'location') {
        $sql = 'SELECT name FROM location;';
    }
    else {
        $sql = '';
    }

    require("./phpservices/connectDB.php");
    $link = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

    if(!$link) {
        print '<option>database error! (!$link)</option>';
    }
    else {

        //execute
        if($result = mysqli_query($link, $sql)) {
            

            $formatedResults = '';

            while($row = $result->fetch_array(MYSQLI_NUM)){
                print '<option>'.$row[0].'</option>';
            }


        }
        else {

            print '<option>database error! (!execute)</option>';


        } //if(mysqli_stmt_execute($sql))



    } // end if(!$link)








?>