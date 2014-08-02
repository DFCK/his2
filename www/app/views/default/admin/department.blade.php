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
                                                <i></i>
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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blue" id="wid-id-admindept1"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>

                        <h2>Danh sách các chức năng tương ứng với Khoa Phòng</h2>
                    </header>
                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                            <form class=" smart-form" id="">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-xs-2">
                                            <label class="label">Khoa/Phòng</label>
                                        </section>
                                        <section class="col col-xs-4">
                                            <label class="select">
                                                <select ng-model="listdept" class="input-sm"  ng-change="change(this)">
                                                    <option value="0">Chọn Khoa</option>
                                                    <option data-ng-repeat="dept in depts"
                                                            value="@{{dept.id}}"
                                                       >
                                                        @{{dept.name}}
                                                    </option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>

                                        <div class="col col-xs-2">
                                            <button class="btn btn-danger padding-5"
                                                    data-ng-click="del()">
                                                {{trans('common.delete')}}
                                            </button>
                                        </div>
                                </fieldset>
                            </form>
                            <hr>
                             <script type="text/ng-template" id="treecat.html">
                                <div class="dd-handle">
                                    <i class="@{{functitem.icon}}"></i>
                                    <strong>@{{functitem.name}}</strong>
                                    <div class="pull-right">
                                        <span class="onoffswitch">
												<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval@{{functitem.id}}" ng-click="switch(functitem)" ng-checked="functitem.ischeck > 0">
												<label class="onoffswitch-label" for="start_interval@{{functitem.id}}">
                                                    <div class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></div>
                                                    <div class="onoffswitch-switch"></div>
                                                </label>
											</span>
                                    </div>

                                </div>
                                <ol class="dd-list" ng-if="functitem.children.length > 0">
                                    <li  class="dd-item " ng-repeat="functitem in functitem.children" ng-include="'treecat.html'"  data-id="@{{functitem.id}}">
                                    </li>
                                </ol>
                            </script>
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" ng-repeat="functitem in tree" ng-include="'treecat.html'" data-id="@{{functitem.id}}">
                                    </li>
                                </ol>
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
    function AdminDepartmentController($scope, $http) {
        $scope.dept = {
            name: '',
            lang: '',
            code: '',
            order: 0,
            type: 0,
            id: 0
        };
        $scope.depts = [];
        $scope.switch = function(func){
            var type = (($("#start_interval"+func.id).prop("checked"))?'i':'d');
            $http.post('admin/savedeptfunc/'+type+"/"+$scope.dept.code+"/"+func.code)
                .success(function(data){
                })
                .error(function(data){
                    myalert("Lỗi lưu dữ liệu","Có lỗi khi lưu dữ liệu, Vui lòng thử lại.");
                });
        }
        $scope.save = function () {
            $scope.toggle = false;
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
        var buildtree = function (data) {
            $scope.tree = [];
            var children = [];
            angular.forEach(data, function (value, key) {
                var item = {};
                //chi lay gia tri, ko lay obj
                angular.copy( value, item);
                var id = item['id'];
                var moduleparent = item['parent'];
                if (children[moduleparent]) {
                    if (!children[moduleparent].children) {
                        children[moduleparent].children = [];
                    }
                    children[moduleparent].children.push(item);
                }
                else {
                    children[id] = item;
                    $scope.tree.push(children[id]);
                }
            });

        };
        $scope.tree = [];
        $scope.functionlist = [];
        var runninghttp = false;
        var getfunction = function () {
//            if(!runninghttp){
                runninghttp = true;
                $http.get('admin/deptfunclist/'+$scope.dept.code)
                    .success(function (data) {
                        $scope.functionlist = data;
                        buildtree($scope.functionlist);
                        angular.copy( $scope.tree, $scope.select);
//                        $('#nestable').nestable({maxDepth:2});
//                        runninghttp = false;
                    });
//            }

        }

        $scope.del = function(){
//            console.log($scope.dept.id);
            if($scope.dept.id > 0){
                $http.delete("admin/deldept/"+$scope.dept.id)
                    .success(function(data){
                        if(data > 0){
                            angular.copy($scope.initial, $scope.dept);
                            $scope.dept.id = 0;
                            $scope.dept.type = 0;
                            $scope.dept.order = 0;
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

        $scope.change = function(dept){
            var id = dept.listdept;
            angular.forEach(dept.depts,function(value,key){
                if(id == value.id) {
                    angular.copy(value, $scope.dept);
                    getfunction();
                }
            });
        }
        $scope.reset = function(){
            angular.copy($scope.initial, $scope.dept);
            $scope.dept.id = 0;
            $scope.dept.type = 0;
            $scope.dept.order = 0;
        }

        var scrolltotop = function () {
            window.scrollTo(0, $('#header').height());
        }
        $scope.load = function () {
            $http.get('admin/loaddept')
                .success(function (data) {
                    $scope.depts = data;
                    $scope.listdept = 0;
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
                },
                lang: {
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
                lang: {
                    required: 'Vui lòng nhập Biến ngôn ngữ',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },
                code: {
                    required: 'Vui lòng nhập Mã Khoa',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    // Load form valisation dependency
    loadScript("src/smartadmin/js/plugin/jquery-nestable/jquery.nestable.min.js");
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>
