<div data-ng-controller="AdminHospitalController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>{{trans('common.init-hospital')}}
            </h1>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-adminhospital0"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                        <h2>Thông tin bệnh viện</h2>

                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="alert  fade in @{{notifstyle}}" ng-show="toggle">
                                <button class="close" ng-click="toggle = !toggle">×</button>
                                <i class="fa fa-fw @{{notificon}}"></i>
                                <strong>@{{notifmessage}}</strong>
                            </div>
                            <form class=" smart-form" id="formmodule">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tên Bệnh viện</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="hospital.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên Bệnh viện"
                                                       ng-model="hospital.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tên Tiếng Anh</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-language"></i>
                                                <input ng-model="hospital.namevn" name="namevn"
                                                       type="text" placeholder="Tên Tiếng Anh">
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Mã Bệnh Viện</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="hospital.code" name="code"
                                                       type="text" placeholder="Mã Bệnh Viện">
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Các Mã ĐKBD</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="hospital.dkbd" name="dkbd"
                                                       type="text" placeholder="Các Mã ĐKBD" >
                                                <b class="tooltip tooltip-bottom-right">Các mã phân cách bằng dấu phẩy</b>
                                            </label>
                                        </section>

                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tuyến Hành chính</label>
                                            <label class="select">
                                                <select ng-model="hospital.tuyenhanhchinh">
                                                    @foreach($tuyenhanhchinh as $item)
                                                        <option value="{{$item->code}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tuyến Bệnh Viện</label>
                                            <label class="select">
                                                <select ng-model="hospital.tuyenbenhvien">
                                                    @foreach($tuyenbenhvien as $item)
                                                    <option value="{{$item->code}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tuyến Y Tế</label>
                                            <label class="select">
                                                <select ng-model="hospital.tuyenyte">
                                                    @foreach($tuyenyte as $item)
                                                    <option value="{{$item->code}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Quốc gia</label>
                                            <label class="select">
                                                <select ng-model="hospital.country" disabled>
                                                    @foreach($countries as $item)
                                                    <option value="{{$item->code}}"
                                                        @if($item->code == 'VN')
                                                            selected
                                                        @endif
                                                        >{{$item->namevn}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row  ">

                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Tỉnh</label>
                                            <label class="select">
                                                <select ng-model="hospital.province">
                                                    @foreach($provinces as $item)
                                                    <option value="{{$item->code}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Quận/Huyện</label>
                                            <label class="select">
                                                <select name="district" ng-model="hospital.district"
                                                        class="select-2" tabindex="10">
                                                    <option data-ng-repeat="district in districts"
                                                            value="@{{district.code}}"
                                                            ng-selected="@{{district.code == hospital.district}}">
                                                        @{{district.name}}
                                                    </option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Xã/Phường</label>
                                            <label class="select">
                                                <select name="addressward" ng-model="hospital.addressward"
                                                        class="select-2" tabindex="11">
                                                    <option data-ng-repeat="addressward in addresswards"
                                                            value="@{{addressward.code}}"
                                                            ng-selected="@{{addressward.code == hospital.addressward}}">
                                                        @{{addressward.name}}
                                                    </option>

                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-3 col-xs-6">
                                            <label class="label">Địa chỉ</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-envelope"></i>
                                                <input ng-model="hospital.address" name="address"
                                                       type="text" placeholder="Địa chỉ">
                                            </label>
                                        </section>
                                        </div>
                                </fieldset>
                                <footer>
                                    <a class="btn btn-warning pull-left" data-ng-click="reset()">
                                        {{trans('common.reset')}}
                                    </a>
                                    <button class="btn btn-primary" data-ng-click="save()">
                                        {{trans('common.save')}}
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
            <!-- end article -->
            <!-- NEW WIDGET START -->
            <article class="col-xs-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blue" id="wid-id-adminhospital1"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>

                        <h2>Danh sách các Khoa Phòng trong Bệnh Viện</h2>
                    </header>
                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                            <form class=" smart-form" id="">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-xs-1">
                                            <label class="label">Bệnh Viện</label>
                                        </section>
                                        <section class="col col-xs-4">
                                            <label class="select">
                                                <select ng-model="listhospital" class="input-sm"  ng-change="change(this)">
                                                    <option value="0">Chọn Bệnh viện</option>
                                                    <option data-ng-repeat="hos in hospitals"
                                                            value="@{{hos.id}}" >
                                                        @{{hos | hospitalclose}}
                                                    </option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>

                                        <div class="col col-xs-2">

                                            <button class="btn btn-warning padding-5"
                                                    data-ng-click="close()">
                                                {{trans('common.close')}}
                                            </button>
                                            <button class="btn btn-success padding-5"
                                                    data-ng-click="open()">
                                                {{trans('common.open')}}
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger padding-5 pull-right"
                                                    data-ng-click="del()">
                                                {{trans('common.delete')}}
                                            </button>
                                            </div>
                                </fieldset>
                            </form>
                            <hr>
                            <div ng-show="showdept">
                                <div class="col col-xs-6">
                                    <form class=" smart-form">
                           <h4 class="col col-sm-6 col-xs-12">Tạo Khoa/Phòng</h4>
                                    <div class="col col-sm-6 col-xs-12">
                                        <label class="label">&nbsp;</label>
                                        <button class="btn btn-primary padding-5"
                                                data-ng-click="savedept()">
                                            {{trans('common.save')}}
                                        </button>
                                        <button class="btn btn-warning padding-5"
                                                data-ng-click="resetdept()">
                                            {{trans('common.reset')}}
                                        </button>

                                    </div>

                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Loại Khoa/phòng</label>
                                            <label class="select">
                                                <select ng-model="dept.ref_code" ng-change="changedept(this)">
                                                    <option value="0">Chọn khoa mẫu</option>
                                                    <option ng-repeat="dept in deptref" value="@{{dept.code}}">@{{dept.name}}</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-6 col-xs-12">
                                        <label class="label">Tên Khoa Phòng</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="dept.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên Khoa Phòng"
                                                       ng-model="dept.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>

                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Mã Khoa Phòng</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="dept.code" name="code"
                                                       type="text" placeholder="Mã Khoa Phòng">
                                            </label>
                                        </section>


                                        </div>

                                    </fieldset>
                                </form>
                            <hr>
                                    <form class=" smart-form">
                            <h4 class="col col-sm-6 col-xs-12">Tạo Khu</h4>
                                    <div class="col col-sm-6 col-xs-12">
                                        <label class="label">&nbsp;</label>
                                        <button class="btn btn-primary padding-5"
                                                data-ng-click="saveward()">
                                            {{trans('common.save')}}
                                        </button>
                                        <button class="btn btn-warning padding-5"
                                                data-ng-click="resetward()">
                                            {{trans('common.reset')}}
                                        </button>

                                    </div>

                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Khoa</label>
                                            <label class="select">
                                                <select ng-model="ward.dept_code">
                                                    <option data-ng-repeat="dept in deptSelect" value="@{{dept.code}}">@{{dept.name}}</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Loại Khu</label>
                                            <label class="select">
                                                <select ng-model="ward.type">
                                                    <option value="0">Hành chính</option>
                                                    <option value="1">Nội trú</option>
                                                    <option value="2">Ngoại trú</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Tên Khu</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="ward.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên Khu"
                                                       ng-model="ward.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>

                                        <section class="col col-sm-6 col-xs-12">
                                            <label class="label">Mã Khu</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="ward.code" name="code"
                                                       type="text" placeholder="Mã Khu">
                                            </label>
                                        </section>

                                    </div>
                                </fieldset>
                            </form>
                                    </div>
                                    <div class="col col-xs-6">
                                    <h4>Các khoa phòng trong @{{hospital.name}}</h4>
                                        <div class="dd" id="nestable">
                                        <ol class="dd-list">
                                        <li class="dd-item" data-ng-repeat="idept in deptward">
                                            <div class="dd-handle">
                                                <a ng-click="editdept(idept)"><i class="fa fa-pencil-square"></i></a>&nbsp; @{{idept.name}}

                                                <div class="pull-right">
                                                    <a ng-show="!idept.deleted_at" data-ng-click="closedept(idept.id)"><i class="fa fa-unlock-alt"></i></a>
                                                    <a ng-show="idept.deleted_at" data-ng-click="opendept(idept.id)"><i class="fa fa-unlock"></i></a>
                                                    <a ng-show="idept.wards.length <= 0" data-ng-click="deldept(idetp.id)"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                                </div>
                                            <ol class="dd-list" >
                                                <li  class="dd-item " data-ng-repeat="iward in idept.wards">
                                                    <div class="dd-handle">
                                                        <a ng-click="editward(iward)"><i class="fa fa-pencil-square"></i></a>&nbsp; @{{iward.name}}
                                                        <a class="btn btn-primary btn-sm">Phòng</a>
                                                        <div class="pull-right">
                                                            <a ng-show="!iward.deleted_at" data-ng-click="closeward(iward.id)" rel="tooltip" title="Close"><i class="fa fa-unlock-alt"></i></a>
                                                            <a ng-show="iward.deleted_at" data-ng-click="openward(iward.id)"><i class="fa fa-unlock"></i></a>
                                                            <a data-ng-click="delward(iward.id)"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->
            </article>
            <!-- end article -->
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

    function AdminHospitalController($scope, $http) {
        $scope.hospital = {
            name: '',
            code: '',
            order: 0,
            type: 0,
            id: 0,
            province:'',
            country:'VN'
        };
        $scope.dept = {
            name:'',
            code:'',
            hospital_code:'',
            ref_code:0,
            id:''
        };
        $scope.ward = {
            name:'',
            code:'',
            hospital_code:'',
            dept_code:'',
            id:''
        };


        $scope.save = function () {
            $scope.toggle = false;
            if ($('#formmodule').valid()) {
                $http.post('admin/savehospital',
                    {
                        data: $scope.hospital
                    })
                    .success(function (data) {
                        $scope.toggle = true;
                        if (data > 0) {
                            $scope.notifstyle = "alert-success";
                            $scope.notifmessage = "Lưu dữ liệu thành công";
                            $scope.notificon = "fa-check";
                        }
                        else if (data == -1) {
                            $scope.notifstyle = "alert-danger";
                            $scope.notifmessage = "Mã bị trùng";
                            $scope.notificon = "fa-times";
                        }
                        else {
                            $scope.notifstyle = "alert-danger";
                            $scope.notifmessage = "Lỗi lưu dữ liệu";
                            $scope.notificon = "fa-times";
                        }
                        if (data > 0) {
                            $scope.load();
                        }
                        $scope.reset();
                        scrolltotop();
                    });
            }
        };

        $scope.del = function(){
            if($scope.hospital.id > 0){
                $http.delete("admin/delhospital/"+$scope.hospital.id)
                    .success(function(data){
                        if(data > 0){
                            $scope.reset();
                            myalert("Thông báo","Xóa dữ liệu thành công.");
                        }
                        else{
                            myalert("Thông báo","Có lỗi khi xóa dữ liệu.");
                        }

                    });
                $scope.load();
            }
            else{
                myalert("Lỗi thao tác","Chưa chọn Khoa cần xóa");
            }
        }
        $scope.closedept = function(dept_id){
            $http.delete('admin/closedept/'+dept_id)
                .success(function(data){
                    if (data > 0) {
                        $scope.loaddeptselect($scope.hospital.code);
                        $scope.loadDeptWard($scope.hospital.code);
                    }
                });
        };
        $scope.opendept = function(dept_id){
            $http.put('admin/opendept/'+dept_id)
                .success(function(data){
                    if (data > 0) {
                        $scope.loaddeptselect($scope.hospital.code);
                        $scope.loadDeptWard($scope.hospital.code);
                    }
                });
        };
        $scope.openward = function(ward_id){
            $http.put('admin/openward/'+ward_id)
                .success(function(data){
                    if (data > 0) {
                        $scope.loaddeptselect($scope.hospital.code);
                        $scope.loadDeptWard($scope.hospital.code);
                    }
                });
        };
        $scope.closeward = function(ward_id){
            $http.delete('admin/closeward/'+ward_id)
                .success(function(data){
                    if (data > 0) {
                        $scope.loaddeptselect($scope.hospital.code);
                        $scope.loadDeptWard($scope.hospital.code);
                    }
                });
        };
        $scope.close = function(){
            if($scope.hospital.id > 0){
                $http.delete("admin/closehospital/"+$scope.hospital.id)
                    .success(function(data){
                        if(data > 0){
                            $scope.reset();
                            $scope.load();
                            myalert("Thông báo","Cập nhật dữ liệu thành công.");
                        }
                        else{
                            myalert("Thông báo","Có lỗi khi cập nhật dữ liệu.");
                        }

                    });
                $scope.load();
            }
            else{
                myalert("Lỗi thao tác","Chưa chọn Khoa cần xóa");
            }
        }
        $scope.open = function(){
            if($scope.hospital.id > 0){
                $http.get("admin/openhospital/"+$scope.hospital.id)
                    .success(function(data){
                        if(data > 0){
                            $scope.reset();
                            $scope.load();
                            myalert("Thông báo","Cập nhật dữ liệu thành công.");
                        }
                        else{
                            myalert("Thông báo","Có lỗi khi cập nhật dữ liệu.");
                        }

                    });
                $scope.load();
            }
            else{
                myalert("Lỗi thao tác","Chưa chọn Khoa cần xóa");
            }
        }
        $scope.showdept = false;
        $scope.change = function(hospital){
//            console.log(hospital);
            var id = hospital.listhospital;
            if(id==0) $scope.showdept = false;
            else $scope.showdept = true;
            angular.forEach(hospital.hospitals,function(value,key){
                if(id == value.id) {
                    angular.copy(value, $scope.hospital);
                    $scope.loaddeptselect($scope.hospital.code);
                    $scope.loadDeptWard($scope.hospital.code);
                }
            });
        }
        $scope.editdept = function(dept){
            angular.copy(dept,$scope.dept);
        }
        $scope.editward = function(ward){
            angular.copy(ward,$scope.ward);
        }
        $scope.savedept = function(){
                $scope.dept.hospital_code = $scope.hospital.code;
                $http.post('admin/savehospitaldept',
                    {
                        data: $scope.dept
                    })
                    .success(function (data) {
                        if (data > 0) {
                            myalert("Thông báo","Lưu thành công.");
                        }
                        else if (data == -1) {
                            myalert("Thông báo","Code bị trùng.");
                        }
                        else {
                            myalert("Thông báo","Lưu thất bại.");
                        }
                        if (data > 0) {
                            $scope.loaddeptselect($scope.hospital.code);
                            $scope.loadDeptWard($scope.hospital.code);
                        }
                        $scope.resetdept();
                    });
        }
        $scope.saveward = function(){
                $scope.ward.hospital_code = $scope.hospital.code;
                $http.post('admin/savehospitalward',
                    {
                        data: $scope.ward
                    })
                    .success(function (data) {
                        if (data > 0) {
                            myalert("Thông báo","Lưu thành công.");
                        }
                        else if (data == -1) {
                            myalert("Thông báo","Code bị trùng.");
                        }
                        else {
                            myalert("Thông báo","Lưu thất bại.");
                        }
                        if (data > 0) {
                            $scope.loadDeptWard($scope.hospital.code);
                        }
                        $scope.resetward();
                    });
        }
        $scope.changedept = function(obj){
            var code = obj.dept.ref_code;
            angular.forEach(obj.deptref,function(value,key){
                if(code == value.code) {
                    $scope.dept.name= value.name;
                    $scope.dept.code= value.code;
                }
            });
        }
        $scope.resetdept = function(){
            $scope.dept.name= "";
            $scope.dept.code= "";
            $scope.dept.id= "";
            $scope.dept.ref = 0;
        }
        $scope.resetward = function(){
            $scope.ward.name= "";
            $scope.ward.code= "";
            $scope.ward.id= "";
            $scope.ward.dept_code = 0;
        }
        $scope.deptSelect = [];
        $scope.loaddeptselect = function($hospitalcode){
            $http.get('admin/hospitaldeptselect/'+$hospitalcode)
                .success(function(data){
                    var temp = data;
                    angular.copy(temp,$scope.deptSelect);
                });
        }
        $scope.deptward = [];
        $scope.loadDeptWard = function($hospitalcode){
            $http.get('admin/hospitaldeptward/'+$hospitalcode)
                .success(function(data){
                    var temp = data;
                    angular.copy(temp,$scope.deptward);
                });
        }
        $scope.reset = function(){
            angular.copy($scope.initial, $scope.hospital);
            $scope.hospital.id = 0;
            $scope.hospital.country = 'VN';
        }

        var scrolltotop = function () {
            window.scrollTo(0, $('#header').height());
        }
        $scope.hospitals = [];
        $scope.listhospital = 0;
        $scope.load = function () {
            $http.get('admin/loadhospital')
                .success(function (data) {
                    $scope.hospitals = data;
                    $scope.listhospital = 0;
                });
        }
        $scope.addresswards = [];
        $scope.districts = [];
        $scope.$watch('hospital.province', function () {
            if ($scope.hospital.province) {
                $scope.addresswards = [];
                $scope.districts = [];
                getDistrict($scope.hospital.province);
            }
        });
        $scope.$watch('hospital.district', function () {
            if ($scope.hospital.district) {
                $scope.addresswards = [];
                getWard($scope.hospital.district);
            }
        });
        var getDistrict = function (province) {
            $http.get('pas/alldistrict/' + province)
                .success(function (data) {
                    $scope.districts = data;
                });
        };
        var getWard = function (district) {
            $http.get('pas/allward/' + district)
                .success(function (data) {
                    $scope.addresswards = data;
                });
        };
        $scope.deptref = {{$deptref}};
        $scope.load();
    }

    var pagefunction = function () {
        var $checkoutForm = $('#formmodule').validate({
            // Rules for form validation
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },

                code: {
                    required: true,
                    minlength: 3
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Vui lòng nhập Tên',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },

                code: {
                    required: 'Vui lòng nhập Mã ',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    // Load form valisation dependency
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>
