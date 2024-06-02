const win = $(window) 
const doc = $(document)

const scrollTop = $('.scroll-on-top-wrapper')

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