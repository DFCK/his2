<div data-ng-controller="camctrl">
    <video id="video" width="640" height="480" autoplay></video>
    <button id="star" data-ng-click="camera()">Camera</button>
    <button id="snap" data-ng-click="capture()">Snap Photo</button>
    <button id="stop" data-ng-click="stopcamera()">Snap Photo</button>
    <canvas id="canvas" width="640" height="480"></canvas>
</div>

<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();
    //    console.log(smartApp);

    //    window.addEventListener("DOMContentLoaded", function() {
    // Grab elements, create settings, etc.
    function camctrl($scope) {
        var canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = { "video": true },
            errBack = function (error) {
                console.log("Video capture error: ", error.code);
            };
        $scope.camera = function () {
            opencamera();
        }
        $scope.capture = function () {
            context.drawImage(video, 0, 0, 640, 480);
        }
        $scope.stopcamera = function(){

        }
        var opencamera = function () {
            // Put video listeners into place
            if (navigator.getUserMedia) { // Standard
                navigator.getUserMedia(videoObj, function (stream) {
                    video.src = stream;
                    video.play();
                }, errBack);
            } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(videoObj, function (stream) {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }
            else if (navigator.mozGetUserMedia) { // Firefox-prefixed
                navigator.mozGetUserMedia(videoObj, function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }
        };
    }

    var pagefunction = function () {
//    }, false);

    }
    pagefunction();
</script>