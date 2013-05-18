/**
 * @author Marcin
 */

var App = undefined;

function OnAppReady() {
	App = new AppController();
	App.downloadItems();
	App.view.loadDemo();
}

function AppController() {
	this.model = new AppModel();
	this.view = new AppView();
}

AppController.prototype.downloadItems = function() {

	var jqxhr = $.get("http://obraniak.eu/gantter/dev/plugin/api/api.php?method=load_project", onLoadSuccess).fail(function() {
		onLoadError();
	});

}
function onLoadError() {
	alert("Error occured durnning load items from server");
}

function onLoadSuccess(data) {

	App.model.setItems(data);

	App.view.showItems(App.model.items);
}
