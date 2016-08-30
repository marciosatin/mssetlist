'use strict';

angular.module('myApp.setlist.controller', ['myApp.setlist.service'])
        .controller('setlistCtrl', ['$scope', 'setlistSrv', 'setlistItemSrv', '$location', '$routeParams',
            function($scope, setlistSrv, setlistItemSrv, $location, $routeParams) {
                $scope.load = function() {
                    $scope.registros = setlistSrv.query();
                };

                $scope.get = function() {
                    $scope.item = setlistSrv.get({id: $routeParams.id});
                };

                $scope.add = function(item) {
                    $scope.result = setlistSrv.save(
                            {},
                            item,
                            function(data, status, headers, config) {
                                $location.path('/');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao inserir registro' + data.messages[0]);
                            }
                    );
                };

                $scope.addSetlistItem = function(musicas) {

                    var itens = musicas.filter(function(musica) {
                        if (musica.selecionada)
                            return musica;
                    });

                    $scope.setListItens = setlistItemSrv.save(
                            {id: $routeParams.id},
                            itens,
                            function(data, status, headers, config) {
                                $scope.musicas = musicas.filter(function(musica) {
                                    if (!musica.selecionada)
                                        return musica;
                                });
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao inserir registro' + data.messages[0]);
                            }
                    );
                };

                $scope.editar = function(item) {
                    $scope.result = setlistSrv.update(
                            {id: $routeParams.id},
                    item,
                            function(data, status, headers, config) {
                                $location.path('/');
                            },
                            function(data, status, headers, config) {
                                alert('Erro ao editar registro' + data.messages[0]);
                            }
                    );
                };

                $scope.delete = function(id) {
                    if (confirm("Deseja realmente excluir o registro?")) {
                        setlistSrv.remove(
                                {id: id},
                        {},
                                function(data, status, headers, config) {
                                    $location.path('/');
                                },
                                function(data, status, headers, config) {
                                    alert('Erro ao editar registro' + data.messages[0]);
                                }
                        );
                    }
                };

                $scope.submit = function(termSearch) {
                    if (termSearch) {
                        $scope.musicas = setlistSrv.search(
                                {q: termSearch}
                        );
                    }
                };
            }]);