const formbuttonback = document.querySelector("#backbutton");

const timer = document.querySelector("#time");
function updateTimer() {
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            timer.innerText = this.responseText;
            if(timer.innerText == 'selesai'){
                formbuttonback.submit();
            }
        }
    };

    xhttp.open("GET", "scriptTimer.php", true);
    xhttp.send();

}

setInterval(updateTimer, 1000);

