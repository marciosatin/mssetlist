'use strict';

angular.module('myApp.musica.service', ['ngResource'])
       .service('musicaSrv', ['$resource', function($resource) {
            return $resource(
                    '/api/musica/:id',
                    {id: '@id'},
            {
                update: {
                    method: 'PUT'
                }
            }
            );
        }]
    );