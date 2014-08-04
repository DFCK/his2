<div class="col-xs-12 text-align-center">
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
         style="max-height: 180px">
</div>
<div class="col-xs-12 padding-top-10">
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