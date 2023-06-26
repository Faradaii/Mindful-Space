const formbuttonback = document.querySelector("#backbutton");
const time = document.querySelector("#time");

let count = 3600;

setInterval(() => {
    date = new Date(0);
    date.setSeconds(count); 
    count = count - 1;
    const hhmmssFormat = date.toISOString().substring(11,19);
    time.innerText = hhmmssFormat;
}, 1000);

setTimeout(() => {
    formbuttonback.submit();
}, 3601000);