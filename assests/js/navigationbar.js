// JavaScript Document
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("menuClosed");
});

$(document).ready(function () {
    // hold onto the drop down menu                                             
    var dropdownMenu;
    var dropdowntoggle;
    // and when you show it, move it to the body                                     
    $(window).on('show.bs.dropdown', function (e) {

        // grab the menu        
        dropdownMenu = $(e.target).find('.dropdown-menu');
        // detach it and append it to the body
        $('body').append(dropdownMenu.detach());

        // grab the new offset position
        var eOffset = $(e.target).offset();

        // make sure to place it where it would normally go (this could be improved)
        dropdownMenu.css({
            'display': 'block',
            'top': eOffset.top + $(e.target).outerHeight(),
            'margin-top': '16px',
            'width': '200px',
            'border-radius': '0',
            'border-style': 'outset',
            'background-color': 'white'
        });
    });

    // and when you hide it, reattach the drop down, and hide it normally                                                   
    $(window).on('hide.bs.dropdown', function (e) {
        $(e.target).append(dropdownMenu.detach());
        dropdownMenu.hide();
    });
});
