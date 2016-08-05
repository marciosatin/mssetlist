angular.module('myApp', ['ngRoute', 'myApp.musica.controller'])
       .config(['$routeProvider', function($routeProvider) {
        $routeProvider
                .when('/musica', {
                    templateUrl: 'projetoangular/templates/musica.html',
                    controller: 'musicaCtrl'
                })
                .when('/musica/novo/', {
                    templateUrl: 'projetoangular/templates/novamusica.html',
                    controller: 'musicaCtrl'
                })
                .when('/categorias/editar/:id', {
                    templateUrl: 'projetoangular/templates/editarcategoria.html',
                    controller: 'CategoriaCtrl'
                })
                .when('/produtos', {
                    templateUrl: 'projetoangular/templates/produto.html',
                    controller: 'ProdutoCtrl'
                })
                .when('/produtos/novo/', {
                    templateUrl: 'projetoangular/templates/novoproduto.html',
                    controller: 'ProdutoCtrl'
                })
                .when('/produtos/editar/:id', {
                    templateUrl: 'projetoangular/templates/editarproduto.html',
                    controller: 'ProdutoCtrl'
                });
    }]);