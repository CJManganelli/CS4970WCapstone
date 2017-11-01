function formCheck(str1, str2) {
    
    console.log(str);
    
    //document.getElementById("passMatch").innerHTML = '<p>Loading:<i class="fa fa-spinner fa-spin"</p>';
    
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        
      if(this.readyState == 4 && this.status == 200) {
          
        $response = this.responseText;
          
        /*
            -php service will check for:
                1. Both passwords match
                2. password meets password requirements
                
            -then return different strings
                1. 'accepted': text fields match and meets the password requirements
                2. 'noMatch': text fields don't match
                3. 'noReqs': password does not meet the requirements
        
        */
          
        if($response == 'accepted') {
            document.getElementById("registerBtn").className="btn btn-default";
            document.getElementById("passMatch").innerHTML = '';
        }
        else if ($response == 'noMatch'){
            document.getElementById("registerBtn").className="btn btn-default disabled";
            document.getElementById("passMatch").innerHTML = '<p>Passwords do not match</p>';
            
        }
        else if ($response == 'noReqs') {
            document.getElementById("registerBtn").className="btn btn-default disabled";
            document.getElementById("passMatch").innerHTML = '<p>Password must be 8-10 characters long.</p>';
            
        }
        else {
            document.getElementById("registerBtn").className="btn btn-default disabled";
            document.getElementById("passMatch").innerHTML = '<p>Should Not Be Here</p>';
        }
          
         
      }

    };
    xmlhttp.open("POST", "./phpservices/formCheck.php?pass=" + str1 + "&check=" + str2, true);
    xmlhttp.send();
      
}

