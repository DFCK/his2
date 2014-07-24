<div ng-app="doc.ui-utils">
<div data-ng-controller="personregistercontroller">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-barcode fa-fw"></i> {{trans('pas.dk')}}
            <button type="button" class="btn btn-labeled btn-success pull-right"
                    data-ng-click="save()">
         <span class="btn-label">
          <i class="fa fa-save txt-color-white"></i>
         </span>Lưu
            </button>
        </h1>

    </div>

</div>
<section id="widget-grid" class="">

<!-- row -->
<div class="row">

<!-- NEW WIDGET START -->
<article class="col-xs-12">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0"
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-fullscreenbutton="false">
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
            <span class="widget-icon"> <i class="fa fa-user"></i> </span>

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
                <form class=" smart-form" id="formpersoninfo">
                    <fieldset>
                        <div class="row  ">
                            <div class="col-xs-9">
                                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                                    <label class="label">{{trans('pas.lastname')}}</label>
                                    <label class="input">
                                        <input type="hidden" ng-model="person.id">
                                        <input type="text" name="lastname"
                                               placeholder="{{trans('pas.lastname')}}"
                                               ng-model="person.lastname" required tabindex="1"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.firstname')}}</label>
                                    <label class="input">
                                        <input ng-model="person.firstname" name="firstname"
                                               tabindex="2"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="{{trans('pas.firstname')}}">


                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.sex')}}</label>
                                    <label class="select">
                                        <select ng-model="person.sex" ng-change="changeavatar()"
                                                tabindex="3"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="0">{{trans('pas.sex')}}</option>
                                            <option value="m">{{trans('pas.men')}}</option>
                                            <option value="f">{{trans('pas.femal')}}</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                                <section class=" col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.DOB')}}</label>
                                    <label class="input">
                                        <input ng-model="person.dob" name="dob" tabindex="4"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="dd-mm-yyyy"
                                               ui-mask="99-99-9999">
                                        <b class="tooltip tooltip-bottom-right">{{trans('pas.dateformat')}}</b>
                                    </label>
                                </section>
                                <section class=" col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                    <section class="col col-xs-6">
                                        <label class="label">{{trans('pas.YOB')}}</label>
                                        <label class="input">
                                            <input ng-model="person.yob" name="yob" tabindex="5"
                                                   ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                                   type="text" placeholder="yyyy" ui-mask="9999"
                                                >
                                        </label>
                                    </section>
                                    <section class="col col-xs-6">
                                        <label class="label">@{{labelage}}</label>
                                        <label class="input">
                                            <input ng-model="person.age" name="age" tabindex="6"
                                                   ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                                   type="text" placeholder="">
                                        </label>
                                    </section>
                                </section>
                                <section class="col col-lg-6 col-xs-6 col-sm-6 col-md-6">
                                    <label class="label">{{trans('pas.address')}}</label>
                                    <label class="input">
                                        <input ng-model="person.address" name="address" tabindex="7"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="{{trans('pas.address')}}">
                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-6 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.shortcut')}}</label>
                                    <label class="input">
                                        <input ng-model="person.shortcut" name="shortcut"
                                               tabindex="8"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
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
                                        <select ng-model="person.doituong"
                                                onchange="changedoituong(this)" tabindex="9"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="bhyt">BHYT</option>
                                            <option value="tp">Thu Phí</option>
                                            <option value="mp">Miễn Phí</option>
                                            <option value="dv">Dịch vụ</option>
                                            <option value="k">Khác</option>

                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="col-xs-3">
                                <section class="col col-xs-12">
                                    <input type="hidden" ng-model="person.avatar" id="inputavatar">
                                    <img src="{{asset('images/noavatarm.jpg')}}"
                                         id="pasavatar"
                                         class="img-responsive img-thumbnail"
                                         style="max-height: 210px">
                                    <a style="position: absolute; top:15px;left:30px;" href=""
                                       ng-click="camera()"
                                       data-toggle="modal" data-target="#remoteModal"
                                       class="btn btn-primary">
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
<!-- NEW WIDGET START -->
<article class="col-xs-12">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-pinkDark" id="wid-id-1" data-widget-collapsed=""
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-fullscreenbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-credit-card"></i> </span>

            <h2>{{trans('pas.insuranceinfo')}}</h2>
        </header>
        <!-- widget div-->
        <div class="">
            <!-- widget content -->
            <div class="widget-body no-padding">
                <form class=" smart-form" id="forminsurance">
                    <fieldset>
                        <div class="row  ">
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insurancecode')}}</label>
                                <label class="input">
                                    <label class="icon-append">@{{countisurancecode}}</label>
                                    <input type="text" name="insurancecode"
                                           placeholder="Mã bảo hiểm"
                                           ng-model="person.insurancecode"

                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insurancefromdate')}}</label>
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input ng-model="person.insurancefromdate"
                                           name="insurancefromdate"
                                           type="text"
                                           placeholder="dd-mm-yyyy"
                                           ui-mask="99-99-9999">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insurancetodate')}}</label>
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input ng-model="person.insurancetodate" name="insurancetodate"
                                           type="text"
                                           placeholder="dd-mm-yyyy"
                                           ui-mask="99-99-9999">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insurancecompany')}}</label>
                                <label class="select">
                                    <select ng-model="person.insurancecompany">
                                        <option value="0">Bảo hiểm Y Tế</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.route')}}</label>
                                <label class="select">
                                    <select ng-model="person.route">
                                        <option value="0">{{trans('pas.routecorrect')}}</option>
                                        <option value="1">{{trans('pas.routewrong')}}</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insuranceplace')}}</label>
                                <label class="select">
                                    <select ng-model="person.insuranceplace">
                                        <option value="0">{{trans('pas.insuranceplace')}}</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
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
<article class="col-xs-12">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-yellow" id="wid-id-2"
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-collapsed=""
         data-widget-fullscreenbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

            <h2>{{trans('pas.moreinfo')}}</h2>
        </header>
        <!-- widget div-->
        <div class="">
            <!-- widget content -->
            <div class="widget-body no-padding">
                <form class=" smart-form" id="forminsurance">
                    <fieldset>
                        <div class="row  ">
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.country')}}</label>
                                <label class="select">
                                    <select ng-model="person.country">
                                    </select>
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.CMND')}}</label>
                                <label class="input">
                                    <input ng-model="person.cmnd" name="cmnd"
                                           type="text" placeholder="{{trans('pas.CMND')}}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.dateissue')}}</label>
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input ng-model="person.dateissue" name="dateissue"
                                           type="text" placeholder="dd-mm-yyyy"
                                           ui-mask="99-99-9999">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.placeissue')}}</label>
                                <label class="input">
                                    <input ng-model="person.placeissue" name="placeissue"
                                           type="text" placeholder="{{trans('pas.placeissue')}}">
                                </label>
                            </section>

                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <section class=" col-xs-3">
                                    <label class="label">&nbsp;</label>
                                    <label class="input">
                                        <input ng-model="person.careercode" name="careercode"
                                               type="text">
                                    </label>
                                </section>
                                <section class="col col-xs-9">
                                    <label class="label">{{trans('pas.career')}}</label>
                                    <label class="select">
                                        <select ng-model="person.career">
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </section>
                            <section class=" col-lg-3 col-xs-6 col-sm-3 col-md-3">

                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.ethnic')}}</label>
                                    <label class="select">
                                        <select ng-model="person.ethnic">

                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.blood')}}</label>
                                    <label class="select">
                                        <select ng-model="person.blood">
                                            <option value="0">{{trans('pas.blood')}}</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.phone')}}</label>
                                <label class="input">
                                    <input ng-model="person.phone" name="phone"
                                           type="text" placeholder="{{trans('pas.phone')}}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.email')}}</label>
                                <label class="input">
                                    <input ng-model="person.email" name="email"
                                           type="text" placeholder="{{trans('pas.email')}}">
                                </label>
                            </section>
                            <div style="clear:both;"></div>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relative')}}</label>
                                <label class="input">
                                    <input ng-model="person.relative" name="relative"
                                           type="text" placeholder="{{trans('pas.relative')}}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativetype')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativetype" name="relativetype"
                                           type="text" placeholder="{{trans('pas.relativetype')}}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativephone')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativephone" name="relativephone"
                                           type="text" placeholder="{{trans('pas.relativephone')}}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativeaddress')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativeaddress" name="relativeaddress"
                                           type="text"
                                           placeholder="{{trans('pas.relativeaddress')}}">
                                </label>
                            </section>
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
</div>
<!-- end row of grid widget -->
</section>
<!-- end section grid widget -->
<!-- Dynamic Modal -->
<style>
    .modal-dialog {
        width: 680px;
    }
