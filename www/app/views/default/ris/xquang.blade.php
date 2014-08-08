<div data-ng-controller="RisSieuamController">
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
            <div class="col-xs-12 col-sm-4 col-lg-4 no-padding">
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

                            <h2>Danh sách yêu cầu X-Quang</h2>
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
                                               data-mask="99-99-9999" data-mask-placeholder= "_"/>
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
                                                <input type="checkbox" name="checkbox" ng-checked="!status"
                                                       data-ng-click="status = !status">
                                                <i></i>Đang chờ

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
                                        <a>
                                            <strong>@{{rq.lastname}} @{{rq.firstname}}</strong> (@{{rq.yob}})
                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <i>@{{rq.date*1000 | date:"HH:mm"}}</i></span>
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
    var RisSieuamController = function ($scope, $filter, $http,ngProgress) {
        $scope.initDate = new Date();
        $scope.formats = ['dd-MM-yyyy'];
        $scope.format = $scope.formats[0];
        $scope.today = function() {
            $scope.date = new Date();
        };

        $scope.open = function($event) {
            $event.preventDefault();
            $event.stopPropagation();
            $scope.opened = true;
        };

        $scope.requestlist = [];
        $scope.status = 0;
        $scope.onajax = false;
        $scope.loadlist = function () {
            if(!$scope.onajax){
                $scope.onajax = true;
                ngProgress.start();
                if ($scope.status)
                    $scope.status = 1;
                else $scope.status = 0;
                $http.get('ris/loadxquangrequest/' + $filter('date')($scope.date,'dd-MM-yyyy') + "/" + $scope.status)
                    .success(function (data) {
                        ngProgress.complete();
                        $scope.requestlist = data;
                        $scope.onajax = false;
                    });
            }

        }
        $scope.today();
        $scope.loadlist();
    };
</script>