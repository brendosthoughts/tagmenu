
// made in chrome
// firefox messes up drawing/composition/somethin!g?


window.requestAnimFrame = (function(){
	return  window.requestAnimationFrame       ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame    ||
		function( callback ){
			window.setTimeout(callback, 1000 / 60);
		};
})();



function ready() {
	var con = console;

	var howWide = document.getElementById("howWide");

	var sw = howWide.offsetWidth - 40;
	var sh = innerHeight - 40;

	if (!sw || !sh ) {
		return setTimeout( ready, 500 );
	}
  if (sw < 400) sw = 400;
  if (sh < 400) sh = 400;
  
	function makeCanvas(w,h) {
		var can = document.createElement('canvas');
		can.width = w;
		can.height = h;
		return can;
	}

	var stage = makeCanvas(sw,sh);
	var context = stage.getContext('2d');

	var padding = 5; // canvas padding for cogs
	var cogs = [];
	var prevCog;
	var pi = 3.14159265; // because 1.9999999999997 is 2...
	var pi2 = pi*2;
	var dir = -1;
	var cx = 0.5 * sw;
	var cy = 0.5 * sh;
	var tr = 0;
	var ang = 0;
	var speed = 0.02;
	var cogNumber = 0;
	var holeStyle = { fillStyle: "#000", lineWidth: 0 }
	var curvature = 1.7;


	function number(min,max) {
		return Math.random() * (max - min) + min;
	}
	function integer(min,max) {
		return ~~number(min,max+1);
	}

	function colourGrey( options ) {
		var defaults = { darkest: 0, lightest: 255, alpha: 1 };
		for (var p in options ) defaults[p] = options[p];
		var white = defaults.white ? defaults.white : integer(defaults.darkest,defaults.lightest);
		var r = g = b = white;
		var a = defaults.alpha;
		return "rgba("+r+","+g+","+b+","+a+");";
	}

	function colourRust( options ) {
		var defaults = { darkest: 0, lightest: 255, alpha: 1 };
		for (var p in options ) defaults[p] = options[p];
		var white = defaults.white ? defaults.white : integer(defaults.darkest,defaults.lightest);
		var r = integer(white,white);
		var g = integer(r*0.6,r*0.8);
		var b = integer(g*0.6,g*0.8);
		var a = defaults.alpha;
		return "rgba("+r+","+g+","+b+","+a+");";
	}

	function generateNoise(w, h, options) {
		var defaults = {darkest: 70, lightest: 90, alpha: 0.3, percentage: 0};
		for (var p in options ) defaults[p] = options[p];
		var canvas = makeCanvas(w,h);
		var ctx = canvas.getContext('2d');
		for ( var x = 0; x < w; x++ ) {
			for ( var y = 0; y < h; y++ ) {
				if ( number(0,1) > defaults.percentage ) {
					ctx.fillStyle = colourGrey(defaults);
					ctx.fillRect( x, y, 1, 1 );
				}
			}
		}
		return canvas;
	}
	var noise = generateNoise(300,100, { percentage: 0.4 });


	function generateMetal(w, h, options) {
		var canvas = makeCanvas(w,h);
		var ctx = canvas.getContext('2d');
		var func = integer(0,1)== 1 ? colourGrey : colourRust;
		ctx.fillStyle = func({darkest: 70, lightest: 110, alpha: 1});
		ctx.fillRect( 0, 0, w, h );
		ctx.drawImage( noise, 0, 0 );
		return canvas;
	}





	function drawCircle( c, x, y, r, style, antiClockwise, renderNow ) {
		c.moveTo( x + r, y ); // go to start of arc
		if ( antiClockwise == undefined ) antiClockwise = false; // double negative love...
		//con.log("drawCircle", x, y);
		var defaults = { fillStyle:"#fff",lineWidth:0,strokeStyle:"#f00"};
		for (var p in style ) defaults[p] = style[p];
		c.fillStyle = defaults.fillStyle;
		c.lineWidth = defaults.lineWidth;
		c.strokeStyle = defaults.strokeStyle;
		if ( renderNow ) c.beginPath();
		c.arc( x, y, r, 0, pi2, antiClockwise );
		if ( renderNow ) {
			c.closePath();
			if ( defaults.fillStyle ) c.fill();
			if ( defaults.lineWidth ) c.stroke();
		}
	}


	function createCog( forceX, forceY ) {

		var ctx; // cog context
		var size;

		if ( forceX && forceY && prevCog) {
			con.log("creating", forceX, forceY );
			prevCog = cogs[ cogNumber - 1 ];
			var dy = forceY - prevCog.yp;
			var dx = forceX - prevCog.xp;
			ang = Math.atan(dy/dx);
			ang += dx < 0 ? pi : 0;
			dx = Math.abs(dx);
			dy = Math.abs(dy);
			dx -= Math.abs(prevCog.size);
			dy -= Math.abs(prevCog.size);
			size = Math.sqrt( dx * dx + dy * dy );
		} else {
			ang = number(0,pi2);
			size = number(60,100);
		}


		if ( size < 50 ) {
			alert("Too close! Try clicking further away from the last cog..." );
			return;
		}

		var teeth = ~~(size / 10);

		dir *= -1;

		if (cogNumber) {
			tr += size - 10;
			cx += tr * Math.cos(ang);
			cy += tr * Math.sin(ang);
		}
		tr = size - 10;

		var minRad = size - 25;
		var maxRad = size;
		var verts = [];
		var step = pi2 / (teeth * 4);
		var mod = 0;
		var oddEven = 0;
		var halfRadius = (maxRad - minRad) / curvature + minRad;
		var realX, realY, halfX, halfY;
		for (var j = 0; j < teeth * 4; j++ ) {
			var i = j * step;
			var topBottomLand = (~~(mod)%2);
			var r = topBottomLand * (maxRad - minRad) + minRad;
			mod += .5;
			oddEven += 1;
			var angle = i - step / 2; // offsets teeth a bit, making sure at angle 0, we are in the middle of a "bottom land" rather than "top land"
			realX = r * Math.cos(angle);
			realY = r * Math.sin(angle);
			if (oddEven%2 == 0) {
				v = {tb:topBottomLand, ex:realX, ey:realY};
			} else {
				halfX = halfRadius * Math.cos(i - step);
				halfY = halfRadius * Math.sin(i - step);
				v = {tb:topBottomLand, mp:true, ex:realX, ey:realY, mx:halfX, my:halfY};
			}
			verts.push( v );
			// con.log("coords", i, v.ex, v.ey, v.mx, v.my );
		}
		// con.log("=====================");




		function drawBand( minRadius, maxRadius ) {
			if ( number(0,1) < 0.3 ) return;
			var midRadius = (maxRadius + minRadius) / 2;
			var bandSize = maxRadius - minRadius;
			drawCircle( ctx, 0, 0, midRadius, {
				fillStyle: null,
				strokeStyle: integer(0,1)==0 ?
					colourGrey({darkest:0, lightest: 40, alpha: 0.5}) :
					colourRust({darkest:0, lightest: 120, alpha: 0.5}),
				lineWidth: bandSize
			},
			false, true );
		}

		function drawCutouts( minRadius, maxRadius ) {
			var midRadius = (maxRadius + minRadius) / 2;
			var bandSize = maxRadius - minRadius;
			if ( integer(0,1) == 0 ) {
				generateHoles( midRadius, bandSize );
			} else {
				generateSegment( midRadius, bandSize );
			}
		}

		function generateHoles( midRadius, bandSize ) {
			//var holes = ~~(teeth * integer(1,3) / integer(1,2));
			var holeSize = bandSize / 2 * number(0.6,0.9);
			var holes = ~~(number(0.5,0.9) * pi2 * midRadius / holeSize / 2);
			holeSize *= number(0.5,0.9);
			for ( var i = 0; i < holes; i++ ) {
				var angle = i / holes * pi2;// + step / 2;
				drawCircle( ctx, midRadius * Math.cos(angle), midRadius * Math.sin(angle), holeSize, holeStyle, true );
			}
		}

		function generateSegment( midRadius, bandSize ) {
			// capped specifies segments to be rounded or angular... angular with many segments will be akin to spokes
			var capped = integer(0,1) == 0;
			var segments = ~~(Math.pow(teeth, 1 / (capped ? integer(2,4) : integer(2,3)) )) + 1;
			var holeSize = number(0.5,0.8) * bandSize;
			// if capped, remove the capping from segment size... on second thoughts, otherwise remove a little anyway!
			var segmentSize = (pi2 / segments - ( Math.asin( holeSize / midRadius ) * capped ? 1 : 0.5 )) * number(0.5,0.9);
			var innerRadius = midRadius - holeSize / 2;
			var outerRadius = midRadius + holeSize / 2;

			for ( var i = 0; i < segments; i++ ) {
				var startAngle = i / segments * pi2;
				var endAngle = startAngle + segmentSize;
				ctx.moveTo( Math.cos( startAngle ) * innerRadius, Math.sin( startAngle ) * innerRadius );
				ctx.arc( 0, 0, innerRadius, startAngle, endAngle, false );
				if ( capped ) {
					ctx.arc( Math.cos( endAngle ) * midRadius, Math.sin( endAngle ) * midRadius, holeSize / 2, endAngle + pi, endAngle, true );
				} else {
					ctx.lineTo( Math.cos( endAngle ) * outerRadius, Math.sin( endAngle ) * outerRadius );
				}
				ctx.arc( 0, 0, outerRadius, endAngle, startAngle, true );
				if ( capped ) {
					ctx.arc( Math.cos( startAngle ) * midRadius, Math.sin( startAngle ) * midRadius, holeSize / 2, startAngle, startAngle + pi, true );
				} else {
					ctx.lineTo( Math.cos( startAngle ) * innerRadius, Math.sin( startAngle ) * innerRadius );
				}
			}
		}

   


		var cog = {
			index: cogNumber,
			size: size,
			rotation: number(0,pi2),
			teeth: teeth,
			dir: dir,
			xp: cx,
			yp: cy,
			canvas: null
		}

		if (cogNumber) {
			prevCog = cogs[ cogNumber - 1 ];
			cog.rotation = prevCog.teeth / cog.teeth * -prevCog.rotation + ang * (prevCog.teeth + cog.teeth) / cog.teeth;
			if ( cog.teeth%2 == 0 ) {
				cog.rotation += pi2 / (cog.teeth*2);
			}
		}

		cog.render = function() {
			var dims = (this.size + padding) * 2;
			this.canvas = makeCanvas( dims, dims );
			//	document.body.appendChild( this.canvas );
			ctx = this.canvas.getContext('2d');

			ctx.save();
			ctx.translate( this.size + padding, this.size + padding );

			ctx.shadowBlur = 8;
			ctx.shadowColor = "#000";

			ctx.beginPath();
			v = verts[0];
			ctx.moveTo(v.ex, v.ey);
			for (var i = 1; i < verts.length; i++ ) {
				var v = verts[i];
				if (v.mp) {
					ctx.quadraticCurveTo(v.mx, v.my, v.ex, v.ey);
				} else {
					ctx.lineTo(v.ex, v.ey);
				}
			}
			v = verts[0];
			ctx.quadraticCurveTo(v.mx, v.my, v.ex, v.ey);

			// draw some cutouts
			// draw axle
			var axleSize = minRad * 0.2;
			drawCircle( ctx, 0, 0, minRad * 0.2, holeStyle, true );
			drawCutouts( axleSize + minRad * 0.1, minRad * 0.9);
			ctx.closePath();

			// paint with dotty metal
			var metal = generateMetal(300,100);
			var pattern = ctx.createPattern( metal, "repeat");
			ctx.fillStyle = pattern;
			ctx.fill();

			drawCircle( ctx, 0, 0, minRad * 0.16, holeStyle, true, true );

			ctx.globalCompositeOperation = "source-atop";
			drawBand( axleSize, axleSize + minRad * 0.1 );
			drawBand( minRad * 0.9, minRad );

			// draw some lathe marks - they bleed into the shadow, so be it.
			var latheScratches = integer( 12, size / 5 );
			if ( latheScratches > 40 ) latheScratches = 40;
			for (var i = 0; i < latheScratches; i++ ) {
				drawCircle( ctx, 0, 0, number(axleSize, minRad), {fillStyle: null, lineWidth: 1, strokeStyle: colourGrey({darkest:1, lightest: 1, alpha: number(0.01, 0.1)}) }, false, true);
			}

			/*
			// draw label
			ctx.font = "15px Calibri";
			ctx.fillStyle = colourRust({darkest:00, lightest: 00}),
			ctx.fillText( this.index, 0, -axleSize + minRad * 0.1 );
			ctx.restore();
			*/

		}


		cog.draw = function() {
			if ( !cog.canvas ) {
				cog.render();
			}
			context.save();
			context.translate( this.xp, this.yp  );
			context.rotate( this.rotation );
			context.drawImage( this.canvas, -this.size - padding, -this.size - padding );
			context.restore();

		}

		cog.rotate = function() {
			this.rotation += (pi2 / this.teeth * this.dir) * speed;
			this.draw();
		}

		cogs[cogNumber] = cog;
		cogNumber++;
	}



	// create background
	var background = makeCanvas( sw, sh );
	var backgroundContext = background.getContext('2d');
	var backgroundNoise = generateNoise(300,100, {darkest: 30, lightest: 50, alpha: 1});

	var stripeSize = 40;
	var diagonalStripeSize = Math.sqrt( stripeSize * stripeSize / 2 );
	var backgroundStripes = makeCanvas(stripeSize,stripeSize);
	var backgroundStripesContext = backgroundStripes.getContext('2d');
	backgroundStripesContext.rotate( pi2 / 8 );
	backgroundStripesContext.fillStyle = "rgba(0,0,0,0.1)";
	backgroundStripesContext.fillRect(0, 0, stripeSize * 2 , diagonalStripeSize / 2);
	backgroundStripesContext.fillRect(0, -diagonalStripeSize , stripeSize * 2, diagonalStripeSize / 2);

	backgroundContext.fillStyle = context.createPattern(backgroundNoise, "repeat");
	backgroundContext.fillRect(0,0,sw,sh);
	backgroundContext.fillStyle = context.createPattern(backgroundStripes, "repeat");
	backgroundContext.fillRect(0,0,sw,sh);
	backgroundContext.shadowBlur = 6;
	backgroundContext.shadowColor = "#fff";
	backgroundContext.font = "12pt Calibri";
	backgroundContext.fillStyle = "rgba(255,255,255,0.6)";
	backgroundContext.fillText( "Click to add cogs", 10, 20);




	function onLoop() {
		//con.log("onLoop");
		requestAnimFrame(onLoop);
		context.drawImage( background, 0, 0 );
		//return;
		for (var i = 0; i < cogs.length; i++) {
			cogs[i].rotate();
		}
	}


	for (var i = 0; i < 3; i++) {
		createCog();
	}
	stage.addEventListener("mousemove", function(e) {
		speed = (e.pageX - 0.5 * sw) * 0.0002;
	});

	stage.addEventListener("mousedown", function(e) {
		createCog(e.pageX, e.pageY);
	});


	document.body.appendChild(stage);
	onLoop();

}

//document.addEventListener( "DOMContentLoaded", ready );
setTimeout( ready, 200 );