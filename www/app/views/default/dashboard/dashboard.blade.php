<div data-ng-controller="DashboarController">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-star fa-fw"></i> {{Session::get('user.hospital_name')}}
            </h1>
        </div>
        <div class="col-xs-12 col-md-6">
            <style>
                #sparks li h5{
                    text-transform: none;
                }
                .sparks-info span{
                    line-height: 28px;
                }
            </style>
            <ul id="sparks" class="">
<!--                <li class="sparks-info">-->
<!--                    <h5>Đang chờ-->
<!--                       <span class="txt-color-blue">-->
<!--                        <i class="fa fa-stack-overflow"></i>&nbsp;@{{myroominfo.wait}}-->
<!--                    </span>-->
<!--                    </h5>-->
<!---->
<!--                </li>-->
<!--                <li class="sparks-info">-->
<!--                    <h5>Đã khám-->
<!--                     <span class="txt-color-blue">-->
<!--                        <i class="fa fa-stethoscope"></i>&nbsp;@{{myroominfo.finish}}-->
<!--                    </span>-->
<!--                    </h5>-->
<!---->
<!--                </li>-->
                <!--                <li class="sparks-info">-->
                <!--                    <div class="sparkline txt-color-blue">-->
                <!--                        1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471-->
                <!--                    </div>-->
                <!--                </li>-->
            </ul>
        </div>

    </div>
    <section>
        <div>
            <article class="col col-xs-12 col-sm-6 ">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-miscnews1"
                     data-widget-editbutton="false"
                     data-widget-fullscreenbutton="false"
                    >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>

                        <h2>Bản tin bệnh viện</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">
                        <!-- widget content -->
                        <div class="widget-body">
                            <ul class="list-unstyled">
                                <li data-ng-repeat="item in newslist.data" class="">
                                    <a href="#" data-ng-click="edit(item.id)">
                                        <i class="fa fa-caret-right"></i>&nbsp;
                                                                         @{{item.title}}</a>&nbsp;
                                    <em>(@{{item.created_time * 1000 | date:"H:m d/M/yyyy"}})</em>
                                    <p>@{{item.shortinfo}}</p>
                                </li>
                            </ul>
                            <ul class="list-inline" ng-if="newslist.last_page > 1">
                                <li data-ng-repeat="item in [] | paginate:newslist.last_page"><a class="bordered padding-5" href="#" data-ng-click="load(item,news.place)">@{{item}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();
    var DashboarController = function($scope,$http,$modal,$interval,ngProgress){
        ngProgress.start();
        $(document).ready(function(){
            ngProgress.complete();
        });
        $scope.$on('$destroy', function () {
            ngProgress.complete();
        });
        $scope.load = function(page,place){
            $http.get('misc/loadlistnews/'+page+"/"+place)
                .success(function(msg){
                    $scope.newslist = msg;
                });
        };
        $scope.load(1,99);
    };
    // pagefunction
    var pagefunction = function() {

    };
    // end pagefunction

    // run pagefunction on load
    pagefunction();
</script>
