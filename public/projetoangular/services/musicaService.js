'use strict';

angular.module('myApp.services', ['ngResource'])
       .factory('MusicaSrv', ['$resource', function($resource) {
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