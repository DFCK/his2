<div data-ng-controller="DmchucvuController">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw"></i>{{trans('admin.dmchucvu-title')}}
        </h1>
    </div>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col col-xs-4 ">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-chucvu0"
                 data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>
                    <h2>Thông tin chức vụ</h2>
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
                                <div class="row">
                                    <section class="col col-xs-12">
                                        <label class="label">Tên chức vụ</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="chucvu.id">
                                            <input type="text" name="name"
                                                   placeholder="Tên chức vụ"
                                                   ng-model="chucvu.name" required>
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    <section class="col col-xs-12">
                                    <label class="label">Mã chức vụ</label>
                                        <label class="input">
                                            <input type="text" name="code"
                                                   placeholder="Mã chức vụ"
                                                   ng-model="chucvu.code" required>
                                            <i class="icon-append fa fa-code"></i>
                                        </label>
                                    </section>
                                    <section class="col col-xs-12">
                                        <label class="label">Biến ngôn ngữ</label>
                                        <label class="input">
                                            <input type="text" name="lang"
                                                   placeholder="Biến ngôn ngữ"
                                                   ng-model="chucvu.lang" required>
                                            <i class="icon-append fa fa-language"></i>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <a class="btn btn-warning" data-ng-click="reset()">
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


        <!-- NEW WIDGET START -->
        <article class="col col-xs-8 ">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-chucvu1"
                 data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>
                    <h2>Chức năng tương ứng với chức vụ</h2>
                </header>
                <!-- widget div-->
                <div class="">
                    <!-- widget content -->
                    <div class="widget-body ">
                        <form class=" smart-form" id="">
                            <fieldset>
                                <div class="row  ">
                                    <section class="col col-xs-1">
                                        <label class="label">Chức vụ</label>
                                    </section>
                                    <section class="col col-xs-4">
                                        <label class="select">
                                            <select ng-model="listchucvu" class="input-sm"  ng-change="change(this)">
                                                <option value="0">Chọn Chức vụ</option>
                                                <option data-ng-repeat="cv in chucvus"
                                                        value="@{{cv.id}}">
                                                    @{{cv.name}}
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
												<input id="radiocam@{{functitem.id}}" ng-checked="functitem.role==0" type="radio" name="role@{{functitem.id}}"  ng-click="switch(functitem,0)">
                                                <label for="radiocam@{{functitem.id}}">Cấm&nbsp;</label>
												<input id="radioxem@{{functitem.id}}" ng-checked="functitem.role==1"  type="radio" name="role@{{functitem.id}}"  ng-click="switch(functitem,1)">
                                                <label for="radioxem@{{functitem.id}}">Xem&nbsp;</label>
												<input id="radioghi@{{functitem.id}}" ng-checked="functitem.role==2"  type="radio" name="role@{{functitem.id}}"  ng-click="switch(functitem,2)">
                                                <label for="radioghi@{{functitem.id}}">Ghi&nbsp;</label>
												<input id="radiosua@{{functitem.id}}" ng-checked="functitem.role==3"  type="radio" name="role@{{functitem.id}}"  ng-click="switch(functitem,3)">
                                                <label for="radiosua@{{functitem.id}}">Sửa&nbsp;</label>
												<input id="radioxoa@{{functitem.id}}" ng-checked="functitem.role==4"  type="radio" name="role@{{functitem.id}}"  ng-click="switch(functitem,4)">
                                                <label for="radioxoa@{{functitem.id}}">Xóa&nbsp;</label>
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

        function DmchucvuController($scope, $http) {
            $scope.chucvu = {
                name: '',
                code:'',
                lang:'',
                id:''
            };
            $scope.reset = function(){
                angular.copy($scope.initial,$scope.chucvu);
                $scope.chucvu.id='';
            }

            $scope.del = function(){
                if($scope.chucvu.id > 0){
                    $http.delete("admin/delchucvu/"+$scope.chucvu.id)
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
            $scope.switch =function(func,role){
//                console.log(func);
//                console.log(role);
                $http.put('admin/changepositionrole/'+func.code+'/'+$scope.chucvu.code+'/'+role)
                    .success(function(data){
                        getfunction();
                    });
            }
            $scope.save = function () {
                $scope.toggle = false;
                $http.post('admin/savechucvu', {
                    data: $scope.chucvu
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
                    });
            };
            var buildtree = function (data) {
                $scope.tree = [];
                var children = [];
                angular.forEach(data, function (value, key) {
                    var item = {};
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
            var getfunction = function () {
                $http.get('admin/positionfunclist/'+$scope.chucvu.code)
                    .success(function (data) {
                        $scope.functionlist = data;
                        buildtree($scope.functionlist);
                        angular.copy( $scope.tree, $scope.select);
                    });

            }
            $scope.change = function(chucvu){
                var id = chucvu.listchucvu;
                angular.forEach(chucvu.chucvus,function(value,key){
                    if(id == value.id) {
                        angular.copy(value, $scope.chucvu);
                        getfunction();
                    }
                });
            }
            $scope.load = function () {
                $http.get('admin/loadchucvu')
                    .success(function (data) {
                        $scope.chucvus = data;
                        $scope.listchucvu = 0;
                    });
            }
            $scope.load();
        }

        var pagefunction = function () {
            //$('#nestable').nestable().on('change', updateOutput);

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
                        required: true
                    }
                },
                // Messages for form validation
                messages: {
                    name: {
                        required: 'Vui lòng nhập Tên module',
                        minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                    },
                    lang: {
                        required: 'Vui lòng nhập biến ngôn ngữ',
                        minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                    },
                    code: {
                        required: "Vui lòng nhập mã chức năng"
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });
        };
        loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    </script>