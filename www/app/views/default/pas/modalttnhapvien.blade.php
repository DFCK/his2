<div class="modal-header">
    <h3 class="modal-title">Thông tin nhập viện cho bệnh nhân <strong>@{{sinhhieu.fullname}}</strong>
        (@{{hoibenh.pid}})</h3>
</div>
<div class="modal-body">
    <form class=" smart-form" id="formpersoninfo">
        <fieldset>
            <div class="row  ">
                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Đến khám lúc</label>
                    <label class="input">
                        <input type="hidden" ng-model="hoibenh.pid">
                        <input type="hidden" ng-model="hoibenh.id">
                        <input type="text" name="date"
                               ng-model="hoibenh.date"
                               data-mask="99-99-9999 99:99" data-mask-placeholder= "-">
                    </label>
                </section>
                <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Đến bệnh viện</label>
                    <label class="select">
                        <select type="text" name="by"
                               ng-model="hoibenh.by" >
                            <option value="0">Tự đến</option>
                            <option value="1">Cấp cứu</option>
                            <option value="2">Chuyển viện</option>
                               </select>
                        <i></i>
                    </label>
                </section>
                <section  class="col-lg-1 col-xs-4 col-sm-3 col-md-3" ng-if="hoibenh.by==2">
                <label class="label" >&nbsp;</label>
                    <label class="input">
                        <input ng-model="hoibenh.refplacecode" placeholder="Mã DKBD">
                    </label>
                </section>
                <section  class="col col-lg-3 col-xs-4 col-sm-3 col-md-3"  ng-if="hoibenh.by==2">
                <label class="label">Nơi chuyển</label>
                    <label class="input">
                        <input ng-model="hoibenh.refplace" disabled>
                    </label>
                </section>

                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3"  ng-if="hoibenh.by==2">
                    <label class="label">Chẩn đoán nơi chuyển</label>
                    <label class="input">
                        <input type="text" name="refdiagnosis"
                               ng-model="hoibenh.refdiagnosis"
                               >
                    </label>
                </section>
                </div>
            <div class="row">
                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Lý do vào viện</label>
                    <label class="input">
                        <input type="text" name="reason"
                               ng-model="hoibenh.reason" >
                    </label>
                </section>
                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Tình trạng</label>
                    <label class="input">
                        <input type="text" name="status"
                               ng-model="hoibenh.status">
                    </label>
                </section>
                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Tiền sử bệnh bản thân</label>
                    <label class="input">
                        <input type="text" name="personhistory"
                               ng-model="hoibenh.personhistory" >
                    </label>
                </section>
                <section class="col col-lg-3 col-xs-4 col-sm-3 col-md-3">
                    <label class="label">Tiền sử bệnh gia đình</label>
                    <label class="input">
                        <input type="text" name="familyhistory"
                               ng-model="hoibenh.familyhistory" >
                    </label>
                </section>
                <section class="col col-xs-12">
                    <label class="label">Quá trình bệnh lý</label>
                    <label class="textarea textarea-expandable">
                        <textarea type="text" name="process"
                               ng-model="hoibenh.process"  rows="3" class="custom-scroll">
                            </textarea>
                    </label>
                </section>
            </div>
        </fieldset>
    </form>
    <hr>
    <h6>Lần hỏi bệnh chưa sử dụng</h6>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Ngày lấy</th>

                <th>Đến bệnh viện</th>
                <th>Lý do</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr data-ng-repeat="sh in hoibenhlist">
                <td>@{{sh.date* 1000 | date:'dd-MM-yyyy HH:mm'}}</td>
                <td>
                    @{{sh.by | formatadmissionby}}
                </td>
                <td>
                    @{{sh.reason}}
                </td>
                <td>
                    <a data-ng-click="edit(sh)" ng-if="!sh.deleted_at" tooltip="Sửa"><i class="fa fa-pencil-square fa-2x"></i></a>
                    <a data-ng-click="del(sh)" ng-if="!sh.deleted_at" tooltip="Xóa"><i class="fa fa-trash-o fa-2x"></i></a>
                    <a  ng-if="sh.deleted_at" tooltip="Đã xóa"><i class="fa fa-minus-circle fa-2x txt-color-red"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">{{trans('common.save')}}</button>
    <button class="btn btn-warning" ng-click="cancel()">Xong</button>
</div>
<script>
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();
    </script>