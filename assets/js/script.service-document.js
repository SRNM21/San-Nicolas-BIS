import {
    validateName,
    validatePhonenum,
    validateBirthdate,
    validateEmail,
    validateSelect,
    validateInput,
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const submitBtn = $('#sbm-btn')

submitBtn.click(function(e)
{
    e.preventDefault()

    let validLName = validateName($('.lastname'), $('.ln-err'))
    let validFName = validateName($('.firstname'), $('.fn-err'))
    let validMName = validateName($('.middlename'), $('.mn-err'))
    let validBDay = validateBirthdate($('.birthdate'), $('.bd-err'))
    let validYOR = validateInput($('.y-of-res'), $('.yr-err'))
    let validPnum = validatePhonenum($('.cont-num'), $('.cn-err'))
    let validEmail = validateEmail($('.email'), $('.em-err'))
    let validPurpose = validateSelect($('#purpose'), $('.pp-err'))
    let validAddress = validateInput($('.address'), $('.ad-err'))
    let validAnnual = true

    if ($('#annual').length)
    {
        validAnnual = validateInput($('#annual'), $('.ai-err'))
    }


    if (validLName &&  validFName && validMName && validBDay && validYOR && validPnum && validEmail && validPurpose && validAddress)
    {
        $('#brgy-document-form').submit()
    }
})