export const FOLDER_NAME = 'SanNicolasBIS'
export const URI_FOLDER_NAME = FOLDER_NAME.toLowerCase()

var PATHS = {}
PATHS['STYLE_PATH']             = '/assets/styles/'
PATHS['SCRIPT_PATH']            = '/assets/js/'
PATHS['API_PATH']               = '/assets/util/api/'
PATHS['CONTROLLER_PATH']        = '/assets/controllers/'
PATHS['PARTIALS_PATH']          = '/assets/partials/'
PATHS['VIEW_ADMIN_PATH']        = '/views/admin/'
PATHS['VIEW_ADMIN_LAYOUTS']     = '/views/admin/layouts/'
PATHS['VIEW_AUTH_PATH']         = '/views/auth/'
PATHS['VIEW_PUBLIC_PATH']       = '/views/public/'
PATHS['ICONS_PATH']             = '/assets/src/icons/'
PATHS['IMAGES_PATH']            = '/assets/src/images/'
PATHS['VECTOR_PATH']            = '/assets/src/svg/'

export var PATHS

getPrivilege() 

export var PRIVILEGE

function getPrivilege() 
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: {
            func: 'GET_PRIVILEGE',
        },
        success: function (response) 
        {
            PRIVILEGE = response
        },
        error: function (error) 
        {  
            PRIVILEGE = 'NOT FOUND'
        }
    })
}

export function validateName(input, errorProvider)
{
    let elemName = input.data('input')
    let value = input.val().trim()

    let alphaRegex = /^[\p{L}\s]*$/u
    
    if (elemName === 'Middlename' && value === '')
    {
        return setNormal(input, errorProvider)
    }

    if (value == '') 
    {
        return setInvalid(input, errorProvider, elemName + ' is required')
    }
    else if (!alphaRegex.test(value))
    {
        return setInvalid(input, errorProvider, elemName + ' must not contain invalid characters')
    }
    else if (value.length < 2)
    {
        return setInvalid(input, errorProvider, elemName + ' is too short')
    }
    else if (value.length > 100)
    {
        return setInvalid(input, errorProvider, elemName + ' is too long')
    }

    return setNormal(input, errorProvider)
}

export function validatePhonenum(input, errorProvider)
{
    let value = input.val().trim()

    let numStartRegex = /^09/
    let numRegex = /^09\d{9}$/

    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Phone number is required')
    }
    else if (!numStartRegex.test(value))
    {
        return setInvalid(input, errorProvider, 'Phone number must start with \'09\'')
    }
    else if (!numRegex.test(value))
    {
        return setInvalid(input, errorProvider, 'Phone number must contain only numbers')
    }
    else if (value.length != 11)
    {
        return setInvalid(input, errorProvider, 'Phone number must be 11 digits')
    }

    return setNormal(input, errorProvider)
}

export function validateBirthdate(input, errorProvider) 
{
    let value = input.val().trim()
    let elemName = input.data('input')

    let birthDate = new Date(value)
    let currentDate = new Date()

    birthDate.setHours(0, 0, 0, 0)
    currentDate.setHours(0, 0, 0, 0)

    let maxYearOld = new Date(currentDate.getFullYear() - 150, currentDate.getMonth(), currentDate.getDate())
    let twentyYearsAgo = new Date(currentDate.getFullYear() - 20, currentDate.getMonth(), currentDate.getDate());

    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Birthdate is required')
    }
    else if (birthDate <= maxYearOld || birthDate >= currentDate)
    {
        return setInvalid(input, errorProvider, 'Invalid Birthdate')
    }
    else if (elemName === 'FamBDY' && birthDate > twentyYearsAgo)
    {
        return setInvalid(input, errorProvider, 'Family Head must be 20 years old or older')
    }

    return setNormal(input, errorProvider)
}

export function validateFutureDate(input, errorProvider) 
{
    let value = input.val().trim()

    let date = new Date(value)
    let currentDate = new Date()

    date.setHours(0, 0, 0, 0)
    currentDate.setHours(0, 0, 0, 0)

    let maxAdvance = new Date(currentDate.getFullYear() + 5, currentDate.getMonth(), currentDate.getDate())

    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Date is required')
    }
    else if (date < currentDate || date > maxAdvance)
    {
        console.log((date < currentDate) + "less than");
        console.log((date > maxAdvance) + "Greater than");

        return setInvalid(input, errorProvider, 'Date must be now or within 5 years')
    }

    return setNormal(input, errorProvider)
}

