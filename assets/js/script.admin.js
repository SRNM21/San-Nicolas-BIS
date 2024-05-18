const togglePass = $('.toggle-pass-wrapper')
const password = $('#password')
const passOnIcon = $('.pass-toggle-on')
const passOffIcon = $('.pass-toggle-off')

togglePass.click(function ()
{ 
    if (password.attr('type') === 'password')
    {
        password.prop('type', 'text')
        togglePass.html(passOnIcon);
    }
    else 
    {
        password.prop('type', 'password')
        togglePass.html(passOffIcon);
    }
})