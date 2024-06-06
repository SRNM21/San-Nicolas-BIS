const tabletMenu = $('.hamburger-wrapper')
const sidemenu = $('.side-menu-container')
const outsideNav = $('.out-nav')
const outsideOverlay = $('.nav-overlay')

tabletMenu.click(function () 
{ 
    sidemenu.css('right', 0)
    outsideOverlay.show()
})

outsideNav.click(function(event)
{
    event.stopPropagation()
    event.stopImmediatePropagation()

    sidemenu.css('right', -(sidemenu.outerWidth()))
    outsideOverlay.hide()
})
