@extends('layout')
@section('body')
<p>HIS 2</p>
@{{ users.details.id }}
@{{ users.details.name }}
<br>
@{{ myinput }}
<br>
<input type="text" ng-model="myinput">
<br>
   <ul>
       <li ng-repeat="number in numbers | filter:filterodd">@{{number}}</li>
   </ul>

<a class=custombutton> Click me </a>
@stop
@section('jscript')
<script>
    var app = angular.module('his', []);
    app.service('myMath',function(){
        this.multiply = function(x,y){
            return x*y;
        };
    });
    app.controller('Main', ['$scope','myMath', function ($scope,myMath) {
        $scope.users = {};
        $scope.users.details = {
            "id": "1",
            "name": "Thang"
        };
       // var x=$scope.myinput;
       // $scope.text = myMath.multiply(x,3);

        $scope.numbers = [1,2,3,4,5,6,7,8];
        $scope.myinput = 1;
        $scope.filterodd = function(item){
            return item % 2 == 0;
        };
    }]);
    app.directive('custombutton', function () {
        return {
            restrict: 'C',
            replace: true,
            transclude: true,
            template: '<a href="#" class="myclass" ng-transclude><i class=""></i></a>',
            link: function (scope, element, attrs) {
            }
        };
    });

</script>
@stop
