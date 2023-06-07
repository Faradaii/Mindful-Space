/**
 * TOLONG JANGAN DIUBAH - UBAH
 */

const radio = document.querySelectorAll('input[name=total]')
const label = document.querySelectorAll('.radio__label')
const defaultCheckedLabel = document.getElementById('label__user')

defaultCheckedLabel.style.backgroundColor = 'var(--main-blue)'
defaultCheckedLabel.style.color = 'white'
defaultCheckedLabel.style.boxShadow = '0 0 10px 1px var(--main-blue)'

// Iterasi ke setiap input type=radio name=total
for (let i = 0; i < radio.length; i++) {

    radio[i].addEventListener('change', function() {

        if (this.checked) {

            console.log('check')
            
            // Mengganti label selain label[i] seperti styling semula
            for (let j = 0; j < radio.length; j++) {
                if (j !== i) {
                    label[j].style.backgroundColor = ''
                    label[j].style.color = ''
                    label[j].style.boxShadow = ''
                }
            }
            
            label[i].style.backgroundColor = 'var(--main-blue)'
            label[i].style.color = 'white'
            label[i].style.boxShadow = '0 0 10px 1px var(--main-blue)'

        }

    })

}

