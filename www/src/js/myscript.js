/**
 * Created with IntelliJ IDEA.
 * User: cot
 * Date: 7/31/14
 * Time: 11:10 AM
 * To change this template use File | Settings | File Templates.
 */

var myalert = function (title, message) {
    $.SmartMessageBox({
        title: "<i class='fa fa-info-circle txt-color-orangeDark'></i> " + title + "!",
        content: "<br>" + message,
        buttons: '[OK]'

    }, function (ButtonPressed) {
        if (ButtonPressed == "Cancel") {
        }
    });
}
/**
 * Prevent Backspace button
 * @param event
 * @returns {boolean}
 */
document.onkeydown = function (event) {

    if (!event) { /* This will happen in IE */
        event = window.event;
    }

    var keyCode = event.keyCode;

    if (keyCode == 8 &&
        ((event.target || event.srcElement).tagName != "TEXTAREA") &&
        ((event.target || event.srcElement).tagName != "INPUT")) {

        if (navigator.userAgent.toLowerCase().indexOf("msie") == -1) {
            event.stopPropagation();
        } else {
            alert("prevented");
            event.returnValue = false;
        }

        return false;
    }
};