<div data-ng-controller="personController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title @if($person->sex==2) txt-color-pink @else txt-color-blue @endif">
                @if($person->sex=='m')
                <i class="fa fa-male"></i>
                @elseif($person->sex=='f')
                <i class="fa fa-female"></i>
                @endif
                <strong>{{$person->lastname.' '.$person->firstname}}</strong>&nbsp;({{$person->pid}})
                @if(Employee::canEditFunction($function_code))
                <a href="#/pas/editperson/{{$person->pid}}/{{time()}}"><i class="fa fa-pencil-square"></i></a>
                @endif
            </h1>

        </div>

    </div>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row" id="person">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-md-8">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-passhow0"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                        <h2>{{trans('pas.personinfo')}}</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body ">
                            @include(Config::get('main.theme') . '.pas.personinfo')
                        </div>
                    </div>

                </div>
                @if($person->doituong != 'tp' && $person->doituong != 'mp' && $person->insurancecode!='')
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget " id="wid-id-passhow1"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false"
                    data-widget-collapsed="true" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-credit-card"></i> </span>

                        <h2>{{trans('pas.insuranceinfo')}}</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body " style="min-height: 10px !important;">
                            <p>{{trans('pas.insurancecode')}}:&nbsp;<strong>{{$person->insurancecode}}</strong>

                               {{trans('pas.insurancefromdate')}}:&nbsp;<strong>{{date('d/m/Y',$person->insurancefromdate)}}</strong>,
                               {{trans('pas.insurancetodate')}}:&nbsp;<strong>{{date('d/m/Y',$person->insurancetodate)}}</strong>
                            </p>
                            <p>
                                {{trans('pas.insuranceplace')}}:&nbsp;<strong>{{$person->insurancename}}</strong>
                                ({{ ($person->route==0)?trans('pas.routecorrect'):trans('pas.routewrong') }})
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="jarviswidget " id="wid-id-passhow2"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-history"></i> </span>

                        <h2>Lịch sử điều trị</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body " style="min-height: 10px !important;">
                            <ul class="list-unstyled" ng-if="admithistory.length >=1" style="max-height: 300px;overflow-y: auto">
                                <li data-ng-repeat="admit in admithistory" class="panel  panel-default padding-10">
                                    <a href="/#/enc/info/@{{admit.eid}}" class="blocka">
                                        <h4 class="col-xs-4"><b>@{{admit.eid}}</b></h4>
                                        <div class="col-xs-8 text-right">
                                            <span><i class="fa fa-sign-in"></i>&nbsp;@{{admit.datein * 1000 | date:"HH:mm dd/MM/yyyy"}}</span>
                                            <span ng-if="admit.dateout > 0" class="txt-color-red"><i class="fa fa-sign-out"></i>&nbsp;@{{admit.dateout * 1000 | date:"HH:mm dd/MM/yyyy"}}</span>
                                        </div>
                                        <div class="clear"></div>
                                        <div ng-if="admit.diagnosis"><i class="fa fa-stethoscope"></i> <strong>@{{admit.diagnosis}}</strong></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
            @if($person->eid > 0)
            <div class="col col-xs-12 col-md-4">
                <div class="panel panel-default padding-10">
                    <b>Bệnh nhân đang được điều trị</b>
                    <p><a class="font-md" href="/#/enc/info/{{$person->eid}}"><b>{{$person->eid}}</b></a></p>
                </div>
            </div>
            @endif
            <article class="col-xs-12 col-md-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-white" id="wid-id-passhow3"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                        <h2>Thao tác</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body ">
                            <ul  class="nav nav-pills nav-stacked" >
                                <li>
                                    <a href="/#/hrm/employee/{{$person->pid}}">
                                        <i class="fa fa-group"></i>
                                        Nhân viên</a>
                                </li>
                                <li>
                                    <a data-ng-click="ttnhapvien('lg')"><i class="fa fa-stethoscope">

                                    </i> Thông tin nhập viện
                                        <span rel="tooltip" title="Đã lấy thông tin tiếp nhận cho người này" ng-show="havehoibenh" class="fa fa-check txt-color-green"></span>
                                    </a>
                                </li>
                                <li>
                                    <a data-ng-click="sinhhieu('lg')">
                                        <i class="fa fa-bolt"></i> Lấy sinh hiệu
                                        <span rel="tooltip" title="Đã lấy sinh hiệu cho người này" ng-show="havevitalsign" class="fa fa-check txt-color-green"></span>
                                    </a>
                                </li>
                                <li>
                                    <a><i class="fa fa-certificate"></i> Khám sức khỏe </a>
                                </li>
                                <li>
                                    <a><i class="fa fa-flask"></i> Thông tin dị ứng </a>
                                </li>
                                <li>
                                    <a><i class="fa fa-usd"></i> Tạm ứng</a>
                                </li>
