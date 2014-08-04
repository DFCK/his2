<div data-ng-controller="RadtAdmissionController">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-cog fa-fw"></i>Tiếp nhận bệnh
            </h1>
        </div>
        <div class="col-xs-12 col-md-8">

        </div>

    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-padding">
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blue" id="wid-id-tiepnhan0"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"
                        >
                        <header>
                            <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                            <h2>{{$person->lastname}} {{$person->firstname}} ({{$person->pid}})</h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">
                                @include(Config::get('main.theme') . '.pas.personinfo')
                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->
                </article>
                <!-- end article -->
                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-tiepnhan1"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-stethoscope"></i> </span>

                            <h2>
                                Thông tin tiếp nhận
                            </h2>

<!--                            <div class="widget-toolbar col-xs-4">-->
<!---->
<!--                            </div>-->
                        </header>
                        <!-- widget div-->
                        <div class="">

                            <!-- widget content -->
                            <div class="widget-body ">


                            </div>
                            <!-- end widget content -->
                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->
                </article>
                <!-- end article -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-padding">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget" id="wid-id-tiepnhan3"
                         data-widget-editbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false"
                         data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                            <h2>
                                Thao tác
                            </h2>


                        </header>
                        <!-- widget div-->
                        <div class="">

                            <!-- widget content -->
                            <div class="widget-body ">


                            </div>
                            <!-- end widget content -->
                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->
                </article>
                <!-- end article -->
            </div>

        </div>
        <!-- end row -->
    </section>
    <!-- end section -->
</div>
<!-- end controller -->
<script type="text/javascript">
    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     */
    pageSetUp();

    /**
     * AngularJS controller
     * @param $scope
     * @param $http
     */
    function RadtAdmissionController($scope, $http, $interval,$filter) {

    }
</script>