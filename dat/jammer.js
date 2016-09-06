jQuery(document).keydown(function(e){
    /* F5 */
    if ((e.which && e.which == 116) || (e.keyCode && e.keyCode == 116)) {
        if(jQuery.browser.msie && jQuery.browser.version < 7) {
            window.event.keyCode = 0;
            window.event.cancelBubble = true;
            return false;
        } else if(jQuery.browser.msie) {
            window.event.keyCode = 0;
            return false;
        } else {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    } 
    /* F11 */
    if ((e.which && e.which == 122) || (e.keyCode && e.keyCode == 122)) {
        if(jQuery.browser.msie && jQuery.browser.version < 7) {
            window.event.keyCode = 0;
            window.event.cancelBubble = true;
            return false;
        } else if(jQuery.browser.msie) {
            window.event.keyCode = 0;
            return false;
        } else {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    } 
    /* F12 */
    if ((e.which && e.which == 123) || (e.keyCode && e.keyCode == 123)) {
        if(jQuery.browser.msie && jQuery.browser.version < 7) {
            window.event.keyCode = 0;
            window.event.cancelBubble = true;
            return false;
        } else if(jQuery.browser.msie) {
            window.event.keyCode = 0;
            return false;
        } else {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    }
    /* [CTRL] + [R] */
    if ( e.ctrlKey == true && ((e.which && e.which == 82) || (e.keyCode && e.keyCode == 82))) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    /* [CTRL] + [N] */
    if ( e.ctrlKey == true && ((e.which && e.which == 78) || (e.keyCode && e.keyCode == 78))) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    /* [CTRL] + [Enter] */
    if ( e.ctrlKey == true && ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13))) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    /* [Alt] + [��] */
    if ( e.altKey == true && ((e.which && e.which == 37) || (e.keyCode && e.keyCode == 37))) {
        return false;
    }
    /* [Alt] + [��] */
    if ( e.altKey == true && ((e.which && e.which == 39) || (e.keyCode && e.keyCode == 39))) {
        return false;
    }
    /* Backspace */
    if ((e.which && e.which == 8) || (e.keyCode && e.keyCode == 8)) {
        if (e.target.readOnly) {
            return false;
        }
        if (e.target.tagName.toLowerCase() == 'input') {
            if (e.target.type.toLowerCase() == 'text' || e.target.type.toLowerCase() == 'file' || e.target.type.toLowerCase() == 'password') {
                return true;
            } else {
                return false;
            }
        } else if (e.target.tagName.toLowerCase() == 'textarea'){
            return true;
        } else {
            return false;
        }
    }
});