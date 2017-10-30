function sortEvents(str) {
    
    console.log(str);
    
    document.getElementById("eventDisplay").innerHTML = '<p>Loading:<i class="fa fa-spinner fa-spin"</p>';
    
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("eventDisplay").innerHTML = this.responseText;  
      }

    };
    xmlhttp.open("GET", "./phpservices/browseEventsService.php?sortBy=" + str, true);
    xmlhttp.send();
      
}