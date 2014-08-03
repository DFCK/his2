<div class="panel panel-default" data-ng-repeat="room in roomlist" ng-if="myroom!=room.code">
    <div class="panel-heading">
        <strong>Bác sĩ X</strong> - @{{room.wardname}} - @{{room.name}}
        <!--                                    <i class="fa fa-check-square" rel="tooltip" title="Bệnh nhân đang chờ tại đây"></i>-->
        <div class="pull-right txt-color-green">
            <strong>
                <i class="fa fa-lightbulb-o fa-2x"  rel="tooltip" title="Online"></i>
            </strong>
        </div>

    </div>
    <div class="panel-body">
        <label class="label label-info" rel="tooltip" data-placement="left" title="7 Bệnh nhân Đang chờ ">7</label>
        / <label class="label label-success"  rel="tooltip" title="Hôm nay đã khám 20 Bệnh nhân">20</label>
        <a ng-show="room.inroom==0" href="#" rel="tooltip" title="Chuyển bệnh nhân vào phòng khám" class="pull-right" data-ng-click="exchange(room)"><i class="fa fa-exchange"> Chuyển bệnh</i></a>
        <i ng-show="room.inroom==1" class="fa fa-check-square fa-2x pull-right txt-color-greenLight" rel="tooltip" title="Bệnh nhận đang ở trong phòng khám này"></i>
    </div>
</div>

