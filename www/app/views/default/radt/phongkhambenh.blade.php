<div data-ng-controller="RadtPhongkhamController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>Phòng khám
            </h1>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-phongkham0"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>
                        <h2>Danh sách bệnh nhân đang chờ</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">


                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
            </article>
            <!-- end article -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-phongkham1"
                         data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>
                            <h2>Phòng khám</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">

                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-phongkham2"
                         data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>
                            <h2>Các phòng khám khác</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body" data-ng-include="'{{URL::to('tpl/outpatientroom')}}'">

                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
                <!-- end article -->
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
    function RadtPhongkhamController($scope, $http,$interval) {
        $scope.myroom = '{{$room}}';
        var stoproom;
        $scope.autoloadroom = function() {
            if ( angular.isDefined(stoproom) ) return;
            stoproom = $interval(function() {
                $scope.loadroom();
            }, 15000);
        };

        $scope.stopRoom = function() {
            if (angular.isDefined(stoproom)) {
                $interval.cancel(stoproom);
                stoproom = undefined;
            }
        };

        $scope.$on('$destroy', function() {
            $scope.stopRoom();
        });
        $scope.loadroom = function(){
            $http.get('radt/outpatientroom/')
                .success(function(data){
                    $scope.roomlist = data;
                });
        }

        $scope.loadroom();//first load
        $scope.autoloadroom();// call auto load room
    }
    </script>