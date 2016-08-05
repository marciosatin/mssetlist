'use strict';

angular.module('myApp.genero.service', ['ngResource'])
       .factory('generoSrv', ['$resource', function($resource) {
            return $resource(
                    '/api/genero/:id',
                    {id: '@id'},
            {
                update: {
                    method: 'PUT'
                }
            }
            );
        }]
    );