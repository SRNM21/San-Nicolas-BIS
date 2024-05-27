import {
    validateName,
    validateEmail,
    validateUsername,
    validatePassword
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const nextBtn = $('.next-btn')
const backBtn = $('.staff-acc-back-btn')
const submitBtn = $('.submit-new-staff-acc-btn')
const personalContainer = $('.personal-info-container')
const accountContainer = $('.account-info-container')
const togglePass = $('.toggle-pass')
const password = $('#password')
const confirmPassword = $('#conf-password')
const passReq = $('.pass-req')

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

togglePass.click(function ()
{ 
    if (password.attr('type') === 'password')
    {
        password.prop('type', 'text')
        confirmPassword.prop('type', 'text')
    }
    else 
    {
        password.prop('type', 'password')
        confirmPassword.prop('type', 'password')
    }

})

nextBtn.click(function (e) 
{ 
    e.preventDefault()
    
    if (
        validateName($('#lastname'), $('.ln-err')) && 
        validateName($('#firstname'), $('.fn-err')) && 
        validateName($('#middlename'), $('.mn-err')) && 
        validateEmail($('#email'), $('.em-err')) 
    )
    {
        personalContainer.removeClass('active')
        accountContainer.addClass('active')
    }
})

backBtn.click(function (e) 
{  
    e.preventDefault()

    personalContainer.addClass('active')
    accountContainer.removeClass('active')
})

submitBtn.click(function (e) 
{  
    e.preventDefault()

    if (
        validateUsername($('#username'), $('.un-err')) && 
        validatePassword($('#password'), $('.cps-err'), $('#conf-password'))
    )
    {
        $('#new-staff-acc-from').submit()
    }
})