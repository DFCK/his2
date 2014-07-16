@extends('layout')
@section('body')
<!-- HEADER -->
<header id="header" data-ng-include="'{{URL::to('tpl/header')}}'"></header>
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel"><span data-ng-include="'{{URL::to('tpl/leftpanel')}}'"></span></aside>
<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon" data-ng-include="'{{URL::to('tpl/ribbon')}}'" data-ribbon=""></div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content" data-ng-view="" class="view-animate"></div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- PAGE FOOTER -->
<div class="page-footer"><span data-ng-include="'{{URL::to('tpl/footer')}}'"></span></div>
<!-- END FOOTER -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
<div id="shortcut"><span data-ng-include="'{{URL::to('tpl/shortcut')}}'"></span></div>
<!-- END SHORTCUT AREA -->
@stop
@section('jscript')
<script>
/* DO NOT REMOVE : GLOBAL FUNCTIONS!
 *
 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
 *
 * // activate tooltips
 * $("[rel=tooltip]").tooltip();
 *
 * // activate popovers
 * $("[rel=popover]").popover();
 *
 * // activate popovers with hover states
 * $("[rel=popover-hover]").popover({ trigger: "hover" });
 *
 * // activate inline charts
 * runAllCharts();
 *
 * // setup widgets
 * setup_widgets_desktop();
 *
 * // run form elements
 * runAllForms();
 *
 ********************************
 *
 * pageSetUp() is needed whenever you load a page.
 * It initializes and checks for all basic elements of the page
 * and makes rendering easier.
 *
 */

pageSetUp();

/*
 * PAGE RELATED SCRIPTS
 */
</script>
@stop

