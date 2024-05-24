import {
    validateName,
    validatePhonenum,
    validateGender,
    validateEmail,
    validateUpload
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const submitBtn = $('.submit-new-official-btn')

submitBtn.click(function(e)
{
    e.preventDefault()

    if (
        validateName($('#lastname'), $('.ln-err')) && 
        validateName($('#firstname'), $('.fn-err')) && 
        validateName($('#middlename'), $('.mn-err')) && 
        validatePhonenum($('#phonenum'), $('.pn-err')) && 
        validateGender($('#gender'), $('.gen-err')) && 
        validateEmail($('#email'), $('.em-err')) 
    )
    {
        console.log('asd');
        $('#new-off-from').submit()
    }
    else
    {
        console.log('tes');
    }
})