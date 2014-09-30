<!-- User info -->
<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="img/avatars/sunny.png" alt="me" class="online"/>
						<span data-localize="john.doe">
							Admin
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
</div>
<!-- end user info -->

<!-- NAVIGATION : This navigation is also responsive

To make this navigation dynamic please make sure to link the node
(the reference to the nav > ul) after page load. Or the navigation
will not initialize.
-->
<navigation>
    <nav:item data-view="/dashboard" data-icon="fa fa-lg fa-fw fa-home"
              title="{{trans('common.dashboard')}}" suftitle="{{trans('common.suftitle')}}"/>
    @foreach($categories as $cat)
        @if(count($cat['children'])>0)
            <nav:group data-icon="{{$cat['icon']}}" title="{{trans($cat['lang'])}}">
                @foreach($cat['children'] as $catchild)
                <nav:item data-icon="{{$catchild['icon']}}" data-view="{{$catchild['url']}}" title="{{trans($catchild['lang'])}}"
                          suftitle="{{trans('common.suftitle')}}"/>
                @endforeach
            </nav:group>
        @else
    <nav:item data-view="{{$cat['url']}}" data-icon="{{$cat['icon']}}"
              title="{{trans($cat['lang'])}}" suftitle="{{trans('common.suftitle')}}"/>
        @endif
    @endforeach
    <nav:group data-icon="fa fa-lg fa-fw fa-group" title="{{trans('hrm.hrm')}}">
        <nav:item data-view="/hrm/employee" title="{{trans('hrm.adminemployee')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        </nav:group>

    <nav:group data-icon="fa fa-lg fa-fw fa-cogs" title="{{trans('common.administration')}}">
        <nav:item data-view="/admin/hospital" title="{{trans('common.init-hospital')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/admin/module" title="{{trans('common.module')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/admin/account" title="{{trans('common.account')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/hrm/hrmtitle" title="{{trans('common.roleposition')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/admin/dmchucvu" title="{{trans('common.dmchucvu')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/admin/department" title="{{trans('common.department')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
        <nav:item data-view="/address" title="{{trans('common.address')}}"
                  suftitle="{{trans('common.suftitle')}}"/>
    </nav:group>

</navigation>
<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>