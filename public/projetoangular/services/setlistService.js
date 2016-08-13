'use strict';

angular.module('myApp.setlist.service', ['ngResource'])
       .service('setlistSrv', ['$resource', function($resource) {
            return $resource(
                    '/api/setlist/:id',
                    {id: '@id'},
            {
                update: {
                    method: 'PUT'
                }
            }
            );
        }]
    );