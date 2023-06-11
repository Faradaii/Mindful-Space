const checkboxes = document.querySelectorAll('input[type=radio]');
const labels = document.querySelectorAll('label');
const fasilitas = document.querySelector('.fasilitas__check');
const layanan = document.querySelector('.layanan__check');
const underline = document.querySelector('.underline');

document.body.addEventListener('click', function(event) {
  
    for (let i = 0; i < checkboxes.length; i++) {
        
        if (event.target !== checkboxes[i] || event.target == labels[i]) {

            checkboxes[i].checked = false;
            
        }

    }

});