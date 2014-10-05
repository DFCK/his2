<div data-ng-controller="RisXquangController">
<div class="row">
    <div class="col-xs-12 col-md-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw"></i>Phòng X-Quang
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
        <div class="jarviswidget jarviswidget-color-blue" id="wid-id-xquang0"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
             data-widget-deletebutton="false"
             data-widget-sortable="false"
             data-widget-togglebutton="false"
             data-widget-colorbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                <h2>Danh sách yêu câu X-Quang</h2>
            </header>
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <div class="row">
                        <div class="col col-xs-7">
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
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox"
                                               ng-checked="!status"
                                               data-ng-click="status = !status">
                                        <i></i>Chờ

                                    </label>
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
        <div class="jarviswidget jarviswidget-color-blue" id="wid-id-xquang3"
             data-widget-editbutton="false"
             data-widget-deletebutton="false"
             data-widget-sortable="false"
             data-widget-togglebutton="false"
             data-widget-colorbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                <h2>Kết quả X-Quang</h2>
            </header>
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <div class="row" ng-if="Request.discharged==0">
                        <div class="col-xs-3 ">
                        <form class="smart-form">
                                <section class="col-xs-12">
                                    <label class="input">
                                        <input type="text" ng-model="searcheid">
                                    </label>
                                </section>
                        </form>

                        </div>
                        <div class="col-xs-1">
