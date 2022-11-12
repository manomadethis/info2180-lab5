document.addEventListener('DOMContentLoaded', function(){
    
    document.getElementById("lookup").addEventListener('click',(event) => {
        event.preventDefault();
        httpRequest=new XMLHttpRequest();
              
        httpRequest.onreadystatechange = function(){
        if (httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200) {
            document.getElementById("result").innerHTML = httpRequest.responseText;
            }
            if ( httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 404) {
            alert("ERROR:");
            }
                
        }
            httpRequest.open("GET","http://localhost/info2180-lab5/world.php?country=" + (document.getElementById("country").value), true);
            httpRequest.send();
      
        });
          
    document.getElementById("lookup_cities").addEventListener('click',(event) => {
        event.preventDefault();
        httpRequest = new XMLHttpRequest();
      
        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
                document.getElementById("result").innerHTML=httpRequest.responseText;
                }
            if( httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 404){
                alert("ERROR:");
                }
                
            }
            httpRequest.open("GET", "http://localhost/info2180-lab5/world.php?country=" + (document.getElementById("country").value) + "context=cities", true);;
            httpRequest.send();
      
        });
          
    }, false);