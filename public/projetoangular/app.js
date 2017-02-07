angular.module('myApp', ['ngRoute', 'myApp.musica.controller',
    'myApp.setlist.controller',
    'myApp.artista.controller'])
        .config(['$routeProvider', function($routeProvider) {
                $routeProvider
                        .when('/', {
                            templateUrl: 'projetoangular/templates/setlist.html',
                            controller: 'setlistCtrl'
                        })
                        .when('/musica', {
                            templateUrl: 'projetoangular/templates/musica.html',
                            controller: 'musicaCtrl'
                        })
                        .when('/musica/novo/', {
                            templateUrl: 'projetoangular/templates/novamusica.html',
                            controller: 'musicaCtrl'
                        })
                        .when('/musica/editar/:id', {
                            templateUrl: 'projetoangular/templates/editarmusica.html',
                            controller: 'musicaCtrl'
                        })
                        .when('/artista', {
                            templateUrl: 'projetoangular/templates/artista.html',
                            controller: 'artistaCtrl'
                        })
                        .when('/artista/novo/', {
                            templateUrl: 'projetoangular/templates/novoartista.html',
                            controller: 'artistaCtrl'
                        })
                        .when('/artista/editar/:id', {
                            templateUrl: 'projetoangular/templates/editarartista.html',
                            controller: 'artistaCtrl'
                        })
                        .when('/setlist/novo/', {
                            templateUrl: 'projetoangular/templates/novasetlist.html',
                            controller: 'setlistCtrl'
                        })
                        .when('/setlist/musica/:id', {
                            templateUrl: 'projetoangular/templates/setlistmusica.html',
                            controller: 'setlistCtrl'
                        })
                        .when('/setlist/print/:id', {
                            templateUrl: 'projetoangular/templates/setlistprint.html',
                            controller: 'setlistCtrl'
                        })
                        .when('/setlist/editar/:id', {
                            templateUrl: 'projetoangular/templates/editarsetlist.html',
                            controller: 'setlistCtrl'
                        })
                        ;
            }]);