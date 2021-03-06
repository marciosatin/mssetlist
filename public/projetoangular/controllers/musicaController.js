'use strict';

angular.module('myApp.musica.controller', [
    'myApp.musica.service',
    'myApp.artista.service',
    'myApp.genero.service'])
        .controller('musicaCtrl', ['$scope', 'musicaSrv', 'artistaSrv', 'generoSrv', '$location', '$routeParams',
            function($scope, musicaSrv, artistaSrv, generoSrv, $location, $routeParams) {
                $scope.load = function() {
                    $scope.registros = musicaSrv.query();
                };

                $scope.loadData = function() {
                    $scope.artistas = artistaSrv.query();
                    $scope.generos = generoSrv.query();
                };

                $scope.get = function() {
                    $scope.item = musicaSrv.get({id: $routeParams.id});
                    $scope.loadData();
                };

                $scope.add = function(item) {
                    $scope.result = musicaSrv.save(
                            {},
                            item,
                            function(data, status, headers, config) {
                                $location.path('/musica');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao inserir registro' + data.messages[0]);
                            }
                    );
                };
                
                $scope.sort = function(keyname) {
                    $scope.sortKey = keyname;   //set the sortKey to the param passed
                    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
                }

                $scope.editar = function(item) {
                    $scope.result = musicaSrv.update(
                            {id: $routeParams.id},
                    item,
                            function(data, status, headers, config) {
                                $location.path('/musica');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao editar registro' + data.messages[0]);
                            }
                    );
                };

                $scope.delete = function(id) {
                    if (confirm("Deseja realmente excluir o registro?")) {
                        musicaSrv.remove(
                                {id: id},
                        {},
                                function(data, status, headers, config) {
                                    $location.path('/categorias');
                                },
                                function(data, status, headers, config) {
                                    alert('Erro ao editar registro' + data.messages[0]);
                                }
                        );
                    }
                };
            }]);