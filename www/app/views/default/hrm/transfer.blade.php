<div data-ng-controller="HrmTransferController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-exchange"></i> {{trans('hrm.transfer')}}
            </h1>
        </div>
    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col col-xs-12 col-sm-4 ">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-hrmtransfer0"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                        <h2>Thông tin nhân viên</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="row-fluid">
                                <div class="col-xs-10">
                                    <input class="form-control"
                                           ui-keydown="{'enter': 'search()'}"
                                           ng-model="employeesearch" placeholder="Mã con người hoặc mã nhân viên">
                                </div>
                                <div class="col-xs-2">
                                    <a data-ng-click="search()" class="btn btn-success"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr>
                            <div ng-if="person && person.id" >
                                @include(Config::get('main.theme') . '.pas.personinfosmallng')
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>
            <article class="col col-xs-12 col-sm-4 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-hrmtransfer1"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                        <h2>Khoa phòng</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form class=" smart-form" id="formemployee">
                                <fieldset>
                                    <div class="row  ">
                            <section class="col col-xs-12">
                                <label class="label">Bệnh viện</label>
                                <label class="select">
                                    <select ng-model="hospital_code">
                                        <option data-ng-repeat="item in hospital" value="@{{item.code}}">
                                            @{{item.name}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="label">Khoa</label>

                                <label class="select">
                                    <select ng-model="dept_code">
                                        <option value="0">Chọn khoa</option>
                                        <option data-ng-repeat="item in dept" value="@{{item.code}}">
                                            @{{item.name}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="label">Khu</label>
                                <label class="select">
                                    <select ng-model="ward_code">
                                        <option value="0">Chọn khu</option>

                                        <option ng-if="item.dept_code == dept_code" data-ng-repeat="item in ward" value="@{{item.code}}">
                                            @{{item.name}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="label">Phòng</label>
                                <label class="select">
                                    <select ng-model="room_code">
                                        <option value="0">Chọn phòng</option>

                                        <option  ng-if="item.dept_code = dept_code && item.ward_code == ward_code" data-ng-repeat="item in room" value="@{{item.code}}">
                                            @{{item.name}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                                        </div>
                                    </fieldset>
                                <footer>
                                    <button class="btn btn-success">Điều chuyển</button>
                                </footer>
                                </form>
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>
            <article class="col col-xs-12 col-sm-4 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-hrmtransfer2"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>
                        <h2>Nhân sự</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body no-padding">

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

            function HrmTransferController($scope, $http) {
                $scope.hospital = {{$hospital}};
                $scope.hospital_code = {{$hospital_code}};
                $scope.dept = {{$dept}};
                $scope.ward = {{$ward}};
                $scope.room = {{$room}};
                $scope.dept_code = 0;
                $scope.ward_code = 0;
                $scope.room_code = 0;

            }

            var pagefunction = function () {
            };
            loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
        </script>