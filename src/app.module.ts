let app = angular.module('mainApp', ['ngRoute']);

angular
	.element(document)
	.ready(()=>{
		angular.bootstrap(document, ['mainApp']);
	});