<!--                            <button class="btn btn-info" data-ng-click="loadbypid()">Ảnh của BN</button>-->
                            <button class="btn btn-info" data-ng-click="getpacsinstance()"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="col-xs-3">
                        <p class="input-group">
                            <input type="text" class="form-control"
                                   datepicker-popup="@{{format}}"
                                   ng-model="datesearch" is-open="searchopened"
                                   datepicker-options="dateOptions"
                                   date-disabled="disabled(date, mode)"
                                   ng-required="true" close-text="Đóng"
                                   data-mask="99-99-9999"
                                   data-mask-placeholder="_"/>
                                              <span class="input-group-btn">
                                                <button type="button" class="btn btn-default"
                                                        ng-click="opendatesearch($event)">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </button>
                                              </span>
                        </p>
                        </div>
                        <div class="col-xs-1">
                        <button class="btn btn-info" data-ng-click="loadbydate()"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="col-xs-3">
                        <button class="btn btn-success" data-ng-click="save()">{{trans('common.save')}}</button>
                        <button class="btn btn-primary" data-ng-click="close()">{{trans('common.close')}}</button>
                        </div>
                    </div>
                    <div>
                        <p ng-if="Pacsresultlist.length == 0 && issearchapi">Chưa tìm thấy dữ liệu.</p>
                        <ul class="col-xs-4">
                            <li data-ng-repeat="patient in Pacsresultlist">
                                <label><strong><a data-ng-click="getpacsstudy(patient.PK)">@{{patient.PAT_NAME}}</a></strong> (@{{patient.PAT_BIRTHDATE}})</label>
                            </li>
                        </ul>
                        <ul class="col-xs-4">
                            <li data-ng-repeat="study in PacsStudylist">
                                <label><strong><a data-ng-click="getpacsseries(study.PK)">#@{{study.PK}} @{{study.STUDY_DESC}}</a></strong> (@{{study.MODS_IN_STUDY}})</label>
                            </li>
                        </ul>
                        <ul class="col-xs-4">
                            <li data-ng-repeat="serie in PacsSerieslist">
                                <label><strong><a data-ng-click="getpacsinstance(serie.PK)">#@{{serie.PK}} Serie No.@{{serie.SERIES_NO}}</a></strong></label>
                            </li>
                        </ul>
                        <div class="row">
                        <ul class="col col-sm-12 col-lg-7 list-inline" id="instancechecklist">
                            <li data-ng-repeat="ins in PacsInstanceList" class="text-align-center col-xs-6">
                                <a  data-ng-click="viewImage('lg',ins)"><img src="@{{ins}}" style="max-height: 150px"></a><br>
                                <input type="checkbox" data-ng-click="checkimg(ins)" ng-checked="!statustmp">
                            </li>
                        </ul>
                            <div class="col col-sm-12 col-lg-5">
                                <textarea class="summernote"></textarea>
                            </div>
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
    var RisXquangController = function ($scope, $filter, $http, ngProgress,$modal) {

        $scope.initDate = new Date();
        $scope.formats = ['dd-MM-yyyy'];
        $scope.format = $scope.formats[0];
        $scope.today = function () {
            $scope.date = new Date();
            $scope.datesearch = new Date();
        };
        $scope.xquangimages = [];
        $scope.checkimg = function(url){
            if($scope.xquangimages.indexOf(url)>-1){
                $scope.xquangimages.pop(url);
            }
            else{
                $scope.xquangimages.push(url);
            }
        }
        $scope.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
            $scope.opened = true;
        };
        $scope.opendatesearch = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
            $scope.searchopened = true;
        };
        $scope.issearchapi = false;
        $scope.Pacsresultlist = [];
        $scope.loadbypid = function(){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $http.get('ris/pacspatientbypid/'+$scope.searcheid)
                .success(function(data){
                    $scope.issearchapi = true;
                    if(data.length > 0)
                    $scope.Pacsresultlist = data.data;
                    else $scope.Pacsresultlist = [];
                    ngProgress.complete();
                });
        }
        $scope.loadbydate = function(){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $scope.issearchapi = false;
            $http.get('ris/pacspatienbydate/'+$filter('date')($scope.datesearch, 'dd-MM-yyyy'))
                .success(function(data){
                    $scope.issearchapi = true;
                    $scope.Pacsresultlist = data.data;
                    ngProgress.complete();
                })
        }
        $scope.getpacsstudy = function(pk){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $scope.issearchapi = false;
            $http.get('ris/pacspatientstudy/'+$filter('date')($scope.datesearch, 'dd-MM-yyyy')+'/'+pk)
                .success(function(data){
                    $scope.issearchapi = true;
                    $scope.PacsStudylist = data.data;
                    ngProgress.complete();
                })
        }
        $scope.getpacsseries = function(studyid){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $scope.issearchapi = false;
            $http.get('ris/pacspatientseries/'+studyid)
                .success(function(data){
                    $scope.issearchapi = true;
                    $scope.PacsSerieslist = data.data;
                    ngProgress.complete();
                })
        }
        $scope.getpacsinstance = function(series_id){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $scope.xquangimages = [];
            $scope.issearchapi = false;
            $("#instancechecklist").find("input[type=checkbox]").attr('checked',false);
            $scope.statustmp = 1;
            $http.get('ris/pacspatientinstance/'+series_id)
                .success(function(data){
                    $scope.issearchapi = true;
                    $scope.PacsInstanceList = data.data;
                    ngProgress.complete();
                    console.log($scope.xquangimages);
                })
        }
        $scope.Request = {};
        $scope.requestlist = [];
        $scope.status = 0;
        $scope.onajax = false;
        $scope.searcheid = 0;
        $scope.PacsInstanceList = [];
        $scope.statustmp = 0;
        $scope.show = function (request) {
            angular.copy(request, $scope.Request);
            $scope.searcheid = $scope.Request.eid;
            $scope.xquangimages = [];
            $('.summernote').code("");
            angular.copy($scope.status,$scope.statustmp);
            if(!$scope.status){
                $http.get('ris/loadristemplate/xquang/'+request.position)
                    .success(function(data){
                        $scope.resulttext = data;
                        $('.summernote').code(data);
                    });
                $scope.xquangimages =[];
                $scope.PacsInstanceList = [];

            }
            else{
                $http.get('ris/loadrisresult/'+request.id)
                    .success(function(data){
                        $scope.Result = data;
                        $('.summernote').code($scope.Result.textresult);
                        $scope.xquangimages = $scope.Result.images.split("$$$");
                        angular.copy($scope.xquangimages,$scope.PacsInstanceList);
                    });
            }

        }
        $scope.loadlist = function () {
            if (!$scope.onajax) {
                $scope.onajax = true;
                if(ngProgress.status()<=0)
                    ngProgress.start();
                if ($scope.status) {
                    $scope.status = 1;
                }
                else {
                    $scope.status = 0;
                }
                $scope.xquangimages =[];
                $scope.PacsInstanceList = [];
                $http.get('ris/loadrisrequest/xquang/' + $filter('date')($scope.date, 'dd-MM-yyyy') + "/" + $scope.status)
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
            if(ngProgress.status()<=0)
            ngProgress.start();
            $scope.Result = {
                request_id: $scope.Request.id,
                pid: $scope.Request.pid,
                eid: $scope.Request.eid,
                type: $scope.Request.type,
                position: $scope.Request.position,
                positionname: $scope.Request.positionname,
                textresult: $('.summernote').code(),
                images:$scope.xquangimages.join("$$$"),
                daterequest:$scope.Request.date,
                date:'',
                id: (($scope.Result.id)?$scope.Result.id:0),
            };
            $http.post('ris/saveris',{
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
        $scope.viewImage = function (size,mainpic) {
            var Result ={};
            angular.copy($scope.Result,Result);
            Result.images = Result.images.split("$$$");
            var modalInstance = $modal.open({
                templateUrl: "{{URL::to('tpl/viewimage')}}",
                controller: ModalViewImages,
                size: size,
                resolve: {
                    Result:function(){
                        return Result;
                    },
                    mainpic:function(){
                        return mainpic;
                    }
                }
            });
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