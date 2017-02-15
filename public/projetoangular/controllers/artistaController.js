'use strict';

angular.module('myApp.artista.controller', ['myApp.artista.service'])
        .controller('artistaCtrl', ['$scope', 'artistaSrv', '$location', '$routeParams',
            function($scope, artistaSrv, $location, $routeParams) {
                $scope.load = function() {
                    $scope.registros = artistaSrv.query();
                };

                $scope.get = function() {
                    $scope.item = artistaSrv.get({id: $routeParams.id});
                };

                $scope.add = function(item) {
                    $scope.result = artistaSrv.save(
                            {},
                            item,
                            function(data, status, headers, config) {
                                $location.path('/artista');
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
                    $scope.result = artistaSrv.update(
                            {id: $routeParams.id},
                    item,
                            function(data, status, headers, config) {
                                $location.path('/artista');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao editar registro' + data.messages[0]);
                            }
                    );
                };

                $scope.delete = function(id) {
                    if (confirm("Deseja realmente excluir o registro?")) {
                        artistaSrv.remove(
                                {id: id},
                        {},
                                function(data, status, headers, config) {
                                    $location.path('/artista');
                                },
                                function(data, status, headers, config) {
                                    alert('Erro ao editar registro' + data.messages[0]);
                                }
                        );
                    }
                };
            }]);