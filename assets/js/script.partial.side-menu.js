const navs = $('.admin-nav-link')
const logoutBtn = $('.logout-wrapper')
const accordion = $('.residence-accordion')
const accordionContent = $('.residence-accordion-wrapper')

navs.click(function(event)
{
    event.stopPropagation()
    event.stopImmediatePropagation()

    $(this).hasClass('active') 
        ? $(this).removeClass('active')
        : $(this).addClass('active')
})

accordion.click(function () 
{  
    
})