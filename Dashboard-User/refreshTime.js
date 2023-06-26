
function updateTime() {
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    
    xhttp.open("GET", "realtime.php", true);
    xhttp.send();
}
updateTime();
setInterval(() => {
    updateTime();
}, 1000);

  