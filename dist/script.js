var app = angular.module('mainApp', ['ngRoute']);
angular
    .element(document)
    .ready(function () {
    angular.bootstrap(document, ['mainApp']);
});
var RouteConfig = (function () {
    function RouteConfig($routeProvider) {
        $routeProvider.when('/', {
            templateUrl: 'src/pages/home/home.html',
            controller: 'HomeController',
            controllerAs: 'vm'
        }).otherwise({
            redirectTo: '/'
        });
    }
    RouteConfig.$inject = ['$routeProvider'];
    return RouteConfig;
}());
app.config(RouteConfig);
var HomeController = (function () {
    function HomeController() {
        this.message = 'Hello World!';
    }
    return HomeController;
}());
app.controller('HomeController', HomeController);
