import 
{
    validateName,
    validatePhonenum,
    validateEmail,
    validateSelect,
} 
from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const submit = $('.submit-new-official-btn')

submit.click(function (e) 
{ 
    e.preventDefault();
    
    let validLName  = validateName($('#lastname'), $('.ln-err'))
    let validFName  = validateName($('#firstname'), $('.fn-err'))
    let validMName  = validateName($('#middlename'), $('.mn-err'))
    let validPnum   = validatePhonenum($('#phonenum'), $('.pn-err'))
    let validGen    = validateSelect($('#gender'), $('.gen-err'))
    let validEmail  = validateEmail($('#email'), $('.em-err'))
    let validPos    = validateSelect($('#position'), $('.pos-err'))
    let validCom    = validateSelect($('#comittee'), $('.com-err'))
    let validStat   = validateSelect($('#status'), $('.sta-err'))

    if 
    (
        validLName  && validFName && validMName && validPnum    && 
        validGen    && validEmail && validPos   && validStat    && 
        validCom
    )
    {
        $('#new-off-form').submit()
    }
})