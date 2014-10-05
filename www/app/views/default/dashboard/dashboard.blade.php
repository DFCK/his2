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
                <li class="sparks-info">
                    <h5><span class="txt-color-blue">{{Session::get('user.title_name')}} {{Session::get('user.name')}}</span></h5>

                </li>
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
    };
    // pagefunction
    var pagefunction = function() {

    };
    // end pagefunction

    // run pagefunction on load
    pagefunction();
</script>
