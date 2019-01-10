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
        <li class="active"><a data-target="#table" data-toggle="tab">Table</a></li>
        <li><a data-target="#wlchart" data-toggle="tab">Graph(WATER LEVEL)</a></li>

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
                <th>WATER LEVEL</th>
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
  <!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h4>RAIN</h4></div>
        <table class="table table-bordered" id="latest-tablern">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
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
       <div id="table_latest" class="alert-info text-center"><h4>WATER LEVEL</h4></div>
        <table class="table table-bordered" id="latest-tablewl">
        <thead>
            <tr class="bg-primary">
                <th>SITE NAME</th>
            </tr>
        </thead>
       </table>
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
</div>

<?php $__env->startPush('map-scripts'); ?>
<script>
drawlatestablrn();
drawlatestablewl();

function drawlatestablrn(){
    $('#latest-tablern').DataTable({
         searching: false,
         paging: false,
        bSort : false, //disable datatable sorting so it is sorted by wltbm
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        "ajax": "<?php echo e(URL::asset('dttbldetailsrn')); ?>",
        "columns": [
            { "data": 'Site', "name": 'name' },

        ]
    });
}
function drawlatestablewl(){

   wlTable = $('#latest-tablewl').DataTable({
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
          bSort : false, //disable datatable sorting so it is sorted by wltbm
         searching: false,
         paging: false,
        "ajax": "<?php echo e(URL::asset('dttbldetails')); ?>",
        "columns": [
            { "data": 'Site', "name": 'Site' },
       ],        
    });
    $('#latest-tablewl tbody').on('click', 'tr', function () {

    var data = wlTable.row( this ).data();

    alert( 'You clicked on '+data[0]+'\'s row' );

} );

}
//google.load('visualization', '1', {packages: ['controls', 'charteditor']});

</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>