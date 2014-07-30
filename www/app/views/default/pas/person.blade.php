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
                <a href="/#/pas/editperson/{{$person->pid}}/{{time()}}"><i class="fa fa-pencil-square"></i></a>
            </h1>

        </div>

    </div>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row" id="person">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-md-8">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-10"
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


                                </p>
                                <p>{{trans('pas.address')}}:&nbsp;<strong>{{$person->address}},&nbsp;{{$person->ward_name}},&nbsp;{{$person->district_name}},&nbsp;{{$person->province_name}}</strong>
                                </p>
                                @if($person->phone !='')
                                <p>{{trans('pas.phone')}}:&nbsp;<strong>{{$person->phone}}</strong>
                                </p>
                                @endif
                                @if($person->email !='')
                                <p>{{trans('pas.email')}}:&nbsp;<strong>{{$person->email}}</strong>
                                </p>
                                @endif
                                <p>
                                    {{trans('pas.career')}}:&nbsp;<strong>{{$person->career}}</strong>
                                </p>
                                <p>
                                    {{trans('pas.ethnic')}}:&nbsp;<strong>{{$person->ethnicname}}</strong>
                                    @if($person->blood != '0')
                                    .&nbsp;{{trans('pas.blood')}}&nbsp;<strong
                                        style="text-transform: uppercase;">{{$person->blood}}</strong>
                                    @endif
                                </p>
                                @if($person->cmnd !='')
                                <p>
                                    {{trans('pas.CMND')}}:&nbsp;<strong>{{$person->cmnd}}</strong>,
                                    {{trans('pas.dateissue')}}:&nbsp;<strong>{{date('d/m/Y',$person->dateissue)}}</strong>,
                                    {{trans('pas.placeissue')}}:&nbsp;<strong>{{$person->placeissue}}</strong>
                                </p>
                                @endif
                                @if($person->relative != '')
                                <p>
                                    {{trans('pas.relative')}}:&nbsp;<strong>{{$person->relative}}</strong>({{$person->relativetype}})
                                    @if($person->relativephone!='')
                                    ,&nbsp;{{trans('pas.phone')}}:&nbsp;<strong>{{$person->relativephone}}</strong>
                                    @endif
                                    @if($person->relativeaddress!='')
                                    ,&nbsp;{{trans('pas.address')}}:&nbsp;<strong>{{$person->relativeaddress}}</strong>
                                    @endif
                                </p>
                                @endif
                            </div>
                            <div class="clear"></div>

                        </div>
                    </div>

                </div>
                @if($person->doituong != 'tp' && $person->doituong != 'mp' && $person->insurancecode!='')
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget " id="wid-id-11"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false"
                    data-widget-collapsed="true" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-info-circle"></i> </span>

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
            </article>
            <article class="col-xs-12 col-md-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-white" id="wid-id-12"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>

                        <h2>Thao tác</h2>
                    </header>
                    <!-- widget div-->
                    <div class="">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                        </div>
                    </div>

                </div>
                <div class="jarviswidget jarviswidget-color-white" id="wid-id-13"
                     data-widget-editbutton="false" data-widget-deletebutton="false"
                     data-widget-sortable="false" data-widget-fullscreenbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-user-md"></i> </span>

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