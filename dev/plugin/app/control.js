/**
 * @author Marcin
 */

var App = undefined;
var isLocal = true;

function OnAppReady() {
	App = new AppController();
	App.downloadItems();
	App.view.loadDemo();
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

	App.view.showItems(App.model.items);
}
