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
                            <form class=" smart-form" id="formmodule">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-3">
                                            <label class="label">Tên chức năng</label>
                                            <label class="input">
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
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">Thuộc Nhóm</label>
                                            <label class="select">
                                                <select ng-model="afunc.moduleparent">
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

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Chức năng</th>
                                        <th>Mã</th>
                                        <th>Đường dẫn</th>
                                        <th>Biến ngôn ngữ</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                      <tr data-ng-repeat="functitem in tree">
                                            <td>@{{functitem.modulename}}</td>
                                            <td>@{{functitem.modulecode}}</td>
                                            <td>@{{functitem.moduleurl}}</td>
                                            <td>@{{functitem.modulelang}}</td>
                                      </tr>
                                    </tbody>
                                </table>

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
            id:'',
            children:[]
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
                        if(data>0){
//                            $scope.afunc['id'] = data;
//                            $scope.functionlist.push($scope.afunc);
                            getfunction();
                            angular.copy($scope.initial, $scope.afunc);

                        }
                    });
            }
        };
        var buildtree  = function (data) {
            $scope.tree = [];
            var children = [];
            for (i = 0; i < data.length; i++) {
               var item = data[i];
                var id= item['id'];
                var moduleparent = item['moduleparent'];
               if(children[moduleparent]){
                   var tmpitem = item;
                   if(!children[moduleparent].children){
                       children[moduleparent].children = [];
                   }
                   children[moduleparent].children[children[moduleparent].children.length] = tmpitem;
                   item[id] = tmpitem;
               }
                else{
                   children[id] = item;
                   $scope.tree.push(children[id]);
               }
            }
//            return source;
        };

        var getfunction = function(){
            $http.get('admin/functionlist')
                .success(function (data) {
                    $scope.functionlist = data;
                    buildtree($scope.functionlist);
                    console.log($scope.tree);
                });
        }
        getfunction();

    }
    var pagefunction = function () {

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
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>
