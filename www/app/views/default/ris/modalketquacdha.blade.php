<div class="modal-header">
    <h3 class="modal-title">Kết quả CDHA cho Bệnh nhân <strong>@{{fullname}}</strong>
        (@{{enc.eid}})</h3>
</div>
<div class="modal-body" id="modalchidinhcdha">
    <div class="row" id="listyeucaucdha">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="col-xs-2">Thời gian</th>
                <th class="col-xs-2">Loại CDHA</th>
                <th>Khu vực</th>
                <th class="col-xs-2">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <tr data-ng-repeat="ris in requestlist">
                <td>@{{ris.date*1000 | date:"dd-MM-yyyy HH:mm"}}</td>
                <td>@{{ris.type}}</td>
                <td>@{{ris.positionname}}</td>
                <td>
                    <a ng-if="ris.status==1" data-ng-click="showresult(ris)">
                        <i class="fa fa-check-square fa-2x" tooltip="Xem kết quả"></i> Kết quả</a>
                    <span ng-if="ris.deleted_at">Đã hủy</span>
                    <a ng-if="!ris.deleted_at && ris.status==0" data-ng-click="delrequest(ris)">
                        <i class="fa fa-trash-o fa-2x" tooltip="Hủy yêu cầu"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="ketquacdha" class="row">
        <div ng-if="Result.type=='sieuam'">
            <h6 class="col-xs-12">Kết quả @{{Result.positionname}} - <span class="text-sm"><i class="fa fa-clock-o"></i> @{{Result.date * 1000 | date:"dd-MM-yyyy HH:mm"}}</span></h6>
            <div class="col-xs-8 table-responsive" data-ng-bind-html="Result.textresult">

            </div>
            <div class="col-xs-4">
                <div class="row">
                    <div ng-show="Result.image1" style="position: relative">
                        <img src="@{{Result.image1}}"
                             class="img-responsive img-thumbnail"
                             style="max-height: 180px">
                    </div>
                </div>
                <div class="row">
                    <div ng-show="Result.image2">
                        <img src="@{{Result.image2}}"
                             class="img-responsive img-thumbnail"
                             style="max-height: 180px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
<!--    <button class="btn btn-primary" ng-click="ok()">{{trans('common.save')}}</button>-->
    <button class="btn btn-warning" ng-click="cancel()">Xong</button>
</div>
<script>
    pageSetUp();
</script>