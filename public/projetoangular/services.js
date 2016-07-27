'use strict';

angular.module('myApp.services', ['ngResource'])
       .factory('musicaSrv', ['$resource', function($resource) {
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
    )
    .factory('artistaSrv', ['$resource', function($resource) {
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
    ).factory('generoSrv', ['$resource', function($resource) {
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