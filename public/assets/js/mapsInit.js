/**
 * Test data for the demonstration
 */

var markerDetails =[
        {
        	lat:-12.043333,
	        lng: -77.03,
	        title: 'Lima',
	        infoWindow: {
	            content: 'Content for marker'
	        }
        },
        {
        	lat: -12.043361,
            lng: -77.0345,
            title: 'LimaX',
            infoWindow: {
	            content: 'Content for marker'
	        }
        }
    ];
    

var path = [[-12.044012922866312, -77.02470665341184], [-12.05449279282314, -77.03024273281858], [-12.055122327623378, -77.03039293652341], [-12.075917129727586, -77.02764635449216], [-12.07635776902266, -77.02792530422971], [-12.076819390363665, -77.02893381481931], [-12.088527520066453, -77.0241058385925], [-12.090814532191756, -77.02271108990476]];

/**
 * End of test data
 */

var map;


function createMap(element, center){
	
	mapOptions = {
	        el: element,
	        lat: center.latitude,
	        lng: center.longitude,
	        zoomControl: true,
	        zoomControlOpt: {
	            style: 'SMALL',
	            position: 'TOP_LEFT'
	        },
	        panControl: false,
	        streetViewControl: false,
	        mapTypeControl: false,
	        overviewMapControl: false
	    };
	
	map = new GMaps(mapOptions);
	
	return map;
}

function addMarker(map, markerDetails){
	for(marker in markerDetails){
		map.addMarker(markerDetails[marker]);
	}
}

function drawPolyLine(map , path){
	
	alert("called");
	map.drawPolyline({
        path: path,
        strokeColor: '#131540',
        strokeOpacity: 0.6,
        strokeWeight: 6
    });
	alert("call finished");
}

function MapsInit() {
    "use strict";
    
    
    var  map2, map3, map4, map5, map6, path;

    var center = {latitude:-12.043333,longitude:-77.028333};
    
    map = createMap('#gmaps-basic', center);
    
    addMarker(map, markerDetails);
   
    map2 = new GMaps({
        el: '#gmaps-marker',
        lat: -12.043333,
        lng: -77.028333
    });
    
    map2.addMarker({
        lat: -12.043333,
        lng: -77.03,
        title: 'Lima',
        details: {
            database_id: 42,
            author: 'HPNeo'
        },
        click: function (e) {
            if (console.log)
                console.log(e);
            alert('You clicked in this marker');
        },
        mouseover: function (e) {
            if (console.log)
                console.log(e);
        }
    });
    map2.addMarker({
        lat: -12.042,
        lng: -77.028333,
        title: 'Marker with InfoWindow',
        infoWindow: {
            content: '<p>HTML Content</p>'
        }
    });

    map3 = new GMaps({
        el: '#gmaps-geolocation',
        lat: -12.043333,
        lng: -77.028333
    });

    GMaps.geolocate({
        success: function (position) {
            map3.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function (error) {
            alert('Geolocation failed: ' + error.message);
        },
        not_supported: function () {
            alert("Your browser does not support geolocation");
        },
        always: function () {
            //alert("Done!");
        }
    });

    map4 = new GMaps({
        el: '#gmaps-polylines',
        lat: -12.043333,
        lng: -77.028333,
        click: function (e) {
            console.log(e);
        }
    });

    path = [[-12.044012922866312, -77.02470665341184], [-12.05449279282314, -77.03024273281858], [-12.055122327623378, -77.03039293652341], [-12.075917129727586, -77.02764635449216], [-12.07635776902266, -77.02792530422971], [-12.076819390363665, -77.02893381481931], [-12.088527520066453, -77.0241058385925], [-12.090814532191756, -77.02271108990476]];

    map4.drawPolyline({
        path: path,
        strokeColor: '#131540',
        strokeOpacity: 0.6,
        strokeWeight: 6
    });

    map5 = new GMaps({
        el: '#gmaps-route',
        lat: -12.043333,
        lng: -77.028333
    });
    map5.drawRoute({
        origin: [-12.044012922866312, -77.02470665341184],
        destination: [-12.090814532191756, -77.02271108990476],
        travelMode: 'driving',
        strokeColor: '#131540',
        strokeOpacity: 0.6,
        strokeWeight: 6
    });

    map6 = new GMaps({
        el: '#gmaps-geocoding',
        lat: -12.043333,
        lng: -77.028333
    });
    $('#geocoding_form').submit(function (e) {
        e.preventDefault();
        GMaps.geocode({
            address: $('#address').val().trim(),
            callback: function (results, status) {
                if (status === 'OK') {
                    var latlng = results[0].geometry.location;
                    map6.setCenter(latlng.lat(), latlng.lng());
                    map6.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                }
            }
        });
    });

}