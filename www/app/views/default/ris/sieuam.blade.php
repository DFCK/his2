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
            <div class="col-xs-12 col-sm-4 col-lg-4 no-padding">
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
                                <form class="smart-form">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col col-xs-4">
                                                <label class="label">Từ ngày</label>
                                                <label class="input">
                                                    <input data-mask="99-99-9999" data-mask-placeholder="_"
                                                           ng-model="datefrom">
                                                </label>
                                            </section>
                                            <section class="col col-xs-4">
                                                <label class="label">Đến ngày</label>
                                                <label class="input">
                                                    <input data-mask="99-99-9999" data-mask-placeholder="_"
                                                           ng-model="dateto">
                                                </label>
                                            </section>
                                            <section class="col col-xs-4">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="checkbox" ng-checked="!status" data-ng-click="status = !status">
                                                    <i></i>Đang chờ</label>
                                                <label>
                                                    <a data-ng-click="loadlist()"><i class="fa fa-refresh fa-2x"></i></a>
                                                </label>
                                            </section>
                                        </div>
                                    </fieldset>
                                </form>
                                <hr>
                                <ul class="nav nav-pills nav-stacked">
                                    <li data-ng-repeat="rq in requestlist">
                                        <a>
                                            <strong>@{{rq.lastname}} @{{rq.firstname}}</strong> (@{{rq.yob}})
                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <i>@{{rq.date*1000 | date:"dd-MM-yyyy HH:mm"}}</i></span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
<script>
    pageSetUp();
    var RisSieuamController = function ($scope,$filter,$http) {
        $scope.requestlist = [];
        $scope.status = 0;
        $scope.datefrom = $filter('date')(new Date(),'dd-MM-yyyy');
        $scope.dateto = $filter('date')(new Date(),'dd-MM-yyyy');
        $scope.$watch('datefrom',function(){
            if(!$scope.datefrom){
                $scope.datefrom = $filter('date')(new Date(),'dd-MM-yyyy');
            }
        });
        $scope.$watch('dateto',function(){
            if(!$scope.dateto){
                $scope.dateto = $filter('date')(new Date(),'dd-MM-yyyy');
            }
        });
        $scope.loadlist = function () {
            if($scope.status)
                $scope.status = 1;
            else $scope.status = 0;
            $http.get('ris/loadsieuamrequest/'+$scope.datefrom+"/"+$scope.dateto+"/"+$scope.status)
                .success(function (data) {
                    $scope.requestlist = data;
                });
        }
        $scope.loadlist();
    };
</script>