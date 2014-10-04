<div data-ng-controller="HrmRoleController">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-exchange"></i> {{trans('hrm.accountnrole')}}
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
        <div class="jarviswidget" id="wid-id-accountnrole0"
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
                    <div ng-if="person && person.id">
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
    <div class="col col-xs-12 col-sm-8">
        <article class="">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-accountnrole1"
                 data-widget-editbutton="false"
                 data-widget-fullscreenbutton="false"
                >
                <header>
                    <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                    <h2>{{trans('hrm.account')}}</h2>
                </header>
                <!-- widget div-->
                <div class="">
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form class=" smart-form" id="formpersoninfo">
                            <fieldset>
                                <div class="row  ">
                                    <section class="col col-xs-12 col-sm-6">
                                        <input ng-model="account.id" type="hidden">
                                        <label class="label">{{trans('hrm.account')}}</label>
                                        <label class="input">
                                            <input type="text" name="username"
                                                   placeholder="{{trans('hrm.account')}}"
                                                   ng-model="account.username" tabindex="1">
                                        </label>
                                    </section>
                                    <section class="col col-xs-12 col-sm-6">
                                        <label class="label">{{trans('hrm.password')}}</label>
                                        <label class="input">
                                            <input type="text" name="password"
                                                   placeholder="{{trans('hrm.password')}}"
                                                   ng-model="account.password" tabindex="2">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button class="btn btn-success" data-ng-click="saveaccount()">Lưu</button>
                            </footer>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <article class="">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-accountnrole2"
                 data-widget-editbutton="false"
                 data-widget-fullscreenbutton="false"
                >
                <header>
                    <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                    <h2>{{trans('hrm.role')}}</h2>
                </header>
                <!-- widget div-->
                <div class="">
                    <!-- widget content -->
                    <div class="widget-body">

                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
    </div>

</div>
<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();

    function HrmRoleController($scope, $http) {
        $scope.person = {{$person}};

        $scope.clear = function(){
            $scope.account = {
                id:'',
                username:'',
                password:'',
                pid:'',
                empid:''
            }
        }
        $scope.clear();
        $scope.loademployee = function (pid) {
            $http.get('hrm/employeeinfo/' + pid)
                .success(function (data) {
                    if (angular.isObject(data)) {
                        $scope.employee = data;
                        $scope.loademployeetransfer();
                    }
                    else {
                        $scope.employee = {
                            hospital_code: "{{$hospital_code}}",
                            title: 0,
                            id: '',
                            pid: $scope.person.pid
                        };
                    }
                })
        };
        $scope.loademployeetransfer = function () {
            if ($scope.employee) {
                $http.get('hrm/employeelisttransfer/' + $scope.employee.pid)
                    .success(function (data) {
                        $scope.listtransfer = data;
                    })
            }
        };
        if ($scope.person) {
            $scope.loademployee($scope.person.pid);
        }
        $scope.search = function () {
            $http.get('hrm/search/' + $scope.employeesearch)
                .success(function (data) {
                    $scope.person = data;
                    if ($scope.person) {
                        $scope.loademployee($scope.person.pid);
                    }
                });
        };
        $scope.saveaccount = function(){
            $http.post('hrm/saveaccount',{
                data:$scope.account
            }).success(function(data){

            });
        }

    }

    var pagefunction = function () {
    };
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>