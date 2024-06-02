import {
    validateName,
    validateInput,
    validateSelect
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const createBLotterBtn = $('.submit-new-blotter-btn')

createBLotterBtn.click(function (e) 
{  
    e.preventDefault()

    let validDate = validateInput($('#dat-date'), $('.d-err'))
    let validTime = validateInput($('#dat-time'), $('.t-err'))
    let validCmplnt = validateName($('#complainant'), $('.cp-err'))
    let validRspndnt = validateName($('#respondent'), $('.re-err'))
    let validCmplntAdd = validateInput($('#complainant-add'), $('.ca-err'))
    let validRspndntAdd = validateInput($('#respondent-add'), $('.ra-err'))
    let validNOC = validateInput($('#nature-of-complaint'), $('.nc-err'))
    let validStatus = validateSelect($('#status'), $('.st-err'))

    if (validDate && validTime && validCmplnt && validRspndnt && validCmplntAdd && validRspndntAdd && validNOC && validStatus)
    {
        $('#new-blotter-from').submit()
    }
})