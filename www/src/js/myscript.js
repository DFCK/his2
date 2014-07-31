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