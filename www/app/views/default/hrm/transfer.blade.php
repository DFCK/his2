<div data-ng-controller="HrmTransferController">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-exchange"></i> {{trans('hrm.transfer')}}
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
        <div class="jarviswidget" id="wid-id-hrmtransfer0"
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
    <article class="col col-xs-12 col-sm-4 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-hrmtransfer1"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                <h2>Khoa phòng</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body no-padding">
                    <form class=" smart-form" id="formemployee">
                        <fieldset>
                            <div class="row  ">
                                <section class="col col-xs-12">
                                    <label class="label">Bệnh viện</label>
                                    <label class="select">
                                        <select ng-model="transfer.hospital_code">
                                            <option data-ng-repeat="item in hospital" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Khoa</label>

                                    <label class="select">
                                        <select ng-model="transfer.dept_code">
                                            <option value="0">Chọn khoa</option>
                                            <option data-ng-repeat="item in dept" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Khu</label>
                                    <label class="select">
                                        <select ng-model="transfer.ward_code">
                                            <option value="0">Chọn khu</option>

                                            <option ng-if="item.dept_code == transfer.dept_code"
                                                    data-ng-repeat="item in ward" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Phòng</label>
                                    <label class="select">
                                        <select ng-model="transfer.room_code">
                                            <option value="0">Chọn phòng</option>

                                            <option
                                                ng-if="item.dept_code = transfer.dept_code && item.ward_code == transfer.ward_code"
                                                data-ng-repeat="item in room" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-12">
                                    <label class="label">Chức vụ</label>
                                    <label class="select">
                                        <select ng-model="transfer.position_code">
                                            <option value="0">Chọn chức vụ</option>
                                            <option data-ng-repeat="item in position" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <button ng-if="employee.pid" class="btn btn-success" data-ng-click="save()">Điều chuyển
                            </button>
                        </footer>
                    </form>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
    <article class="col col-xs-12 col-sm-4 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-hrmtransfer2"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                <h2>Nhân sự</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body">
                    <ul class="list-unstyled" style="max-height: 400px;overflow-y: auto">
                        <li ng-if="(transfer.ward_code==0 || (transfer.ward_code != 0 && transfer.ward_code==item.ward_code)) && (transfer.room_code==0 || (transfer.room_code != 0 && transfer.room_code==item.room_code))"
                            data-ng-repeat="item in listemployee">
                            <a href="/#/hrm/transfer/@{{item.pid}}">
                                <i class="fa fa-caret-right"></i>&nbsp;
                                @{{item.titlename}} @{{item.lastname}} @{{item.firstname}}</a>
                        </li>
                    </ul>
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

    function HrmTransferController($scope, $http) {
        $scope.hospital = {{$hospital}};
        $scope.dept = {{$dept}};
        $scope.ward = {{$ward}};
        $scope.room = {{$room}};
        $scope.position = {{$position}};
        $scope.person = {{$person}};
        $scope.employee = {{$employee}};
        $scope.employeetitle = {{$employeetitle}};
        $scope.emptitlename = '';
        $scope.clear = function () {
        $scope.transfer = {
            dept_code: 0,
            ward_code: 0,
            room_code: 0,
            position_code: 0,
            hospital_code: '{{$hospital_code}}',
            pid: 0,
            empid: 0,
            title: '',
            titlegroup: ''
        };
        if (angular.isObject($scope.employee)) {
            $scope.transfer['pid'] = $scope.employee.pid;
            $scope.transfer['empid'] = $scope.employee.id;
            $scope.transfer['title'] = $scope.employee.title;
            angular.forEach($scope.employeetitle, function (val, key) {
                if (val.code == $scope.employee.title) {
                    $scope.transfer['titlegroup'] = val.group;
                    $scope.emptitlename = val.name;
                }
            });
        }
//                       console.log($scope.transfer);
    }
    $scope.clear();
    $scope.search = function () {
        $http.get('hrm/search/' + $scope.employeesearch)
            .success(function (data) {
                $scope.person = data;
                if ($scope.person) {
                    $scope.loademployee($scope.person.pid);
                }
            });
    };
    $scope.loademployeetransfer = function () {
        if ($scope.employee) {
            $http.get('hrm/employeelisttransfer/' + $scope.employee.pid)
                .success(function (data) {
                    $scope.listtransfer = data;
                })
        }
    }
    $scope.save = function () {
        if ($scope.transfer.dept_code == 0) {
            myalert("Nhắc nhở", "Ít nhất phải chọn khoa muốn điều chuyển");
            return false;
        }
        if ($scope.transfer.position_code == 0) {
            myalert("Nhắc nhở", "Bạn chưa chọn chức vụ tại vị trí điều chuyển");
            return false;
        }
        $http.post('hrm/savetransfer', {
            data: $scope.transfer
        })
            .success(function (data) {
                $scope.loademployee($scope.transfer.pid);
                $scope.loadlistemployee();
                if (data > 0) {
                    myalert("Thông báo", "Điều chuyển thành công");
                }
                else {
                    myalert("Lỗi", "Có lỗi khi thao tác, vui lòng thử lại.");
                }
            })
    }
    $scope.loademployee = function (pid) {
        $http.get('hrm/employeeinfo/' + pid)
            .success(function (data) {
                if (angular.isObject(data)) {
                    $scope.employee = data;
                    $scope.loademployeetransfer();
                    $scope.clear();
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
    }
    $scope.loadlistemployee = function () {
        $http.get('hrm/listemployee/' + $scope.transfer.hospital_code + "/" + $scope.transfer.dept_code)
            .success(function (data) {
                $scope.listemployee = data;
            });
    };
    $scope.$watch('transfer.dept_code', function () {
        if ($scope.transfer.dept_code) {
            $scope.loadlistemployee();
            $scope.transfer.ward_code = 0;
            $scope.transfer.room_code = 0;
        }
    });
    $scope.$watch('transfer.ward_code', function () {
        if ($scope.transfer.ward_code) {
            $scope.transfer.room_code = 0;
        }
    });
    if ($scope.person) {
        $scope.loademployee($scope.person.pid);
    }
    $scope.loadlistemployee();

    }

    var pagefunction = function () {
    };
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>