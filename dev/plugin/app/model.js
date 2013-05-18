/**
 * @author Marcin
 */

function TaskItem() {
	this.rect = {
		'x' : 0,
		y : 0,
		width : 0,
		height : 0
	};
	this.name = new String();
	this.position = new String();
	this.avatar = 'img/bart.jpg';
	this.attrs = {
		fill : new String(),
		stroke : new String()
	}
}

function AppModel() {
	this.items = undefined;
}

AppModel.prototype.setItems = function(data) {

	this.items = new Array();

	var tmp = jsonDecode(data);

	for (var i = 0; i < tmp.length; i++) {
		this.items.push(tmp[i]);
	}

}
function jsonDecode(data) {
	return JSON.parse(data);
}

function jsonEncode(data) {
	return JSON.stringify(data);
}

