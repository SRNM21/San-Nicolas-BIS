const navs = $('.admin-nav-link')
const logoutBtn = $('.logout-wrapper')

const menu = $('.menu')
const sidebar = $('.side-menu-content-hide')


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
    console.log(sidebar.hasClass('side-menu-content-hide'));

    if (sidebar.hasClass('side-menu-content-hide'))
    {
        
        sidebar.removeClass('side-menu-content-hide')
        console.log("has hide");
    }
    else  
    {
      
        sidebar.addClass('side-menu-content-hide')
        console.log("not hide");
    }
}

menu.click(function () 
{ 
    toggleSidebar()
})