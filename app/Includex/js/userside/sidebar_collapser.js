var isSidebarCollapsed = false;
var isSidebarCollapsing = false;

var sidebarCollapsedList = [
    "#ffpanel-title-collapsed",
    "#ffpanel-item1-collapsed",
    "#ffpanel-item2-collapsed",
    "#ffpanel-item3-collapsed",
    "#ffpanel-item4-collapsed",
    "#ffpanel-item5-collapsed",
]

var sidebarUnCollapsedList = [
    "#ffpanel-title",
    "#ffpanel-item1",
    "#ffpanel-item2",
    "#ffpanel-item3",
    "#ffpanel-item4",
    "#ffpanel-item5",
]

$("#sidebar-collapser").click(() => {
    if (isSidebarCollapsing)
        return;

    isSidebarCollapsing = true;

    isSidebarCollapsed = !isSidebarCollapsed;

    $("#sidebar-collapser").animate({deg: isSidebarCollapsed ? 180 : 0},
        {
            duration: 600,
            step: function(now) {
                $(this).css({ transform: 'rotate(' + now + 'deg)' });
            }
        }
    );

    $("#left-sidebar").animate({
            "min-width": isSidebarCollapsed ? "300px" : "100px",
            "max-width": isSidebarCollapsed ? "300px" : "100px"
        },
        {
            duration: isSidebarCollapsed ? 300 : 300,
        }
    );

    sidebarCollapsedList.forEach((item) => {
        $(item).animate({
                "opacity": isSidebarCollapsed ? "100%" : "0%",
                "max-width" : isSidebarCollapsed ? "100%" : "0%",
                "min-width" : isSidebarCollapsed ? "100%" : "0%",
            },
            {
                duration: isSidebarCollapsed ? 300 : 300,
            }
        );
    })

    sidebarUnCollapsedList.forEach((item) => {
        $(item).animate({
                "opacity": isSidebarCollapsed ? "0%" : "100%",
                "max-width" : isSidebarCollapsed ? "0%" : "100%",
                "min-width" : isSidebarCollapsed ? "0%" : "100%",
            },
            {
                duration: isSidebarCollapsed ? 300 : 300,
            }
        );
    })

    setTimeout(() =>{
        isSidebarCollapsing = false;
    }, 600);
});