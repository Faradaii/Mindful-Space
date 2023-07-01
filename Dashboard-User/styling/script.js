const checkboxes = document.querySelectorAll('input[type=radio]');
const labels = document.querySelectorAll('label');
const fasilitas = document.querySelector('.fasilitas__check');
const layanan = document.querySelector('.layanan__check');
const underline = document.querySelector('.underline');

window.onload = function() {
    console.log("scroll");
    var scrollContainer = document.querySelector("#scrollContainer");
    scrollContainer.scrollTop = scrollContainer.scrollHeight;
};

document.body.addEventListener('click', function(event) {
  
    for (let i = 0; i < checkboxes.length; i++) {
        
        if (event.target !== checkboxes[i] || event.target == labels[i]) {

            checkboxes[i].checked = false;
            
        }

    }

});

const editbutton = document.querySelector("#editbutton");
const editgender = document.querySelector("#gender"); 
const disabled = document.querySelectorAll("#inputbutton");
const labelButton = document.querySelector(".save-button")
const filebutton = document.querySelector("#change__profile");
editbutton.addEventListener("click", () => {
    filebutton.disabled =false;
    editgender.disabled = false;
    disabled.forEach(element => {
        element.disabled = false;
    });
    editbutton.value = "Save";
    console.log(labelButton)
    editbutton.style.backgroundColor = '#32cd32';
    setTimeout(() => {
        editbutton.setAttribute("type", "submit");
    }, 1000);
    labelButton.append(editbutton);
    });
    console.log(disabled);

