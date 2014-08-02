<div>
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title @if($person->sex==2) txt-color-pink @else txt-color-blue @endif">
                @if($person->sex==1)
                <i class="fa fa-male"></i>
                @elseif($person->sex==2)
                <i class="fa fa-female"></i>
                @endif
                <strong>{{$person->lastname.' '.$person->firstname}}</strong>&nbsp;({{$person->pid}})
                <a href="#/pas/editperson/{{$person->pid}}/{{time()}}"><i class="fa fa-pencil-square"></i></a>
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
                     data-widget-sortable="false" data-widget-fullscreenbutton="false"
                     data-widget-collapsed="true" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-history"></i> </span>

                        <h2>Lịch sử điều trị</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body " style="min-height: 10px !important;">

                        </div>
                    </div>
                </div>
            </article>
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
                                    <a><i class="fa fa-stethoscope"></i> Thông tin nhập viện</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-bolt"></i> Lấy sinh hiệu </a>
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
                                <li>
                                    <a><i class="fa fa-ambulance"></i> Cấp cứu</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-codepen"></i> Chỉ định Cận Lâm Sàn</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="jarviswidget jarviswidget-color-white" id="wid-id-passhow4"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-user-md"></i> </span>

                        <h2>Các phòng khám</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body ">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a  rel="tooltip" title="Reload"><i class="fa fa-refresh"></i></a>
                                    <strong>Bác sĩ A</strong> - Khu 1 - Phòng 1
                                    <i class="fa fa-check-square" rel="tooltip" title="Bệnh nhân đang chờ tại đây"></i>
                                    <div class="pull-right txt-color-green">
                                        <strong>
                                        <i class="fa fa-lightbulb-o fa-2x"  rel="tooltip" title="Online"></i>
                                        </strong>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <label class="label label-info" rel="tooltip" data-placement="left" title="7 Bệnh nhân Đang chờ ">7</label>
                                    / <label class="label label-success"  rel="tooltip" title="Hôm nay đã khám 20 Bệnh nhân">20</label>
                                    <a href="#" rel="tooltip" title="Chuyển bệnh nhân vào phòng khám" class="pull-right"><i class="fa fa-exchange"> Chuyển bệnh</i></a>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a  rel="tooltip" title="Reload"><i class="fa fa-refresh"></i></a>
                                    <strong>Bác sĩ B</strong> - Khu 1 - Phòng 2
                                    <div class="pull-right txt-color-green">
                                        <strong>
                                        <i class="fa fa-lightbulb-o fa-2x"  rel="tooltip" title="Online"></i>
                                        </strong>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <label class="label label-info" rel="tooltip" data-placement="left" title="19 Bệnh nhân Đang chờ ">19</label>
                                    / <label class="label label-success"  rel="tooltip" title="Hôm nay đã khám 50 Bệnh nhân">50</label>
                                    <a href="#" rel="tooltip" title="Chuyển bệnh nhân vào phòng khám" class="pull-right"><i class="fa fa-exchange"> Chuyển bệnh</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </article>

        </div>
    </section>
<script>
   /* DO NOT REMOVE : GLOBAL FUNCTIONS!
    */
   pageSetUp();
</script>