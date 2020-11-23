var _p, _left, _right = null;

jQuery(document).ready(function () {

    /*--- Button floating ---*/
    // var position = jQuery('.floating').position();
    // _left = position.left;
    // _top = position.top;
    // dragElement(document.getElementById("mydiv"));

    if (jQuery('.floating').length) {
        // var position = jQuery('.floating').position(); 
        
        jQuery('.floating__icon').click(function (e) {
            var container = jQuery(this).parent();
            container.hasClass('active') ? container.removeClass('active') : container.addClass('active');
            e.stopPropagation();
        });
        

        jQuery(document).on('click', function () {
            jQuery('.floating').removeClass('active');
        })
    }
})

// function dragElement(elmnt) {
//     var pos1 = 0,
//         pos2 = 0,
//         pos3 = 0,
//         pos4 = 0;
//     if (document.getElementById(elmnt.id + "header")) {
//         /* if present, the header is where you move the DIV from:*/
//         document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
//     } else {
//         /* otherwise, move the DIV from anywhere inside the DIV:*/
//         elmnt.onmousedown = dragMouseDown;
//     }


//     function dragMouseDown(e) {
//         e = e || window.event;
//         e.preventDefault();

//         _clickable = false;

//         // get the mouse cursor position at startup:
//         pos3 = e.clientX;
//         pos4 = e.clientY;
//         document.onmouseup = closeDragElement;
//         // call a function whenever the cursor moves:
//         document.onmousemove = elementDrag;
//     }

//     function elementDrag(e) {
//         e = e || window.event;
//         e.preventDefault();
//         e.stopPropagation();
//         // calculate the new cursor position:
//         pos1 = pos3 - e.clientX;
//         pos2 = pos4 - e.clientY;
//         pos3 = e.clientX;
//         pos4 = e.clientY;
//         // set the element's new position:
//         elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
//         elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";


//         _p = elmnt.style.left + '_' + elmnt.style.top;

//     }

//     function closeDragElement() {
//         /* stop moving when mouse button is released:*/
//         document.onmouseup = null;
//         document.onmousemove = null;
//     }
// }