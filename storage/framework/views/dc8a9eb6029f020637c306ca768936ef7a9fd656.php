<?php $__env->startSection('content'); ?>
<div class="mapcontainer">
    <div class="col-xs-6">
     <!--#################################################DIVIDER######################################################################-->
<div id='legend' style='display:none;'>
  <img src="<?php echo e(URL::asset('img/legendary.png')); ?>"/>
</div>
<div id='map-cluster' class='map'></div>
<div id="modalcontainer">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-body">
        <!--*********TABS**************-->
        <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-target="#table" data-toggle="tab">Table</a></li>
        <li><a data-target="#chart" data-toggle="tab">Graph(RAIN)</a></li>

      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="table">
       <!--*********TABLES**************-->
       <div id="control_label" class="alert-info text-center"><h4>TABLE INFORMATION</h4></div>
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DATE/TIME</th>
                <th>BATTERY</th>
                <th>RAIN</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
        </div>
        <div class="tab-pane" id="chart">
         <div id="control_label" class="alert-info text-center"><h4>HISTORICAL GRAPH</h4></div>
        <!--*********CHARTS**************-->
        <table class="table table-bordered" id="users-table">
        <tr>
         <div id="chart_div"></div>
         <div id="control_label" class="alert-info">DATE RANGE FILTER</div>
       <div id="control_div"></div>
        <div id='dbgchart' class="alert-info text-center"></div>
        </tr>
        </table>
        <!--*********CHARTS**************-->

        </div>
         <!--*********WLCHARTS**************-->
                <div class="tab-pane" id="wlchart">
         <div id="control_label" class="alert-info text-center"><h4>HISTORICAL GRAPH</h4></div>
        <!--*********WLCHARTS**************-->
        <table class="table table-bordered" id="users-table">
        <tr>
         <div id="wlchart_div"></div>
         <div id="control_label" class="alert-info">DATE RANGE FILTER</div>
       <div id="wlcontrol_div"></div>
        <div id='dbgwlchart' class="alert-info text-center"></div>
        </tr>
        </table>
        <!--*********WLCHARTS**************-->

        </div>
      </div>
<!--*********TABS**************-->
      </div>
        </div>
      
    </div>
  </div>
</div>
</div>
<!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
  </div>
</div>

