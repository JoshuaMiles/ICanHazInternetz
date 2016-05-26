function load() {
    var map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(-27.4710, 153.0234),
      zoom: 13,
      mapTypeId: 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP file
    downloadUrl("createMapMarkers.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var name = markers[i].getAttribute("name");
        var address = markers[i].getAttribute("address");
        var suburb = markers[i].getAttribute("suburb");
        var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("long")));
        var html = "<b>" + name + "</b> <br/>" + address;
        //var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
          map: map,
          position: point
        });
        bindInfoWindow(marker, map, infoWindow, html);
      }
    });
  }

  function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }

  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }
  function doNothing() {}
