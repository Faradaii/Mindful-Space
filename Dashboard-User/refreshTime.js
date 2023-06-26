//nama file perlu diganti karna ambigu

var statuskonsultasihidden = document.querySelector("#statuskonsultasihidden");

function updateStatus() {
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            statuskonsultasihidden.value = this.responseText;
        }
    };
    var event = new Event('change');
    statuskonsultasihidden.dispatchEvent(event);
    
    xhttp.open("GET", "realtime.php", true);
    xhttp.send();

}


// const statuskonsultasi = document.querySelector('#statuskonsultasihidden');

statuskonsultasihidden.addEventListener("change", ()=>{
    let urlsekarang = window.location.href;
    var lastPath = urlsekarang.substring(urlsekarang.lastIndexOf('/')+1);
    if (lastPath != 'chat.php') {
        if (statuskonsultasihidden.value == 'konsultasi'){
            window.location = 'chat.php';
        }
    } else {
        let formclearsession = document.querySelector("#clearSessionChat");
        if (statuskonsultasihidden.value == 'selesai'){
            formclearsession.submit();
        }
    }

});


setInterval(updateStatus, 1000);


