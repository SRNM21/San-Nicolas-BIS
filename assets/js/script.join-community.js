import {
    validateName,
    validatePhonenum,
    validateBirthdate,
    validateEmail,
    validateSelect,
    validateInput,
    setNormal
} 
from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const selection     = $('.role-selection')
const famHeadSubmit = $('#fam-head-submit')
const famMemSubmit  = $('#fam-member-submit')
const spouseSubmit  = $('#spouse-submit')

selection.on('change', function() 
{
    var selectedRole = $(this).val()
    $('#select-link').attr('href', 'join-community?role=' + encodeURIComponent(selectedRole))
})

famHeadSubmit.click(function(e)
{
    e.preventDefault()

    let validLName      = validateName($('.fam-head-lastname'), $('.fh-ln-err'))
    let validFName      = validateName($('.fam-head-firstname'), $('.fh-fn-err'))
    let validMName      = validateName($('.fam-head-middlename'), $('.fh-mn-err'))
    let validBDay       = validateBirthdate($('.fam-head-birthdate'), $('.fh-bd-err'))
    let validCivil      = validateSelect($('#fam-head-civil-status'), $('.fh-cs-err'))
    let validPnum       = validatePhonenum($('.fam-head-contact-num'), $('.fh-cn-err'))
    let validEmail      = validateEmail($('.fam-head-email'), $('.fh-em-err'))
    let validPurok      = validateSelect($('#fam-head-purok'), $('.fh-pk-err'))
    let validES         = validateSelect($('#fam-head-educ-stat'), $('.fh-es-err'))
    let validAddress    = validateInput($('.fam-head-address'), $('.fh-ad-err'))

    if 
    (
        validLName  && validFName   && validMName && validBDay  && 
        validCivil  && validPnum    && validEmail && validPurok && 
        validES     && validAddress
    )
    {
        $('#fam-head-form').submit()
    }
})

famMemSubmit.click(function (e) 
{  
    e.preventDefault()

    let validLName      = validateName($('.fam-member-lastname'), $('.fm-ln-err'))
    let validFName      = validateName($('.fam-member-firstname'), $('.fm-fn-err'))
    let validMName      = validateName($('.fam-member-middlename'), $('.fm-mn-err'))
    let validSex        = validateSelect($('.fam-member-sex'), $('.fm-sx-err'))
    let validBDay       = validateBirthdate($('.fam-member-birthdate'), $('.fm-bd-err'))
    let validPOB        = validateInput($('.fam-member-pob'), $('.fm-pb-err'))
    let validEmail      = validateEmail($('.fam-member-email'), $('.fm-em-err'))
    let validIS         = validateSelect($('#fam-member-inschool'), $('.fm-is-err'))
    let validPurok      = validateSelect($('#fam-member-purok'), $('.fm-pk-err'))
    let validAddress    = validateInput($('.fam-member-address'), $('.fm-ad-err'))
    let validMedHis     = validateInput($('.fam-member-med-hist'), $('.fm-mh-err'))
    let validRes        = true

    if ($('.fam-member-fam-head').val().trim() !== '')
    {
        validRes = validateInput($('.fam-member-relationship'), $('.fm-rs-err'))
    }
    else 
    {
        setNormal($('.fam-member-relationship'), $('.fm-rs-err'))
    }

    if 
    (
        validLName  && validFName   && validMName   && validSex && 
        validBDay   && validPOB     && validEmail   && validIS  && 
        validPurok  && validAddress && validMedHis  && validRes
    )
    {
        $('#fam-member-form').submit()
    }
})

spouseSubmit.click(function (e) 
{  
    e.preventDefault()

    let validLName      = validateName($('.spouse-lastname'), $('.sp-ln-err'))
    let validFName      = validateName($('.spouse-firstname'), $('.sp-fn-err'))
    let validMName      = validateName($('.spouse-middlename'), $('.sp-mn-err'))
    let validCivil      = validateSelect($('#spouse-civil-status'), $('.sp-cs-err'))
    let validBDay       = validateBirthdate($('.spouse-birthdate'), $('.sp-bd-err'))
    let validEmail      = validateEmail($('.spouse-email'), $('.sp-em-err'))
    let validPurok      = validateSelect($('#spouse-purok'), $('.sp-pk-err'))
    let validES         = validateSelect($('#spouse-educ-stat'), $('.sp-es-err'))
    let validAddress    = validateInput($('.spouse-address'), $('.sp-ad-err'))

    if 
    (
        validLName  && validFName && validMName && validCivil   && 
        validBDay   && validEmail && validPurok && validES      && 
        validAddress
    )
    {
        $('#spouse-form').submit()
    }
})