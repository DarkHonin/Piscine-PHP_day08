

class View{

	constructor(c, cn){
		this.context = cn;
		this.canvas = c;
		this.scale = 100;
	}

	clear() {
		//this.context.fill();
	  }

	zoom(q){
		alert("zoom" + q);
		this.scale += q;
		this.clear();
		this.drawGrid();
	}
};

var VIEW;

function drawGrid(){
	var w = VIEW.canvas.width;
	var h = VIEW.canvas.height;
	alert("Painting");
	VIEW.context.strokeStyle = "#008800FF";
	VIEW.context.beginPath();
	VIEW.context.lineWidth = 1;
	for(var q = 0; q < view.scale; q++)
	{
		VIEW.context.moveTo(0, (h / view.scale) * q);
		VIEW.context.lineTo(w, (h / view.scale) * q);
	}
	for(var i = 0; i < view.scale; i++){
		VIEW.context.moveTo((w / view.scale) * i, 0);
		VIEW.context.lineTo((w / view.scale) * i, h);
	}
	VIEW.context.stroke();
}

var canvas = $(".gameView>canvas")[0];
var context = this.canvas.getContext("2d");

function init(){
	VIEW = new View(canvas, context)
	drawGrid();
	$(".zoom_p").click(function(){
		VIEW.zoom(1);
	});
	$(".zoom_m").click(function(){
		VIEW.zoom(-1);
	});
}

$(document).ready(init);