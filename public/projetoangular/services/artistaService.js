'use strict';

angular.module('myApp.artista.service', ['ngResource'])
       .service('artistaSrv', ['$resource', function($resource) {
            return $resource(
                    '/api/artista/:id',
                    {id: '@id'},
            {
                update: {
                    method: 'PUT'
                }
            }
            );
        }]
    );