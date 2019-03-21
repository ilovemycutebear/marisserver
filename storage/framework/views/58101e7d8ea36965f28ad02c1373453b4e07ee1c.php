<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h1>LATEST DATA(RAIN)</h1></div>
        <table class="table table-bordered" id="latest-tablern">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
                <th>DATE/TIME</th>
                <th>RAIN<br>10 MINS</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
       <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h1>DAILY DATA(RAIN)</h1></div>
        <table class="table table-bordered" id="hourly-tablern">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
                <th>RAIN<br>24 HRS</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
<!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h1>LATEST DATA (WATER LEVEL)</h1></div>
        <table class="table table-bordered" id="latest-tablewl">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
                <th>CREATED AT</th>
                <th>WL</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
       <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h1>HOURLY DATA (WATER LEVEL)</h1></div>
        <table class="table table-bordered" id="hourly-tablewl">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
                <th>AVERAGE LEVEL<br>1 HR</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
         <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h1>WARNINGS</h1></div>
        <table class="table table-bordered" id="table-warningwrn">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
                <th>ALERT</th>
                <th>ALARM</th>
                <th>CRITICAL</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
</div>

<?php $__env->startPush('map-scripts'); ?>
<script>
drawlatestable();
warningtable();
drawhourlytable();

drawlatestablern();
drawhourlytablern();
setInterval(function(){
    //clusterGroup.clearLayers();
    //console.log("refreshing data");
    //loadmarkers();
     $('#latest-table').DataTable().destroy();
     $('#hourly-table').DataTable().destroy();
    $('#latest-tablern').DataTable().destroy();
     $('#hourly-tablern').DataTable().destroy();
    drawlatestable();
    drawhourlytable();
    drawlatestablern();
    drawhourlytablern();
  }, 60000);
function calltablern(){

    $('#users-tablern').DataTable({
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
function drawhourlytablern(){

    $('#hourly-tablern').DataTable({
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
function drawlatestablern(){
    $('#latest-tablern').DataTable({
        destroy: true,
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
function calltable(){

    $('#users-tablewl').DataTable({
        destroy: true,
        ajax: '<?php echo e(URL::asset('wldata')); ?>'+"/"+clckr,
        columns: [
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'batteryvolt', name: 'batteryvolt' , orderable: false},
            { data: 'wlevel', name: 'wlevel' }
        ], 
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}
function warningtable(){
    $('#table-warningwrn').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        bSort : false,
        paging: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        ajax: '<?php echo e(URL::asset('editalerts')); ?>',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'wlalert', name: 'wlalert' },
             { data: 'wlalarm', name: 'wlalarm' },
              { data: 'wlcritical', name: 'wlcritical' }
        ]
    });
}
function drawhourlytable(){

    $('#hourly-tablewl').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        bSort : false,
        paging: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        ajax: '<?php echo e(URL::asset('wlhourlydata')); ?>',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'water', name: 'water' }
        ]
    });
}
function drawlatestable(){

    $('#latest-tablewl').DataTable({
        destroy: true,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
          bSort : false, //disable datatable sorting so it is sorted by wltbm
         searching: false,
         paging: false,
        "ajax": "<?php echo e(URL::asset('wllatestdata')); ?>",
        "columns": [
            { "data": 'Site', "name": 'Site' },
            { "data": 'asof', "name": 'asof' },
            { "data": 'water', "name": 'water' },


       ],        
    });
}
//google.load('visualization', '1', {packages: ['controls', 'charteditor']});

</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>