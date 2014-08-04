<div data-ng-controller="RadtAdmissionController">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>Tiếp nhận bệnh
            </h1>
        </div>
        <div class="col-xs-12 col-md-8">
                <style>
                    #sparks li h5{
                        text-transform: none;
                    }
                </style>
                <ul id="sparks" class="">
                    @if($vitalsign->height)
                    <li class="sparks-info">
                         Chiều cao
                        <span class="txt-color-blue">{{$vitalsign->height}} cm</span>.
                    </li>
                    @endif
                    @if($vitalsign->weight)
                    <li class="sparks-info">
                        Cân nặng
                        <span class="txt-color-blue">{{$vitalsign->weight}} kg</span>.
                    </li>
                    @endif
                    @if($vitalsign->temperature)
                    <li class="sparks-info">
                        Thân nhiệt
                        <span class="txt-color-blue">{{$vitalsign->temperature}} °C</span>.
                    </li>
                    @endif
                    @if($vitalsign->bloodpressure)
                    <li class="sparks-info">
                        Huyết áp
                        <span class="txt-color-blue">{{$vitalsign->bloodpressure}}</span>.
                    </li>
                    @endif
                    @if($vitalsign->heartbeat)
                    <li class="sparks-info">
                        Mạch:
                        <span class="txt-color-blue">{{$vitalsign->heartbeat}} l/p</span>.
                    </li>
                    @endif


                </ul>
        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-tiepnhan4"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
                            <h2>
                                Chẩn đoán
                            </h2>
                        </header>
                        <!-- widget div-->
                        <div class="">
                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <div class="alert alert-block alert-warning" ng-if=" eid=='' ">
                                    Bệnh nhân chưa tiếp nhận
                                </div>
                                <div class="alert alert-block alert-success " ng-if="eid!='' ">
                                    Mã bệnh nhân: <strong>@{{eid}}</strong>
                                </div>
                                <form class="smart-form ">
                                    <fieldset class="no-padding">
                                        <div class="col">
                                        <label class="label">Chẩn đoán ban đầu</label>
                                        <section class="col-xs-2">
                                            <label class="input">
                                                <input type="text" name="firstdiagnosiscode"
                                                       ng-model="admission.firstdiagnosiscode">
                                            </label>
                                        </section>
                                        <section class="col col-xs-10">
                                            <label class="input">
                                                <input type="text" name="firstdiagnosis"
                                                       ng-model="admission.firstdiagnosis">
                                            </label>
                                        </section>
                                        </div>
                                        <div class="col">
                                        <label class="label">Chẩn đoán chính</label>
                                        <section class="col-xs-2">
                                            <label class="input">
                                                <input type="text" name="diagnosiscode"
                                                       ng-model="admission.diagnosiscode">
                                            </label>
                                        </section>
                                        <section class="col col-xs-10">
                                            <label class="input">
                                                <input type="text" name="diagnosis"
                                                       ng-model="admission.diagnosis">
                                            </label>
                                        </section>
                                            </div>
                                        <div class="col">
                                        <label class="label">Bệnh phụ</label>
                                        <section class="col-xs-2">
                                            <label class="textarea">
                                                <textarea type="text" name="subdiagnosiscode"
                                                       ng-model="admission.subdiagnosiscode"></textarea>
                                            </label>
                                        </section>
                                        <section class="col col-xs-10">
                                            <label class="textarea">
                                                <textarea type="text" name="subdiagnosis"
                                                       ng-model="admission.subdiagnosis"></textarea>
                                            </label>
                                        </section>
                                            </div>
                                    </fieldset>
                                    <footer>
                                        <button class="btn btn-primary">Save</button>
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
                </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="alert alert-block alert-info">
                    <h4 class="alert-heading">Thông tin tiếp nhận</h4>
                    @if($admissioninfo->by==2)
                    <p>
                        <b>Chuyển viện</b> từ <i>{{$admissioninfo->refplace}}
                            ({{$admissioninfo->refplacecode}})</i>.
                        {{$admissioninfo->refdiagnosis}}
                    </p>
                    @endif
                    @if($admissioninfo->status)
                    <p>
                        Triệu chứng: <b>{{$admissioninfo->status}}</b>
                    </p>
                    @endif
                    @if($admissioninfo->personhistory)
                    <p>Tiền sử bệnh cá nhân: <b>{{$admissioninfo->personhistory}}</b>
                    </p>
                    @endif
                    @if($admissioninfo->familyhistory)
                    <p> Tiền sử bệnh gia đình: <b>{{$admissioninfo->familyhistory}}</b></p>
                    @endif
                </div>

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 no-padding">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-tiepnhan3"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                            <h2>
                                Thao tác
                            </h2>


                        </header>
                        <!-- widget div-->
                        <div class="">

                            <!-- widget content -->
                            <div class="widget-body ">


                            </div>
                            <!-- end widget content -->
                        </div>
                        <!-- end widget div -->


                    </div>
                    <!-- end widget -->
                </article>
                <!-- end article -->

            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 no-padding">
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-tiepnhan0"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false"
                        >
                        <header>
                            <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                            <h2>{{$person->lastname}} {{$person->firstname}}</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">
                                @include(Config::get('main.theme') . '.pas.personinfosmall')
                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
                <!-- end article -->

            </div>
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
    function RadtAdmissionController($scope, $http, $interval, $filter) {
        $scope.eid = '12';
    }
</script>