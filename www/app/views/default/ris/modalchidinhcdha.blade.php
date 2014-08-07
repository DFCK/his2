<div class="modal-header">
    <h3 class="modal-title">Chỉ định CDHA cho Bệnh nhân <strong>@{{chidinhcdha.fullname}}</strong>
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
                            <label class="toggle">
                                <input type="radio" name="diduoc" >
                                <i data-swchon-text="YES" data-swchoff-text="NO"></i>Bệnh nhân đi được ?</label>
                        </section>
                        <section class="col-xs-4 text-align-right  padding-right-10">
                            <label  class=" padding-5">Dị ứng ?</label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="diung" ng-model="chidinhcdha.diung" value="1">
                                <i></i>
                                Có
                            </label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="diung" ng-model="chidinhcdha.diung" value="0">
                                <i></i>
                                Không
                            </label>
                        </section>
                        </div>
                    <div class="row padding-top-10">
                        <section class="col-xs-3 text-align-right">
                            <label class=" padding-5">Cường giáp ?</label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="cuonggiap" ng-model="chidinhcdha.cuonggiap" value="1">
                                <i></i>
                                Có
                            </label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="cuonggiap" ng-model="chidinhcdha.cuonggiap" value="0">
                                <i></i>
                                Không
                            </label>
                        </section>
                        <section class="col-xs-4 text-align-right">
                            <label class=" padding-5">Đang mang thai ?</label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.mangthai" value="1">
                                <i></i>
                                Có
                            </label>
                        </section>
                        <section class="col-xs-1">
                            <label class="radio">
                                <input type="radio" name="type" ng-model="chidinhcdha.mangthai" value="0">
                                <i></i>
                                Không
                            </label>
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

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">{{trans('common.save')}}</button>
    <button class="btn btn-warning" ng-click="cancel()">Xong</button>
</div>
<script>
    pageSetUp();
</script>