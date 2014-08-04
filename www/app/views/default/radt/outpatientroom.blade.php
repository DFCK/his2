<div class="panel panel-default" data-ng-repeat="room in roomlist" ng-if="myroom!=room.code">
    <div class="panel-heading">
        <i class="fa fa-lightbulb-o txt-color-green"  rel="tooltip" title="Online"></i>
        <strong>Bác sĩ X</strong> - @{{room.wardname}} - @{{room.name}}

    </div>
    <div class="panel-body">
        <label class="label label-info" rel="tooltip" data-placement="left" tooltip="@{{room.wait}} Bệnh nhân Đang chờ ">@{{room.wait}}</label>
        / <label class="label label-success"  rel="tooltip" tooltip="Hôm nay đã khám @{{room.finish}} Bệnh nhân">@{{room.finish}}</label>
        <a ng-show="room.inroom==0" href="#" rel="tooltip" tooltip="Chuyển bệnh nhân vào phòng khám" class="pull-right" data-ng-click="exchange(room)"><i class="fa fa-exchange"> Chuyển bệnh</i></a>
        <i ng-show="room.inroom==1" class="fa fa-check-square fa-2x pull-right txt-color-greenLight" rel="tooltip" tooltip="Bệnh nhận đang ở trong phòng khám này"></i>
    </div>
</div>

