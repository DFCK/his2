<div data-ng-controller="RisSieuamController">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>Phòng Siêu âm
            </h1>
        </div>
        <div class="col-xs-12 col-md-8">
            <style>
                #sparks li h5 {
                    text-transform: none;
                }
            </style>
            <ul id="sparks" class="">

            </ul>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-4  no-padding">
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-sieuam0"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false"
                         data-widget-togglebutton="false"
                         data-widget-colorbutton="false"
                        >
                        <header>
                            <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                            <h2>Danh sách yêu câu siêu âm</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">
                                <div class="row">
                                    <div class="col col-xs-7">
                                        <p class="input-group">
                                        <p class="input-group">
                                            <input type="text" class="form-control"
                                                   datepicker-popup="@{{format}}"
                                                   ng-model="date" is-open="opened"
                                                   datepicker-options="dateOptions"
                                                   date-disabled="disabled(date, mode)"
                                                   ng-required="true" close-text="Đóng"
                                                   data-mask="99-99-9999"
                                                   data-mask-placeholder="_"/>
                                              <span class="input-group-btn">
                                                <button type="button" class="btn btn-default"
                                                        ng-click="open($event)">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </button>
                                              </span>
                                        </p>
                                    </div>


                                    <div class="col-xs-5 no-padding">
                                        <form class="smart-form">
                                            <fieldset>

                                                <label class="checkbox">
                                                    <input type="checkbox" name="checkbox"
                                                           ng-checked="!status"
                                                           data-ng-click="status = !status">
                                                    <i></i>Chờ

                                                </label>

                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="col-xs-10 no-padding">
                                        <form class="smart-form">
                                            <fieldset>

                                                <label class="input">
                                                    <input type="text" name="search"
                                                           ng-model="search" placeholder="Tìm kiếm">
                                                </label>

                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="col col-xs-2 padding-top-15">
                                        <a data-ng-click="loadlist()"><i
                                                class="fa fa-refresh fa-2x"></i></a>
                                    </div>
                                </div>
                                <hr>
                                <ul class="nav nav-pills nav-stacked">
                                    <li data-ng-repeat="rq in requestlist">
                                        <a data-ng-click="show(rq)">
                                            <i>#@{{rq.id}}</i> <strong>@{{rq.lastname}}
                                                                       @{{rq.firstname}}</strong>
                                            (@{{rq.yob}})
                                            <span class="pull-right"><i
                                                    class="fa fa-clock-o"></i> <i>@{{rq.date*1000 |
                                                                                  date:"HH:mm"}}</i></span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-8" ng-show="Request.eid">
                <div class="alert alert-info">
                    <p>#@{{Request.id}} Bệnh nhân: <strong><a href="/#/pas/person/@{{Request.pid}}">@{{Request.lastname}}
                                                                                                    @{{Request.firstname}}</a></strong>
                       (@{{Request.yob}}). Mã tiếp đón <strong>@{{Request.eid}}</strong></p>
                    <p>Yêu cầu: <strong>@{{Request.positionname}}</strong></p>
                    <p>
                        <labe ng-if="Request.diduoc == 0">Không đi được.</labe>
                        <labe ng-if="Request.diung == 1">Bị dị ứng.</labe>
                        <labe ng-if="Request.cuonggiap == 1">Bị cường giáp.</labe>
                        <labe ng-if="Request.mangthai == 1">Mang thai.</labe>
                    </p>
                    <p ng-if="Request.lamsang">Thông tin lâm sàn: @{{Request.lamsang}}</p>
                    <p ng-if="Request.note">Ghi chú: @{{Request.note}}</p>
                    <p>Bác sĩ yêu cầu: <strong>@{{Request.staff}}</strong></p>
                </div>

                    <article class="col-xs-12 no-padding">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blue" id="wid-id-sieuam3"
                             data-widget-editbutton="false"
                             data-widget-deletebutton="false"
                             data-widget-sortable="false"
                             data-widget-togglebutton="false"
                             data-widget-colorbutton="false"
                            >
                            <header>
                                <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                                <h2>Kết quả siêu âm</h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="widget-body">
                        <div class="row">
                            <div class="col col-xs-12 padding-bottom-10">
                                    <button type="button" class="btn btn-warning" id="star"
                                            data-ng-click="camera()">
                                        Mở/Đóng
                                    </button>
                                    <button type="button" class="btn btn-info" id="snap"
                                            data-ng-click="camcapture(1)">
                                        Lấy hình 1
                                    </button>
                                    <button type="button" class="btn btn-info" id="snap2"
                                            data-ng-click="camcapture(2)">
                                        Lấy hình 2
                                    </button>
                                    <button type="button" class="btn btn-success" id="snap2"
                                            data-ng-click="save()">
                                        Lưu
                                    </button>
                                    <button type="button" class="btn btn-primary" id="snap2"
                                            data-ng-click="close()">
                                        Xong
                                    </button>
                            </div>
                            <div class="col-xs-8">
                                <textarea class="summernote" ng-model="resulttext"></textarea>
                            </div>
                            <div class="col-xs-4">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div ng-show="sieuamimage[1]" style="position: relative">
                                            <img src="@{{sieuamimage[1]}}"
                                                 class="img-responsive img-thumbnail"
                                                 style="max-height: 210px">
                                            <i class="fa fa-minus-circle fa-2x"
                                               data-ng-click="delimage(1)"
                                               style="position: absolute;bottom:10px;left:15px"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div ng-show="sieuamimage[2]">
                                            <img src="@{{sieuamimage[2]}}"
                                                 class="img-responsive img-thumbnail"
                                                 style="max-height: 210px">
                                            <i class="fa fa-minus-circle fa-2x"
                                               data-ng-click="delimage(2)"
                                               style="position: absolute;bottom:10px;left:15px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-xs-12 padding-bottom-10 padding-top-10">
                                <button type="button" class="btn btn-warning" id="star"
                                        data-ng-click="camera()">
                                    Mở/Đóng
                                </button>
                                <button type="button" class="btn btn-info" id="snap"
                                        data-ng-click="camcapture(1)">
                                    Lấy hình 1
                                </button>
                                <button type="button" class="btn btn-info" id="snap2"
                                        data-ng-click="camcapture(2)">
                                    Lấy hình 2
                                </button>
                                <button type="button" class="btn btn-success" id="snap2"
                                        data-ng-click="save()">
                                    Lưu
                                </button>
                                <button type="button" class="btn btn-primary" id="snap2"
                                        data-ng-click="close()">
                                    Xong
                                </button>
                            </div>

                        </div>
                        <div class="row">
                        <div>
                            <video id="video" width="640" height="480" autoplay
                                   ng-show="iscamera"></video>
                            <canvas id="canvas" width="640" height="480"
                                    style="display: none"></canvas>
                            <img id="modelcapture" src="" ng-show="!iscamera">
                        </div>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    pageSetUp();
    var RisSieuamController = function ($scope, $filter, $http, ngProgress) {

        $scope.initDate = new Date();
        $scope.formats = ['dd-MM-yyyy'];
        $scope.format = $scope.formats[0];
        $scope.today = function () {
            $scope.date = new Date();
        };

        $scope.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
            $scope.opened = true;
        };
        $scope.Request = {};
        $scope.requestlist = [];
        $scope.status = 0;
        $scope.onajax = false;
        $scope.show = function (request) {
            angular.copy(request, $scope.Request);
            if(!$scope.status){
                $http.get('ris/loadristemplate/sieuam/'+request.position)
                    .success(function(data){
                        $scope.resulttext = data;
                        $('.summernote').code(data);
                        $scope.sieuamimage = ["","",""];
                    });
            }
            else{
                $http.get('ris/loadsieuamresult/'+request.id)
                    .success(function(data){
                        $scope.Result = data;
                        $('.summernote').code($scope.Result.textresult);
                        $scope.sieuamimage[1] = $scope.Result.image1;
                        $scope.sieuamimage[2] = $scope.Result.image2;
                    });
            }

        }
        $scope.loadlist = function () {
            if (!$scope.onajax) {
                $scope.onajax = true;
                ngProgress.start();
                if ($scope.status) {
                    $scope.status = 1;
                }
                else {
                    $scope.status = 0;
                }
                $http.get('ris/loadrisrequest/sieuam/' + $filter('date')($scope.date, 'dd-MM-yyyy') + "/" + $scope.status)
                    .success(function (data) {
                        ngProgress.complete();
                        $scope.requestlist = data;
                        if ($scope.requestlist.length > 0) {
                            $scope.show($scope.requestlist[0]);
                        }
                        $scope.onajax = false;
                    });
            }

        }
        $scope.Result = {};
        $scope.save = function(){
            ngProgress.start();
            $scope.Result = {
                request_id: $scope.Request.id,
                pid: $scope.Request.pid,
                eid: $scope.Request.eid,
                type: $scope.Request.type,
                position: $scope.Request.position,
                positionname: $scope.Request.positionname,
                textresult: $('.summernote').code(),
                image1:$scope.sieuamimage[1],
                image2:$scope.sieuamimage[2],
                daterequest:$scope.Request.date,
                date:'',
                id: (($scope.Result.id)?$scope.Result.id:0),
            };
            $http.post('ris/savesieuam',{
                data:$scope.Result
            }).success(function(data){
                    if(data==0){
                        myalert("Thông báo","Có lỗi khi lưu!");
                    }
                    else{
                        if($scope.Result.id == 0)
                            $scope.Result = data;
                    }
                    ngProgress.complete();
                }).error(function(){
                    myalert("Thông báo","Có lỗi khi lưu!");
                    ngProgress.complete();
                })
        }
        $scope.close = function(){
            $scope.loadlist();
            $scope.Result = {};
        }
        $scope.sieuamimage = ["","",""];


        $scope.stopcamera = function(){
            stopcamera();
        }
        $scope.iscamera = false;
        $scope.delimage = function (index) {
            $scope.sieuamimage[index] = "";
        }
        $scope.camera = function () {
            if( !$scope.iscamera ) {
                opencamera();
                $scope.iscamera = true;
            }
            else{
                $scope.stopcamera();
                $scope.iscamera = false
            }
        };

        $scope.camcapture = function (index) {
            context.drawImage(video, 0, 0, 640, 480, 0, 0, 640, 480);
            $scope.sieuamimage[index] = canvas.toDataURL("image/jpeg");
        };
        $scope.today();
        $scope.loadlist();
    };
    var pagefunction = function () {

        // summernote
        $('.summernote').summernote({
            height: 300,
            focus: false,
            tabsize: 1,
            toolbar: [
                //[groupname, [button list]]

                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', [ 'paragraph']],
                ['height', ['height']],
                ['misc', ['fullscreen']]
            ]
        });

    };

    // end pagefunction

    // load summernote, and all markdown related plugins
    loadScript("src/smartadmin/js/plugin/summernote/summernote.min.js", pagefunction);
</script>