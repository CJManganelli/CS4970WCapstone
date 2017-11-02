function formCheck(str1, str2) {
    
    console.log(str1);
    
    //document.getElementById("passMatch").innerHTML = '<p>Loading:<i class="fa fa-spinner fa-spin"</p>';
    
    if(str1 != str2) {
            document.getElementById("registerBtn").className="btn btn-default disabled";
            document.getElementById("passMatch").innerHTML = '<p>Passwords do not match</p>';
            
    } 
    else {
        if(checkReqs(str1)) {
            document.getElementById("registerBtn").className="btn btn-default";
            document.getElementById("passMatch").innerHTML = '';

        }
        else {
            document.getElementById("registerBtn").className="btn btn-default disabled";
            document.getElementById("passMatch").innerHTML = '<p>Password must be 8-10 characters long.</p>';

        }
    }
    

      
}

function checkReqs(str) {
    if(str.length > 7) {
        if(str.length < 11) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}