export function validateUpload(input, errorProvider) 
{  
    if(input.get(0).files.length === 0 )
    {
        return setInvalid(input, errorProvider, 'No file selected')
    }

    return setNormal(input, errorProvider)
}

export function validateInput(input, errorProvider) 
{  
    let value = input.val().trim()

    if(value === '')
    {
        return setInvalid(input, errorProvider, 'This field must not be empty')
    }

    return setNormal(input, errorProvider)
}

export function validateSelect(input, errorProvider) 
{  
    let value = input.find(":selected").val()

    if(value === '')
    {
        return setInvalid(input, errorProvider, 'This field must not be empty')
    }

    return setNormal(input, errorProvider)
}

export function validateEmail(input, errorProvider) 
{  
    let value = input.val().trim()

    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/

    if (value == '')
    {
        return setInvalid(input, errorProvider, 'Email is required')
    }
    else if (!emailRegex.test(value))
    {
        return setInvalid(input, errorProvider, 'Invalid Email format')
    }
    else if (value.length > 200)
    {
        return setInvalid(input, errorProvider, 'Email must be below 200 characters')
    }

    return setNormal(input, errorProvider)
}

export function validateUsername(input, errorProvider)
{
    let value = input.val().trim()

    let alphaRegex = /^[a-zA-Z0-9]+$/
    
    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Username must not be empty')
    }
    else if (!alphaRegex.test(value))
    {
        return setInvalid(input, errorProvider, 'Username must contain alphabetic and numeric characters only')
    }
    else if (value.length < 4)
    {
        return setInvalid(input, errorProvider, 'Username is too short')
    }
    else if (value.length > 20)
    {
        return setInvalid(input, errorProvider, 'Username is too long')
    }

    return setNormal(input, errorProvider)
}

export function validatePassword(input, errorProvider, confirm) 
{
    let val = input.val().trim()
    let symRegex = /[^\w\s]/

    if (val == '')
    {
        return setInvalid(input, errorProvider, 'Password must not be empty')
    }

    if (val.length < 8) 
    {
        return setInvalid(input, errorProvider, 'Please follow the password requirements')
    }
    
    let lower = false
    let upper = false
    let num = false
    let sym = false

    for (let c of val) 
    {
        if (c >= 'a' && c <= 'z') 
            lower = true
        else if (c >= 'A' && c <= 'Z') 
            upper = true
        else if (c >= '0' && c <= '9') 
            num = true
        else if (symRegex.test(val)) 
            sym = true
    }

    if (!(lower && upper && num && sym))
        return setInvalid(input, errorProvider, 'Please follow the password requirements')

    if (val !== confirm.val().trim())
    {
        setInvalid(confirm, errorProvider, 'Password does not match')
        return setInvalid(input, errorProvider, 'Password does not match')
    }

    return setNormal(input, errorProvider)
}

export function setNormal(input, errorProvider) 
{  
    if (input.hasClass('invalid'))
    {
        input.removeClass('invalid');
    }
    
    errorProvider.text('')
    return true
}

function setInvalid(input, errorProvider, message) 
{  
    input.addClass('invalid')
    input.focus()
    errorProvider.text(message)
    return false
}

export function toggleDisplay(toggleBtn, display) 
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

export function dropdown(list, button)
{
    button.click(function()
    {
        if (list.is(":hidden"))
        {
            list.slideDown({
                start: function () {
                    $(this).css({
                        display: "flex"
                    })
                }
            });
            
            $(document).mouseup(function (e) 
            { 
                if (button.is(e.target))
                {
                    $(document).off('mouseup');
                    list.slideDown('fast')
                }
                else if (!list.is(e.target) && list.has(e.target).length === 0) 
                {
                    $(document).off('mouseup')
                    list.slideUp('fast');
                }
                
            })
        }
        else
        {
            $(document).removeAttr('click')
            list.slideUp('fast');
        }
    })
}