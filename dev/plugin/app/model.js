/**
 * @author Marcin
 */

function TaskItem() {
	this.x = Number(0);
	this.y = Number(0);
	this.width = Number(0);
	this.height = Number(0);
	this.name = "";
	this.position = "";
	this.avatar = "";
	this.fill = "0";
	this.stroke = "ll";
}

function AppModel() {
}

AppModel.prototype.data = {
	items : []
}

AppModel.prototype.getItems = function() {
	return this.data.items;
}
AppModel.prototype.setItems = function(data) {

	this.data.items = [];

	var tmpData = jsonDecode(data);

	if (tmpData == null) {

		for (id in data) {

			var tmp = new TaskItem();
			var source = data[id];

			tmp.x = Number(source.x);
			tmp.y = Number(source.y);
			tmp.width = Number(source.width);
			tmp.height = Number(source.height);
			tmp.name = String(source.name);
			tmp.position = String(source.position);
			tmp.avatar = String(source.avatar);
			tmp.fill = String(source.fill);
			tmp.stroke = String(source.stroke);

			this.data.items[id] = tmp;

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

