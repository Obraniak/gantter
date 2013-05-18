/**
 * @author Marcin
 */

function AppView() {
	this.org = Joint.dia.org;
}

AppView.prototype.showItems = function(data) {

	Joint.paper("items", 1000, 550);

	for (var i = 0; i < data.length; i++) {

		var tmp = data[i];

		var item = this.org.Member.create({
			rect : {
				x : tmp.rect.x,
				y : tmp.rect.y,
				width : tmp.rect.width,
				height : tmp.rect.height
			},
			name : tmp.name,
			position : tmp.position,
			avatar : 'img/bart.jpg',
			attrs : {
				fill : tmp.attrs.fill,
				stroke : tmp.attrs.stroke
			}
		});

	}

	// bart.joint(marge, this.org.arrow);
	// homer.joint(marge, this.org.arrow);
	// marge.joint(lisa, this.org.arrow);
	//
	// marge.joint(maggie, this.org.arrow).setVertices(['375 380']);
	// homer.joint(lenny, this.org.arrow).setVertices(['165 380']);
	// homer.joint(carl, this.org.arrow).setVertices(['165 530']);

}

AppView.prototype.loadDemo = function() {

	Joint.paper("world", 800, 650);

	var bart = this.org.Member.create({
		rect : {
			x : 305,
			y : 70,
			width : 140,
			height : 60
		},
		name : "Bart Simpson",
		position : "CEO",
		avatar : 'img/bart.jpg',
		attrs : {
			fill : '#e4d8a4',
			stroke : 'gray'
		}
	});

	var homer = this.org.Member.create({
		rect : {
			x : 90,
			y : 200,
			width : 150,
			height : 60
		},
		name : "Homer Simpson",
		position : "VP Marketing",
		avatar : 'img/homer.jpg'
	});

	var marge = this.org.Member.create({
		rect : {
			x : 300,
			y : 200,
			width : 150,
			height : 60
		},
		name : "Marge Simpson",
		position : "VP Sales",
		avatar : 'img/marge.jpg'
	});

	var lisa = this.org.Member.create({
		rect : {
			x : 500,
			y : 200,
			width : 150,
			height : 60
		},
		name : "Lisa Simpson",
		position : "VP Production",
		avatar : 'img/lisa.jpg'
	});

	var maggie = this.org.Member.create({
		rect : {
			x : 400,
			y : 350,
			width : 150,
			height : 60
		},
		name : "Maggie Simpson",
		position : "Manager",
		avatar : 'img/maggie.jpg',
		attrs : {
			fill : '#4192d3',
			stroke : 'black'
		}
	});

	var lenny = this.org.Member.create({
		rect : {
			x : 190,
			y : 350,
			width : 150,
			height : 60
		},
		name : "Lenny Leonard",
		position : "Manager",
		avatar : 'img/lenny.jpg',
		attrs : {
			fill : '#4192d3',
			stroke : 'black'
		}
	});

	var carl = this.org.Member.create({
		rect : {
			x : 190,
			y : 500,
			width : 150,
			height : 60
		},
		name : "Carl Carlson",
		position : "Manager",
		avatar : 'img/carl.jpg',
		attrs : {
			fill : '#4192d3',
			stroke : 'black'
		}
	});

	bart.joint(marge, this.org.arrow);
	homer.joint(marge, this.org.arrow);
	marge.joint(lisa, this.org.arrow);

	marge.joint(maggie, this.org.arrow).setVertices(['375 380']);
	homer.joint(lenny, this.org.arrow).setVertices(['165 380']);
	homer.joint(carl, this.org.arrow).setVertices(['165 530']);

}
