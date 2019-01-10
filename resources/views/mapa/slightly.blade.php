@extends('masterdesign')


@section('content')
<script>
            function onLoad() {

                var mymap = L.map('mapid').setView([16.904276, 121.798675], 9);
                var geojsonLayer = new L.GeoJSON.AJAX('{{URL::asset('wlmap')}}');       



                L.tileLayer("{{URL::asset('img/maps/offline/{z}/{x}/{y}.png')}}",
                {    maxZoom: 16  }).addTo(mymap);

                geojsonLayer.addTo(mymap);
        }
        </script>   
    </head>
    <body onload="onLoad();"> 
        <div id="mapid" style="height: 500px;"></div>
    </body>
@stop