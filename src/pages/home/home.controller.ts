///<reference path="../../app.module.ts"/>

class HomeController{

	message:string;

	constructor(){
		this.message = 'Hello World!';
	}
}

app.controller('HomeController', HomeController);