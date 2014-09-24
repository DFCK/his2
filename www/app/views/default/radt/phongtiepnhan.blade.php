<div data-ng-controller="RadtPhongtiepnhanController">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>Phòng tiếp nhận
            </h1>
        </div>
        <div class="col-xs-12 col-md-8">
            <style>
                #sparks li h5{
                    text-transform: none;
                }
                .sparks-info span{
                    line-height: 28px;
                }
            </style>
            <ul id="sparks" class="">
                <li class="sparks-info">
                    <h5> &nbsp;
                        <span class="txt-color-blue">
                            @{{deptinfo.name}}</span>
                    </h5>

                </li>
                <li class="sparks-info">
                    <h5>Đang chờ
                       <span class="txt-color-blue">
                        <i class="fa fa-stack-overflow"></i>&nbsp;@{{deptinfo.wait}}
                    </span>
                    </h5>

                </li>
                <li class="sparks-info">
                    <h5>Đã khám
                     <span class="txt-color-blue">
                        <i class="fa fa-stethoscope"></i>&nbsp;@{{deptinfo.finish}}
                    </span>
                    </h5>

                </li>
                <!--                <li class="sparks-info">-->
                <!--                    <div class="sparkline txt-color-blue">-->
                <!--                        1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471-->
                <!--                    </div>-->
                <!--                </li>-->
            </ul>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-padding">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-phongtiepnhan0"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
                            <h2>
                                Danh sách bệnh nhân
                            </h2>
                        </header>
                        <!-- widget div-->
                        <div class="">

                            <!-- widget content -->
                            <div class="widget-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="input-group">
                                            <input type="text" class="form-control"
                                                   datepicker-popup="@{{format}}"
                                                   ng-model="dt" is-open="opened"
                                                   datepicker-options="dateOptions"
                                                   date-disabled="disabled(date, mode)"
                                                   ng-required="true" close-text="Close"
                                                   data-mask="99-99-9999" data-mask-placeholder= "_"/>
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-default"
                                            ng-click="open($event)">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </button>

                                  </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-1 no-padding">
                                        <a class="" data-ng-click="loadroom()"><i class="fa  fa-2x fa-refresh padding-5"></i></a>
                                    </div>
                                </div>
                                <div data-ng-include="'{{URL::to('tpl/roomqueue')}}'"></div>

                            </div>
                            <!-- end widget content -->
                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->
                </article>
                <!-- end article -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-padding">


                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-phongtiepnhan1"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>
                            <h2>Các phòng khám</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body roomlist"
                                 data-ng-include="'{{URL::to('tpl/outpatientroom')}}'">

                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
                <!-- end article -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-phongtiepnhan2"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                            <h2>Thống kê 7 ngày</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">

                                <div id="bar-chart" class="chart"></div>
                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
            </div>

        </div>
        <!-- end row -->
    </section>
    <!-- end section -->