<!--                                <li>-->
<!--                                    <a><i class="fa fa-ambulance"></i> Cấp cứu</a>-->
<!--                                </li>-->
                                <li>
                                    <a><i class="fa fa-codepen"></i> Chỉ định Cận Lâm Sàn</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="jarviswidget jarviswidget-color-white" id="wid-id-passhow4"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-user-md"></i> </span>

                        <h2>Các phòng khám</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body " data-ng-include="'{{URL::to('tpl/outpatientroom')}}'">

                        </div>
                    </div>

                </div>
            </article>

        </div>
    </section>

    </div>

<script>
   /* DO NOT REMOVE : GLOBAL FUNCTIONS!
    */
   pageSetUp();
    var personController = function($scope,$http,$modal,$interval,ngProgress){
        $scope.$on('$destroy', function () {
            ngProgress.complete();
        });
        $scope.eid = {{$person->eid}};
        $scope.pid='{{$pid}}';
        $scope.havevitalsign = @if($person->numvitalsign > 0) true @else false @endif ;
        $scope.havehoibenh = @if($person->numadmisinfo > 0) true @else false @endif ;

        $scope.admithistory = {{Encounter::getAdmithistory($person->pid)}};

        var stoproom;
        $scope.autoloadroom = function() {
            if ( angular.isDefined(stoproom) ) return;
            stoproom = $interval(function() {
                $scope.loadroom();
            }, 15000);
        };

        $scope.stopRoom = function() {
            if (angular.isDefined(stoproom)) {
                $interval.cancel(stoproom);
                stoproom = undefined;
            }
        };

        $scope.$on('$destroy', function() {
            $scope.stopRoom();
        });
        $scope.loadroom = function(){
            $http.get('radt/outpatientroom/'+$scope.pid)
                .success(function(data){
                    $scope.roomlist = data;
                });
        }

        $scope.loadroom();//first load
        $scope.autoloadroom();// call auto load room


        $scope.exchange = function(room){
            if(ngProgress.status()<=0)
            ngProgress.start();
            $http.post('radt/savequeue',{
                room:room,
                pid:$scope.pid,
                eid:$scope.eid
            }).success(function(data){
                    ngProgress.complete();
                if(data > 0 ){
                    $scope.loadroom();
                }
                if(data <=0){
                    myalert("Lỗi","Có lỗi khi lưu");
                }
            }).error(function(){
                myalert("Lỗi","Có lỗi khi lưu");
            });
        }


        $scope.sinhhieu = function (size) {

            var modalInstance = $modal.open({
                templateUrl: "{{URL::to('tpl/sinhhieu')}}",
                controller: ModalSinhhieuInstanceCtrl,
                size: size,
                resolve: {
                    havevitalsign:function(){
                        return $scope.havevitalsign;
                    }
                }
            });
            modalInstance.result.then(function(havevitalsign){
                $scope.havevitalsign = havevitalsign;
            });
        };
        $scope.ttnhapvien = function (size) {

            var modalInstance = $modal.open({
                templateUrl: "{{URL::to('tpl/ttnhapvien')}}",
                controller: ModalTTnhapvienInstanceCtrl,
                size: size,
                resolve: {
                    havehoibenh:function(){
                        return $scope.havehoibenh;
                    }
                }
            });
            modalInstance.result.then(function(havehoibenh){
                $scope.havehoibenh = havehoibenh;
            })
        };

    }
   var ModalSinhhieuInstanceCtrl = function ($scope, $modalInstance,$http,havevitalsign,$filter,ngProgress) {
       $scope.havevitalsign = havevitalsign;
       var today = $filter('date')(new Date(),'dd-MM-yyyy HH:mm');
       $scope.sinhhieu = {
           pid:'{{$pid}}',
           fullname:"{{$person->lastname.' '.$person->firstname}}",
           height:'',
           weight:'',
           bloodpressure:'',
           breathing:'',
           temperature:'',
           heartbeat:'',
           id:'',
           date:today,
           eid:{{$person->eid}}
       }
       $scope.ok = function () {
           if(ngProgress.status()<=0)
           ngProgress.start();
           $http.post('pas/savevitalsign',{
               data:$scope.sinhhieu
           }).success(function(data){
                   ngProgress.stop();
               $scope.load();
               $scope.reset();
           });
       };
       $scope.sumsinhhieuavail = 0;
       $scope.load = function(){
           if(ngProgress.status()<=0)
           ngProgress.start();
           $http.get('pas/loadvitalsign/'+$scope.sinhhieu.pid)
               .success(function(data){
                   ngProgress.complete();
                   $scope.sinhhieulist = data;
                   $scope.havevitalsign = false;
                   angular.forEach($scope.sinhhieulist,function(value,key){
                        if((value.eid == 0 || value.eid == '{{$person->eid}}') && !value.deleted_at )
                            $scope.havevitalsign = true;
                   });
               });
       }
       $scope.reset = function(){
           $scope.sinhhieu.id='';
           $scope.sinhhieu.height='';
           $scope.sinhhieu.weight='';
           $scope.sinhhieu.bloodpressure='';
           $scope.sinhhieu.breathing='';
           $scope.sinhhieu.temperature='';
           $scope.sinhhieu.heartbeat='';
           $scope.sinhhieu.eid = {{$person->eid}};
       }
       $scope.edit = function(sh){
           angular.copy(sh,$scope.sinhhieu);
       }
       $scope.del = function(sh){
           $http.delete('pas/delvitalsign/'+sh.id)
               .success(function(data){
                   $scope.load();
               });
       }

       $scope.cancel = function () {
//           $modalInstance.dismiss('cancel');
           $modalInstance.close($scope.havevitalsign);
       };
       $scope.load();
   };
   var ModalTTnhapvienInstanceCtrl = function ($scope, $modalInstance,$filter,havehoibenh,$http,ngProgress) {
       $scope.havehoibenh = havehoibenh;
       var today = $filter('date')(new Date(),'dd-MM-yyyy HH:mm');
       $scope.hoibenh = {
           pid:"{{$pid}}",
           fullname:"{{$person->lastname.' '.$person->firstname}}",
           date: today,
           by:0,
           refdiagnosis:'',
           reason:'Khám bệnh',
           status:'',
           personhistory:'',
           familyhistory:'',
           process:'',
           id:'',
           eid:{{ $person->eid }},
       };
            $scope.$watch('hoibenh.refplacecode',function(){
           if($scope.hoibenh.refplacecode && $scope.hoibenh.refplacecode.length>=4){
               $http.get('pas/bvdkbd/' + $scope.hoibenh.refplacecode)
                   .success(function(data){
                       if(angular.isObject(data)){
                           $scope.hoibenh.refplace = data.name;
                       }
                   });
           }

       });
       $scope.ok = function () {
           if(ngProgress.status()<=0)
           ngProgress.start();
           $http.post('pas/saveadmissioninfo',{
               data:$scope.hoibenh
           }).success(function(data){
               ngProgress.stop();
               $scope.load();
               $scope.reset();
           });
       };

       $scope.edit = function(sh){
           angular.copy(sh,$scope.hoibenh);
           $scope.hoibenh.date = $filter('date')($scope.hoibenh.date*1000,'dd-MM-yyyy HH:mm');
       }
       $scope.load = function(){
           if(ngProgress.status()<=0)
           ngProgress.start();
           $http.get('pas/loadadmissioninfo/'+$scope.hoibenh.pid)
               .success(function(data){
                   ngProgress.complete();
                   $scope.hoibenhlist = data;
                   $scope.havehoibenh = false;
                   angular.forEach($scope.hoibenhlist,function(value,key){
                       if(value.eid == 0 || value.eid == '{{$person->eid}}' )
                           $scope.havehoibenh = true;
                   });
//                   if(data.length > 0) $scope.havehoibenh = true;
//                   else $scope.havehoibenh = false;

               });
       }

       $scope.del = function(sh){
           $http.delete('pas/deladmissioninfo/'+sh.id)
               .success(function(data){
                   $scope.load();
               });
       }
       $scope.load();
       $scope.reset = function(){
           $scope.hoibenh.id='';
           $scope.hoibenh.date=$filter('date')(new Date(),'dd-MM-yyyy HH:mm');
           $scope.hoibenh.by=0;
           $scope.hoibenh.refdiagnosis='';
           $scope.hoibenh.reason='Khám bệnh';
           $scope.hoibenh.status='';
           $scope.hoibenh.personhistory='';
           $scope.hoibenh.familyhistory='';
           $scope.hoibenh.process='';
           $scope.hoibenh.eid ={{ $person->eid }};

       }

       $scope.cancel = function () {
           $modalInstance.close($scope.havehoibenh);
       };
   };
</script>