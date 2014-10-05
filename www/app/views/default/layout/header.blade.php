<div id="logo-group">

    <!-- PLACE YOUR LOGO HERE -->
    <span id="logo"> <img src="{{URL::to('src/smartadmin/img/logo.png')}}" alt="DFCK MIS"> </span>
    <!-- END LOGO PLACEHOLDER -->
<!--				<span data-ng-controller="ActivityDemoCtrl">-->
<!--					<activity data-onrefresh="refreshCallback">-->
<!--                        <activity:button data-icon="fa fa-user" data-total="total" />-->
<!--                        <activity:content data-footer="footerContent">-->
<!--                            <activity:item data-src="item.src" data-onload="item.onload" data-active="item.active" data-ng-repeat="item in items">-->
<!--                                <span data-localize="@{{ item.title }}">@{{ item.title }}</span> (@{{ item.count }})-->
<!--                            </activity:item>-->
<!--                        </activity:content>-->
<!--                    </activity>-->
<!--				</span>-->
</div>



<!-- pulled right: nav area -->
<div class="pull-right">

    <!-- collapse menu button -->
    <div id="hide-menu" class="btn-header pull-right">
        <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
    </div>
    <!-- end collapse menu -->

    <!-- Top menu profile link : this shows only when top menu is active -->
    <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
        <li class="">
            <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                <img src="@if(Session::get('user.avatar')!='') {{Session::get('user.avatar')}} @endif"
                     alt="{{Session::get('user.name')}}" class="online" />
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#/misc/other/profile" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- logout button -->
    <div id="logout" class="btn-header transparent pull-right">
        <span> <a href="logout" title="Đăng xuất" data-action="userLogout" data-logout-msg="Để đảm bảo an toàn, bạn nên tắt tab trình duyệt sau khi đăng xuất."><i class="fa fa-sign-out"></i></a> </span>
    </div>
    <!-- end logout button -->

    <!-- search mobile button (this is hidden till mobile view port) -->
    <div id="search-mobile" class="btn-header transparent pull-right">
        <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
    </div>
    <!-- end search mobile button -->

    <!-- input: search field -->
    <form action="/#/search"  class="header-search pull-right">
        <input id="search-fld"  type="text" name="param" data-localize="search" placeholder="Tìm kiếm bệnh nhân" data-autocomplete='[]'>
        <button type="submit" onclick="return submitsearch()">
            <i class="fa fa-search"></i>
        </button>
        <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
    </form>
    <!-- end input: search field -->

    <!-- fullscreen button -->
    <div id="fullscreen" class="btn-header transparent pull-right">
        <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
    </div>
    <!-- end fullscreen button -->

    <!-- multiple lang dropdown : find all flags in the image folder -->
    <ul data-lang-menu="" class="header-dropdown-list hidden-xs" data-ng-controller="LangController">
        <li>
            <input type="hidden" id="currentLangIndex" value="{{((Session::has('localeindex'))?Session::get('localeindex'):0)}}">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img alt="" class="flag flag-@{{ currentLang.flagCode }}" src="img/blank.gif"> <span> @{{ currentLang.translation }} </span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li data-ng-class="{active: lang.langCode == currentLang}" data-ng-repeat="lang in languages">
                    <a href="#" data-ng-click="setLang($index)" ><img class="flag flag-@{{ lang.flagCode }}" src="img/blank.gif" /> @{{ lang.language }} (@{{ lang.translation }}) </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- {{URL::to('dashboard/changelang/')}}/@{{lang.langCode}} -->
    <!-- end multiple lang -->

</div>
<!-- end pulled right: nav area -->
<script>
    function submitsearch(){
        var param = $("input[name=param]").val();
        window.location.href = "/#/search/"+param;
        return false;
    }
</script>