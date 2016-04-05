function initialize(){
       var center= new google.maps.LatLng(10.012869,76.328802);
       var myOptions = {
                zoom: 18,
                center: center,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.HYBRID
       }     
      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
      var polylineCoordinates = [
            new google.maps.LatLng(10.013566,76.331549),
            new google.maps.LatLng(10.013566,76.331463),
            new google.maps.LatLng(10.013503,76.331313),
            new google.maps.LatLng(10.013482,76.331205),
            new google.maps.LatLng(10.013419,76.330926),
			new google.maps.LatLng(10.013334,76.330712),
			new google.maps.LatLng(10.013313,76.330411),
			new google.maps.LatLng(10.013292,76.330175),
			new google.maps.LatLng(10.013228,76.329854),
			new google.maps.LatLng(10.013144,76.329553),
			new google.maps.LatLng(10.013059,76.329296),
			new google.maps.LatLng(10.012996,76.329017),
			new google.maps.LatLng(10.012869,76.328802),
			new google.maps.LatLng(10.012785,76.328545),
			new google.maps.LatLng(10.012700,76.328223),
			new google.maps.LatLng(10.012679,76.328030),
			new google.maps.LatLng(10.012658,76.327837),
			new google.maps.LatLng(10.012637,76.327600),
			new google.maps.LatLng(10.012573,76.327322),
			new google.maps.LatLng(10.012552,76.327043),
			new google.maps.LatLng(10.012552,76.326807),
			new google.maps.LatLng(10.012510,76.326613),
			new google.maps.LatLng(10.012447,76.326399),
			new google.maps.LatLng(10.012404,76.326227),
      ];
      
      var polyline = new google.maps.Polyline({
          path: polylineCoordinates,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2,
          editable: true
      });

      polyline.setMap(map);    

}

    

initialize();
