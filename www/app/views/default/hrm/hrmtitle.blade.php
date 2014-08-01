<div data-ng-controller="hrmTitleController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>{{trans('hrm.hrmtitle')}}
            </h1>
        </div>

    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-hrmtitle0"
                     data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                        <h2>Thông tin chức danh</h2>

                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form class=" smart-form" id="formtitle">
                                <fieldset>
                                    <div class="row  ">
                                        <section class="col col-lg-3 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Tên Chức Danh</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="title.id">
                                                <input type="text" name="name"
                                                       placeholder="Tên Chức Danh"
                                                       ng-model="title.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-3 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Mã Chức Danh</label>
                                            <label class="input">
                                                <input type="text" name="code"
                                                       placeholder="Mã Chức Danh"
                                                       ng-model="title.code">
                                                <i class="icon-append fa fa-barcode"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-3 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Biến Ngôn Ngữ</label>
                                            <label class="input">
                                                <input type="text" name="lang"
                                                       placeholder="Biến Ngôn Ngữ"
                                                       ng-model="title.lang">
                                                <i class="icon-append fa fa-language"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-3 col-xs-12 col-sm-6 col-md-4">
                                            <label class="label">Nhóm Chức Danh</label>
                                            <label class="select">
                                                <select ng-model="title.group" name="group">
                                                    <option value="0">Khác</option>
                                                    <option value="gbs">Bác Sĩ</option>
                                                    <option value="gdd">Điều Dưỡng</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button class="btn btn-primary" data-ng-click="save()">{{trans('common.save')}}
                                    </button>
                                    <a class="btn btn-primary" data-ng-click="reset()">{{trans('common.reset')}}
                                    </a>
                                </footer>
                            </form>
                        </div>

                    </div>
            </article>
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-hrmtitle1"
                     data-widget-editbutton="false">

                        <header>
                            <h2>Danh Sách Chức Danh</h2>
                        </header>
                    <div>
                        <div class="widget-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên Chức Danh</th>
                                    <th>Mã Chức Danh</th>
                                    <th>Biến Ngôn Ngữ</th>
                                    <th>Nhóm Chức Danh</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-ng-repeat="title in titlelist">
                                    <td>@{{title.name}}</td>
                                    <td>@{{title.code}}</td>
                                    <td>@{{title.lang}}</td>
                                    <td>@{{title.group}}</td>
                                    <td>
                                        <a data-ng-click="edit(title)"><i class="fa fa-pencil-square"></i></a>
                                        <a data-ng-click="delete(title)"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<script>
    pageSetUp();
    function hrmTitleController($scope, $http) {
        $scope.title = {
            id: "",
            name: "",
            code: "",
            lang: "",
            group: 0
        };
        $scope.save = function () {
            if ($('#formtitle').valid()) {
                $http.post('hrm/savetitle',
                    {
                        data: $scope.title
                    })
                    .success(
                    function (data) {
                        if (data > 0) {
                            myalert('Thông Báo', 'Lưu thành công');
                            $scope.reset();
                        }
                        else {
                            myalert('Thông Báo', 'Lưu thất bại');
                        }
                        $scope.load();
                    }
                );
            }
        };

        $scope.reset = function(){
            angular.copy($scope.initial, $scope.title);
            $scope.title.id = "";
            $scope.title.group = 0;
        };

        $scope.delete = function(title){
            $http.delete('hrm/deletetitle/'+title.id)
                .success(
                function(data){
                    if (data <= 0) {
                        myalert('Thông Báo', 'Xóa thất bại');
                    }
                    $scope.load();
                }
            );
        };

        $scope.titlelist = [];

        $scope.load = function () {
            $http.get('hrm/loadtitle')
                .success(function (data) {
                    $scope.titlelist = data;
                });
        };

        $scope.edit = function(title){
            angular.copy(title,$scope.title);
        };

        $scope.load();
    }
    var pagefunction = function () {
        var $checkoutForm = $('#formtitle').validate({
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
                    required: 'Vui lòng nhập Tên Chức Danh',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },
                lang: {
                    required: 'Vui lòng nhập Biến ngôn ngữ',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                },
                code: {
                    required: 'Vui lòng nhập Mã Chức Danh',
                    minlength: 'Vui lòng nhập ít nhất 3 ký tự'
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    // Load form valisation dependency
    //loadScript("src/smartadmin/js/plugin/jquery-nestable/jquery.nestable.min.js");
    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>