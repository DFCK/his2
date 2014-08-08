<div data-ng-controller="DashboarController">
<h1>Hệ thống thông tin Y Tế - Bệnh Viện X</h1>
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
