<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div id="modalcontainer">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
       

        <div class="modal-body">
        <!--*********TABS**************-->
      <ul class="nav nav-tabs" id="myTab">
        <li><a data-target="#table" data-toggle="tab">Table</a></li>
        <li><a data-target="#wlchart" data-toggle="tab">Level Chart</a></li>
        <li><a data-target="#dschart" data-toggle="tab">Discharge Chart</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="table">
       <!--*********TABLES**************-->
       <div id="control_label" class="alert-info text-center"><h1>TABLE INFORMATION</h1></div>
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DATE/TIME</th>
                <th>BATTERY</th>
                <th>RAW LEVEL</th>
                <th>WATER LEVEL</th>
                <th>DISCHARGE</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
        </div>

         <!--*********WLCHARTS**************-->
        <div class="tab-pane" id="wlchart">
         <div id="control_label" class="alert-info text-center"><h1>LEVEL GRAPH</h1></div>
        <!--*********WLCHARTS**************-->
       <div id="wlcontrol_div" style="width: 1000px; height: 700px; "></div>

        </div>


        <div class="tab-pane" id="dschart">
         <div id="control_label" class="alert-info text-center"><h1>DISCHARGE GRAPH</h1></div>
        <!--*********WLCHARTS**************-->
        
       <div id="dscontrol_div" style="width: 1000px; height: 700px; "></div>

        </div>


      </div>
<!--*********TABS**************-->
      </div>
        </div>
      
    </div>
  </div>
</div>

</div>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">HISTORICAL WATER LEVEL DATA</div>

                    <div class="panel-body">
                      

                            <div class="form-group">
                                 <label class="col-md-4 control-label">Select Site:</label>
                                <div class="col-md-6">
                                 <select class="form-control" id="sel1" name="sitename">
                                    <?php $__currentLoopData = $siteinfowlevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <option><?php echo e($siteinfos->name); ?> || <?php echo e($siteinfos->id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </select>
                                </div>
                            </div>
                            
<br />
<br />
<br />


                            <div class="form-group">
                               <label for="csv_file" class="col-md-4 control-label">SELECT DATE RANGE</label>

                                <div class="col-md-6">

                                   <input type="text" name="daterange" id="datepicker" />

                                </div>
                            </div>
<br />
<br />
<br />

                           
                            


                             
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->startPush('map-scripts'); ?>
<script>
$(document).ready(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();
    var formattedDate;

    function cb(start, end) {
        $('#datepicker span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
    }

    $('#datepicker').daterangepicker({
        startDate: start,
        endDate: end,
        locale: { 
            format: 'YYYY/MM/DD'
                },
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
$('#datepicker').on('apply.daterangepicker', function(ev, picker) {
            
            RNcalltable();
            drawWlChart();
            drawDsChart();
            $('#myModal').modal('show');

});



function RNcalltable(){
    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();
    console.log(siterangestring);
    console.log(daterangestring);
    $('#users-table').DataTable({
        destroy: true,
        ajax: {
            "url": '<?php echo e(URL::asset('hstry/update')); ?>',
            "data" : {
                "_token": "<?php echo e(csrf_token()); ?>",
                daterange: daterangestring, 
                sitename: siterangestring
            },
            "type": "POST"
        },
        columns: [
            { data: 'Site', name: 'Site' },
            { data: 'asof', name: 'asof' },
            { data: 'voltage', name: 'voltage' , orderable: false},
            { data: 'rawlvl', name: 'rawlvl' },
            { data: 'water', name: 'water' },
            { data: 'discharge', name: 'discharge' },
        ], 
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}

function drawWlChart() {


    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();

    var sitenm = siterangestring.split('||');
    var fnsitenm = sitenm[0];
    var fnsiteid = sitenm[1];


    var dataPoints = [];
    var chart = new CanvasJS.Chart("wlcontrol_div",{
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text:"Water Level Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "spline",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }]
});
    $.post('<?php echo e(URL::asset('hstrywlevel/chartlvl')); ?>',{ 

                "_token": "<?php echo e(csrf_token()); ?>",
                daterange: daterangestring, 
                sitename: siterangestring

    }, function(data) {  
        $.each(data, function(key, value){
        dataPoints.push({
            x: new Date(value.x),
            y: parseFloat(value.y)
            });
        console.log(value);
         }); 
    //to check if bootstrap tabs is loaded beore loading the chart
        $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
                if(x=="Level Chart"){
                        chart.render();
                }
        });

},"json");

}
function drawDsChart() {


    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();

    var sitenm = siterangestring.split('||');
    var fnsitenm = sitenm[0];
    var fnsiteid = sitenm[1];


    var dataPoints = [];
    var maxval = [];
    var minval;
    var arry = [];
    var arrx = [];
    var chart = new CanvasJS.Chart("dscontrol_div",{
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text:"Discharge Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "spline",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }],
      axisY:maxval,
});
    $.post('<?php echo e(URL::asset('hstrywlevel/chartdsc')); ?>',{ 

                "_token": "<?php echo e(csrf_token()); ?>",
                daterange: daterangestring, 
                sitename: siterangestring

    }, function(data) {  
        $.each(data, function(key, value){
        dataPoints.push({
            x: new Date(value.x),
            y: parseFloat(value.y)
            });

         arrx.push(value.x);
         arry.push(value.y);

         }); 
         maxval.push({
            minimum:  parseFloat(Math.min.apply(Math,arry)),
            maximum: parseFloat(Math.max.apply(Math,arry))
            });
         console.log(maxval);
    //to check if bootstrap tabs is loaded beore loading the chart
        $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
                if(x=="Discharge Chart"){
                        chart.render();
                }
        });

},"json");

}

        $(".modal").on("hidden.bs.modal", function(){
                $('#table').trigger('click');
                console.log("active");
            });
  });

  



  
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>