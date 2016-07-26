'use strict';

angular.module('myApp.controllers', ['ngRoute'])
        .controller('MusicaCtrl', ['$scope', 'MusicaSrv', '$location', '$routeParams',
            function($scope, MusicaSrv, $location, $routeParams) {
                $scope.load = function() {
                    $scope.registros = MusicaSrv.query();
                };

                $scope.get = function() {
                    $scope.item = MusicaSrv.get({id: $routeParams.id});
                };

                $scope.add = function(item) {
                    $scope.result = MusicaSrv.save(
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

                $scope.editar = function(item) {
                    $scope.result = MusicaSrv.update(
                            {id: $routeParams.id},
                    item,
                            function(data, status, headers, config) {
                                $location.path('/categorias');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao editar registro' + data.messages[0]);
                            }
                    );
                };

                $scope.delete = function(id) {
                    if (confirm("Deseja realmente excluir o registro?")) {
                        MusicaSrv.remove(
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