@extends('masterdesign')


@section('content')
    <div class="container">
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
       <div id="control_label" class="alert-info text-center"><h1>TABLE INFORMATION</h1></div>
         <label for="csv_file" class="col-md-4 control-label">DATE RANGE FOR SPECIFIC DATES</label>

                                <div class="col-md-6">

                                   <input type="text" id="hstpicker" />

                                </div>
        <button type="submit" class="btn ">UPDATE</button>
        <!--specific date-->
        <!--specific date-->
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
         <div id="control_label" class="alert-info text-center"><h1>HISTORICAL GRAPH</h1></div>
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
         <div id="control_label" class="alert-info text-center"><h1>HISTORICAL GRAPH</h1></div>
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

<!--#############################MODAL END##########################-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                 <label class="col-md-4 control-label">Select Site:</label>
                                <div class="col-md-6">
                                 <select class="form-control" id="sel1">
                                    @foreach($siteinfo as $siteinfos)
                                      <option>{{$siteinfos->name}} || {{$siteinfos->id}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>

                            
                                <label for="csv_file" class="col-md-4 control-label">SELECT DATE RANGE</label>

                                <div class="col-md-6">

                                   <input type="text" id="datepicker" />

                                </div>
                            

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('map-scripts')
<script>
  $(function() {
    $("#datepicker" ).daterangepicker();
    console.log("date picker log");
  });
  </script>
@endpush

@stop