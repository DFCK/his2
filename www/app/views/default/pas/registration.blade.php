<a href="" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary">
    Lấy ảnh
</a>
<img id="pasavatar" src="">

<!-- Dynamic Modal -->
<style>
    .modal-dialog {
        width: 680px;
    }
</style>
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div data-ng-controller="camctrl">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Camera</h4>
                </div>
                <div class="modal-body" style="text-align: center">
                    <video id="video" width="640" height="480" autoplay ng-show="iscamera"></video>
                    <canvas id="canvas" width="480" height="480" style="display: none"></canvas>
                    <img id="modelcapture" src="" ng-show="!iscamera">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="star" data-ng-click="camera()">Mở camera</button>
                    <button type="button" class="btn btn-success" id="snap" data-ng-click="camcapture()">Lấy hình
                    </button>
                    <!--                    <button type="button" class="btn btn-success" data-ng-click="cropimg()">Crop</button>-->
                    <button type="button" class="btn btn-default" id="stop" data-ng-click="stopcamera()">Dừng camera
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Xong
                    </button>

                </div>
            </div>
            <!-- content will be filled here from "ajax/modal-content/model-content-1.html" -->

        </div>
    </div>
</div>


<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();
    //    console.log(smartApp);
    function camctrl($scope) {
        var canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = { "video": true },
            errBack = function (error) {
                console.log("Video capture error: ", error.code);
            };
        $scope.iscamera = true;
        $scope.camera = function () {
            $scope.iscamera = true;
            opencamera();
        }
        $scope.cropimg = function () {
            jquerycropimg();
        }
        $scope.camcapture = function () {
            $scope.iscamera = false;
//            context.drawImage(video, 0, 0, 640, 480);
            context.drawImage(video, 80, 0, 480, 480, 0, 0, 480, 480);
            // "image/webp" works in Chrome.
            // Other browsers will fall back to image/png.
            document.getElementById("modelcapture").src = canvas.toDataURL('image/webp');
            document.getElementById("pasavatar").src = canvas.toDataURL('image/webp');
//            video.src = null;
//            video.stop();
        }
        $scope.stopcamera = function () {
            video.src = null;
            video.stop();
            localMediaStream.stop();
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
    var jquerycropimg = function () {
        $('#modelcapture').Jcrop(
            {
                aspectRatio: 1 / 1
            }
        );
    }

    var pagefunction = function () {
//    }, false);


    }
    loadScript("src/smartadmin/js/plugin/jcrop/jquery.Jcrop.min.js", function () {
        loadScript("src/smartadmin/js/plugin/jcrop/jquery.color.min.js", pagefunction);
    });
</script>