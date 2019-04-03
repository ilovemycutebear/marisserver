@extends('masterdesign')


@section('content')
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
        <li><a data-target="#wlchart" data-toggle="tab">Rain Chart</a></li>
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
                <th>RAIN</th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
        </div>

         <!--*********WLCHARTS**************-->
        <div class="tab-pane" id="wlchart">
         <div id="control_label" class="alert-info text-center"><h1>HISTORICAL GRAPH</h1></div>
        <!--*********WLCHARTS**************-->
        
       <div id="wlcontrol_div" style="width: 1000px; height: 700px; "></div>

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
                    <div class="panel-heading">HISTORICAL RAIN DATA</div>

                    <div class="panel-body">
                      

                            <div class="form-group">
                                 <label class="col-md-4 control-label">Select Site:</label>
                                <div class="col-md-6">
                                 <select class="form-control" id="sel1" name="sitename">
                                    @foreach($siteinfo as $siteinfos)
                                      <option>{{$siteinfos->name}} || {{$siteinfos->id}}</option>
                                    @endforeach
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

                            <div class="form-group">
                                <div class="col-md-6">
                                   <button type="submit" class="btn btn-primary" id="isubmit">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                            


                             
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('map-scripts')
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
            drawRnChart();
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
            "url": '{{URL::asset('hstry/update')}}',
            "data" : {
                "_token": "{{ csrf_token() }}",
                daterange: daterangestring, 
                sitename: siterangestring
            },
            "type": "POST"
        },
        columns: [
            { data: 'Site', name: 'Site' },
            { data: 'asof', name: 'asof' },
            { data: 'voltage', name: 'voltage' , orderable: false},
            { data: 'rainten', name: 'rainten' }
        ], 
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}

function drawRnChart() {


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
        text:"RAIN Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "spline",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }]
});
    $.post('{{URL::asset('hstry/chart')}}',{ 

                "_token": "{{ csrf_token() }}",
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
                if(x=="Rain Chart"){
                        chart.render();
                }
        });

},"json");

}
    
  });

  



  
  </script>
@endpush

@stop