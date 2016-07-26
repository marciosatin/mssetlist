'use strict';

angular.module('myApp.services', ['ngResource'])
       .factory('ArtistaSrv', ['$resource', function($resource) {
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