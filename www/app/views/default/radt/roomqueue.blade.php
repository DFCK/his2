<div class="panel panel-default" data-ng-repeat="person in queue track by $index" >
    <div class="panel-body">
        <div class="row">
        <div class="col-xs-2" ng-drag="true" ng-drag-data="person" ng-drag-success="onDragComplete($data,$event,$index)">
            <img src="@{{person.avatar}}" class="img-responsive" ng-if="person.avatar != ''">
            <img src="{{asset('images/noavatarm.jpg')}}" class="img-responsive" ng-if="person.sex==1 && person.avatar == ''">
            <img src="{{asset('images/noavatarf.jpg')}}" class="img-responsive" ng-if="person.sex==2 && person.avatar == ''">

        </div>
        <div class="col-xs-7 no-padding">
            <p><strong><a href="#/pas/person/@{{person.pid}}">@{{person.lastname+" "+person.firstname}}</a></strong>
                <span ng-if="person.dob">@{{person.dob*1000 | date:"dd/MM/yyyy"}} (@{{person.dob*1000 | calmonth}}).</span>
                <span ng-if="!person.dob">@{{person.yob}} (@{{person.yob | calmonth}}).</span>
                <span ng-if="person.admitdate && person.admitdate != ''">Đến lúc <strong>@{{person.admitdate * 1000 | date:"HH:mm"}}</strong>.</span>
            </p>
            <p>
                <span ng-if="person.height && person.height != ''">Cao: <strong>@{{person.height}}</strong> <i>cm</i>.</span>
                <span ng-if="person.weight && person.weight != ''">Nặng: <strong>@{{person.weight}}</strong> <i>kg</i>.</span>
                <span ng-if="person.bloodpressure && person.bloodpressure != ''">H/áp: <strong>@{{person.bloodpressure}}</strong><i></i>.</span>
                <span ng-if="person.temperature && person.temperature != ''">Nhiệt: <strong>@{{person.temperature}}</strong><i>°C</i>.</span>
                <span ng-if="person.heartbeat && person.heartbeat != ''">Mạch: <strong>@{{person.heartbeat}}</strong><i>l/p</i>.</span>
            </p>
            <p>
                <span ng-if="person.by && person.by == 2"><b>Chuyển viện</b> từ <i>@{{person.refplace}}</i> (@{{person.refplacecode}}).</span>
                <span ng-if="person.reason && person.reason != ''">Đến <i>@{{person.reason}}</i>.</span>

               <span ng-if="person.status && person.status != ''">Triệu chứng: <i>@{{person.status}}</i>.</span>
               <span ng-if="person.personhistory && person.personhistory != ''">Tiền sử bệnh: <i>@{{person.personhistory}}</i>.</span>
            </p>
            <p ng-if="person.datein > 0">
                <i class="fa fa-sign-in"></i>&nbsp;@{{person.datein * 1000 | date:"HH:mm dd/MM "}}&nbsp;
                <span ng-if="person.dateout > 0" class="txt-color-red"><i class="fa fa-sign-out"></i>&nbsp;@{{person.dateout * 1000 | date:"HH:mm dd/MM"}}</span>
                <span ng-if="person.diagnosis"> Chẩn đoán: <strong>@{{person.diagnosis}}</strong></span>
            </p>
        </div>
            <div class="col-xs-3">
                <p>
                    <a  ng-if="person.eid==0 && !intiepnhan" class="btn btn-primary btn-xs" href="#/radt/admission/@{{person.pid}}/@{{person.queueid}}">Nhận bệnh</a>
                    <div class="btn-group" dropdown ng-if="person.eid >0">
                        <a href="#/enc/info/@{{person.eid + '/' + datenow}}" class="btn btn-success btn-xs">Xem bệnh</a>
                        <button type="button" class="btn btn-success dropdown-toggle btn-xs">
                            <span class="caret"></span>
                            <span class="sr-only">Split button!</span>
                        </button>
                        <ul class="dropdown-menu" role="menu" ng-if="person.discharged==0">
                            <li><a data-ng-click="discharged(person,7)">Xuất viện</a></li>
                            <li><a href="#">Chuyển viện</a></li>
                            <li><a href="#">Trốn viện</a></li>
                        </ul>
                    </div>
                </p>
                <p>
                    <label class="label label-success" tooltip="Đã có @{{person.numrisresult}} kết quả CLS">@{{person.numrisresult}}</label>
                    <label class="label label-info" tooltip="Đã gửi @{{person.numrisrequest}} yêu cầu CLS">@{{person.numrisrequest}}</label>
                </p>
<!--                <p><a tooltip="Gọi bệnh nhân"><i class="fa fa-bell"></i></a></p>-->
            </div>
        </div>
    </div>
</div>

