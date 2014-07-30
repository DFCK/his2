<div data-ng-controller="AdminDepartmentController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>{{trans('admin.department-title')}}
            </h1>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-admindept0"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                        <h2>Thông tin khoa phòng</h2>

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
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Tên Khoa/Phòng</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="dept.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên Khoa/Phòng"
                                                       ng-model="dept.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Biến ngôn ngữ</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-language"></i>
                                                <input ng-model="dept.lang" name="lang"
                                                       type="text" placeholder="Biến ngôn ngữ">
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Mã Khoa Phòng</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="dept.code" name="code"
                                                       type="text" placeholder="Mã Khoa Phòng">
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Thứ tự</label>
                                            <label class="input">
                                                <input ng-model="dept.order" name="order"
                                                       type="text" placeholder="Thứ tự">
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Thuộc Nhóm</label>
                                            <label class="select">
                                                <select ng-model="dept.type">
                                                    <option value="0">Điều trị</option>
                                                    <option value="1">Hành chính</option>
                                                </select>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blue" id="wid-id-admindept1"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>

                        <h2>Danh sách các Khoa phòng</h2>
                    </header>
                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                            <label class="label">Khoa/Phòng</label>
                            <select ng-model="listdept">
                                <option data-ng-repeat="dept in depts" value="@{{dept.id}}">
                                    @{{dept.name}}
                                </option>
                            </select>

                            <button class="btn btn-primary" data-ng-click="save()">
                                {{trans('common.save')}}
                            </button>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
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
    function AdminDepartmentController($scope, $http) {
        $scope.dept = {
            name: '',
            lang: '',
            code: '',
            order: 0,
            type: 0,
            id: 0,
        };
        $scope.depts = [];

        $scope.save = function () {
            if ($('#formmodule').valid()) {
                $http.post('admin/savedept',
                    {
                        data: $scope.dept
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
                            $scope.notifmessage = "Mã chức năng bị trùng";
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
                        angular.copy($scope.initial, $scope.dept);
                        $scope.dept.id = 0;
                        $scope.dept.type = 0;
                        $scope.dept.order = 0;
                        scrolltotop();

                    });
            }
        };
        $scope.delete = function (item) {
            $http.post('admin/deldept',
                {
                    data: item
                })
                .success(function (data) {
                });
        }
        $scope.edit = function (funcitem) {
            //sử dụng copy để chỉ lấy dữ liệu, nếu dùng phép gán (=) sẽ truyền theo object
            angular.copy(funcitem, $scope.dept);
            scrolltotop();
        };
        var scrolltotop = function () {
            window.scrollTo(0, $('#header').height());
        }
        $scope.load = function () {
            $http.get('admin/loaddept')
                .success(function (data) {
                    $scope.depts = data;
                });
        }
        $scope.load();
    }

    var pagefunction = function () {
        var $checkoutForm = $('#formmodule').validate({
            // Rules for form validation
            rules: {
                name: {
                    required: true,
                    minlength: 3
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Vui lòng nhập Tên module',
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
