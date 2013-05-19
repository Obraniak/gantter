/**
 * @author Marcin
 */

var App = undefined;
var isLocal = true;

function OnAppReady() {
	App = new AppController();
	App.downloadItems();

	$('#btnUnjoin').click(onUnjoinItems);
	$('#btnSave').click(onSaveChanges);

	$('#btnJoinBeginEnd').click(onJoinBeginEnd);
	$('#btnJoinBeginBegin').click(onJoinBeginBegin);
	$('#btnJoinEndBegin').click(onJoinEndBegin);
	$('#btnJoinEndEnd').click(onJoinEndEnd);
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
function onDownloadError(data) {
	alert("Error occured durnning load items from server" + data);
}

function onDownloadSuccess(data) {

	App.model.setItems(data);

	App.view.showItems(App.model.getItems());
}

function onJoinBeginEnd() {
	alert("onJoinBeginEnd click");
}

function onJoinBeginBegin() {
	alert("onJoinBeginBegin click");
}

function onJoinEndBegin() {
	alert("onJoinEndBegin click");
}

function onJoinEndEnd() {
	alert("onJoinEndEnd click");
}

function onUnjoinItems() {
	alert("onUnjoinItems click");
}

function onSaveChanges() {
	alert("onSaveChanges click");
}