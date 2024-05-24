export const FOLDER_NAME = 'SanNicolasBIS'
export const URI_FOLDER_NAME= FOLDER_NAME.toLowerCase()

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

export function validateName(input, errorProvider)
{
    let elemName = input.data('input')
    let value = input.val().trim()

    let alphaRegex = /^[a-zA-Z\s-']+$/
    
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

    let numRegex = /^09/

    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Phone number is required')
    }
    else if (value.length != 11)
    {
        return setInvalid(input, errorProvider, 'Phone number must be 11 digits')
    }
    else if (!numRegex.test(value))
    {
        return setInvalid(input, errorProvider, 'Phone number must start with \'09\'')
    }

    return setNormal(input, errorProvider)
}

export function validateBirthdate(input) 
{
    let value = input.val().trim()
    
    let birthDate = new Date(value)
    let currentDate = new Date()

    let minYearOld = new Date(currentDate.getFullYear() - 21, currentDate.getMonth(), currentDate.getDate())
    let maxYearOld = new Date(currentDate.getFullYear() - 150, currentDate.getMonth(), currentDate.getDate())

    if (value == '') 
    {
        return setInvalid(input, errorProvider, 'Birthdate must not be empty')
    }
    else if (birthDate <= maxYearOld || birthDate >= currentDate)
    {
        return setInvalid(input, errorProvider, 'Invalid Birthdate')
    }
    else if (birthDate >= minYearOld)
    {
        return setInvalid(input, errorProvider, 'A Pharmacist must be 21 Years old and above')
    }

    return setNormal(input, errorProvider)
}

export function validateGender(input, errorProvider)
{
    let value = input.val()

    if (value == '' || value === null) 
    {
        return setInvalid(input, errorProvider, 'Gender must not be empty')
    }
    else if (value != 'Male' && value != 'Female')
    {
        return setInvalid(input, errorProvider, 'Invalid Gender')
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

export function validateEmail(input, errorProvider) 
{  
    let value = input.val()

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

export function validateUsername(input)
{
    let value = input.val().trim()

    let alphaRegex = /^[a-zA-Z0-9]+$/
    
    if (value == '') 
    {
        return setInvalid(input, 'Username must not be empty')
    }
    else if (!alphaRegex.test(value))
    {
        return setInvalid(input, 'Username must contain alphabetic and numeric characters only')
    }
    else if (value.length < 4)
    {
        return setInvalid(input, 'Username is too short')
    }
    else if (value.length > 20)
    {
        return setInvalid(input, 'Username is too long')
    }

    return setInputState(input, '')
}

export function validatePassword(input, confirm) 
{
    let val = input.val().trim()
    let symRegex = /[^\w\s]/

    if (val == '')
    {
        return setInvalid(input, 'Password must not be empty')
    }

    if (val.length < 8) 
    {
        return setInvalid(input, 'Please follow the password requirements')
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
        return setInvalid(input, 'Please follow the password requirements')

    if (val !== confirm.val().trim())
        return setInvalid(input, 'Password does not match')

    return setInputState(input, '')
}

function setNormal(input, errorProvider) 
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