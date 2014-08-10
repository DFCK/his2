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
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}
document.onkeydown = function (event) {

    if (!event) { /* This will happen in IE */
        event = window.event;
    }

    var keyCode = event.keyCode;
    if (keyCode == 8 &&
        ((event.target || event.srcElement).tagName != "TEXTAREA") &&
        ((event.target || event.srcElement).tagName != "INPUT") && !hasClass((event.target || event.srcElement), "note-editable")) {

        if (navigator.userAgent.toLowerCase().indexOf("msie") == -1) {
            event.stopPropagation();
        } else {
            alert("prevented");
            event.returnValue = false;
        }

        return false;
    }
};

/**
 * camera
 */
window.URL = window.URL || window.webkitURL;

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia || navigator.msGetUserMedia;

var onFailSoHard = function (e) {
    console.log('Reeeejected!', e);
};

var video = null;
var canvas = null;
var context = null;
var localMediaStream = null;

var stopcamera = function () {
    video.pause();
    localMediaStream.stop();
};

var opencamera = function () {
    video = document.getElementById("video");
    canvas = document.getElementById("canvas");
    context = canvas.getContext("2d");

    if (navigator.getUserMedia) {
        navigator.getUserMedia({video: true}, function (stream) {
            video.src = window.URL.createObjectURL(stream);
            localMediaStream = stream;
        }, onFailSoHard);
    } else {
        alert('getUserMedia() is not supported in your browser');
    }
};

var ModalViewImages = function ($scope, $modalInstance, Result,mainpic) {
    $scope.Result = Result;
    $scope.mainpic = mainpic;
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
    $scope.choseimg = function(url){
        $scope.mainpic = url;
    }
};