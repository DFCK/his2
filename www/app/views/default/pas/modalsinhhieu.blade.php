<div class="modal-header">
    <h3 class="modal-title">Lấy sinh hiệu cho bệnh nhân <strong>@{{sinhhieu.fullname}}</strong> (@{{sinhhieu.pid}})</h3>
</div>
<div class="modal-body">
    <form class=" smart-form" id="formpersoninfo">
        <fieldset>
            <div class="row  ">
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Chiều cao (cm)</label>
                        <label class="input">
                            <input type="hidden" ng-model="sinhhieu.pid" >
                            <input type="hidden" ng-model="sinhhieu.id" >
                            <input type="text" name="height"
                                   ng-model="sinhhieu.height" tabindex="1"
                                >
                        </label>
                    </section>
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Cân nặng (kg)</label>
                        <label class="input">
                            <input type="text" name="weight"
                                   ng-model="sinhhieu.weight" tabindex="2"
                                >
                        </label>
                    </section>
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Thân nhiệt (*C)</label>
                        <label class="input">
                            <input type="text" name="temperature"
                                   ng-model="sinhhieu.temperature" tabindex="2"
                                >
                        </label>
                    </section>
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Huyết áp (mmHg/m)</label>
                        <label class="input">
                            <input type="text" name="bloodpressure"
                                   ng-model="sinhhieu.bloodpressure" tabindex="3"
                                >
                        </label>
                    </section>
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Mạch (lần/p)</label>
                        <label class="input">
                            <input type="text" name="heartbeat"
                                   ng-model="sinhhieu.heartbeat" tabindex="4"
                                >
                        </label>
                    </section>
                    <section class="col col-lg-2 col-xs-4 col-sm-3 col-md-3">
                        <label class="label">Nhịp thở (lần/p)</label>
                        <label class="input">
                            <input type="text" name="breathing"
                                   ng-model="sinhhieu.breathing" tabindex="4"
                                >
                        </label>
                    </section>
                </div>
            </fieldset>
        </form>
        <hr>
    <h6>Các sinh hiệu chưa được sử dụng</h6>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ngày lấy</th>
                    <th>Chiều cao</th>
                    <th>Cân nặng</th>
                    <th>Thân nhiệt</th>
                    <th>Huyết áp</th>
                    <th>Mạch</th>
                    <th>Nhịp thở</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <tr data-ng-repeat="sh in sinhhieulist">
                <td>@{{sh.created_at}}</td>
                <td>@{{sh.height}} (cm)</td>
                <td>@{{sh.weight}} (kg)</td>
                <td>@{{sh.temperature}} (C)</td>
                <td>@{{sh.bloodpressure}} (mmHg)</td>
                <td>@{{sh.heartbeat}} (lần/phút)</td>
                <td>@{{sh.breathing}} (lần/phút)</td>
                <td>
                    <a data-ng-click="edit(sh)"><i class="fa fa-pencil-square fa-2x"></i></a>
                    <a data-ng-click="del(sh)"><i class="fa fa-trash-o fa-2x"></i></a>
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
    var pagefunction = function(){
        $("input[name=height]").focus();
    }
    pagefunction();
</script>

