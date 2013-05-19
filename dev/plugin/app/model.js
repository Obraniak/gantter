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

	if (tmp == null) {
		for (var i = 0; i < data.length; i++) {
			this.items.push(data[i]);
		}

	} else {
		for (var i = 0; i < tmp.length; i++) {
			this.items.push(tmp[i]);
		}
	}
}
function jsonDecode(data) {
	try {
		return JSON.parse(data);
	} catch(err) {
		return null;
	}
}

function jsonEncode(data) {
	try {
		return JSON.stringify(data);
	} catch(err) {
		return null;
	}
}

