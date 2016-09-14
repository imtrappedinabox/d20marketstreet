//menu.js

var isShowing = false; /* Flag to indicate if a drop-down menu is visible */
var isSubShowing = false; /* Flag to indicate if a drop-down menu is visible */
var menuItem = null;   /* Reference to a drop-down menu */
var subMenuItem = null;

//Show the drop-down menu with the given id, if it exists, and set flag
function show(id)
{
    hide(); /* First hide any previously showing drop-down menu */
    menuItem = document.getElementById(id);
    if (menuItem != null)
    {
        menuItem.style.visibility = 'visible';
        isShowing = true;
    }
}

//Hide the currently visible drop-down menu and set flag
function hideAll()
{
    hide();
    hideSub();
}

function hide()
{       
    if (isShowing) menuItem.style.visibility = 'hidden';
    isShowing = false;
}

function hideSub()
{       
    if (isSubShowing) subMenuItem.style.visibility = 'hidden';
    isSubShowing = false;
}

function showsub(id)
{
    hideSub();
    subMenuItem = document.getElementById(id);
    if (subMenuItem != null)
    {
        subMenuItem.style.visibility = 'visible';
        isSubShowing = true;
    }
}
