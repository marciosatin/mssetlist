'use strict';

angular.module('myApp').directive('uiPreloader', function () {
    return {
        //pega da public como base
        templateUrl: "projetoangular/templates/preloader.html",
        restrict: "E"
    };
});