<div class="modal-header">
    <h3 class="modal-title">Xem ảnh kết quả</strong>
        <div class="col-xs-1 pull-right" ng-show="typeview==1">
            <select class="form-control" ng-model="gridwidth" ng-init="gridwidth = 3">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="6">6</option>
                </select>
        </div>
        <a class="pull-right margin-right-5" data-ng-click="typeview=1"><i class="fa fa-th-large"></i></a>
        <a class="pull-right margin-right-5" data-ng-click="typeview=0"><i class="fa fa-list"></i></a>

    </h3>
</div>
<div class="modal-body  text-align-center"  id="modalchidinhcdha">
    <div ng-if="!typeview || typeview==0">
        <div class="row" id="">
            <div class="col-xs-12">
                <img src="@{{mainpic}}" style="width=100%">
            </div>

        </div>
        <hr>
        <div class="row">
            <ul class="list-inline">
                <li ng-show="Result.images" style="position: relative"  data-ng-repeat="img in Result.images">
                    <a data-ng-click="choseimg(img)">
                        <img src="@{{img}}"
                             class="img-responsive img-thumbnail"
                             style="max-height: 100px">
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <div ng-if="typeview==1">
        <ul class="list-unstyled">
            <li class="col-xs-@{{12/gridwidth}} no-padding" ng-show="Result.images" style="position: relative"  data-ng-repeat="img in Result.images">
                    <img src="@{{img}}" style="width: 100%">
            </li>
        </ul>
        <div class="clear"></div>
    </div>

</div>
<div class="modal-footer">
    <!--    <button class="btn btn-primary" ng-click="ok()">{{trans('common.save')}}</button>-->
    <button class="btn btn-warning" ng-click="cancel()">Xong</button>
</div>
<script>

</script>