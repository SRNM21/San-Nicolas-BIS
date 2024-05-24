const navs = $('.admin-nav-link')
const logoutBtn = $('.logout-wrapper')

const menu = $('.menu')
const sidebar = $('.side-menu-content-hide')

console.log(menu);
console.log(sidebar);
navs.click(function(event)
{
    event.stopPropagation()
    event.stopImmediatePropagation()    

    $(this).hasClass('active') 
        ? $(this).removeClass('active')
        : $(this).addClass('active')
})

function toggleSidebar()
{
    if (sidebar.hasClass('side-menu-content-hide'))
    {
        sidebar.removeClass('side-menu-content-hide')
    }
    else  
    {
        sidebar.addClass('side-menu-content-hide')
    }
}

menu.click(function () 
{ 
    toggleSidebar()
})