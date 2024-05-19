const navs = $('.admin-nav-link')
const logoutBtn = $('.logout-wrapper')

navs.click(function(event)
{
    event.stopPropagation()
    event.stopImmediatePropagation()

    $(this).hasClass('active') 
        ? $(this).removeClass('active')
        : $(this).addClass('active')
})