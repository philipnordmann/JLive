var ids = new Array();
var pos = 1;
ids.length = 6;

function addClass(element, className) {
    if (!hasClass(element, className)) {
        if (element.className) {
            element.className += " " + className;
        } else {
            element.className = className;
        }
    }
}

function removeClass(element, className) {
    var regexp = addClass[className];
    if (!regexp) {
        regexp = addClass[className] = new RegExp("(^|\\s)" + className + "(\\s|$)");
    }
    element.className = element.className.replace(regexp, "$2");
}

function hasClass(element, className) {
    var regexp = addClass[className];
    if (!regexp) {
        regexp = addClass[className] = new RegExp("(^|\\s)" + className + "(\\s|$)");
    }
    return regexp.test(element.className);
}

function toggleClass(element, className) {
    if (hasClass(element, className)) {
        removeClass(element, className);
    } else {
        addClass(element, className);
    }
}

function toggleArray(id) {
    var elem = document.getElementById("tile-" + id);
    if (!checkArray(ids, id)) {
        if (getArrayCount(ids) < ids.length) {
            pushArray(ids, id);
            addClass(elem, "green");
        }
    }
    else {
        removeFromArray(ids, id);
        removeClass(elem, "green");
    }
    document.getElementById("test").innerHTML = printArray(ids);

}

function getArrayCount(array) {
    var ret = 0;
    for (var i = 0; i < array.length; i++) {
        if (array[i] != null) {
            ret++;
        }
    }
    return ret;
}

function pushArray(array, val) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == null) {
            array[i] = val;
            return;
        }
    }
}

function removeFromArray(array, val) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == val) {
            array[i] = null;
            return;
        }
    }
}

function checkArray(array, val) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == val) {
            return true;
        }
    }
    return false;
}

function validate() {
    for (var i = 0; i < ids.length; i++) {
        if (ids[i] != null) {
            //toggleArray(ids[i]);
            var elem = document.getElementById("tile-" + ids[i]);
            if (elem != null) {
                addClass(elem, "green");
            }
        }
    }
}

function printArray(array) {
    var retString = "";
    for (var i = 0; i < array.length; i++) {
        if (array[i] != null) {
            retString += array[i] + "-";
        }
    }
    return retString;
}