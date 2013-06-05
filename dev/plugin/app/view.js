/**
 * @author Marcin
 */

function AppView() {
	this.org = Joint.dia.org;
}

AppView.prototype.onJoinBeginEnd = function(beginItem, endItem) {

	beginItem.joint(endItem, this.org.arrow);

}

AppView.prototype.onJoinBeginBegin = function(beginItem, endItem) {

	beginItem.joint(endItem, this.org.arrow);

}

AppView.prototype.onJoinEndBegin = function(beginItem, endItem) {

	beginItem.joint(endItem, this.org.arrow);

}

AppView.prototype.onJoinEndEnd = function(beginItem, endItem) {

	beginItem.joint(endItem, this.org.arrow);

}

AppView.prototype.onUnjoinItems = function(beginItem, endItem) {

	beginItem.joint(endItem, this.org.arrow);

}

AppView.prototype.showItems = function(data) {

	Joint.paper("items", 1200, 700);

	for (id in data) {

		var tmp = data[id];

		var item = this.org.Member.create({
			rect : {
				x : tmp.x,
				y : tmp.y,
				width : tmp.width,
				height : tmp.height
			},
			name : tmp.name,
			position : tmp.position,
			avatar : tmp.avatar,
			attrs : {
				fill : tmp.fill,
				stroke : tmp.stroke
			}
		});

		item.wrapper["0"].id = id;

		item.wrapper["0"].raphael.click(onItemClick);
	}
}
// bart.joint(marge, this.org.arrow);
// homer.joint(marge, this.org.arrow);
// marge.joint(lisa, this.org.arrow);
//
// marge.joint(maggie, this.org.arrow).setVertices(['375 380']);
// homer.joint(lenny, this.org.arrow).setVertices(['165 380']);
// homer.joint(carl, this.org.arrow).setVertices(['165 530']);

