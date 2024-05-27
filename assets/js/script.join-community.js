import {
    validateName,
    validatePhonenum,
    validateBirthdate,
    validateEmail,
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const selection = $('.role-selection')
const famHeadSubmit = $('#fam-head-submit')

selection.on('change', function() 
{
    var selectedRole = $(this).val()
    $('#select-link').attr('href', 'join-community?role=' + encodeURIComponent(selectedRole))
})

famHeadSubmit.click(function(e)
{
    console.log('clicked');
    e.preventDefault()

    if (
        validateName($('.fam-head-lastname'), $('.fh-ln-err')) &&
        validateName($('.fam-head-firstname'), $('.fh-fn-err')) &&
        validateName($('.fam-head-middlename'), $('.fh-mn-err')) &&
        validateBirthdate($('.fam-head-birthdate'), $('.fh-bd-err')) &&
        validatePhonenum($('.fam-head-contact-num'), $('.fh-cn-err'))
    )
    {
        if ($('#fam-head-email').val().trim() === '')
        {
            
        }

        $('#fam-head-form').submit()
    }
})