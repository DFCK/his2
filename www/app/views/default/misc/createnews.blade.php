<div data-ng-controller="MiscNewsController">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-rss-square"></i> {{trans('misc.news')}}
            </h1>
        </div>
    </div>
    <article class="col col-xs-12 col-sm-6 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-miscnews0"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                <h2>Soạn tin</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body no-padding">
                    <form class=" smart-form" id="formnews">
                        <fieldset>
                            <div class="row  ">
                                <section class="col col-xs-12">
                                    <label class="label">Phạm vi</label>
                                    <label class="select">
                                        <select ng-model="news.place">
                                            <option value="99">Toàn bệnh viện</option>
                                            <option data-ng-repeat="item in placelist" value="@{{item.code}}">
                                                @{{item.name}}
                                            </option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </article>
    <article class="col col-xs-12 col-sm-6 ">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-miscnews1"
             data-widget-editbutton="false"
             data-widget-fullscreenbutton="false"
            >
            <header>
                <span class="widget-icon"> <i class="fa fa-list"></i> </span>

                <h2>Các tin đã đăng</h2>
            </header>
            <!-- widget div-->
            <div class="">
                <!-- widget content -->
                <div class="widget-body no-padding">
                    </div>
                </div>
            </div>
        </article>

</div>
<script>
    function MiscNewsController($scope, $http) {
        $scope.placelist = {{$deptlist}};
        $scope.news.place = 99;
    }
</script>