<?php $__env->startPush('map-scripts'); ?>
<script>
var clckr;
var clusterGroup = new L.layerGroup();
L.mapbox.accessToken = 'pk.eyJ1IjoicGFnYXNhbGVnYXpwaSIsImEiOiJjaXM2M3R2eHcwY3A2Mm9sa3RicmJybXU2In0._oRLkJwo06X4W8wBXgN-ig';
var mapCluster = L.mapbox.map('map-cluster')
  .setView([16.489517, 121.134994],8)
  .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v9'));
     function loadmarkers(){
      var ler = '012345';
L.mapbox.featureLayer()
  .loadURL('<?php echo e(URL::asset('map')); ?>')
    .on('click', function(e) {
       //console.log(e.layer.feature.properties.description.site_id);
      clckr = e.layer.feature.properties.description.site_id;
      console.log(clckr);
        mapCluster.panTo(e.layer.getLatLng());
        calltable();
        drawChart();
        //drawWlChart();
        $('#myModal').modal('show');

       
  })
  .on('ready', function(e) {

    mapCluster.legendControl.addLegend(document.getElementById('legend').innerHTML);
    
//
   
    //var blgrndrp = new L.Icon({iconUrl: "<?php echo e(URL::asset('img/marker/0119.png')); ?>"});
    var blgrndrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/0119.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
        var rddrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/5h5h9.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
    var bldrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/1h1h9.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var vltdrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/2h2h9.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var ylwdrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/3h3h9.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
    var orngdrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/4h4h9.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var skbldrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/2099.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
var grydrp = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/norf.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
// VOLUMES

 var blgrndrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/0119v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
        var rddrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/5h5h9v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
    var bldrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/1h1h9v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var vltdrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/2h2h9v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var ylwdrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/3h3h9v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
    var orngdrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/4h4h9v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
   var skbldrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/2099v.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });
var grydrpv = L.Icon.extend({
    options: {
        iconUrl:  "<?php echo e(URL::asset('img/marker/norfv.png')); ?>",
        iconSize: [20,25],
        iconAnchor: [5, 20], // horizontal puis vertical
    }
    });


    e.target.eachLayer(function(layer) {
        clusterGroup.addLayer(layer);

        var rf = parseFloat(layer.feature.properties.description.rainfall);
        if(layer.feature.properties.description.dataof=="daily"){
          if((rf >= 0)&&(rf <= 0.9)){
        layer.setIcon(new grydrpv);

        }
         else if((rf >= 1)&&(rf <= 24)){
        layer.setIcon(new blgrndrpv);

        }
        else if((rf >= 25)&&(rf <= 49)){
        layer.setIcon(new skbldrpv);

        }    
        else if((rf >= 50)&&(rf <= 74)){
        layer.setIcon(new bldrpv);

        }       
        else if((rf >= 75)&&(rf <= 99)){
        layer.setIcon(new vltdrpv);

        }      
        else if((rf >= 100)&&(rf <= 124)){
        layer.setIcon(new ylwdrpv);

        } 
        else if((rf >= 125)&&(rf <= 149)){
        layer.setIcon(new orngdrpv);

        }
        else if(rf >= 150){
        layer.setIcon(new rddrpv);



        }

      }
        else{
        console.log("RF: "+ rf);
        if(rf <= 0){
        layer.setIcon(new grydrp);

        }
         else if((rf >= 0.1)&&(rf <= 1.9)){
        layer.setIcon(new blgrndrp);

        }
        else if((rf >= 2.0)&&(rf <= 9.9)){
        layer.setIcon(new skbldrp);

        }    
        else if((rf >= 10.0)&&(rf <= 19.9)){
        layer.setIcon(new bldrp);

        }       
        else if((rf >= 20.0)&&(rf <= 29.9)){
        layer.setIcon(new vltdrp);

        }      
        else if((rf >= 30.0)&&(rf <= 39.9)){
        layer.setIcon(new ylwdrp);

        } 
        else if((rf >= 40.0)&&(rf <= 49.9)){
        layer.setIcon(new orngdrp);

        }
        else if(rf >= 50.0){
        layer.setIcon(new rddrp);

        }
        layer.bindTooltip(layer.feature.properties.description.Sitename,{ direction:'left', permanent: true, opacity : 0.6, offset : L.point(10,10), className: 'myCSSClass' });
        layer.bindPopup("<h1>"+layer.feature.properties.description.Sitename+ "</h1><h2><small> Rainfall: "+layer.feature.properties.description.rainfall+"</small></h2><h2><small> As Of: "+layer.feature.properties.description.asof+"</small></h2>");
      }

        
  });
  /*$.getJSON("<?php echo e(URL::asset('geojson/keyml.geojson')); ?>", function(data) { 
  
 // dataLayer
  //addDataToMap(data, mapCluster); 
  var dataLayer ="";
  dataLayer = L.geoJson(data);
  dataLayer.setStyle({color: "#FF5500"})
  dataLayer.addTo(clusterGroup);
  }); */
//KML LAYER

  mapCluster.addLayer(clusterGroup);

});
}//loadmarkers
loadmarkers();
drawlatestable();
setInterval(function(){
    clusterGroup.clearLayers();
    console.log("refreshing data");
    loadmarkers();
     $('#latest-table').DataTable().destroy();
     $('#hourly-table').DataTable().destroy();
    drawlatestable();
    drawhourlytable();
  }, 60000);

