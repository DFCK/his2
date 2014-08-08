var smartApp = angular.module('smartApp', [
  	'ngRoute',
  	//'ngAnimate', // this is buggy, jarviswidget will not work with ngAnimate :(
  	'ui.bootstrap',
  	'plunker',
  	'app.controllers',
  	'app.demoControllers',
  	'app.main',
  	'app.navigation',
//  	'app.localize',
  	'app.activity',
  	'app.smartui',
    //load angular UI
    'ui.utils' ,
    'autocomplete',
    'ngProgress'
]);

smartApp.filter('hospitalclose', function () {
    return function (input){
        if(input.deleted_at)
            return input.name+" (CLOSED)";
        else return input.name;
    }
});
smartApp.filter('formatadmissionby',function(){
    return function (input){
        var text = "";
        switch (input){
            case 0: text="Tự đến";break;
            case 1: text="Cấp cứu";break;
            case 2: text="Chuyển viện";break;
        }
        return text;
    }
});
smartApp.filter('calmonth',function(){
    return function(input){   //format yyyy or timestamp
        var d2 = new Date();
        if((input+"").length==4){
            return (d2.getFullYear() - parseInt(input)) + " tuổi" ;
        }
        else{
            var d1 = new Date(input);
            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth();
            months += d2.getMonth() + 1;
            var rs = (months <= 0 ? 0 : months);
            if(rs < 12) return rs +" tháng";
            else return (d2.getFullYear() - d1.getFullYear())+" tuổi";
        }

    }

});

smartApp.config(['$routeProvider', '$provide', function($routeProvider, $provide) {
	$routeProvider
		.when('/', {
			redirectTo: '/dashboard'
		})

		/* For DEMO purposes, we are loading our views dynamically by passing arguments to the location url */

		// A bug in smartwidget with angular (routes not reloading). 
		// We need to reload these pages everytime so widget would work
		// The trick is to add "/" at the end of the view.
		// http://stackoverflow.com/a/17588833
		.when('/:page', { // we can enable ngAnimate and implement the fix here, but it's a bit laggy
			templateUrl: function($routeParams) {
				return  $routeParams.page ;
			},
			controller: 'PageViewController'
		})
		.when('/:page/:child*', {
			templateUrl: function($routeParams) {
				return  $routeParams.page + '/' + $routeParams.child ;
			},
			controller: 'PageViewController'
		})
		.otherwise({
			redirectTo: '/dashboard'
		})
	;

	// with this, you can use $log('Message') same as $log.info('Message');
	$provide.decorator('$log', function($delegate) {
        // create a new function to be returned below as the $log service (instead of the $delegate)
        function logger() {
            // if $log fn is called directly, default to "info" message
            logger.info.apply(logger, arguments);
        }
        // add all the $log props into our new logger fn
        angular.extend(logger, $delegate);
        return logger;
    });

}]);

smartApp.run(['$rootScope', 'settings', function($rootScope, settings) {
	settings.currentLang = settings.languages[0]; // en
}])