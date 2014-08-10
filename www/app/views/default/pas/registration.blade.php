<div ng-app="doc.ui-utils">
<div data-ng-controller="personregistercontroller">
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-barcode fa-fw"></i>
            @if(!isset($person))
                {{trans('pas.dk')}}
            @else
            {{trans('common.edit')}} {{$pid}}
            <a href="/#/pas/person/{{$pid}}" class="btn btn-labeled  pull-right">
            <span class="btn-label">
            <i class="fa fa-reply txt-color-white"></i>
            </span>{{trans('common.back')}}
            </a>
            @endif
            <button type="button" class="btn btn-labeled btn-success pull-right"
                    data-ng-click="save()">
         <span class="btn-label">
          <i class="fa fa-save txt-color-white"></i>
         </span>{{trans('common.save')}}
            </button>
        </h1>

    </div>

</div>
@if(isset($message))
<div class="alert alert-warning fade in">
    <button class="close" data-dismiss="alert">×</button>
    <i class="fa-fw fa fa-warning"></i>
    <strong> {{$message}} </strong>
</div>
@endif
<section id="widget-grid" class="">

<!-- row -->
<div class="row" id="formperson">

<!-- NEW WIDGET START -->
<article class="col-xs-12">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-pasreg0"
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-fullscreenbutton="false">
        <!-- widget options:
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
            <span class="widget-icon"> <i class="fa fa-user"></i> </span>

            <h2>{{trans('pas.personinfo')}}</h2>
        </header>
        <!-- widget div-->
        <div class="">

            <!-- widget content -->
            <div class="widget-body no-padding">

                <form class=" smart-form" id="formpersoninfo">
                    <fieldset>
                        <div class="row  ">
                            <div class="col-xs-9">
                                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                                    <label class="label">{{trans('pas.lastname')}}</label>
                                    <label class="input">
                                        <input type="hidden" ng-model="person.pid">
                                        <input type="text" name="lastname"
                                               placeholder="{{trans('pas.lastname')}}"
                                               ng-model="person.lastname" tabindex="1"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.firstname')}}</label>
                                    <label class="input">
                                        <input ng-model="person.firstname" name="firstname"
                                               tabindex="2"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="{{trans('pas.firstname')}}">


                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.sex')}}</label>
                                    <label class="select">
                                        <select name="sex" ng-model="person.sex"
                                                ng-change="changeavatar()"
                                                tabindex="3"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="0">{{trans('pas.sex')}}</option>
                                            <option value="m">{{trans('pas.men')}}</option>
                                            <option value="f">{{trans('pas.femal')}}</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                                <section class=" col-lg-2 col-xs-4 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.DOB')}}</label>
                                    <label class="input">
                                        <input ng-model="person.dob" name="dob" tabindex="4"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="dd-mm-yyyy"
                                               ui-mask="99-99-9999">
                                        <b class="tooltip tooltip-bottom-right">{{trans('pas.dateformat')}}</b>
                                    </label>
                                </section>
                                <section class=" col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                    <section class="col col-xs-6">
                                        <label class="label">{{trans('pas.YOB')}}</label>
                                        <label class="input">
                                            <input ng-model="person.yob" name="yob" tabindex="5"
                                                   ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                                   type="text" placeholder="yyyy" ui-mask="9999"
                                                >
                                        </label>
                                    </section>
                                    <section class="col col-xs-6">
                                        <label class="label">@{{labelage}}</label>
                                        <label class="input">
                                            <input ng-model="person.age" name="age" tabindex="6"
                                                   ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                                   type="text" placeholder="">
                                        </label>
                                    </section>
                                </section>
                                <div class="clear"></div>
                                <section class="col col-lg-6 col-xs-6 col-sm-6 col-md-6">
                                    <label class="label">{{trans('pas.address')}}</label>
                                    <label class="input">
                                        <input ng-model="person.address" name="address" tabindex="7"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="{{trans('pas.address')}}">
                                    </label>
                                </section>
                                <section class="col col-lg-2 col-xs-6 col-sm-2 col-md-2">
                                    <label class="label">{{trans('pas.shortcut')}}</label>
                                    <label class="input">
                                        <input ng-model="shortcut" name="shortcut"
                                               tabindex="8"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}"
                                               type="text" placeholder="{{trans('pas.shortcut')}}">
                                    </label>
                                </section>
                                <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                    <label class="label">{{trans('pas.province')}}</label>
                                    <label class="select">
                                        <select name="province" ng-model="person.province"
                                                style="width:100%" class="select-2" tabindex="9"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option data-ng-repeat="province in provinces"
                                                    value="@{{province.code}}"  ng-selected="province.code == person.province">
                                                @{{province.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                    <label class="label">{{trans('pas.district')}}</label>
                                    <label class="select">
                                        <select name="district" ng-model="person.district"
                                                class="select-2" tabindex="10"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option data-ng-repeat="district in districts"
                                                    value="@{{district.code}}"
                                                    ng-selected="district.code == person.district">
                                                @{{district.name}}
                                            </option>

                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                    <label class="label">{{trans('pas.addressward')}}</label>
                                    <label class="select">
                                        <select name="addressward" ng-model="person.addressward"
                                                class="select-2" tabindex="11"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option data-ng-repeat="addressward in addresswards"
                                                    value="@{{addressward.code}}"
                                                    ng-selected="addressward.code == person.addressward">
                                                @{{addressward.name}}
                                            </option>

                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-lg-4 col-xs-6 col-sm-4 col-md-4">
                                    <label class="label">{{trans('pas.doituong')}}</label>
                                    <label class="select">
                                        <select ng-model="person.doituong"
                                                onchange="changedoituong(this)" tabindex="12"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="bhyt">BHYT</option>
                                            <option value="tp">Thu Phí</option>
                                            <option value="mp">Miễn Phí</option>
                                            <option value="dv">Dịch vụ</option>
                                            <option value="k">Khác</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="col-xs-3">
                                <section class="col col-xs-12">
                                    <input type="hidden" ng-model="person.avatar" id="inputavatar">
                                    <img src="{{asset('images/noavatarm.jpg')}}"
                                         id="pasavatar"
                                         class="img-responsive img-thumbnail"
                                         style="max-height: 210px">
                                    <a style="position: absolute; top:15px;left:30px;" href=""
                                       ng-click="camera()"
                                       data-toggle="modal" data-target="#remoteModal"
                                       class="btn btn-primary">
                                        &nbsp;&nbsp;&nbsp;<i class="fa fa-camera"></i>&nbsp;&nbsp;&nbsp;
                                    </a>
                                </section>
                            </div>
                        </div>
                    </fieldset>
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
<article class="col-xs-12">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-pinkDark" id="wid-id-pasreg1" data-widget-collapsed=""
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-fullscreenbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-credit-card"></i> </span>

            <h2>{{trans('pas.insuranceinfo')}}</h2>
        </header>
        <!-- widget div-->
        <div class="">
            <!-- widget content -->
            <div class="widget-body no-padding">
                <form class=" smart-form" id="forminsurance">
                    <fieldset>
                        <div class="row  ">
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insurancecode')}}</label>
                                <label class="input">
                                    <label class="icon-append">@{{countisurancecode}}</label>
                                    <input type="text" name="insurancecode"
                                           placeholder="Mã bảo hiểm"
                                           ng-model="person.insurancecode" maxlength="20"
                                           tabindex="13"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">

                                </label>
                            </section>
                            <section class="col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.insurancefromdate')}}</label>
                                    <label class="input">
                                        <input ng-model="person.insurancefromdate"
                                               name="insurancefromdate"
                                               type="text"
                                               placeholder="dd-mm-yyyy"
                                               ui-mask="99-99-9999" tabindex="14"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                    </label>
                                </section>
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.insurancetodate')}}</label>
                                    <label class="input">
                                        <input ng-model="person.insurancetodate"
                                               name="insurancetodate"
                                               type="text"
                                               placeholder="dd-mm-yyyy"
                                               ui-mask="99-99-9999" tabindex="15"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                    </label>
                                </section>
                            </section>

                            <section class="col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.insurancecompany')}}</label>
                                    <label class="select">
                                        <select ng-model="person.insurancecompany" tabindex="16"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="0">BHYT</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.route')}}</label>
                                    <label class="select">
                                        <select ng-model="person.route">
                                            <option value="0">{{trans('pas.routecorrect')}}</option>
                                            <option value="1">{{trans('pas.routewrong')}}</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.insuranceplace')}}</label>
                                <label class="select">
                                    <select ng-model="person.insuranceplace">
                                        <option ng-repeat="bv in bvdkbd" value="@{{bv.code}}"
                                                ng-selected="person.insuranceplace == bv.code">
                                            @{{bv.name}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end widget content -->
        </div>
        <!-- end widget div -->
    </div>
    <!-- end widget -->
</article>
<!-- end article -->
<article class="col-xs-12">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-yellow" id="wid-id-pasreg2"
         data-widget-editbutton="false" data-widget-deletebutton="false"
         data-widget-sortable="false" data-widget-collapsed=""
         data-widget-fullscreenbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

            <h2>{{trans('pas.moreinfo')}}</h2>
        </header>
        <!-- widget div-->
        <div class="">
            <!-- widget content -->
            <div class="widget-body no-padding">
                <form class=" smart-form" id="forminsurance">
                    <fieldset>
                        <div class="row  ">
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.country')}}</label>
                                <label class="select">
                                    <select ng-model="person.country">
                                        <option ng-repeat="country in countries"
                                                value="@{{country.code}}"
                                                ng-selected="person.country == country.code">
                                            @{{country.namevn}}
                                        </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.CMND')}}</label>
                                <label class="input">
                                    <input ng-model="person.cmnd" name="cmnd"
                                           type="text" placeholder="{{trans('pas.CMND')}}"
                                           tabindex="17"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.dateissue')}}</label>
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input ng-model="person.dateissue" name="dateissue"
                                           type="text" placeholder="dd-mm-yyyy"
                                           ui-mask="99-99-9999" tabindex="18"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.placeissue')}}</label>
                                <label class="input">
                                    <input ng-model="person.placeissue" name="placeissue"
                                           type="text" placeholder="{{trans('pas.placeissue')}}"
                                           tabindex="19"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>

                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <section class=" col-xs-3">
                                    <label class="label">&nbsp;</label>
                                    <label class="input">
                                        <input ng-model="person.careercode" name="careercode"
                                               type="text" tabindex="20"
                                               ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                    </label>
                                </section>
                                <section class="col col-xs-9">
                                    <label class="label">{{trans('pas.career')}}</label>
                                    <label class="select">
                                        <select ng-model="person.career">
                                            <option data-ng-repeat="job in jobs"
                                                    value="@{{job.code}}">
                                                @{{(job.namevn)}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </section>
                            <section class=" col-lg-3 col-xs-6 col-sm-3 col-md-3">

                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.ethnic')}}</label>
                                    <label class="select">
                                        <select ng-model="person.ethnic" tabindex="21"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option ng-repeat="ethnic in ethnics"
                                                    value="@{{ethnic.code}}"
                                                    ng-selected="person.ethnic == ethnic.code">
                                                @{{ethnic.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-xs-6">
                                    <label class="label">{{trans('pas.blood')}}</label>
                                    <label class="select">
                                        <select ng-model="person.blood" tabindex="22"
                                                ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                            <option value="0">KXĐ</option>
                                            <option value="o">O</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="ab">AB</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.phone')}}</label>
                                <label class="input">
                                    <input ng-model="person.phone" name="phone"
                                           type="text" placeholder="{{trans('pas.phone')}}"
                                           tabindex="23"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.email')}}</label>
                                <label class="input">
                                    <input ng-model="person.email" name="email"
                                           type="text" placeholder="{{trans('pas.email')}}"
                                           tabindex="24"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <div style="clear:both;"></div>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relative')}}</label>
                                <label class="input">
                                    <input ng-model="person.relative" name="relative"
                                           type="text" placeholder="{{trans('pas.relative')}}"
                                           tabindex="25"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativetype')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativetype" name="relativetype"
                                           type="text" placeholder="{{trans('pas.relativetype')}}"
                                           tabindex="26"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativephone')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativephone" name="relativephone"
                                           type="text" placeholder="{{trans('pas.relativephone')}}"
                                           tabindex="27"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                            <section class="col col-lg-3 col-xs-6 col-sm-3 col-md-3">
                                <label class="label">{{trans('pas.relativeaddress')}}</label>
                                <label class="input">
                                    <input ng-model="person.relativeaddress" name="relativeaddress"
                                           type="text"
                                           placeholder="{{trans('pas.relativeaddress')}}"
                                           tabindex="28"
                                           ui-keydown="{'enter': 'nextinputCallback($event)','shift-enter': 'submitCallback($event)'}">
                                </label>
                            </section>
                        </div>
                    </fieldset>
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
<!-- end row of grid widget -->
</section>
<!-- end section grid widget -->
<!-- Dynamic Modal -->
<style>
    .modal-dialog {
        width: 680px;
    }
</style>
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog"
     aria-labelledby="remoteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Camera</h4>
            </div>
            <div class="modal-body" style="text-align: center">
                <video id="video" width="640" height="480" autoplay ng-show="iscamera"></video>
                <canvas id="canvas" width="480" height="480" style="display: none"></canvas>
                <img id="modelcapture" src="" ng-show="!iscamera">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="star" data-ng-click="camera()">
                    Mở camera
                </button>
                <button type="button" class="btn btn-success" id="snap"
                        data-ng-click="camcapture()">Lấy hình
                </button>
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Xong
                </button>

            </div>
        </div>
        <!-- content will be filled here from "ajax/modal-content/model-content-1.html" -->
    </div>
</div>
<div class="row ">

    <div class="col col-xs-12">
        <button type="button" class="btn btn-labeled btn-success pull-right" data-ng-click="save()"
                tabindex="29">
         <span class="btn-label">
          <i class="fa fa-save"></i>
         </span>Lưu
        </button>

    </div>
</div>
</div>

</div><!-- end app -->
<script type="text/javascript">
/* DO NOT REMOVE : GLOBAL FUNCTIONS!
 */
pageSetUp();
//    console.log(smartApp);
function personregistercontroller($scope, $http,ngProgress) {
    if(ngProgress.status()<=0)
    ngProgress.start();
    $(document).ready(function(){
        ngProgress.complete();
    });
    $scope.$on('$destroy', function () {
        ngProgress.complete();
    });
    //init person object
    $scope.person = {
        id: '0',
        pid: '',
        lastname: '',
        firstname: '',
        sex: 0,
        dob: 0,
        yob: '',
        address: '',
        province: 0,    // sau nay se tu dong lay tinh cua benh vien
        district: 0,
        addressward: 0,
        doituong: 'bhyt',
        insurancecode: '',
        insurancefromdate: 0,
        insurancetodate: 0,
        insurancecompany: 0,
        insuranceplace:0,
        avatar: '',
        country: 'VN',
        route: 0,
        cmnd: '',
        dateissue: 0,
        placeissue: '',
        careercode: '',
        ethnic: 25,
        blood: 0,
        phone: '',
        email: '',
        relative: '',
        relativephone: '',
        relativeaddress: '',
        relativetype: ''
    };
    $scope.shortcut = '';
    $scope.provinces = [];
    $scope.districts = [];
    $scope.addresswards = [];
    $scope.countisurancecode = 0;
    $scope.labelage = "Tuổi";
    $scope.currHospitalCode = '20004';
    $scope.noavatar = {
        m: "{{asset('images/noavatarm.jpg')}}",
        f: "{{asset('images/noavatarf.jpg')}}"
    };

    $scope.save = function () {
//        window.location.href="/#/pas/person/711140000030";
//        return;
        if ($("#formpersoninfo").valid()) {
//            console.log($scope.person);
            if(ngProgress.status()<=0)
            ngProgress.start();
            $http.post('pas/saveperson', {
                data: $scope.person
            })
                .success(function (data) {
                    ngProgress.complete();
                    if (data.length > 10) {
                        window.location = "/#/pas/person/" + data;
                    }
                    else if(data >= 0  && $scope.person.pid!=''){
                        window.location = "/#/pas/person/" + $scope.person.pid+"/"+Date.now();
                    }
                    else if (data == -99) {
                        myalert("Lỗi tạo người mới", "Không tạo được mã người mới, vui lòng thử lại hoặc liên hệ Quản trị viên.");
                    }
                    else {
                        myalert("Lỗi tạo người mới", "Không thể lưu, vui lòng thử lại hoặc liên hệ Quản trị viên.");
                    }
                })
                .error(function () {
                    myalert("Lỗi tạo người mới", "Không thể lưu, vui lòng thử lại hoặc liên hệ Quản trị viên.");
                });
        }
    };

    $scope.changeavatar = function () {
        if ($scope.person.avatar == "") {
            if ($scope.person.sex == m) {
                document.getElementById("pasavatar").src = $scope.noavatar.m;
            }
            else {
                document.getElementById("pasavatar").src = $scope.noavatar.f;
            }
        }

    };

    $scope.iscamera = true;
    $scope.stopcamera = function () {
        stopcamera();
    };
    $scope.camera = function () {
        $scope.iscamera = true;
        opencamera();
    };
    $scope.camcapture = function () {
        $scope.iscamera = false;
        context.drawImage(video, 80, 0, 480, 480, 0, 0, 480, 480);
        document.getElementById("modelcapture").src = canvas.toDataURL("image/jpeg");
        document.getElementById("pasavatar").src = canvas.toDataURL("image/jpeg");
        $scope.person.avatar = canvas.toDataURL("image/jpeg");
        $scope.stopcamera();
    };


    $scope.$watch('person.avatar', function () {
        document.getElementById("inputavatar").value = $scope.person.avatar;
    });
    $scope.$watch('person.dob', function () {
        if ($scope.person.dob) {
            var tdob = $scope.person.dob;
            var y = tdob.substr(4, 4);
            var d = tdob.substr(0, 2);
            var m = tdob.substr(2, 2);
            var date = new Date();
            var crryear = date.getFullYear();
            var crrmon = date.getMonth() + 1;
            if (y < 1900 || y > crryear || d < 1 || d > 31 || m < 1 || m > 12 || (y == crryear && m > crrmon)) {
                myalert("Lỗi nhập liệu", "Ngày tháng " + $scope.person.dob + " năm không đúng!")
                $scope.person.dob = "";
            }
            else {
                var monthage = monthDiff(new Date(y, (m - 1), d), date);
                $scope.person.yob = y;
                if (monthage > 12) {
                    $scope.labelage = "Tuổi";
                    $scope.person.age = date.getFullYear() - y;
                    getjobfromage($scope.person.age, 'y');
                }
                else {
                    $scope.person.age = monthage;
                    $scope.labelage = "Tháng";
                    getjobfromage($scope.person.age, 'm');
                }
            }
        }
    });
    $scope.$watch('person.insurancetodate', function () {
        if ($scope.person.insurancetodate) {
            var tdob = $scope.person.insurancetodate;
            var y = tdob.substr(4, 4);
            var d = tdob.substr(0, 2);
            var m = tdob.substr(2, 2);
            var date = new Date();
            var crryear = date.getFullYear();
            var crrmon = date.getMonth() + 1;
            var crrday = date.getDate();
            if (y < crryear || d < 1 || d > 31 || m < 1 || m > 12 || (y == crryear && m < crrmon) || (y == crryear && m == crrmon && d < crrday)) {
                myalert("Lỗi nhập liệu", "Bảo hiểm đã hết hạn!")
                $scope.person.insurancetodate = "";
            }

        }
    });
    var monthDiff = function (d1, d2) {
        var months;
        months = (d2.getFullYear() - d1.getFullYear()) * 12;
        months -= d1.getMonth();
        months += d2.getMonth() + 1;
        return months <= 0 ? 0 : months;
    };
    var getjobfromage = function (age, type) {
        if ((age < 6 && type == 'y') || type == 'm') {
            $scope.person.careercode = "01";
        }
        else if (age >= 0 && age <= 18) {
            $scope.person.careercode = "02";
        }
        else if (age > 18 && age < 50) {
            $scope.person.careercode = "04";
        }
        else if (age >= 50 && age <= 60) {
            $scope.person.careercode = "03";
        }
        else if (age > 60) {
            $scope.person.careercode = "13";
        }

    };
    $scope.$watch('person.yob', function () {
        if ($scope.person.yob) {
            var date = new Date();
            var crryear = date.getFullYear();
            if ($scope.person.yob > 1900 && $scope.person.yob <= crryear) {
                if ($scope.person.dob) {
                    var tdob = $scope.person.dob;
                    var y = tdob.substr(4, 4);
                    if (y != $scope.person.yob) {
                        $scope.person.dob = "";
                        $scope.person.age = crryear - $scope.person.yob;
                    }
                }
                else {
                    $scope.person.age = crryear - $scope.person.yob;
                    getjobfromage($scope.person.age, 'y');
                }
            }
            else {
                myalert("Lỗi nhập liệu", "Năm sinh " + $scope.person.yob + " không đúng.");
                $scope.person.yob = "";
            }
        }
    });

    $scope.$watch('person.age', function () {
        if ($scope.person.age !== false) {
            if (!$scope.person.dob && $scope.person.yob) {
                if ($scope.person.age <= 1) {
                    $scope.person.yob = "";
                    myalert("Lỗi nhập liệu", "Trẻ em dưới 1 tuổi phải nhập đủ ngày sinh!")
                    $('input[tabindex=4]').focus();
                }
            }
            else {

            }
        }
    });
    var calYobFromAge = function () {
        var date = new Date();
        var crryear = date.getFullYear();
        $scope.person.yob = crryear - $scope.person.age;
    };
    $scope.$watch('person.lastname', function () {
        if ($scope.person.lastname) {
            $scope.person.lastname = toTitleCase($scope.person.lastname);
        }
    });
    $scope.$watch('person.relative', function () {
        if ($scope.person.relative) {
            $scope.person.relative = toTitleCase($scope.person.relative);
        }
    });
    $scope.$watch('person.relativetype', function () {
        if ($scope.person.relativetype) {
            $scope.person.relativetype = toTitleCase($scope.person.relativetype);
        }
    });
    $scope.$watch('person.firstname', function () {
        if ($scope.person.firstname) {
            $scope.person.firstname = toTitleCase($scope.person.firstname);
            var fname = $scope.person.firstname;
            if (fname.trim().indexOf(" ") >= 0) {
                myalert("Lỗi nhập liệu", "Tên thì chỉ nhập 1 từ!")
                $scope.person.firstname = '';
            }
        }
    });
    $scope.$watch('person.address', function () {
        if ($scope.person.address) {
            $scope.person.address = toTitleCase($scope.person.address);
        }
    });
    $scope.$watch('person.insurancecode', function () {
        if ($scope.person.insurancecode) {
            $scope.countisurancecode = ($scope.person.insurancecode).length;
            $scope.person.insurancecode = $scope.person.insurancecode.toUpperCase();
        }
        else {
            $scope.countisurancecode = 0;
        }
    });
    var toTitleCase = function (str) {
        return str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    };


    $scope.nextinputCallback = function ($event) {
        var $target = $($event.target);
        var currentindex = parseInt($target.attr("tabindex"));
        if (currentindex == 8) {
            var shortcut = $($target).val();
                $scope.person.addressward = 0;
                $scope.person.district = 0;
            $scope.person.province = 0;
            if (shortcut.trim().length > 0) {
                $http.get('pas/searchshortcut/' + shortcut)
                    .success(function (data) {
                        if (data) {
                            $scope.person.addressward = data['ward'].code;
//                        $scope.addresswards = data['allward'];
                            $scope.person.district = data['district'].code;
//                        $scope.districts = data['alldistrict'];
                            $scope.person.province = data['province'].code;
                        }

                    });
            }

        }
        else if (currentindex == 6 && $scope.person.yob == '') {
            calYobFromAge();
        }
        $('[tabindex=' + (currentindex + 1) + ']').focus();
        $event.preventDefault();
    };
    $scope.submitCallback = function ($event) {
//            console.log('call submit');
        $scope.save();
        $event.preventDefault();
    };
    $scope.$watch('person.province', function () {
        if ($scope.person.province) {
            $scope.addresswards = [];
            $scope.districts = [];
            getDistrict($scope.person.province);
        }
    });
    $scope.$watch('person.district', function () {
        if ($scope.person.district) {
            $scope.addresswards = [];
            getWard($scope.person.district);
        }
    });
    $scope.$watch('person.career', function () {
        if ($scope.person.career) {
            $scope.person.careercode = $scope.person.career;
        }
    });
    $scope.$watch('person.careercode', function () {
        if ($scope.person.careercode) {
            $scope.person.career = $scope.person.careercode;
        }
    });
    $scope.$watch('person.insurancecode', function () {
        if ($scope.person.insurancecode) {
            if ($scope.person.insurancecode.length == 20) {
                var insurance = $scope.person.insurancecode;
                var dkbd = insurance.substr(15, 5);
                getbvdkbd(dkbd);
            }
        }
    });
    $scope.bvdkbd = [];
    var getbvdkbd = function (dkbd) {
        $scope.bvdkbd = [];
        $http.get('pas/bvdkbd/' + dkbd)
            .success(function (data) {
                $scope.person.insuranceplace = data.code;
                $scope.bvdkbd.push(data);
                if ($scope.currHospitalCode == $scope.person.insuranceplace) {
                    $scope.person.route = 0;
                }
                else {
                    $scope.person.route = 1;
                }
            });
    };
    var getProvince = function () {
        $http.get('pas/allprovince')
            .success(function (data) {
                $scope.provinces = data;
            });
    };
    var getDistrict = function (province) {
        $http.get('pas/alldistrict/' + province)
            .success(function (data) {
                $scope.districts = data;
            });
    };
    var getWard = function (district) {
        $http.get('pas/allward/' + district)
            .success(function (data) {
                $scope.addresswards = data;
            });
    };
    $scope.countries = [];
    var getCountry = function () {
        $http.get('pas/allcountry')
            .success(function (data) {
                $scope.countries = data;
            });
    };
    $scope.ethnics = [];
    var getEthnic = function () {
        $http.get('pas/allethnic')
            .success(function (data) {
                $scope.ethnics = data;
            });
    };
    $scope.jobs = [];
    var getJob = function () {
        $http.get('pas/alljobs')
            .success(function (data) {
                $scope.jobs = data;
            });
    };
    getEthnic();
    getCountry();
    getProvince();
    getJob();
    @if(isset($person))
    $scope.person = {{$person}};
    if($scope.person.avatar != ''){
        $("#pasavatar").attr("src",$scope.person.avatar);
    }
    @endif
}
;

var pagefunction = function () {
//    }, false);

    var $checkoutForm = $('#formpersoninfo').validate({
        rules: {
            lastname: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            firstname: {
                required: true,
                minlength: 1,
                maxlength: 20
            },
            sex: {
                required: true
            },
            yob: {
                required: true
            },
            address: {
                minlength: 3,
                maxlength: 50
            },
            province: {
                min: 1
            },
            district: {
                min: 1
            },
            addressward: {
                min: 1
            }
        },
        messages: {
            lastname: {
                required: 'Chưa nhập Họ',
                minlength: 'Tối thiểu 3 kí tự',
                maxlength: 'Tối đa 20 kí tự'
            },
            firstname: {
                required: 'Chưa nhập Tên',
                minlength: 'Tối thiểu 3 kí tự',
                maxlength: 'Tối đa 20 kí tự'
            },
            sex: {
            },
            yob: {
                required: 'Chưa có năm sinh'
            },
            address: {
                minlength: 'Nhập tối thiểu 3 kí tự',
                maxlength: 'Tối đa 50 kí tự'
            },
            province: {
                min: "Chưa chọn tỉnh"
            },
            district: {
                min: "Chưa chọn quận"
            },
            addressward: {
                required: true,
                min: "Chưa chọn phường"
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }

    });
};
loadScript("src/smartadmin/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>