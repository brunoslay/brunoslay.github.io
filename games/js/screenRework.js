const screen = {


	width: null,
	height: null,


	getSize: function (w = window.screen.width, h = window.screen.height){

		this.width = w;
		this.height = h;

		console.log(w, h);

	}


}