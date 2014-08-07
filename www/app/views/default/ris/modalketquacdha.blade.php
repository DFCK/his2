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
                    <th class="col-xs-2">Kết quả</th>
                    <th class="col-xs-2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <tr data-ng-repeat="ris in requestlist">
                <td>@{{ris.date*1000 | date:"dd-MM-yyyy HH:mm"}}</td>
                <td>@{{ris.type}}</td>
                <td>@{{ris.positionname}}</td>
                <td></td>
                <td></td>
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
    pageSetUp();
</script>