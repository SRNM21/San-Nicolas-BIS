const win = $(window) 
const doc = $(document)

const scrollTop = $('.scroll-on-top-wrapper')
const tabletMenu = $('.hamburger-wrapper')
const sidemenu = $('.side-menu-container')
const outsideNav = $('.out-nav')
const outsideOverlay = $('.nav-overlay')

doc.on('scroll', function () 
{  
    let winScroll = win.scrollTop()
    let height = doc.height() - win.height()

    const scrolled = (winScroll / height) * 100

    console.log(scrolled) //! FOR DEBUGGING

    if (scrolled > 20)
    {
        scrollTop.show()
    }
    else 
    {
        scrollTop.hide()
    }
})

scrollTop.click(function () 
{  
    win.scrollTop(0)
})

tabletMenu.click(function () 
{ 
    sidemenu.css('right', 0)
    outsideOverlay.show()
})

outsideNav.click(function(event)
{
    event.stopPropagation()
    event.stopImmediatePropagation()

    sidemenu.css('right', -250)
    outsideOverlay.hide()
})




