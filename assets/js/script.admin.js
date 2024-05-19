const togglePass = $('.toggle-pass')
const password = $('#password')

togglePass.click(function ()
{ 
    if (password.attr('type') === 'password')
    {
        password.prop('type', 'text')
    }
    else 
    {
        password.prop('type', 'password')
    }

})