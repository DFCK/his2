<div data-ng-controller="ModuleController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>{{trans('admin.module-title')}}
            </h1>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0"
                     data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                        <h2>Thêm chức năng mới</h2>

                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <script  type="text/ng-template" id="notif.html">
                                <div class="alert  fade in @{{notifstyle}}">
                                    <button class="close" >×</button>
                                    <i class="fa fa-fw @{{notificon}}"></i>
                                    <strong>@{{notifmessage}}</strong>
                                </div>
                            </script>
                            <div ng-if="shownotif" data-ng-include="'notif.html'"></div>
                            <form class=" smart-form" id="formmodule">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-3">
                                            <label class="label">Tên chức năng</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="afunc.id">
                                                <input type="text" name="modulename"
                                                       placeholder="Tên chức năng"
                                                       ng-model="afunc.modulename" required>
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Đường dẫn</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-link"></i>
                                                <input ng-model="afunc.moduleurl" name="moduleurl"
                                                       type="text" placeholder="Đường dẫn">

                                                <b class="tooltip tooltip-bottom-right">controller/function</b>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Biến ngôn ngữ</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-language"></i>
                                                <input ng-model="afunc.modulelang" name="modulelang"
                                                       type="text" placeholder="Biến ngôn ngữ"
                                                       required>
                                                <b class="tooltip tooltip-bottom-right">controller.function</b>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Mã chức năng</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="afunc.modulecode" name="modulecode"
                                                       type="text" placeholder="Mã chức năng"
                                                       required>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="label">Order</label>
                                            <label class="input">
                                                <input ng-model="afunc.moduleorder" name="moduleorder"
                                                       type="text" placeholder="Order">
                                                <b class="tooltip tooltip-left">Thứ tự các chức năng</b>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Thuộc Nhóm</label>
                                            <label class="select">
                                                <select ng-model="afunc.moduleparent">
                                                    <option value="0">/</option>
                                                    <option data-ng-repeat="item in tree" value="@{{item.id}}">
                                                        @{{item.modulename}}
                                                    </option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button class="btn btn-primary" data-ng-click="savemodule()">
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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blue" id="wid-id-1"
                     data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-th-list"></i> </span>

                        <h2>Danh sách các chức năng đang có</h2>

                    </header>
                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                        <span class="label label-warning txt-color-white">Mã chức năng</span>
                        <span class="label label-info txt-color-white">Đường dẫn</span>
                        <span class="label label-success txt-color-white">Biến ngôn ngữ</span>
                            <div class="clear:both"></div>
                            <hr>
                            <script type="text/ng-template" id="treecat.html">
                                <div class="dd-handle dd3-handle">Drag</div>
                                <div class="dd3-content">
                                    <strong>@{{functitem.modulename}}</strong>
                                    <a href="" ng-click="editmodule(functitem)"><i class="fa fa-pencil"></i></a>
                                    <div class="pull-right">
                                        <span class="label label-warning txt-color-white">@{{functitem.modulecode}}</span>
                                        <span class="label label-info  txt-color-white">@{{functitem.moduleurl}}</span>
                                        <span class="label label-success  txt-color-white">@{{functitem.modulelang}}</span>

                                    </div>

                                </div>
                                <ol class="dd-list" ng-if="functitem.children.length > 0">
                                    <li  class="dd-item dd3-item" ng-repeat="functitem in functitem.children" ng-include="'treecat.html'"  data-id="@{{functitem.id}}">
                                    </li>
                                </ol>
                            </script>
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" ng-repeat="functitem in tree" ng-include="'treecat.html'" data-id="@{{functitem.id}}">
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
    function ModuleController($scope, $http) {
        $scope.afunc = {
            modulename: '',
            moduleurl: '',
            modulelang: '',
            modulecode: '',
            moduleparent: 0,
            moduleorder: 0,
            id: '',
            children: []
        };
        $scope.functionlist = [];
        $scope.tree = [];

        $scope.savemodule = function () {
            if ($('#formmodule').valid()) {
                $http.post('admin/addmodule',
                    {
                        data: $scope.afunc
                    })
                    .success(function (data) {
                        $scope.shownotif=true;
                        if(data > 0){
                            $scope.notifstyle="alert-success";
                            $scope.notifmessage = "Lưu dữ liệu thành công";
                            $scope.notificon = "fa-check";
                        }
                        else if(data == -1){
                            $scope.notifstyle="alert-danger";
                            $scope.notifmessage = "Mã chức năng bị trùng";
                            $scope.notificon = "fa-times";
                        }
                        else{
                            $scope.notifstyle="alert-danger";
                            $scope.notifmessage = "Lỗi lưu dữ liệu";
                            $scope.notificon = "fa-times";
                        }
                        if (data > 0) {
                            getfunction();
                        }
                        angular.copy($scope.initial, $scope.afunc);

                    });
            }
        };
        $scope.editmodule = function(funcitem){
            $scope.afunc = funcitem;
        };
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target);
            console.log(list.nestable('serialize'));
        };
        var buildtree = function (data) {
            $scope.tree = [];
            var children = [];
            angular.forEach(data, function (item, key) {
                var id = item['id'];
                var moduleparent = item['moduleparent'];
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

//            return source;
        };

        var getfunction = function () {
            $http.get('admin/functionlist')
                .success(function (data) {
                    $scope.functionlist = data;
                    buildtree($scope.functionlist);
                    $('#nestable').nestable().on('change', updateOutput);
                });
        }
        getfunction();

    }

    var pagefunction = function () {
        //$('#nestable').nestable().on('change', updateOutput);

        var $checkoutForm = $('#formmodule').validate({
            // Rules for form validation
            rules: {
                modulename: {
                    required: true,
                    minlength: 3
                },
                modulelang: {
                    required: true,
                    minlength: 3
                },
                modulecode: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                modulename: {
                    required: 'Vui lòng nhập Tên module',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },
                modulelang: {
                    required: 'Vui lòng nhập biến ngôn ngữ',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },
                modulecode: {
                    required: "Vui lòng nhập mã chức năng"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    // Load form valisation dependency
    loadScript("src/smartadmin/js/plugin/jquery-nestable/jquery.nestable.min.js");
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js",pagefunction);

</script>
