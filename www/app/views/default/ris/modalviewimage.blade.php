<div class="modal-header">
    <h3 class="modal-title">Xem ảnh kết quả</strong>
    </h3>
</div>
<div class="modal-body  text-align-center"  id="modalchidinhcdha">
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
<div class="modal-footer">
    <!--    <button class="btn btn-primary" ng-click="ok()">{{trans('common.save')}}</button>-->
    <button class="btn btn-warning" ng-click="cancel()">Xong</button>
</div>
<script>
    pageSetUp();
</script>