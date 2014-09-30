<div data-ng-controller="AdminEmployeeController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-group"></i> {{trans('hrm.adminemployee')}}
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
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                        <h2>Thông tin con người</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="row-fluid">
                                <div class="col-xs-10">
                                    <input class="form-control"
                                           ui-keydown="{'enter': 'search()'}"
                                           ng-model="employeesearch" placeholder="Mã con người hoặc mã nhân viên">
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
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>


            <!-- NEW WIDGET START -->
            <article class="col col-xs-12 col-sm-8 " ng-if="person && person.id">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-adminemployee1"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                        <h2>Thông tin nhân viên</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form class=" smart-form" id="formemployee">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-xs-12">
                                            <input type="hidden" ng-model="employee.id">
                                            <p ng-if="employee.id != ''">ID nhân viên: <b>#@{{employee.id}}</b></p>
                                            </section>

                                        <section class="col col-xs-12">
                                            <label class="select">
                                                <select ng-model="employee.hospital_code">
                                                    <option data-ng-repeat="item in hospital" value="@{{item.code}}">
                                                        @{{item.name}}
                                                    </option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-xs-12">
                                            <label class="select">
                                                <select ng-model="employee.title">
                                                    <option value="0">Chức danh</option>
                                                    <option data-ng-repeat="item in emptitle" value="@{{item.code}}">
                                                        @{{item.name}}
                                                    </option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button class="btn btn-primary" data-ng-click="save()">Lưu</button>
                                </footer>
                                </form>
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
            $scope.employee = {
                hospital_code : "{{$hospital_code}}",
                title : 0,
                id:''
            };
            $scope.hospital = {{$hospital}};
            $scope.emptitle = {{$emptitle}};
            $scope.person = {{$person}};
            $scope.search = function(){
                $http.get('hrm/search/'+$scope.employeesearch)
                    .success(function(data){
                        $scope.person = data;
                        if($scope.person){
                            $scope.loademployee($scope.person.pid);
                        }
                    });
            };
            $scope.save = function(){
                $http.post('hrm/save',{
                    data:$scope.employee
                }).success(function(data){
                    if(data > 0){
                        $scope.loademployee($scope.person.pid);
                        myalert("Thông báo","Lưu thành công.");
                    }
                    else{
                        myalert("Lỗi lưu","Lưu thông tin thất bại, vui lòng thử lại.")
                    }
                });
            }
            $scope.loademployee = function(pid){
                $http.get('hrm/employeeinfo/'+pid)
                    .success(function(data){
                        if(angular.isObject(data))
                            $scope.employee = data;
                        else{
                            $scope.employee = {
                                hospital_code : "{{$hospital_code}}",
                                title : 0,
                                id:'',
                                pid:$scope.person.pid
                            };
                        }
//                        console.log(angular.isObject(data) );
                    })
            }
            if($scope.person){
                $scope.loademployee($scope.person.pid);
            }
        }

        var pagefunction = function () {
        };
        loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    </script>