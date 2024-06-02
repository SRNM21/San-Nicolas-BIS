import {
    validateUsername,
    validatePassword,
    validateUpload,
    validateInput,
    validateEmail
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const logToggle = $('.show-log-toggle')
const logContent = $('.logs-content')
const eventToggle = $('.show-events-toggle')
const eventContent = $('.events-content')
const createEventToggle = $('.add-event-btn')
const createEventContent = $('.new-events-content')

const editAccBtn = $('.edit-account')
const resetPassBtn = $('.reset-pass')
const saveChangesBtn = $('#save-changes-btn')

const togglePass = $('.toggle-pass')
const password = $('.setting-acc-pass')
const confirmPassword = $('.setting-acc-cpass')
const passReq = $('.pass-req')

const newEventBtn = $('.sbmt-new-event')

toggleDisplay(logToggle, logContent)
toggleDisplay(eventToggle, eventContent)
toggleDisplay(createEventToggle, createEventContent)

function toggleDisplay(toggleBtn, display) 
{  
    toggleBtn.click(function (e) 
    { 
        e.preventDefault()

        let elemName = toggleBtn.data('text')
        
        if (display.hasClass('shown'))
        {
            toggleBtn.text('Show ' + elemName)
            display.removeClass('shown')
            display.slideUp()
        }
        else 
        {
            toggleBtn.text('Hide ' + elemName)
            display.addClass('shown')
            display.slideDown({
                start: function () {
                    $(this).css({
                        display: "flex"
                    })
                }
            });
        }
    })
}

newEventBtn.click(function (e)
{
    e.preventDefault()

    let file = validateUpload($('#event-img'), $('.img-err'))
    let title = validateInput($('#title'), $('.ttl-err')) 
    let desc = validateInput($('#details'), $('.det-err'))
    let date = validateInput($('#date'), $('.dt-err'))

    if (file && title && desc && date)
    {
        $('.new-event-card').submit()
    }
})

editAccBtn.click(function (e) 
{  
    e.preventDefault()

    if ($('.setting-acc-username').prop('disabled') == true)
    {
        editAccBtn.text('Cancel Edit Account')
        
        $('.setting-acc-username').prop('disabled', false);
        $('.setting-acc-email').prop('disabled', false);
        $('.more-acc-details').css('display', 'flex')
    }
    else 
    {
        editAccBtn.text('Edit Account')
        $('.setting-acc-username').val($('.setting-acc-username').data('default'))
        $('.setting-acc-email').val($('.setting-acc-email').data('default'))

        $('.setting-acc-username').prop('disabled', true);
        $('.setting-acc-email').prop('disabled', true);
        $('.more-acc-details').css('display', 'none')
    }

})

resetPassBtn.click(function (e) 
{  
    e.preventDefault()
    
    if ($('.pass-wrapper').css('display') == 'none')
    {
        resetPassBtn.text('Cancel Reset Password')
        $('.pass-wrapper').css('display', 'flex')
        $('.setting-acc-pass').val('')
        $('.setting-acc-cpass').val('')
    }
    else 
    {
        resetPassBtn.text('Reset Password')
        $('.pass-wrapper').css('display', 'none')
    }   
})

saveChangesBtn.click(function (e)
{
    e.preventDefault()

    if (
        validateUsername($('.setting-acc-username'), $('.us-err')) && 
        validateEmail($('.setting-acc-email'), $('.em-err'))
    )
    {
        if ($('.setting-acc-pass').val() !== '')
        {
            let valid = validatePassword($('.setting-acc-pass'), $('.cp-err'), $('.setting-acc-cpass'))
            
            if (!valid) return
        }

        $('.upd-account-admin-form').submit()
    }
})


togglePass.click(function ()
{ 
    if (password.attr('type') === 'password')
    {
        confirmPassword.prop('type', 'text')
        password.prop('type', 'text')
    }
    else 
    {
        confirmPassword.prop('type', 'password')
        password.prop('type', 'password')
    }
})

password.on('propertychange input', function () 
{ 
    let val = $(this).val().trim()
    let symRegex = /[^\w\s]/

    for (let i = 0; i < passReq.length; i++) 
    {
        passReq.eq(i).removeClass('true')
    }

    if (val.length >= 8) 
        passReq.eq(0).addClass('true')
    
    for (let c of val) 
    {
        if (c >= 'a' && c <= 'z') 
        {
            passReq.eq(1).addClass('true')
        } 
        else if (c >= 'A' && c <= 'Z') 
        {
            passReq.eq(2).addClass('true')
        } 
        else if (c >= '0' && c <= '9') 
        {
            passReq.eq(3).addClass('true')
        } 
        else if (symRegex.test(val)) 
        {
            passReq.eq(4).addClass('true')
        }
    }
})