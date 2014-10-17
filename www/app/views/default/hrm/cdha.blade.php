<div data-ng-controller="CDHAController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-grayDark">
                <i class="fa fa-cog fa-fw"></i> {{trans('hrm.cdha')}}
            </h1>
        </div>
    </div>
    <!--widget grid -->
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                <div class="jarviswidget" id="id-cdha0" data-widget-editbutton="true">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

                        <h2>Chẩn đoán hình ảnh</h2>
                    </header>
                    <div class="widget-body">
                        <!--                            PHẦN TYPE ĐỂ CLICK CHỌN-->
                        <div class="col col-xs-2 col-sm-2 col-lg-2 col-md-2"
                             style="max-height: 250px;overflow-y: auto">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>Loại</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-ng-repeat="item in listtype" data-ng-click="loadcdha(item)"
                                    style="cursor: pointer">
                                    <td>@{{item}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--                            PHẦN XEM-->
                        <div class="col col-md-10 col-xs-10 col-md-10 col-lg-10"
                             style="max-height: 250px; overflow-y: auto">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Template</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-ng-repeat="item in listcdha" style="cursor: pointer"
                                    data-ng-click="editcdha(item)">
                                    <td>@{{item.name}}</td>
                                    <td>@{{item.code}}</td>
                                    <td >@{{item.template.length}}</td>
                                    <td>@{{item.type}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
            <!--            GIAO DIỆN PHẦN CHỈNH SỬA-->
            <article class="col col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="cdha1" data-widget-editbutton="true">
                    <header>
                        <span class="widget-icon"><i class="fa fa-floppy-o"></i> </span>

                        <h2>Chỉnh sửa</h2>
                    </header>

                    <div class="widget-body">
                        <div class="widget-body no-padding">
                            <form class="smart-form">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                            <label class="label">Name</label>
                                            <label class="input">
                                                <input type="hidden" ng-model="cdha.id">
                                                <input type="text" name="name" placeholder="Name"
                                                       ng-model="cdha.name">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12"
                                                 style="padding-top:5px">
                                            <label class="label">Code</label>
                                            <label class="input">
                                                <input type="text" name="type" placeholder="Name"
                                                       ng-model="cdha.code">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12"
                                                 style="padding-top:5px">
                                            <label class="label">Type</label>
                                            <label class="input">
                                                <input type="text" name="type" placeholder="Name"
                                                       ng-model="cdha.type">
                                                <i class="icon-append fa fa-font"></i>
                                            </label>
                                        </section>
                                        <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12 summernoteouter"
                                                 style="padding-top:5px">
                                            <label class="label">Template</label>
                                            <textarea name="template" class="summernote"></textarea>
                                        </section>

                                    </div>
                                </fieldset>
                                <footer>
                                    <button class="btn btn-primary" data-ng-click="save()">{{trans('common.save')}}
                                    </button>
                                    <button class="btn btn-primary" data-ng-click="reset()">{{trans('common.reset')}}
                                    </button>
                                    <button class="btn btn-primary" data-ng-click="delete()">{{trans('common.delete')}}
                                    </button>
                                </footer>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script>
    pageSetUp();
    function CDHAController($scope, $http) {
        $scope.cdha = {
            id: 0,
            code: "",
            name: "",
            template: "",
            type: ""
        };
        $scope.currtype = "xquang";

        $scope.listcdha = [];
        $scope.listtype = ["xquang", "sieuam", "ct", "mri", "noisoi", "dientim"];

        $scope.loadcdha = function (type) {
            $scope.currtype = type;
            $scope.cdha.type = $scope.currtype;
            $http.get('ris/loadcdhaposition/' + type).success(function (data) {
                $scope.listcdha = data;
//                console.log($scope.listcdha);
            });
        };
        $scope.editcdha = function (item) {
            angular.copy(item, $scope.cdha);
            $('.summernote').code($scope.cdha.template);
        };
        $scope.save = function () {
            $scope.cdha.template = $('.summernote').code();

                $http.post('ris/savecdha',
                {
                    data: $scope.cdha
                })
                .success(
                function (data) {
//                    console.log($scope.cdha);
                    if (data > 0) {
                        myalert('Thông Báo', 'Lưu thành công');
                        $scope.reset();
                    }
                    else {
                        myalert('Thông Báo', 'Lưu thất bại');
                    }
                    $scope.loadcdha($scope.currtype);

                }
            );
        };
        $scope.reset = function () {
            angular.copy($scope.initial, $scope.cdha);
            $scope.cdha.id = 0;
            $scope.cdha.type = $scope.currtype;
            $('.summernote').code("");

        };
        $scope.delete = function ($id) {
            $http.delete('ris/deletecdha/' + $id).success(function (data) {
                if (data <= 0) {
                    myalert('Thông Báo', 'Xóa thất bại');
                }
                $scope.loadcdha($scope.cdha.type);
            });
        };
//        console.log($scope.listtype);
        $scope.loadcdha($scope.currtype);
    };
    var pagefunction = function () {

        // summernote
        $('.summernote').summernote({
            height : 180,
            focus : false,
            tabsize : 2
        });

    };

    // end pagefunction

    // load summernote, and all markdown related plugins
    loadScript("src/smartadmin/js/plugin/summernote/summernote.min.js", pagefunction);
    //    loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>