const available = document.querySelector('#available__status');
const dropdown = document.querySelector('#dropdown__setting');

const labelAvailable = document.querySelector('label[for=available__status]');

const availabilityText = document.querySelector('.available__status');

const iDropdown = document.querySelector('.dropdown__setting');

/**
 * ON LOAD STATE
 * 
 * Nanti kondisi checked available nya bisa di simpan di database
 * habis itu di echo di input[type=checkbox] nya lewat php.
 */
if (available.checked) {

    labelAvailable.style.backgroundColor = 'var(--main-green)';

    availabilityText.innerHTML = 'Available';
    availabilityText.style.color = 'var(--main-green)';
    
} else {

    labelAvailable.style.backgroundColor = 'var(--main-red)';

    availabilityText.innerHTML = 'Unavailable';
    availabilityText.style.color = 'var(--main-red)';

}

function dropdownStatus() {
        
    if (dropdown.checked) {
        
        iDropdown.style.transform = 'rotate(180deg)';
    
    } else {
    
        iDropdown.style.transform = '';
    
    }

}

dropdown.addEventListener('change', dropdownStatus);

available.addEventListener('change', function() {
    
    if (available.checked) {

        labelAvailable.style.backgroundColor = 'var(--main-green)';

        availabilityText.innerHTML = 'Available';
        availabilityText.style.color = 'var(--main-green)';
        availabilityText.style.fontSize = '';

    } else {

        labelAvailable.style.backgroundColor = 'var(--main-red)';

        availabilityText.innerHTML = 'Unavailable';
        availabilityText.style.color = 'var(--main-red)';

    }

});

const editbutton = document.querySelector("#editbutton");
const disabled = document.querySelectorAll("#inputbutton");
const labelButton = document.querySelector(".save-button")
const filebutton = document.querySelector("#inputbuttonfile");
editbutton.addEventListener("click", () => {
    filebutton.disabled = false;
    disabled.forEach(element => {
        element.disabled = false;
    });
    labelButton.innerHTML = "Save";
    console.log(labelButton)
    labelButton.style.backgroundColor = '#32cd32';
    setTimeout(() => {
        editbutton.setAttribute("type", "submit");
    }, 1000);
    labelButton.append(editbutton);
    });
    console.log(disabled);

const label_image = document.querySelector("#name_image");

console.log(filebutton);
filebutton.addEventListener("change", () => {
    label_image.innerHTML = filebutton.files[0].name
});