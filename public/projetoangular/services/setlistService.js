'use strict';

angular.module('myApp.setlist.service', ['ngResource'])
        .service('setlistSrv', ['$resource', function($resource) {
                return $resource(
                        '/api/setlist/:id',
                        {id: '@id'},
                {
                    update: {
                        method: 'PUT'
                    },
                    search: {
                        method: 'GET',
                        url: '/api/setlist/search/:q/:id',
                        isArray: true
                    }
                }
                );
            }]
                )
        .service('setlistItemSrv', ['$resource', function($resource) {
                return $resource(
                        '/api/setlistitem/:id',
                        {id: '@id'},
                {
                    get: {
                        isArray: true
                    },
                    update: {
                        method: 'PUT'
                    }
                }
                );
            }]);