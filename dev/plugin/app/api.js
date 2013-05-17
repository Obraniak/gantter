/**
 * @author Marcin
 */
function download_items() {

	var jqxhr = $.get("http://obraniak.eu/gantter/dev/plugin/api/api.php?method=load_project", add_items, "json").fail(function() {
		alert("Error http://obraniak.eu/gantter/dev/plugin/api/api.php?method=load_project");
	});
}

function add_items(data) {

	var org = Joint.dia.org;
	Joint.paper("items", 1000, 550);

	var obj = new Array();

	for (var i = 0; i < data.length; i++) {

		var tmp = data[i];

		var item = org.Member.create({
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

		obj.push(item);

	}

}

// bart.joint(marge, org.arrow);
// homer.joint(marge, org.arrow);
// marge.joint(lisa, org.arrow);
//
// marge.joint(maggie, org.arrow).setVertices(['375 380']);
// homer.joint(lenny, org.arrow).setVertices(['165 380']);
// homer.joint(carl, org.arrow).setVertices(['165 530']);
