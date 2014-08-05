<div data-ng-controller="RadtAdmissionController">
<div class="row">
    <div class="col-xs-12 col-md-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw"></i>Tiếp nhận bệnh
        </h1>
    </div>
    <div class="col-xs-12 col-md-8">
        <style>
            #sparks li h5 {
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
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 no-padding">
    <article class="col-xs-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blue" id="wid-id-tiepnhan0"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
             data-widget-deletebutton="false"
             data-widget-sortable="false"
             data-widget-togglebutton="false"
             data-widget-colorbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                <h2>{{$person->lastname}} {{$person->firstname}}</h2>
            </header>
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    {{--*/ $shortinfo = true; /*--}}
                    @include(Config::get('main.theme') . '.pas.personinfosmall')

                </div>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->
    </article>
    <!-- end article -->

</div>
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget " id="wid-id-tiepnhan4"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
             data-widget-deletebutton="false"
             data-widget-togglebutton="false"
             data-widget-sortable="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-stethoscope"></i> </span>

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

                    <form class="smart-form">
                        <fieldset>
                            <div class="col">
                                <div class="row">
                                    <section class="col-xs-12">
                                        <label class="label">Chẩn đoán ban đầu</label>
                                    </section>
                                    <section class="col-xs-2">
                                        <label class="input">
                                            <input ondblclick="this.value=''" type="text" name="firstdiagnosiscode"
                                                   ng-model="admission.firstdiagnosiscode"
                                                   ui-keydown="{'enter tab': 'inputCallback($event)'}">
                                        </label>
                                    </section>
                                    <section class="col col-xs-10">
                                        <label class="input">
                                            <autocomplete placeholder="" ng-model="admission.firstdiagnosis" data="searchresult" on-type="searchIcd10text"></autocomplete>
                                        </label>
                                    </section>
                                    <section class="col-xs-12">
                                        <label class="label">Chẩn đoán chính</label>
                                    </section>
                                    <section class="col-xs-2">
                                        <label class="input">
                                            <input  ondblclick="this.value=''" type="text" name="diagnosiscode"
                                                   ng-model="admission.diagnosiscode"
                                                   ui-keydown="{'enter tab': 'inputCallback($event)'}">
                                        </label>
                                    </section>
                                    <section class="col col-xs-10">
                                        <label class="input">
                                            <autocomplete placeholder="" ng-model="admission.diagnosis" data="searchresult" on-type="searchIcd10text"></autocomplete>
                                        </label>
                                    </section>
                                    <section class="col-xs-12">
                                        <label class="label">Bệnh phụ</label>
                                    </section>
                                    <section class="col-xs-2">
                                        <label class="input">
                                            <input  ondblclick="this.value=''" type="text" name="subdiagnosiscode"
                                                   ng-model="admission.subdiagnosiscode"
                                                   ui-keydown="{'enter tab': 'inputCallback($event)'}">
                                        </label>
                                    </section>
                                    <section class="col col-xs-10">
                                        <label class="input">
                                            <autocomplete placeholder="" ng-model="admission.subdiagnosis" data="searchresult" on-type="searchIcd10text"></autocomplete>
                                        </label>

                                    </section>
                                    <section class="col-xs-12" ng-if="admission.subdiagnosislist.length > 0">
                                    <div
                                        class="alert alert-block alert-info padding-right-5"
                                        >
                                        <ul class="list-unstyled">
                                            <li data-ng-repeat="subicd in admission.subdiagnosislist">
                                                <a data-ng-click="delsubicd(subicd)"><i
                                                        class="fa fa-minus-circle"></i></a>
                                                @{{subicd}}
                                            </li>
                                        </ul>
                                    </div>
                                    </section>
                                    <section class="col-xs-6">
                                        <label class="label">Tiên lượng</label>
                                        <label class="input">
                                            <input type="text" name="tienluong"
                                                   ng-model="admission.tienluong"
                                                   value="Trung bình">
                                        </label>
                                    </section>
                                    <section class="col col-xs-6">
                                        <label class="label">&nbsp;</label>
                                        <label class="select">
                                            <select type="text" name="typeexam"
                                                    ng-model="admission.typeexam">
                                                <option value="0">Khám nội</option>
                                                <option value="1">Khám ngoại</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class=" col-xs-6">
                                        <label class="label">Khoa</label>
                                        <label class="select">
                                            <select type="text" name="dept_code"
                                                    ng-model="admission.dept_code">
                                                @foreach($depts as $dept)
                                                     <option value="{{$dept->code}}">{{$dept->name}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-xs-6">
                                        <label class="label">Khu</label>
                                        <label class="select">
                                            <select type="text" name="ward_code"
                                                    ng-model="admission.ward_code">
                                                @foreach($wards as $ward)
                                                <option value="{{$ward->code}}">{{$ward->name}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col-xs-12">
                                        <label class="label">Tóm tắt bệnh án</label>
                                        <label class="textarea">
                                                    <textarea class="textarea" type="text"
                                                              name="summary"
                                                              ng-model="admission.summary">
                                                    </textarea>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                        </fieldset>
                        <footer>
                            <button class="btn btn-primary" data-ng-click="save()">{{trans('common.save')}}</button>
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
        </p>
        <p>
            Chẩn đoán: {{$admissioninfo->refdiagnosis}}
        </p>
        @endif
        @if($admissioninfo->status)
        <p>
            Triệu chứng: <b>{{$admissioninfo->status}}</b>
        </p>
        @endif
        @if($admissioninfo->process)
        <p>
            Quá trình bệnh lý: <b>{{$admissioninfo->process}}</b>
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
    <article class="col-xs-12 no-padding ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-tiepnhan3"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
             data-widget-deletebutton="false"
             data-widget-togglebutton="false"
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
                <div class="widget-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a><i class="fa fa-film"></i> Chỉ định CĐHA</a>
                        </li>
                        <li>
                            <a><i class="fa fa-flask"></i> Chỉ định Xét nghiệm </a>
                        </li>

                    </ul>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->


        </div>
        <!-- end widget -->
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
        $scope.eid = '';
        $scope.admission = {
            firstdiagnosis: '',
            firstdiagnosiscode: '',
            diagnosiscode: '',
            diagnosis: '',
            subdiagnosiscode: '',
            subdiagnosis: '',
            tienluong: 'Trung bình',
            typeexam: 0,
            ward_code:'{{$wardcode}}',
            dept_code:'{{$deptcode}}',
            summary:'',
           subdiagnosislist : [],
           subdiagnosiscodelist : []
        };

        $scope.save = function(){
            console.log($scope.admission);
        }
        $scope.inputCallback = function ($event) {
            var $target = $($event.target);
            if ($target.val().trim().length >= 3) {
                var rs = $scope.searchicd10($target.val().trim(), $target.attr('name'));
            }
        };
        $scope.searchicd10 = function (key, input) {
            $http.get('radt/icd10/' + key)
                .success(function (data) {
                    if (angular.isObject(data)) {
                        switch (input) {
                            case "firstdiagnosiscode":
                                $scope.admission.firstdiagnosis = data.code + " - " +data.name;
                                $scope.admission.firstdiagnosiscode = data.code;
                                break;
                            case "diagnosiscode":
                                $scope.admission.diagnosis = data.code + " - " +data.name;
                                $scope.admission.diagnosiscode = data.code;
                                break;
                            case "subdiagnosiscode":
                                if ($scope.admission.subdiagnosiscodelist.indexOf(data.code) == -1) {
                                    $scope.admission.subdiagnosislist.push(data.code + " - " + data.name);
                                    $scope.admission.subdiagnosiscodelist.push(data.code);
                                    $scope.admission.subdiagnosiscode = '';
                                }

                                break;
                        }
                    }
                });
        }
        $scope.delsubicd = function (icd) {
            $scope.admission.subdiagnosislist.pop(icd);
        }
        $scope.searchflag='';
        $scope.searchresult = [];
        $scope.searchmin = 3;
        $scope.searchIcd10text = function(typed){
                if(typed.length == $scope.searchmin || typed.length == ($scope.searchmin+2) || typed.length == ($scope.searchmin+4) ){
                        $scope.searchflag = typed;
                        $scope.searchresult = [];
                        $http.get('radt/searchicd10/'+$scope.searchflag)
                            .success(function(data){
                                angular.forEach(data,function(value,key){
                                    $scope.searchresult.push(value.code+" - "+value.name);
                                });

                            });
                }
                if(typed.length < $scope.searchmin){
                    //reset search key
                    $scope.searchflag = '';
                }
        };
        $scope.$watch('admission.firstdiagnosis',function(){
            if($scope.admission.firstdiagnosis){
                if($scope.admission.firstdiagnosiscode == ''){
                    if($scope.admission.firstdiagnosis.indexOf("-")>-1){
                        $scope.admission.firstdiagnosiscode =  $scope.admission.firstdiagnosis.substr(0,($scope.admission.firstdiagnosis.indexOf("-") -1 )).trim();
                    }
                }
            }
        });
        $scope.$watch('admission.diagnosis',function(){
            if($scope.admission.diagnosis){
                if($scope.admission.diagnosiscode == ''){
                    if($scope.admission.diagnosis.indexOf("-")>-1){
                        $scope.admission.diagnosiscode =  $scope.admission.diagnosis.substr(0,($scope.admission.diagnosis.indexOf("-") -1 )).trim();
                    }
                }
            }
        });
        $scope.$watch('admission.subdiagnosis',function(){
            if($scope.admission.subdiagnosis){
                if($scope.admission.subdiagnosiscode == ''){
                    if($scope.admission.subdiagnosis.indexOf("-")>-1){
                        $scope.admission.subdiagnosiscodelist.push($scope.admission.subdiagnosis.substr(0,($scope.admission.subdiagnosis.indexOf("-") -1 )).trim());
                        $scope.admission.subdiagnosislist.push($scope.admission.subdiagnosis);
                        $scope.admission.subdiagnosis = '';
                    }
                }
            }
        });
    }
</script>