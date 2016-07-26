'use strict';

angular.module('myApp').config(function ($httpProvider) {
   $httpProvider.interceptors.push('loadingInterceptor'); 
});