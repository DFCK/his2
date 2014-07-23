<div data-ng-controller="personregistercontroller">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-barcode fa-fw"></i>{{trans('pas.dk')}}
            </h1>
        </div>

    </div>
    <section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0"
                 data-widget-editbutton="false" data-widget-deletebutton="false">
                <!-- widget options:
                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>
                    <h2>{{trans('pas.personinfo')}}</h2>
                </header>
                <!-- widget div-->
                <div class="">

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <div class="alert  fade in @{{notifstyle}}" ng-show="toggle">
                            <button class="close" ng-click="toggle = !toggle">×</button>
                            <i class="fa fa-fw @{{notificon}}"></i>
                            <strong>@{{notifmessage}}</strong>
                        </div>
                        <form class=" smart-form" id="formmodule">
                            <fieldset>
                                <div class="row  ">
                                    <div class="col-xs-9">
                                    <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                        <label class="label">{{trans('pas.lastname')}}</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="person.id">
                                            <input type="text" name="lastname"
                                                   placeholder="{{trans('pas.lastname')}}"
                                                   ng-model="person.lastname" required>
                                        </label>
                                    </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                        <label class="label">{{trans('pas.firstname')}}</label>
                                        <label class="input">
                                            <input ng-model="person.firstname" name="firstname"
                                                   type="text" placeholder="{{trans('pas.firstname')}}">

                                            <b class="tooltip tooltip-bottom-right">controller/function</b>
                                        </label>
                                    </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                        <label class="label">{{trans('pas.sex')}}</label>
                                        <label class="select">
                                            <select ng-model="person.sex">
                                                <option value="0">{{trans('pas.sex')}}</option>
                                                <option value="m">{{trans('pas.men')}}</option>
                                                <option value="f">{{trans('pas.femal')}}</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>

                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                        <label class="label">{{trans('pas.DOB')}}</label>
                                        <label class="input">
                                            <input ng-model="person.dob" name="dob"
                                                   type="text" placeholder="{{trans('pas.DOB')}}">
                                            <b class="tooltip tooltip-bottom-right">{{trans('dateformat')}}</b>
                                        </label>
                                    </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                        <section class="col-xs-6">
                                            <label class="label">{{trans('pas.YOB')}}</label>
                                            <label class="input">
                                                <input ng-model="person.yob" name="yob"
                                                       type="text" placeholder="{{trans('pas.YOB')}}">
                                            </label>
                                        </section>
                                        <section class="col col-xs-6">
                                            <label class="label">{{trans('pas.age')}}</label>
                                            <label class="input">
                                                <input ng-model="person.age" name="age"
                                                       type="text" placeholder="{{trans('pas.age')}}">
                                            </label>
                                        </section>
                                    </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">

                                        </section>
                                        <div style="clear:both;"></div>
                                        <section class="col col-lg-6 col-xs-6 col-sm-6 col-md-6">
                                            <label class="label">{{trans('pas.address')}}</label>
                                            <label class="input">
                                                <input ng-model="person.address" name="address"
                                                       type="text" placeholder="{{trans('pas.address')}}">
                                            </label>
                                        </section>
                                        <section class="col col-lg-2 col-xs-6 col-sm-2 col-md-2">
                                            <label class="label">{{trans('pas.shortcut')}}</label>
                                            <label class="input">
                                                <input ng-model="person.shortcut" name="shortcut"
                                                       type="text" placeholder="{{trans('pas.shortcut')}}">
                                            </label>
                                        </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                            <label class="label">{{trans('pas.province')}}</label>
                                            <label class="select">
                                                <select ng-model="person.province">
                                                    <option value="0">{{trans('pas.province')}}</option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                            <label class="label">{{trans('pas.district')}}</label>
                                            <label class="select">
                                                <select ng-model="person.district">
                                                    <option value="0">{{trans('pas.district')}}</option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                            <label class="label">{{trans('pas.addressward')}}</label>
                                            <label class="select">
                                                <select ng-model="person.addressward">
                                                    <option value="0">{{trans('pas.addressward')}}</option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                            <label class="label">{{trans('pas.doituong')}}</label>
                                            <label class="select">
                                                <select ng-model="person.doituong">
                                                    <option value="0">{{trans('pas.doituong')}}</option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="col-xs-3">
                                        <section class="col col-xs-12">
                                            <input type="hidden" ng-model="person.avatar" id="inputavatar">
                                            <img src="{{asset('images/noavatarm.jpg')}}" ng-model="person.avatar" id="pasavatar" class="img-responsive img-thumbnail">
                                            <a style="position: absolute; top:15px;left:30px;" href="" ng-click="camera()" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary">
                                                &nbsp;&nbsp;&nbsp;<i class="fa fa-camera"></i>&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </section>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->


            </div>
            <!-- end widget -->
        </article>
        <!-- end article -->

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
<!--                    <button type="button" class="btn btn-default" id="stop" data-ng-click="stopcamera()">Dừng camera-->
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
    function personregistercontroller($scope) {
        $scope.person = {
            sex: 0,
        };
        $scope.noavatar = {
            m:"{{asset('images/noavatarm.jpg')}}",
            f:"{{asset('images/noavatarf.jpg')}}"
        }
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
            context.drawImage(video, 80, 0, 480, 480, 0, 0, 480, 480);
            // "image/webp" works in Chrome.
            // Other browsers will fall back to image/png.
            document.getElementById("modelcapture").src = canvas.toDataURL('image/webp');
            document.getElementById("pasavatar").src = canvas.toDataURL('image/webp');
            $scope.stopcamera();
        }
        $scope.stopcamera = function () {
            video.pause();
            if (navigator.getUserMedia){
                video.src = null;
            }
            else if (navigator.mozGetUserMedia){
                video.mozSrcObject = null;
            }
            else if (navigator.webkitGetUserMedia){
                video.src = "";
            }
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