</style>
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog"
     aria-labelledby="remoteModalLabel"
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
                <button type="button" class="btn btn-primary" id="star" data-ng-click="camera()">Mở
                                                                                                 camera
                </button>
                <button type="button" class="btn btn-success" id="snap"
                        data-ng-click="camcapture()">Lấy hình
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
<div class="row ">

    <div class="col col-xs-12">
        <button type="button" class="btn btn-labeled btn-success pull-right" data-ng-click="save()">
         <span class="btn-label">
          <i class="fa fa-save"></i>
         </span>Lưu
        </button>

    </div>
</div>
</div>

</div><!-- end app -->
<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();
    //    console.log(smartApp);
    function personregistercontroller($scope,$http) {
        $scope.person = {
            sex: 0,
            province: 0,
            district: 0,
            addressward: 0,
            doituong: 'bhyt',
            insurancefromdate: '',
            insurancetodate: '',
            insurancecompany: 0,
            avatar: '',
            country: 'vn',
            dob: '',
        };
        $scope.countisurancecode = 0;
        $scope.labelage = "Tuổi";
        $scope.noavatar = {
            m: "{{asset('images/noavatarm.jpg')}}",
            f: "{{asset('images/noavatarf.jpg')}}"
        }

        $scope.changeavatar = function () {
            if ($scope.person.avatar == "") {
                if ($scope.person.sex == 'm') {
                    document.getElementById("pasavatar").src = $scope.noavatar.m;
                }
                else {
                    document.getElementById("pasavatar").src = $scope.noavatar.f;
                }
            }

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
            $scope.person.avatar = canvas.toDataURL('image/webp');
            $scope.stopcamera();
        }
        $scope.$watch('person.avatar', function () {
            document.getElementById("inputavatar").value = $scope.person.avatar;
        });
        $scope.$watch('person.dob', function () {
            if ($scope.person.dob) {
                var tdob = $scope.person.dob;
                var y = tdob.substr(4, 4);
                var d = tdob.substr(0, 2);
                var m = tdob.substr(2, 2);
                var date = new Date();
                var crryear = date.getFullYear();
                var crrmon = date.getMonth() + 1;
                if (y < 1900 || y > crryear || d < 1 || d > 31 || m < 1 || m > 12 || (y == crryear && m > crrmon)) {
                    alert("Ngày tháng " + $scope.person.dob + " năm không đúng!");
                    $scope.person.dob = "";
                }
                else {
                    var monthage = monthDiff(new Date(y, (m - 1), d), date);
                    $scope.person.yob = y;
                    if (monthage > 12) {
                        $scope.labelage = "Tuổi";
                        $scope.person.age = date.getFullYear() - y;
                    }
                    else {
                        $scope.person.age = monthage;
                        $scope.labelage = "Tháng";
                    }
                }
            }
        });
        $scope.$watch('person.insurancetodate', function () {
            if ($scope.person.insurancetodate) {
                var tdob = $scope.person.insurancetodate;
                var y = tdob.substr(4, 4);
                var d = tdob.substr(0, 2);
                var m = tdob.substr(2, 2);
                var date = new Date();
                var crryear = date.getFullYear();
                var crrmon = date.getMonth() + 1;
                var crrday = date.getDate();
                if (y < crryear || d < 1 || d > 31 || m < 1 || m > 12 || (y == crryear && m < crrmon) || (y == crryear && m == crrmon && d < crrday)) {
                    alert("Bảo hiểm đã hết hạn!");
                    $scope.person.insurancetodate = "";
                }

            }
        });
        var monthDiff = function (d1, d2) {
            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth();
            months += d2.getMonth() + 1;
            return months <= 0 ? 0 : months;
        }
        $scope.$watch('person.yob', function () {
            if ($scope.person.yob) {
                var date = new Date();
                var crryear = date.getFullYear();
                if ($scope.person.yob > 1900 && $scope.person.yob <= crryear) {
                    if ($scope.person.dob) {
                        var tdob = $scope.person.dob;
                        var y = tdob.substr(4, 4);
                        if (y != $scope.person.yob) {
                            $scope.person.dob = "";
                            $scope.person.age = crryear - $scope.person.yob;
                        }
                    }
                    else {
                        $scope.person.age = crryear - $scope.person.yob;
                    }
                }
                else {
                    alert("Năm sinh " + $scope.person.yob + " không đúng ");
                    $scope.person.yob = "";
                }
            }
        });
        $scope.$watch('person.age', function () {
            if ($scope.person.age !== false) {
                if (!$scope.person.dob && $scope.person.yob) {
                    if ($scope.person.age <= 1) {
                        $scope.person.yob = "";
                        alert("Trẻ em dưới 1 tuổi phải nhập đủ ngày sinh!");
                        $('input[tabindex=4]').focus();
                    }
                }
            }
        });
        $scope.$watch('person.lastname', function () {
            if ($scope.person.lastname) {
                $scope.person.lastname = toTitleCase($scope.person.lastname);
            }
        });
        $scope.$watch('person.firstname', function () {
            if ($scope.person.firstname) {
                $scope.person.firstname = toTitleCase($scope.person.firstname);
            }
        });
        $scope.$watch('person.address', function () {
            if ($scope.person.address) {
                $scope.person.address = toTitleCase($scope.person.address);
            }
        });
        $scope.$watch('person.insurancecode', function () {
            if ($scope.person.insurancecode) {
                $scope.countisurancecode = ($scope.person.insurancecode).length;
                $scope.person.insurancecode = $scope.person.insurancecode.toUpperCase();
            }
            else {
                $scope.countisurancecode = 0;
            }
        });
        var toTitleCase = function (str) {
            return str.replace(/\w\S*/g, function (txt) {return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }
        $scope.stopcamera = function () {
            video.pause();
            if (navigator.getUserMedia) {
                video.src = null;
            }
            else if (navigator.mozGetUserMedia) {
                video.mozSrcObject = null;
            }
            else if (navigator.webkitGetUserMedia) {
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
            }
            else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
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
//        var searchshortcut = function(){
//
//        }
        $scope.nextinputCallback = function ($event) {
            var $target = $($event.target);
            var currentindex = parseInt($target.attr("tabindex"));
            if (currentindex == 8) {
                var shortcut = $($target).val();
                $http.get('pas/searchshortcut/'+shortcut)
                    .success(function(data){
                        console.log(data);
                    });
            }
            $('[tabindex=' + (currentindex + 1) + ']').focus();
            $event.preventDefault();
        };
        $scope.submitCallback = function ($event) {
//            console.log('call submit');
            $event.preventDefault();
        }

    }

    var jquerycropimg = function () {
        $('#modelcapture').Jcrop(
            {
                aspectRatio: 1 / 1
            }
        );
    }
    function changedoituong(select) {
//        if($(select).val()=="tp"){
//            $("#wid-id-1").addClass("jarviswidget-collapsed");
//            $("#wid-id-1").attr("data-widget-collapsed","true");
//            $('#widget-grid').jarvisWidgets();
//        }
//        else{
//            $("#wid-id-1").removeClass("jarviswidget-collapsed");
//            $("#wid-id-1").attr("data-widget-collapsed","");
//        }
    }

    var pagefunction = function () {
//    }, false);

    }
    loadScript("src/smartadmin/js/plugin/jcrop/jquery.Jcrop.min.js", function () {
        loadScript("src/smartadmin/js/plugin/jcrop/jquery.color.min.js", pagefunction);
    });
</script>