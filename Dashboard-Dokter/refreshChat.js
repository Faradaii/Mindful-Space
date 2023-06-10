
function updateChat() {
    var elem = document.getElementById('chatAutoRefresh');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        elem.innerHTML = this.responseText;
        console.log(this.responseText);
        }
    };
    xhttp.open("GET", "scriptChat.php", true);
    xhttp.send();
}

setInterval(() => {
    updateChat();
}, 1000);

  