</div>
<!-- end controller -->
<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();

    /**
     * AngularJS controller
     * @param $scope
     * @param $http
     */
    function RadtPhongtiepnhanController($scope, $http, $interval,$filter,ngProgress) {
        if(ngProgress.status()<=0)
            ngProgress.start();
        $(document).ready(function(){
            ngProgress.complete();
        });
        $scope.initDate = new Date();
        $scope.formats = ['dd-MM-yyyy'];
        $scope.format = $scope.formats[0];
        $scope.today = function() {
            $scope.dt = new Date();
        };
        $scope.today();
        $scope.open = function($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        };
        //$filter('date')(new Date(),'dd-MM-yyyy HH:mm');

        $scope.deptcode = '{{$dept}}';
        $scope.deptinfo = {};
        var stoproom;
        $scope.autoloadroom = function () {
            if (angular.isDefined(stoproom)) {
                return;
            }
            stoproom = $interval(function () {
                $scope.loadroom();
            }, 15000);  //15s
        };
        $scope.$watch('dt',function(){
            if($scope.dt){
                $scope.loadroom();
            }
        })

        $scope.stopRoom = function () {
            if (angular.isDefined(stoproom)) {
                $interval.cancel(stoproom);
                stoproom = undefined;
            }
        };

        $scope.$on('$destroy', function () {
            $scope.stopRoom();
            ngProgress.complete();
        });
        $scope.loadroom = function () {
            $scope.datenow = Date.now();
            if(ngProgress.status()<=0)
                ngProgress.start();
            $http.get('radt/tiepnhanupdate/')
                .success(function(data){
                    $scope.deptinfo = data.deptinfo;
                    $scope.roomlist = data.roomlist;
                    ngProgress.complete();
                });
//            $http.get('radt/outpatientroom')
//                .success(function (data) {
//                    $scope.roomlist = data;
//                    angular.forEach(data,function(value,key){
//                        if(value.code == $scope.myroom){
//                            $scope.myroominfo = value;
//                        }
//                        ngProgress.complete();
//                    });
//                });
//            $http.get('radt/roomqueue/'+$filter('date')($scope.dt,'dd-MM-yyyy'))
//                .success(function (data) {
//                    $scope.queue = data;
//                    console.log($scope.queue);
//                });
        }
        $scope.discharged = function(enc,type){
            if(enc.diagnosiscode=="") {
                myalert("Thông báo","Bệnh nhân chưa có chẩn đoán chính nên chưa thể xuất viện.");
                return;
            }
            $http.put('radt/discharged/'+enc.eid+'/'+type)
                .success(function(data){
                    if(data > 0){
                        $scope.loadroom();
                    }
                    else{
                        myalert("Thông báo","Thao tác thất bại. Vui lòng thử lại.");
                    }
                })
        }
//        $scope.loadroom();//first load
        $scope.autoloadroom();// call auto load room
    }

    function pagefunction(){
        /* chart colors default */
        var $chrt_border_color = "#efefef";
        var $chrt_grid_color = "#DDD"
        var $chrt_main = "#E24913";			/* red       */
        var $chrt_second = "#6595b4";		/* blue      */
        var $chrt_third = "#FF9F01";		/* orange    */
        var $chrt_fourth = "#7e9d3a";		/* green     */
        var $chrt_fifth = "#BD362F";		/* dark red  */
        var $chrt_mono = "#000";

        if ($("#bar-chart").length) {

            var data1 = [];
            for (var i = 1; i <= 7; i += 1)
                data1.push([i, parseInt(Math.random() * 30)]);

            var ds = new Array();

            ds.push({
                data : data1,
                bars : {
                    show : true,
                    barWidth : 1,
                    order : 1
                }
            });

            //Display graph
            $.plot($("#bar-chart"), ds, {
                colors : [$chrt_second, $chrt_fourth, "#666", "#BBB"],
                grid : {
                    show : true,
                    hoverable : true,
                    clickable : true,
                    tickColor : $chrt_border_color,
                    borderWidth : 0,
                    borderColor : $chrt_border_color
                },
                legend : true,
                tooltip : true,
                tooltipOpts : {
                    content : "<b>%x</b> = <span>%y</span>",
                    defaultTheme : false
                }

            });

        }

        /* end bar chart */

    }
    // load all flot plugins
    // load all flot plugins
    loadScript("src/smartadmin/js/plugin/flot/jquery.flot.cust.min.js", function(){
        loadScript("src/smartadmin/js/plugin/flot/jquery.flot.resize.min.js", function(){
            loadScript("src/smartadmin/js/plugin/flot/jquery.flot.fillbetween.min.js", function(){
                loadScript("src/smartadmin/js/plugin/flot/jquery.flot.orderBar.min.js", function(){
                    loadScript("src/smartadmin/js/plugin/flot/jquery.flot.pie.min.js", function(){
                        loadScript("src/smartadmin/js/plugin/flot/jquery.flot.tooltip.min.js", pagefunction);
                    });
                });
            });
        });
    });
    </script>