/**
 * @author Marcin
 */

var App = undefined;
var isLocal = false;

var debug = function() {
};
if (window.console != undefined) {
	debug = console.log;
}

function OnAppReady() {
	App = new AppController();
	App.downloadItems();

	$('#btnUnjoin').click(onUnjoinItems);
	$('#btnSave').click(onSaveChanges);

	$('#btnJoinBeginEnd').click(onJoinBeginEnd);
	$('#btnJoinBeginBegin').click(onJoinBeginBegin);
	$('#btnJoinEndBegin').click(onJoinEndBegin);
	$('#btnJoinEndEnd').click(onJoinEndEnd);
	$('#btnClean').click(onClean);
}

function getUrl(subUrl) {

	if (!isLocal) {
		return 'http://obraniak.eu/gantter/dev/' + subUrl;
	}
	return 'http://localhost/plugin/' + subUrl;
}

function AppController() {
	this.model = new AppModel();
	this.view = new AppView();
}

AppController.prototype.downloadItems = function() {

	$.ajax({
		url : getUrl('plugin/api/api.php?method=load_project'),
		type : 'GET',
		success : onDownloadSuccess,
		error : onDownloadError
	});

}

AppController.prototype.uploadItems = function() {

	var upload_data = '{"changes":';
	upload_data += (App.model.getChangesJson());
	upload_data += '}';

	$.ajax({
		type : 'POST',
		url : getUrl('plugin/api/api.php?method=upload_changes'),
		data : upload_data,
		success : onUploadSuccess,
		error : onUploadError
	});

}
function onUploadError(data) {
	alert("Error occured durnning load items from server" + data);
}

function onUploadSuccess(data) {
	$('#projectXML').val(data);
}

function onDownloadError(data) {
	alert("Error occured durnning load items from server" + data);
}

function onDownloadSuccess(data) {

	App.model.setItems(data);

	App.view.showItems(App.model.getItems());
}

function onItemClick() {

	if (App.model.beginItem == null) {
		App.model.beginItem = this;
		debug(App.model.beginItem["0"].id)
	} else {
		if (App.model.endItem == null) {
			App.model.endItem = this;
			debug(App.model.endItem["0"].id)
		}
	}
}

function onClean() {
	App.model.clean();
}

function onJoinBeginEnd() {
	App.view.onJoinBeginEnd(App.model.beginItem, App.model.endItem);
	App.model.onJoinBeginEnd();
	App.model.clean();
}

function onJoinBeginBegin() {
	App.view.onJoinBeginBegin(App.model.beginItem, App.model.endItem);
	App.model.onJoinBeginBegin();
	App.model.clean();
}

function onJoinEndBegin() {
	App.view.onJoinEndBegin(App.model.beginItem, App.model.endItem);
	App.model.onJoinEndBegin();
	App.model.clean();
}

function onJoinEndEnd() {
	App.view.onJoinEndEnd(App.model.beginItem, App.model.endItem);
	App.model.onJoinEndEnd();
	App.model.clean();
}

function onUnjoinItems() {
	App.view.onUnjoinItems(App.model.beginItem, App.model.endItem);
	App.model.onUnjoinItems();
	App.model.clean();
}

function onSaveChanges() {
	App.uploadItems();
	App.model.clean();
}