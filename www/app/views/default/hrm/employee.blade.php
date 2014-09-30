<div data-ng-controller="AdminEmployeeController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-group"></i>{{trans('hrm.adminemployee')}}
            </h1>
        </div>
    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col col-xs-12 col-sm-4 ">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-adminemployee0"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <h2>Thông tin con người</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="row-fluid">
                                <div class="col-xs-10">
                                    <input class="form-control" ng-model="employeesearch" placeholder="Mã con người hoặc mã nhân viên">
                                </div>
                                <div class="col-xs-2">
                                    <a data-ng-click="search()" class="btn btn-success"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr>
                            <div ng-if="person && person.id" >
                                @include(Config::get('main.theme') . '.pas.personinfosmallng')
                            </div>
                            <div class="clear"></div>
                            <hr>
                            <a ng-if="person && person.id" class="btn btn-success">Thêm nhân sự</a>
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>


            <!-- NEW WIDGET START -->
            <article class="col col-xs-12 col-sm-8 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-adminemployee1"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <h2>Thông tin nhân viên</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body ">

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>
        </div>
    <script type="text/javascript">
        /* DO NOT REMOVE : GLOBAL FUNCTIONS!
         */
        pageSetUp();

        function AdminEmployeeController($scope, $http) {
            $scope.person = null;
            $scope.search = function(){
                $http.get('hrm/search/'+$scope.employeesearch)
                    .success(function(data){
                        $scope.person = data;
                    });
            }
        }

        var pagefunction = function () {
        };
        loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    </script>