function calltable(){

    $('#users-table').DataTable({
        destroy: true,
        ajax: '<?php echo e(URL::asset('data')); ?>'+"/"+clckr,
        columns: [
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'batteryvolt', name: 'batteryvolt' , orderable: false},
            { data: 'rvalue', name: 'rvalue' }
        ],
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}
function drawhourlytable(){

    $('#hourly-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        ajax: '<?php echo e(URL::asset('hourlydata')); ?>',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'rain', name: 'rain' }
        ]
    });
}
function drawlatestable(){
    $('#latest-table').DataTable({
         searching: false,
         paging: false,
        bSort : false, //disable datatable sorting so it is sorted by wltbm
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        "ajax": "<?php echo e(URL::asset('latestdata')); ?>",
        "columns": [
            { "data": 'Site', "name": 'name' },
            { "data": 'asof', "name": 'datetime' },
            { "data": 'rainten', "name": 'rvalue' },

        ]
    });
}
//google.load('visualization', '1', {packages: ['controls', 'charteditor']});
google.charts.load('current', {'packages':['corechart', 'controls']});
//google.setOnLoadCallback(drawChart);

function drawChart() {
  var jsonData = $.ajax({
          url:  '<?php echo e(URL::asset('laracharts')); ?>'+"/"+clckr,
          dataType: "json",
          async: false
          }).responseText;
    var data = new google.visualization.DataTable(jsonData);   
    var dash = new google.visualization.Dashboard(document.getElementById('dashboard'));
    var control = new google.visualization.ControlWrapper({
        controlType: 'ChartRangeFilter',
        containerId: 'control_div',
        options: {
            filterColumnIndex: 0,
            ui: {
                chartOptions: {
                  colors: ['#0b7701'],
                    height: 50,
                    width: 550
                }
            },
          
        }
      
        
    });
    var chart = new google.visualization.ChartWrapper({
        chartType: 'AreaChart',
        containerId: 'chart_div',
           options: {
            filterColumnIndex: 0,
            legend: { position: 'bottom' },
            ui: {
                chartOptions: {
                      height: 50,
                    width: 550,
                    chartArea: {
                        width: '80%'
                    }
                }
            },
            colors: ['#0b7701'] 
        }
    }); 
    dash.bind([control], [chart]);
    dash.draw(data);
    google.visualization.events.addListener(control, 'statechange', function () {
        var v = control.getState();
        document.getElementById('dbgchart').innerHTML = '<b>START: </b>'+v.range.start+ '<br /><b>END: </b> ' +v.range.end;
        return 0;
    });
}
/*function drawWlChart() {
  var jsonData = $.ajax({
          url:  '<?php echo e(URL::asset('wlaracharts')); ?>'+"/"+clckr,
          dataType: "json",
          async: false
          }).responseText;
    var data = new google.visualization.DataTable(jsonData);   
    var dash = new google.visualization.Dashboard(document.getElementById('dashboard'));
    var control = new google.visualization.ControlWrapper({
        controlType: 'ChartRangeFilter',
        containerId: 'wlcontrol_div',
        options: {
            filterColumnIndex: 0,
            ui: {
                chartOptions: {
                   colors: ['#42b6f4'],
                    height: 50,
                    width: 550
                }
            },
         
        },
 
        
    });
    var chart = new google.visualization.ChartWrapper({
        chartType: 'AreaChart',
        containerId: 'wlchart_div',
           options: {
            filterColumnIndex: 0,
            legend: { position: 'bottom' },
            ui: {
                chartOptions: {
                      height: 50,
                    width: 550,
                    chartArea: {
                        width: '80%'
                    }
                }
            },
            colors: ['#42b6f4']
        }
    }); 
    dash.bind([control], [chart]);
    dash.draw(data);
    google.visualization.events.addListener(control, 'statechange', function () {
        var v = control.getState();
        document.getElementById('dbgwlchart').innerHTML = '<b>START: </b>'+v.range.start+ '<br /><b>END: </b> ' +v.range.end;
        return 0;
    });
}*/
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>