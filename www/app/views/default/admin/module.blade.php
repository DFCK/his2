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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">

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
                                <div class="alert  fade in @{{notifstyle}}" ng-show="toggle">
                                    <button class="close" ng-click="toggle = !toggle">×</button>
                                    <i class="fa fa-fw @{{notificon}}"></i>
                                    <strong>@{{notifmessage}}</strong>
                                </div>
                            <form class=" smart-form" id="formmodule">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Tên chức năng</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="afunc.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên chức năng"
                                                       ng-model="afunc.name" required>
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Đường dẫn</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-link"></i>
                                                <input ng-model="afunc.url" name="url"
                                                       type="text" placeholder="Đường dẫn">

                                                <b class="tooltip tooltip-bottom-right">controller/function</b>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Biến ngôn ngữ</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-language"></i>
                                                <input ng-model="afunc.lang" name="lang"
                                                       type="text" placeholder="Biến ngôn ngữ"
                                                       required>
                                                <b class="tooltip tooltip-bottom-right">controller.function</b>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Mã chức năng</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-barcode"></i>
                                                <input ng-model="afunc.code" name="code"
                                                       type="text" placeholder="Mã chức năng"
                                                       required>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Icon</label>
                                            <label class="input">
                                                <input ng-model="afunc.icon" name="icon"
                                                       type="text" placeholder="Icon">
                                                <b class="tooltip tooltip-bottom-right">Icon cho nhóm chức năng, ví dụ: fa fa-lg fa-fw fa-cogs</b>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Thuộc Nhóm</label>
                                            <label class="select">
                                                <select ng-model="afunc.parent">
                                                    <option value="0">/</option>
                                                    <option data-ng-repeat="item in select" value="@{{item.id}}">
                                                        @{{item.name}}
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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

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
                                <div class="dd-handle dd3-handle">&nbsp;</div>
                                <div class="dd3-content">
                                    <i class="@{{functitem.icon}}"></i>
                                    <strong>@{{functitem.name}}</strong>
                                    <a href="" ng-click="editmodule(functitem)"><i class="fa fa-pencil-square"></i></a>
                                    <div class="pull-right">
                                        <a ng-if="!functitem.children" href="" data-ng-click="deletemodule(functitem)"><i class="fa  fa-trash-o"></i></a>
                                        <span class="label label-warning txt-color-white">@{{functitem.code}}</span>
                                        <span class="label label-info  txt-color-white">@{{functitem.url}}</span>
                                        <span class="label label-success  txt-color-white">@{{functitem.lang}}</span>
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
            name: '',
            url: '',
            lang: '',
            code: '',
            icon: '',
            parent: "0",
            order: "0",
            id: '',
            children: []
        };
        $scope.functionlist = [];
        $scope.tree = [];
        $scope.select = [];

        $scope.savemodule = function () {
            if ($('#formmodule').valid()) {
                $http.post('admin/addmodule',
                    {
                        data: $scope.afunc
                    })
                    .success(function (data) {
                        $scope.toggle=true;
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
                        if(data > 0)
                            getfunction();
                        angular.copy($scope.initial, $scope.afunc);
                        $scope.afunc['parent'] = 0;
                        scrolltotop();

                    });
            }
        };
        $scope.deletemodule = function(functitem){
            $http.post('admin/deletemodule',
                {
                    data: functitem
                })
                .success(function (data) {
                    getfunction();
                });
        }
        $scope.editmodule = function(funcitem){
            //sử dụng copy để chỉ lấy dữ liệu, nếu dùng phép gán (=) sẽ truyền theo object
            angular.copy(funcitem, $scope.afunc);
            scrolltotop();
        };
        var scrolltotop = function(){
            window.scrollTo(0,$('#header').height());
        }
        var runningtree = false;
        var updateOutput = function(e) {
            if(!runningtree){
                runningtree = true;
                var list = e.length ? e : $(e.target);
                var newfunclist = list.nestable('serialize');
                $http.post('admin/changemoduleorder',
                    {
                        data: newfunclist
                    })
                    .success(function (data) {
//                    buildselect();
                        getfunction();
                        runningtree = false;
                    });
            }



        };
        var buildselect = function(){
            $http.get('admin/selectlist')
                .success(function(data){
                    $scope.select = data;
                });
        }
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

//            return source;
        };
        var runninghttp = false;
        var getfunction = function () {
            if(!runninghttp){
                runninghttp = true;
                $http.get('admin/functionlist')
                    .success(function (data) {
                        $scope.functionlist = data;
                        buildtree($scope.functionlist);
                        angular.copy( $scope.tree, $scope.select);
                        $('#nestable').nestable({maxDepth:2}).on('change', updateOutput);
                        runninghttp = false;
                    });
            }

        }
        getfunction();

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
    // Load form valisation dependency
    loadScript("src/smartadmin/js/plugin/jquery-nestable/jquery.nestable.min.js");
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js",pagefunction);

</script>
