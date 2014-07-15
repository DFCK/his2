@extends('layout')
@section('body')
<style>
    .error{
        background: red;
    }
    .warning{
        background: #ffff00 ;
    }
</style>
<form ng-submit="requestFunc()">
    Start:
    <input ng-change="changefunc()" ng-model="func.startest">
    Recommend: @{{func.need | currency:'VND '  }}
    <input type="submit" value="Submit">


</form>
<div ng-class='{error:iserror,warning:iswarning}' style="display: block">@{{messagetext}}</div>
<button ng-click="setError()">Error</button>
<button ng-click="setWarning()">Warning</button>
@stop
@section('jscript')
<script>
    var app = angular.module('his', []);
    app.controller('MainCtrl', ['$scope', function ($scope) {
        $scope.func = {startest: 0};

        changefunc = function () {
            $scope.func.need = $scope.func.startest * 10;
        };
        $scope.$watch('func.startest', changefunc);

        $scope.requestFunc = function () {
            if ($scope.func.need == 0)
                window.alert("Please input form");
        }
        $scope.setError = function(){
            $scope.messagetext = "Error";
            $scope.iserror = true;
            $scope.iswarning = false;
        };
        $scope.setWarning = function(){
            $scope.messagetext = "Warning";
            $scope.iserror = false;
            $scope.iswarning = true;
        };
    }]);

</script>
@stop
