<h2 class="text-center margin-top-10">
    <a href="/#/pas/person/@{{person.pid}}">@{{person.lastname +" "+person.firstname}}
    <br>
    @{{person.pid}}</a>
</h2>
<div class="col-xs-12 text-align-center">
    <img ng-if="person.avatar!=''"  src="@{{person.avatar}}" class="img-responsive img-thumbnail" style="max-height: 180px">
    <img ng-if="person.avatar=='' && person.sex=='m'" src="{{asset('images/noavatarm.jpg')}}" class="img-responsive img-thumbnail" style="max-height: 180px">
    <img ng-if="person.avatar=='' && person.sex=='f'"  src="{{asset('images/noavatarf.jpg')}}" class="img-responsive img-thumbnail" style="max-height: 180px">
</div>
<div class="col-xs-12 padding-top-10 text-center" >
    <p ng-if="person.dob">@{{person.dob*1000|date:"dd/MM/yyyy"}}</p>
    <p ng-if="!person.dob">@{{person.yob}}</p>
</div>
<div class="col-xs-12 padding-top-10 text-center" ng-if="employee.id">
    <p><a href="/#/hrm/employee/@{{employee.pid}}">Mã nhân viên <b>#@{{employee.id}}</b></a></p>
    <p ng-if="employee.deleted_at">Nhân viên đang tạm khóa</p>
    <p><b>@{{emptitlename}}</b></p>
</div>
<div class="clear"></div>
<hr>
<div>
    <p class="text-center"><b>Đang phân bổ tại phòng khoa</b></p>
    <ul ng-if="listtransfer" class="list-unstyled">
        <li data-ng-repeat="item in listtransfer">
            <i class="fa fa-caret-right"></i> @{{item.positionname}} tại @{{item.deptname}}<span ng-if="item.wardname">, @{{item.wardname}}</span><span ng-if="item.roomname">, @{{item.roomname}}</span>
        </li>
    </ul>
</div>
<div class="clear"></div>