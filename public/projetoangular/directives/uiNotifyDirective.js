'use strict';

angular.module('myApp').directive('uiNotify', function () {
    return {
        //pega da public como base
        templateUrl: "projetoangular/templates/notify.html",
        restrict: "E",
        scope: {
            title: "@",
            message: "="
        }
    };
});