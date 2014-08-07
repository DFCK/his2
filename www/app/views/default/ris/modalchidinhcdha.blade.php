<div class="modal-header">
    <h3 class="modal-title">Chỉ định CDHA cho Bệnh nhân <strong>@{{fullname}}</strong>
        (@{{chidinhcdha.eid}})</h3>
</div>
<div class="modal-body" id="modalchidinhcdha">
    <div class="row">
        <div class="col-xs-8">
            <form class=" smart-form" id="formpersoninfo">
                <fieldset>
                    <div class="row padding-bottom-10">
                        <section class="col-xs-4">
                            <label class="label">Thời gian</label>
                            <label class="input">
                                <input data-mask="99-99-9999 99:99" data-mask-placeholder="_" ng-model="chidinhcdha.date" >
                            </label>
                        </section>
                        <section class="col-xs-8 text-align-right">
                            <labe class="label">&nbsp;</labe>
                            <button class="btn btn-primary padding-5" ng-click="ok()">{{trans('common.save')}}</button>
                            <button class="btn btn-warning  padding-5" ng-click="cancel()">Xong</button>
                        </section>
                    </div>
                    <div class="row"> <hr></div>
                    <div class="row padding-top-10">
                        <section class="col-xs-3">
                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="xquang">
                                <i></i>
                                X-Quang
                            </label>
                        </section>
                        <section class="col-xs-3">

                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="sieuam">
                                <i></i>
                                Siêu âm
                            </label>
                        </section>
                        <section class="col-xs-3">

                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="ct">
                                <i></i>
                                CT
                            </label>
                        </section>
                        <section class="col-xs-3">

                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="mri">
                                <i></i>
                                MRI
                            </label>
                        </section>
                        <section class="col-xs-3">

                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="noisoi">
                                <i></i>
                                Nội soi
                            </label>
                        </section>
                        <section class="col-xs-3">

                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.type" value="dientim">
                                <i></i>
                                Điện tim
                            </label>
                        </section>

                    </div>
                        <div class="row"> <hr></div>
                    <div class="row padding-top-10">

                        <section class="col-xs-5 text-align-right ">
                            Bệnh nhân đi được
                            <span class="onoffswitch">
                                <input type="checkbox" name="diduoc" class="onoffswitch-checkbox" ng-checked="chidinhcdha.diduoc" id="diduoc" ng-model="chidinhcdha.diduoc">
                                <label class="onoffswitch-label" for="diduoc">
                                    <div class="onoffswitch-inner" data-swchon-text="CÓ" data-swchoff-text="KO"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>


                            </span>
                        </section>
                        <section class="col-xs-5 text-align-right  padding-right-10">
                            Dị ứng ?
                            <span class="onoffswitch">
                                <input type="checkbox" name="diung" class="onoffswitch-checkbox" ng-checked="chidinhcdha.diung" id="diung" ng-model="chidinhcdha.diung">
                                <label class="onoffswitch-label" for="diung">
                                    <div class="onoffswitch-inner" data-swchon-text="CÓ" data-swchoff-text="KO"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </span>
                        </section>

                        <section class="col-xs-5 text-align-right">
                            Cường giáp ?
                         <span class="onoffswitch">
                                <input type="checkbox" name="cuonggiap" class="onoffswitch-checkbox" ng-checked="chidinhcdha.cuonggiap" id="cuonggiap" ng-model="chidinhcdha.cuonggiap">
                                <label class="onoffswitch-label" for="cuonggiap">
                                    <div class="onoffswitch-inner" data-swchon-text="CÓ" data-swchoff-text="KO"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </span>
                        </section>
                        <section class="col-xs-5 text-align-right">
                           Đang mang thai ?
                        <span class="onoffswitch">
                                <input type="checkbox" name="mangthai" class="onoffswitch-checkbox" ng-checked="chidinhcdha.mangthai" id="mangthai" ng-model="chidinhcdha.mangthai">
                                <label class="onoffswitch-label" for="mangthai">
                                    <div class="onoffswitch-inner" data-swchon-text="CÓ" data-swchoff-text="KO"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </span>
                        </section>
                        <section class="col-xs-6">

                        </section>
                    </div>
                    <div class="row"> <hr></div>
                    <div class="row padding-top-10">
                        <section class="col col-xs-6">
                            <label class="label">Thông tin lâm sàn</label>
                            <label class="textarea">
                                <textarea ng-model="chidinhcdha.lamsang"></textarea>
                            </label>
                        </section>
                        <section class="col col-xs-6">
                            <label class="label">Ghi chú</label>
                            <label class="textarea">
                                <textarea ng-model="chidinhcdha.note"></textarea>
                            </label>
                        </section>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-xs-4" id="danhmuccdha">

            <ul class="nav nav-pills nav-stacked" ng-show="admission.eid != ''">
                <li data-ng-repeat="pos in cdhaposition">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="checkbox style-0" data-ng-click="checkposition(pos)"
                                   ng-checked="chidinhcdha.position.indexOf(pos.code) > -1">
                            <span>@{{pos.name}}</span>
                        </label>
                    </div>
                </li>

            </ul>
        </div>
        <div class="col-xs-12">
        <hr>
        <ul class="list-unstyled">
            <li data-ng-repeat="ch in chidinhcdhapositionlist"><i tooltip="Bỏ" class="fa fa-minus-circle" data-ng-click="removeposition(ch)"></i> @{{ch.name}}</li>
        </ul>
        </div>
    </div>
</div>

<script>
    pageSetUp();
</script>