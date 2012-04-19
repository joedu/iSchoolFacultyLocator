<?php


function head()
{

	
echo "
	<html>
	<head>
		<script src=\"http://maps.google.com/maps?file=api&v=2&key=AIzaSyAaOtPkOlgUvybR86W8GbRtnGYc1rE8b-M\"
	          type=\"text/javascript\"></script>

	  <script type=\"text/javascript\">


	  var iconBlue = new GIcon(); 
	  iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
	  iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
	  iconBlue.iconSize = new GSize(12, 20);
	  iconBlue.shadowSize = new GSize(22, 20);
	  iconBlue.iconAnchor = new GPoint(6, 20);
	  iconBlue.infoWindowAnchor = new GPoint(5, 1);

	  var iconRed = new GIcon(); 
	  iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
	  iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
	  iconRed.iconSize = new GSize(12, 20);
	  iconRed.shadowSize = new GSize(22, 20);
	  iconRed.iconAnchor = new GPoint(6, 20);
	  iconRed.infoWindowAnchor = new GPoint(5, 1);

	  var customIcons = [];
	  customIcons[\"restaurant\"] = iconBlue;
	  customIcons[\"bar\"] = iconRed;

	  function load() {
	    if (GBrowserIsCompatible()) {
	      var map = new GMap2(document.getElementById(\"map\"));
	      map.addControl(new GSmallMapControl());
	      map.addControl(new GMapTypeControl());
	      map.setCenter(new GLatLng(47.614495, -122.341861), 13);

	      GDownloadUrl(\"projectphp/phpsqlajax_genxml.php\", function(data) {
	        var xml = GXml.parse(data);
	        var markers = xml.documentElement.getElementsByTagName(\"marker\");
	        for (var i = 0; i < markers.length; i++) {
	          var name = markers[i].getAttribute(\"name\");
	          var address = markers[i].getAttribute(\"address\");
	          var profFName = markers[i].getAttribute(\"profFName\");
	           var profLName = markers[i].getAttribute(\"profLName\");
	          var type = markers[i].getAttribute(\"type\");
	          var point = new GLatLng(parseFloat(markers[i].getAttribute(\"lat\")),
	                                  parseFloat(markers[i].getAttribute(\"lng\")));
	          var marker = createMarker(point, name, address, profFName, profLName, type);
	          map.addOverlay(marker);
	        }
	      });
	    }
	  }

	  function createMarker(point, name, address, profFName, profLName, type) {
	    var marker = new GMarker(point, customIcons[type]);
	    var html = \"<b>\" + name + \"</b> <br/>\" + address + \"<br><br>\" + profFName + profLName;
	    GEvent.addListener(marker, 'click', function() {
	      marker.openInfoWindowHtml(html);
	    });
	    return marker;
	  }

	</script>

	<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">
	</head>

	<body onload=\"load()\" onunload=\"GUnload()\">
		<center>
			<br><br>
		<div id=\"header\">

		</div>
	<div id=\"navigation\">

		<a id=\"home\" href=\"index.php\"></a>
		<a id=\"faculty\" href=\"faculty.php\"></a>
		<a id=\"map2\" href=\"map.php\"></a>
		<a id=\"checkin\" href=\"checkin.php\"></a>

		</div>

		<div id=\"content\">
";


}





function tail()
{

echo "
</div></body></html>
";




}

?>