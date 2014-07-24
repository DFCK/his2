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
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0"
                 data-widget-editbutton="false">

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
                                <div class="row">
                                    <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                        <label class="label">Tên chức vụ</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="form.id">
                                            <input type="text" name="modulename"
                                                   placeholder="Tên chức vụ"
                                                   ng-model="form.modulename" required>
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    @{{form.b}}
                                </div>
                                <div class="row">
                                    <section class="col col-lg-12 col-xs-12 col-sm-6 col-md-4">
                                        <label class="label">Mã chức vụ</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="form.id">
                                            <input type="text" name="moduleid"
                                                   placeholder="Mã chức vụ"
                                                   ng-model="form.moduleid" required>
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    @{{form.b}}
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
    </div>
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
                                            <input type="hidden" ng-model="form.id">
                                            <input type="text" name="modulename"
                                                   placeholder="Tên chức năng"
                                                   ng-model="form.modulename" required>
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    @{{form.b}}
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
    </div>
    <script type="text/javascript">
        /* DO NOT REMOVE : GLOBAL FUNCTIONS!
         */
        pageSetUp();

        /**
         * AngularJS controller
         * @param $scope
         * @param $http
         */
        function DmchucvuController($scope, $http) {
            $scope.form = {
                'modulename': ''
            };
            $scope.savemodule = function () {
                var data = $scope.form;
                $http.post('admin/adddmchucvu', {
                    data: $scope.form
                })
                    .success(function (data) {
                        $scope.toggle = true;
                        if (data > 0) {
                            $scope.notifmessage = 'Thêm dữ liệu thành công';
                        } else {

                        }
                    });
            };
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
        pagefunction();
    </script>