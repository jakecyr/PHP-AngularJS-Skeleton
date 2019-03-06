///<reference path="./app.module.ts"/>

class RouteConfig{
	static $inject = ['$routeProvider'];

	constructor($routeProvider:ng.route.IRouteProvider){
		$routeProvider.when('/', {
			templateUrl: 'src/pages/home/home.html',
			controller: 'HomeController',
			controllerAs: 'vm',
		}).otherwise({
			redirectTo: '/',
		});
	}
}

app.config(RouteConfig);