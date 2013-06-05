/**
 * @author Marcin
 */

function TaskItem() {

	this.uid = "";
	this.id = "";
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

function JoinItem() {

	this.leftId = "";
	this.rightId = "";
	this.type = "";
}

function AppModel() {

	this.beginItem = null;
	this.endItem = null;
	this.data = [];
	this.joins = [];
}

AppModel.prototype.onJoinBeginEnd = function() {

	var tmp = new JoinItem();

	tmp.leftId = this.beginItem["0"].id;
	tmp.rightId = this.endItem["0"].id;
	tmp.type = "BeginEnd";

	this.joins.push(tmp);

}
AppModel.prototype.onJoinBeginBegin = function() {
	var tmp = new JoinItem();

	tmp.leftId = this.beginItem["0"].id;
	tmp.rightId = this.endItem["0"].id;
	tmp.type = "BeginBegin";

	this.joins.push(tmp);
}

AppModel.prototype.onJoinEndBegin = function() {
	var tmp = new JoinItem();

	tmp.leftId = this.beginItem["0"].id;
	tmp.rightId = this.endItem["0"].id;
	tmp.type = "EndBegin";

	this.joins.push(tmp);
}

AppModel.prototype.onJoinEndEnd = function() {
	var tmp = new JoinItem();

	tmp.leftId = this.beginItem["0"].id;
	tmp.rightId = this.endItem["0"].id;
	tmp.type = "EndEnd";

	this.joins.push(tmp);
}

AppModel.prototype.onUnjoinItems = function() {

}

AppModel.prototype.clean = function() {
	this.beginItem = null;
	this.endItem = null;
}

AppModel.prototype.getChangesJson = function() {
	return jsonEncode(this.joins);
}

AppModel.prototype.getItems = function() {
	return this.data;
}
AppModel.prototype.setItems = function(data) {

	this.data = [];

	var tmpData = jsonDecode(data);

	if (tmpData == null) {

		for (uid in data) {

			var tmp = new TaskItem();
			var source = data[uid];

			tmp.uid = Number(source.uid);
			tmp.id = Number(source.id);
			tmp.x = Number(source.x);
			tmp.y = Number(source.y);
			tmp.width = Number(source.width);
			tmp.height = Number(source.height);
			tmp.name = String(source.name);
			tmp.position = String(source.position);
			tmp.avatar = String(source.avatar);
			tmp.fill = String(source.fill);
			tmp.stroke = String(source.stroke);

			this.data[uid] = tmp;

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

