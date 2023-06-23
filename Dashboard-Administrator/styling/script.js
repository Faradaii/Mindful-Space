/**
 * TOLONG JANGAN DIUBAH - UBAH
 */

// const currentChecked = localStorage.getItem('checkedInput')
const radio = document.querySelectorAll('input[name=total]')
const label = document.querySelectorAll('.radio__label')
// const defaultCheckedLabel = document.querySelector('input[name=total].checked ')

// defaultCheckedLabel.style.backgroundColor = 'var(--main-blue)'
// defaultCheckedLabel.style.color = 'white'
// defaultCheckedLabel.style.boxShadow = '0 0 10px 1px var(--main-blue)'

// Iterasi ke setiap input type=radio name=total
// for (let i = 0; i < radio.length; i++) {

//     radio[i].addEventListener('change', function() {

//         if (this.checked) {

//             console.log('check')
            
//             // Mengganti label selain label[i] seperti styling semula
//             for (let j = 0; j < radio.length; j++) {
//                 if (j !== i) {
//                     label[j].style.backgroundColor = ''
//                     label[j].style.color = ''
//                     label[j].style.boxShadow = ''
//                 }
//             }
            
//             label[i].style.backgroundColor = 'var(--main-blue)'
//             label[i].style.color = 'white'
//             label[i].style.boxShadow = '0 0 10px 1px var(--main-blue)'

//         }

//     })

// }

const radioUser = document.querySelector("#total__user");
const radioDokter = document.querySelector("#total__dokter");
const labelUser = document.querySelector("#label__user");
const labelDokter = document.querySelector("#label__dokter");

function changecolor(a, b){
    a.style.backgroundColor = 'var(--main-blue)'
    a.style.color = 'white'
    a.style.boxShadow = '0 0 10px 1px var(--main-blue)'
    b.style.backgroundColor = ''
    b.style.color = ''
    b.style.boxShadow = ''

}

const currentUrl = window.location.href;
console.log(currentUrl)
const params = new URLSearchParams(window.location.search);

if (params.get("show") == 'user') {
    changecolor(labelUser, labelDokter);
} else if (params.get("show") == 'dokter'){
    changecolor(labelDokter, labelUser);
}


radioDokter.addEventListener("change", () => {
    window.location = window.location.pathname + "?show=dokter";
});

radioUser.addEventListener("change", () => {
    window.location = window.location.pathname + "?show=user";
});
