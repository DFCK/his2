<div class="panel panel-default" data-ng-repeat="person in queue">
    <div class="panel-body">
        <div class="row">
        <div class="col-xs-2">
            <img src="@{{person.avatar}}" class="img-responsive" ng-if="person.avatar != ''">
            <img src="{{asset('images/noavatarm.jpg')}}" class="img-responsive" ng-if="person.sex==1 && person.avatar == ''">
            <img src="{{asset('images/noavatarf.jpg')}}" class="img-responsive" ng-if="person.sex==2 && person.avatar == ''">

        </div>
        <div class="col-xs-8 no-padding">
            <p><strong><a href="#/pas/person/@{{person.pid}}">@{{person.lastname+" "+person.firstname}}</a></strong>
                <span ng-if="person.dob != ''">@{{person.dob*1000 | date:"dd/MM/yyyy"}} (@{{person.dob*1000 | calmonth}}).</span>
                <span ng-if="person.dob == ''">@{{person.yob}} (@{{person.yob | calmonth}}).</span>
                <span ng-if="person.date && person.date != ''">Đến lúc <strong>@{{person.date | date:"HH:mm"}}</strong>.</span>
            </p>
            <p>
                <span ng-if="person.height && person.height != ''">Cao: <strong>@{{person.height}}</strong> <i>cm</i>.</span>
                <span ng-if="person.weight && person.weight != ''">Nặng: <strong>@{{person.weight}}</strong> <i>kg</i>.</span>
                <span ng-if="person.bloodpressure && person.bloodpressure != ''">H/áp: <strong>@{{person.bloodpressure}}</strong><i></i>.</span>
                <span ng-if="person.temperature && person.temperature != ''">Nhiệt: <strong>@{{person.temperature}}</strong><i>°C</i>.</span>
                <span ng-if="person.heartbeat && person.heartbeat != ''">Mạch: <strong>@{{person.heartbeat}}</strong><i>l/p</i>.</span>
            </p>
            <p>
               <span ng-if="person.reason && person.reason != ''">Đến <i>@{{person.reason}}</i>.</span>

               <span ng-if="person.status && person.status != ''">Triệu chứng: <i>@{{person.status}}</i>.</span>
               <span ng-if="person.personhistory && person.personhistory != ''">Tiền sử bệnh: <i>@{{person.personhistory}}</i>.</span>
            </p>
        </div>
            <div class="col-xs-2">
                <p><a class="btn btn-primary btn-xs" href="#/radt/admission/@{{person.pid}}/@{{person.queueid}}">Nhận bệnh</a></p>
                <p>
                    <i class="fa  fa-film txt-color-grayDark"  tooltip="Đã gửi yêu cầu CĐHA"></i>
                    <i class="fa  fa-film txt-color-red" tooltip="Đã có kết quả Siêu Âm"></i>
                    <i class="fa  fa-flask txt-color-red"  tooltip="Đã có Kết quả XN máu"></i>
                    <i class="fa  fa-flask txt-color-red"  tooltip="Đã có Kết quả XN Hóa Sinh"></i>
                </p>
            </div>
        </div>
    </div>
</div>

