<div data-ng-controller="CountryController">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw"></i>{{trans('hrm.address')}}
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
         data-widget-editbutton="true">
        <header>
            <span class="widget-icon"> <i class="fa fa-floppy-o"></i> </span>

            <h2>Thông tin quốc gia</h2>

        </header>
        <!-- widget div-->
        <div class="">

            <!-- widget content -->
            <div class="widget-body">
                <div class="col col-xs-6">

                </div>
                <div class="col col-xs-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên Quốc Gia</th>
                            <th>Mã Quốc gia</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-ng-repeat="title in titlelist.data">
                            <td>@{{title.name}}</td>
                            <td>@{{title.code}}</td>
                            <td>
                                <a data-ng-click="edit(title)"><i class="fa fa-pencil-square"></i></a>
                                <a data-ng-click="delete(title)"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list-inline">
                        <li data-ng-repeat="page in [] | paginate:titlelist.last_page">
                            <a href="#" data-ng-click="loadcountry(page)"> @{{page}} </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>


</article>
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-hrmtitle1" data-widget-editbutton="true">
        <header>
            <span class="widget-icon"><i class="fa fa-floppy-o"></i></span>

            <h2>Thông tin tỉnh thành</h2>
        </header>
        <!--widget div-->
        <div class="">
            <!--widget content-->
            <div class="widget-body">
                <div class="col col-xs-6">

                </div>

                <div class="col col-xs-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên Thành Phố</th>
                            <th>Mã Thành Phố</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-ng-repeat="title in listprovince.data" data-ng-click="editprovince(title)"
                            style="cursor: pointer">
                            <td>@{{title.name}}</td>
                            <td>@{{title.code}}</td>
                            <td>
                                <a data-ng-click="editprovince(title)"><i class="fa fa-pencil-square"></i></a>
                                <a data-ng-click="delete(title)"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list-inline">
                        <li data-ng-repeat="page in [] | paginate:listprovince.last_page">
                            <a href="#" data-ng-click="loadprovince(page)">@{{page}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="jarviswidget" id="wid-id-hrmtitle2" data-widget-editbutton="true">
        <header>
            <span class="widget-icon"><i class="fa fa-floppy-o"></i> </span>

            <h2>Thông tin Quận Huyện</h2>
        </header>
        <div class="">
            <div class="widget-body">
                <div class="col col-xs-6">
                    <div class="widget-body no-padding">
                        <form class=" smart-form" id="formtitle">
                            <fieldset>
                                <div class="row  ">
                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Tên Quận Huyện</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="dist.id">
                                            <input type="text" name="name"
                                                   placeholder="Tên Quận Huyện"
                                                   ng-model="dist.name">
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Mã Quận Huyện</label>
                                        <label class="input">
                                            <input type="text" name="code"
                                                   placeholder="Mã Quận Huyện"
                                                   ng-model="dist.code">
                                            <i class="icon-append fa fa-barcode"></i>
                                        </label>
                                    </section>

                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Thuộc Tỉnh Thành</label>
                                        <label class="select">
                                            <select ng-model="dist.province_code" name="group">
                                                <option data-ng-repeat="item in listallprovince" value="item.code"
                                                        data-ng-selected="dist.province_code == item.code">
                                                    @{{item.name}}
                                                </option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button class="btn btn-primary" data-ng-click="save('dist')">{{trans('common.save')}}
                                </button>
                                <a class="btn btn-primary" data-ng-click="reset('dist')">{{trans('common.reset')}}
                                </a>
                            </footer>
                        </form>
                    </div>
                </div>

                <div class="col col-xs-6">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>Tên Quận Huyện</th>
                                <th>Mã Quận Huyện</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thread>
                        <tbody>
                        <tr data-ng-repeat="item in listdistrict.data" data-ng-click="editdist(item)"
                            style="cursor: pointer">
                            <td>@{{item.name}}</td>
                            <td>@{{item.code}}</td>
                            <td>
                                <a data-ng-click="editdist(item)"><i class="fa fa-pencil-square"></i> </a>
                                <a data-ng-click="delete('dist',item.id)"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list-inline">
                        <li data-ng-repeat="page in [] | paginate:listdistrict.last_page">
                            <a href="#" data-ng-click="loaddistrict(page)">@{{page}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="jarviswidget" id="wid-id-hrmtitle3" data-widget-editbutton="true">
        <header>
            <span class="widget-icon"><i class="fa fa-floppy-o"></i> </span>

            <h2>Thông tin Phường Xã</h2>
        </header>
        <div class="">
            <div class="widget-body">
                <div class="col col-xs-6">
                    <div class="widget-body no-padding">
                        <form class=" smart-form" id="formtitle">
                            <fieldset>
                                <div class="row  ">
                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Tên Phường Xã</label>
                                        <label class="input">
                                            <input type="hidden" ng-model="ward.id">
                                            <input type="text" name="name"
                                                   placeholder="Tên Phường Xã"
                                                   ng-model="ward.name">
                                            <i class="icon-append fa fa-font"></i>
                                        </label>
                                    </section>
                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Mã Phường Xã</label>
                                        <label class="input">
                                            <input type="text" name="code"
                                                   placeholder="Mã Phường Xã"
                                                   ng-model="ward.code">
                                            <i class="icon-append fa fa-barcode"></i>
                                        </label>
                                    </section>

                                    <section class="col col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                        <label class="label">Thuộc Quận Huyện</label>
                                        <label class="select">
                                            <select ng-model="ward.district_code" name="group">
                                                <option data-ng-repeat="item in listalldistrict" value="item.code"
                                                        data-ng-selected="ward.district_code == item.code">
                                                    @{{item.name}}
                                                </option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button class="btn btn-primary" data-ng-click="save('ward')">{{trans('common.save')}}
                                </button>
                                <a class="btn btn-primary" data-ng-click="reset('ward')">{{trans('common.reset')}}
                                </a>
                            </footer>
                        </form>
                    </div>
                </div>
                <div class="col col-xs-6">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>Tên Phường Xã</th>
                                <th>Mã Phường Xã</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thread>
                        <tbody>
                        <tr data-ng-repeat="item in listward.data" data-ng-click="editward(item)"
                            style="cursor: pointer">
                            <td>@{{item.name}}</td>
                            <td>@{{item.code}}</td>
                            <td>
                                <a data-ng-click="editward(item)"><i class="fa fa-pencil-square"></i> </a>
                                <a data-ng-click="delete('ward',item.id)"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list-inline">
                        <li data-ng-repeat="page in [] | paginate:listward.last_page">
                            <a href="#" data-ng-click="loadward(page,item.code)">@{{page}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>
</div>
</section>
</div>

<script>
    pageSetUp();
    function CountryController($scope, $http) {

        $scope.province = {
            id: "",
            name: "",
            code: ""
        };
        $scope.dist = {
            id: "",
            name: "",
            code: "",
            province_code: ""
        };
        $scope.ward = {
            id: "",
            name: "",
            code: "",
            district_code: ""
        };
        $scope.save = function ($tpl) {

            if ($('#formtitle').valid()) {
                if ($tpl == "dist") {
                    $http.post('address/save/dist',
                        {
                            data: $scope.dist
                        })
                        .success(
                        function (data) {
                            console.log($scope.dist);
                            if (data > 0) {
                                myalert('Thông Báo', 'Lưu thành công');
                                $scope.reset('dist');
                            }
                            else {
                                myalert('Thông Báo', 'Lưu thất bại');
                            }
                            $scope.load();
                        }
                    );
                }
                else if ($tpl == "ward") {
                    $http.post('address/save/ward',
                        {
                            data: $scope.ward
                        })
                        .success(
                        function (data) {
                            if (data > 0) {
                                myalert('Thông Báo', 'Lưu thành công');
                                $scope.reset('ward');
                            }
                            else {
                                myalert('Thông Báo', 'Lưu thất bại');
                            }
                            $scope.load();
                        }
                    );
                }
            }
        };

        $scope.reset = function ($tpl) {
            if ($tpl == 'dist') {
                angular.copy($scope.initial, $scope.dist);
                $scope.dist.id = "";
            }
            else if ($tpl == 'ward') {
                angular.copy($scope.initial, $scope.ward);
                $scope.ward.id = "";
            }
        };

        $scope.delete = function ($tpl, $id) {
            if ($tpl == 'dist') {
                $http.delete('address/deletedist/' + $id)
                    .success(
                    function (data) {
                        if (data <= 0) {
                            myalert('Thông Báo', 'Xóa thất bại');
                        }
                        $scope.load();
                    }
                );
            }
            else if ($tpl == 'ward') {
                $http.delete('address/deleteward/' + $id)
                    .success(
                    function (data) {
                        if (data <= 0) {
                            myalert('Thông Báo', 'Xóa thất bại');
                        }
                        $scope.load();
                    }
                );
            }
        };

        $scope.titlelist = [];
        $scope.listallprovince = [];
        $scope.listprovince = [];
        $scope.listalldistrict = [];
        $scope.listdistrict = [];
        $scope.listward = [];

        $scope.loadward = function (page, code) {
            $http.get('address/wardtitle/' + page + "/" + code).success(function (data) {
                $scope.listward = data;
            });
        };
        $scope.loaddistrict = function (page, code) {
            $http.get('address/districttitle/' + page + "/" + code).success(function (data) {
                $scope.listdistrict = data;
            });
        };

        $scope.loadprovince = function (page) {
            $http.get('address/provincetitle/' + page)
                .success(function (data) {
                    $scope.listprovince = data;
                });
        };

        $scope.loadcountry = function (page) {
            $http.get('address/countrytitle/' + page)
                .success(function (data) {
                    $scope.titlelist = data;
                });
        };

        $scope.editdist = function (title) {
            angular.copy(title, $scope.dist);
            $http.get('pas/allprovince/').success(function (data) {
                $scope.listallprovince = data;
            });
            $scope.loadward(1, title.code)
        };
        $scope.editward = function (title) {
            angular.copy(title, $scope.ward);
            $http.get('pas/alldistrict/' + $scope.province.code).success(function (data) {
                $scope.listalldistrict = data;
            });
        };

        $scope.editprovince = function (title) {
            angular.copy(title, $scope.province);
            $scope.loaddistrict(1, title.code)
        };

        $scope.loadcountry(1);
        $scope.loadprovince(1);
        $scope.loaddistrict(1, 701);
        $scope.loadward(1, 82305);
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