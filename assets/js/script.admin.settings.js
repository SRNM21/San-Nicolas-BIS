import {
    validateUsername,
    validatePassword,
    validateInput,
    validateFutureDate,
    validateEmail,
    toggleDisplay
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const sysConfig = $('.save-config-btn')
const eventToggle = $('.show-events-toggle')
const eventContent = $('.events-content')
const createEventToggle = $('.add-event-btn')
const createEventContent = $('.new-events-content')
const hotlineToggle = $('.show-hotline-toggle')
const hotlineContent = $('.hotline-content')
const createHotlineToggle = $('.add-hotline-btn')
const createHotlineContent = $('.new-hotline-content')
const logToggle = $('.show-log-toggle')
const logContent = $('.logs-content')
const feedbackToggle = $('.show-fb-toggle')
const feedbackContent = $('.fb-content')

const editAccBtn = $('.edit-account')
const resetPassBtn = $('.reset-pass')
const saveChangesBtn = $('#save-changes-btn')

const togglePass = $('.toggle-pass')
const password = $('.setting-acc-pass')
const confirmPassword = $('.setting-acc-cpass')
const passReq = $('.pass-req')

const newEventBtn = $('.sbmt-new-event')
const newHotlineBtn = $('.sbmt-new-hotline')

toggleDisplay(eventToggle, eventContent)
toggleDisplay(createEventToggle, createEventContent)
toggleDisplay(hotlineToggle, hotlineContent)
toggleDisplay(createHotlineToggle, createHotlineContent)
toggleDisplay(logToggle, logContent)
toggleDisplay(feedbackToggle, feedbackContent)

$('#logo').change(function () 
{
    $(".save-config-btn").prop('disabled', false)
})

$('#favicon').change(function () 
{
    $(".save-config-btn").prop('disabled', false)
})

$(".save-config-btn").click(function ()
{
    $('.system-config-card').submit()
})

newEventBtn.click(function (e)
{
    e.preventDefault()

    let what    = validateInput($('#what'), $('.wht-err')) 
    let date    = validateFutureDate($('#date'), $('.dtd-err'))
    let time    = validateInput($('#time'), $('.dtt-err'))
    let where   = validateInput($('#where'), $('.whr-err'))
    let who     = validateInput($('#who'), $('.wh-err'))
    let desc    = validateInput($('#details'), $('.det-err'))

    if (what && date && time && where && who && desc)
    {
        $('.new-event-card').submit()
    }
})

newHotlineBtn.click(function (e) 
{
    e.preventDefault()

    let name    = validateInput($('#h-name'), $('.hna-err'))
    let number   = validateInput($('#h-num'), $('.hnu-err'))

    if (name && number)
    {
        $('.new-hotline-card').submit()
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
