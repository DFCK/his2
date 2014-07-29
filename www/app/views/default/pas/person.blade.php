<div data-ng-controller="">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title @if($person->sex==2) txt-color-pink @else txt-color-blue @endif">
                @if($person->sex==1)
                <i class="fa fa-male"></i>
                @elseif($person->sex==2)
                <i class="fa fa-female"></i>
                @endif
                <strong>{{$person->lastname.' '.$person->firstname}}</strong>&nbsp;({{$person->pid}})

            </h1>

        </div>

    </div>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row" id="person">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-md-8">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

                        <h2>Thông tin cá nhân</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body ">

                            <div class="col-xs-4 no-padding">
                                <img src="
                                @if($person->avatar!='')
                                                      {{$person->avatar}}
                                                      @else
                                                      @if($person->sex==1)
                                {{asset('images/noavatarm.jpg')}}
                                                      @else
                                {{asset('images/noavatarf.jpg')}}
                                                      @endif
                                                      @endif
                                                      " class="img-responsive img-thumbnail"
                                     style="max-height: 210px">
                            </div>
                            <div class="col-xs-8">
                                <p>
                                    @if($person->dob !='')
                                    <label>{{trans("pas.DOB")}}:&nbsp;</label><strong>{{date("d/m/Y",$person->dob)}}</strong>
                                    &nbsp;-&nbsp;
                                    {{Person::calMonthAge($person->dob)}}
                                    @else
                                    <label>{{trans("pas.YOB")}}:&nbsp; </label><strong>{{$person->yob}}</strong>
                                    &nbsp;-&nbsp;
                                    {{date('Y') - $person->yob}}&nbsp;{{trans('pas.age')}}
                                    @endif
                                    @if($person->blood != '0')
                                    .&nbsp;{{trans('pas.blood')}}&nbsp;<strong style="text-transform: uppercase;">{{$person->blood}}</strong>
                                    @endif
                                </p>
                                <p>Địa chỉ:&nbsp;<strong >{{$person->address}},&nbsp;{{$person->ward_name}},&nbsp;{{$person->district_name}},&nbsp;{{$person->province_name}}</strong>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
            </article>
            <article class="col-xs-12 col-md-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-1"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                        <h2>Thao tác</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                        </div>
                    </div>

                </div>

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-2"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                        <h2>Các phòng khám</h2>
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
    </section>
<script>
   /* DO NOT REMOVE : GLOBAL FUNCTIONS!
    */
   pageSetUp();
</script>