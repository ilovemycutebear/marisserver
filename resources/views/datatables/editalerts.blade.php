@extends('masterdesign')


@section('content')
<!--**************************************MODAL********************************************-->
<div id="modalcontainer">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-body">
        <!--*********TABS**************-->
        <ul class="nav nav-tabs" id="myTab">
               <div id="table_latest" class="alert-success text-center"><h4>EDIT INFORMATION</h4></div>

      </ul>
      <form method= "POST" action= "editinfo/update">
      {{ csrf_field() }}
      <div class='form-group' >
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ID'>ID</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamea'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

      <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SITENAME'>SITENAME</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameb'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SUBNAME'>SUB NAME</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamec'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='LAT'>LATTITUDE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamed'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='LONGTITUDE'>LONGTITUDE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamee'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SITELEV'>ELEVATION</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamef'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SENSORTYPE'>TYPE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameg'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ALERT'>ALERT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameh'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ALARM'>ALARM</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamei'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

              <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='CRITICAL'>CRITICAL</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamej'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='CREATED_AT'>CREATED_AT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamek'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='UPDATED_AT'>UPDATED_AT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamel'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='PIC'>PIC</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamem'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='B_CONSTANT'>B_VARIABLE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamen'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='WLEVEL_ZERO'>WLEVEL_ZERO</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameo'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='A_VARIABLE'>A_VARIABLE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamep'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>
    
<!--*********TABS**************-->
   

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
      </form>
        </div>
      </div>
    </div>

  </div>

  <!--add modal-->

    <div class="modal fade" id="myAddModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-body">
        <!--*********TABS**************-->
        <ul class="nav nav-tabs" id="myTab">
               <div id="table_latest" class="alert-success text-center"><h4>EDIT INFORMATION</h4></div>

      </ul>
      <form method= "POST" action= "editinfo/add">
      {{ csrf_field() }}
      <div class='form-group' >
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ID'>ID</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamea'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

      <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SITENAME'>SITENAME</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameb'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SUBNAME'>SUB NAME</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamec'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='LAT'>LATTITUDE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamed'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='LONGTITUDE'>LONGTITUDE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamee'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SITELEV'>ELEVATION</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamef'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='SENSORTYPE'>TYPE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameg'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ALERT'>ALERT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameh'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

            <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='ALARM'>ALARM</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamei'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

              <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='CRITICAL'>CRITICAL</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamej'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='CREATED_AT'>CREATED_AT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamek'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='UPDATED_AT'>UPDATED_AT</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamel'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='PIC'>PIC</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamem'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='B_CONSTANT'>B_VARIABLE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamen'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='WLEVEL_ZERO'>WLEVEL_ZERO</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnameo'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>

                  <div class='form-group'>
      <div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'>
      <label for='A_VARIABLE'>A_VARIABLE</label>
      </div>
      <div class='col-sm-9 col-md-9 col-lg-9 plchldrnamep'>
      
      </div>
      <div style='clear:both;'> 
      </div>
      </div>
    
<!--*********TABS**************-->
   

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">ADD SITE</button>
      </div>
      </form>
        </div>
      </div>
    </div>

  </div>
  <!--add modal-->
</div>


<!--**************************************MODAL********************************************-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-info text-center"><h4>SITE INFORMATION</h4></div>
        <table class="table table-bordered" id="inform-table">
       </table>
        <!--*********TABLES**************-->
@push('map-scripts')
<script>
$( document ).ready(function() {
   edittableofInfo();
});
function edittableofInfo(){
   var table = $('#inform-table').DataTable({
        processing: true,
         searching: false,
         paging: false,
        "ajax": "{{URL::asset('editalerts')}}",
          "columns": [
            { "data": 'id', "name": 'id', "title":'ID' },
            { "data": 'name', "name": 'name', "title":'SITE NAME' },
            { "data": 'subname', "name": 'subname', "title":'SUB NAME' },
            { "data": 'sitelat', "name": 'lat', "title":'LAT' },
            { "data": 'sitelong', "name": 'long' ,"title":'LONG' },
            { "data": 'sitelev', "name": 'sitelev' ,"title":'ELEVATION' },
            { "data": 'sensortype', "name": 'sensortype' ,"title":'TYPE' },
             { "data": 'wlalert', "name": 'alert', "title":'ALERT' },
            { "data": 'wlalarm', "name": 'alarm', "title":'ALARM' },
           { "data": 'wlcritical', "name": 'critical', "title":'CRITICAL' },
           { "data": 'created_at', "name": 'created_at', "title":'CREATED_AT' },
           { "data": 'updated_at', "name": 'updated_at', "title":'UPDATED_AT' },
           { "data": 'pic', "name": 'pic', "title":'PIC' },
           { "data": 'Bconstant', "name": 'Bconstant', "title":'B_VARIABLE' },
           { "data": 'Wlevelzero', "name": 'Wlevelzero', "title":'WLEVEL_ZERO' },
           { "data": 'Avariable', "name": 'Avariable', "title":'A_VARIABLE' },
        ],
    "dom": 'Bfrtip',        // element order: NEEDS BUTTON CONTAINER (B) ****
    "select": 'single',     // enable single row selection
    "responsive": true,     // enable responsiveness
    "altEditor": true,      // Enable altEditor ****
    buttons: [{
            text: 'Add',
            name: 'add',        // do not change name
                   action: function () {
                        var data = "";
                         var datab = "";
                          var datac = "";
                           var datad = "";
                            var datae = "";
                             var dataf = "";
                              var datag = "";
                               var datah = "";
                               var datai = "";
                               var dataj = "";
                               var datak = "";
                               var datal = "";
                               var datam = "";
                               var datan = "";
                               var datao = "";
                               var datap = "";
                         

                    $('#myAddModal').modal('show');
                    $('#myAddModal').on('shown.bs.modal', function () {
                      dataa = "<input type='text'  id='siteid1' name='siteid' placeholder='ID AUTO ASSIGN' style='overflow:hidden'  readonly = 'readonly' class='form-control  form-control-sm' value=''>";

                        datab = "<input type='text'  id='sitename1' name='sitename' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datac = "<input type='text'  id='subname1' name='subname' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datad = "<input type='text'  id='sitelat1' name='sitelat' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datae = "<input type='text'  id='sitelong1' name='sitelong' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         dataf = "<input type='text'  id='sitelev1' name='sitelev' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datag = "<input type='text'  id='sensortype1' name='sensortype' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";


                         datah = "<input type='text'  id='wlalert1' name='wlalert' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datai = "<input type='text'  id='wlalarm1' name='wlalarm' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         dataj = "<input type='text'  id='wlcritical1' name='wlcritical' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datak = "<input type='text' id='datetimepicker1' name='created_at' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' readonly = 'readonly' value=''>";

                          datal = "<input type='text'  id='datetimepicker2' name='updated_at' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' readonly = 'readonly' value=''>";

                         datam = "<input type='text'  id='pic1' name='pic' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datan = "<input type='text'  id='Bconstant1' name='Bconstant' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datao = "<input type='text'  id='Wlevelzero1' name='Wlevelzero' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                         datap = "<input type='text'  id='Avariable1' name='Avariable' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";

                     
            
                    $( ".plchldrnamea" ).html(dataa);
                    $( ".plchldrnameb" ).html(datab);
                    $( ".plchldrnamec" ).html(datac);
                    $( ".plchldrnamed" ).html(datad);
                    $( ".plchldrnamee" ).html(datae);
                    $( ".plchldrnamef" ).html(dataf);
                    $( ".plchldrnameg" ).html(datag);
                    $( ".plchldrnameh" ).html(datah);
                    $( ".plchldrnamei" ).html(datai);
                    $( ".plchldrnamej" ).html(dataj);
                    $( ".plchldrnamek" ).html(datak);
                    $( ".plchldrnamel" ).html(datal);
                    $( ".plchldrnamem" ).html(datam);
                    $( ".plchldrnamen" ).html(datan);
                    $( ".plchldrnameo" ).html(datao);
                    $( ".plchldrnamep" ).html(datap);

                    
                    });

                    $('#myModal').on('hidden.bs.modal', function () {
                    $( ".plchldrnamea" ).empty();
                    $( ".plchldrnameb" ).empty();
                    $( ".plchldrnamec" ).empty();
                    $( ".plchldrnamed" ).empty();
                    $( ".plchldrnamee" ).empty();
                    $( ".plchldrnamef" ).empty();
                    $( ".plchldrnameg" ).empty();
                    $( ".plchldrnameh" ).empty();
                    $( ".plchldrnamei" ).empty();
                    $( ".plchldrnamej" ).empty();
                    $( ".plchldrnamek" ).empty();
                    $( ".plchldrnamel" ).empty();
                    $( ".plchldrnamem" ).empty();
                    $( ".plchldrnamen" ).empty();
                    $( ".plchldrnameo" ).empty();
                    $( ".plchldrnamep" ).empty();

                            });
                     
                }// action: function
    },
    {
      extend: 'selected', // Bind to Selected row
      text: 'Edit',
      name: 'edit',        // DO NOT change name
       action: function () {
                    var count = table.rows( { selected: true } ).data();
                     console.log(count[0]);
                        var data = "";
                         var datab = "";
                          var datac = "";
                           var datad = "";
                            var datae = "";
                             var dataf = "";
                              var datag = "";
                               var datah = "";
                               var datai = "";
                               var dataj = "";
                               var datak = "";
                               var datal = "";
                               var datam = "";
                               var datan = "";
                               var datao = "";
                               var datap = "";
                         

                    $('#myModal').modal('show');
                    $('#myModal').on('shown.bs.modal', function () {
                      dataa = "<input type='text'  id='" + count[0].id + "' name='siteid' placeholder='...' style='overflow:hidden'  readonly = 'readonly' class='form-control  form-control-sm' value='" + count[0].id + "'>";

                        datab = "<input type='text'  id='" + count[0].name + "' name='sitename' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].name + "'>";

                         datac = "<input type='text'  id='" + count[0].subname + "' name='subname' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].subname + "'>";

                         datad = "<input type='text'  id='" + count[0].sitelat + "' name='sitelat' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].sitelat + "'>";

                         datae = "<input type='text'  id='" + count[0].sitelong + "' name='sitelong' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].sitelong + "'>";

                         dataf = "<input type='text'  id='" + count[0].sitelev + "' name='sitelev' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].sitelev + "'>";

                         datag = "<input type='text'  id='" + count[0].sensortype + "' name='sensortype' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].sensortype + "'>";


                         datah = "<input type='text'  id='" + count[0].wlalert + "' name='wlalert' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].wlalert + "'>";

                         datai = "<input type='text'  id='" + count[0].wlalarm + "' name='wlalarm' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].wlalarm + "'>";

                         dataj = "<input type='text'  id='" + count[0].wlcritical + "' name='wlcritical' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].wlcritical + "'>";

                         datak = "<input type='text' id='datetimepicker1' name='created_at' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' readonly = 'readonly' value='" + count[0].created_at + "'>";

                          datal = "<input type='text'  id='datetimepicker2' name='updated_at' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' readonly = 'readonly' value='" + count[0].updated_at + "'>";

                         datam = "<input type='text'  id='" + count[0].pic + "' name='pic' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].pic + "'>";

                         datan = "<input type='text'  id='" + count[0].Bconstant + "' name='Bconstant' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].Bconstant + "'>";

                         datao = "<input type='text'  id='" + count[0].Wlevelzero + "' name='Wlevelzero' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].Wlevelzero + "'>";

                         datap = "<input type='text'  id='" + count[0].Avariable + "' name='Avariable' placeholder='...' style='overflow:hidden'  class='form-control  form-control-sm' value='" + count[0].Avariable + "'>";

                     
            
                    $( ".plchldrnamea" ).html(dataa);
                    $( ".plchldrnameb" ).html(datab);
                    $( ".plchldrnamec" ).html(datac);
                    $( ".plchldrnamed" ).html(datad);
                    $( ".plchldrnamee" ).html(datae);
                    $( ".plchldrnamef" ).html(dataf);
                    $( ".plchldrnameg" ).html(datag);
                    $( ".plchldrnameh" ).html(datah);
                    $( ".plchldrnamei" ).html(datai);
                    $( ".plchldrnamej" ).html(dataj);
                    $( ".plchldrnamek" ).html(datak);
                    $( ".plchldrnamel" ).html(datal);
                    $( ".plchldrnamem" ).html(datam);
                    $( ".plchldrnamen" ).html(datan);
                    $( ".plchldrnameo" ).html(datao);
                    $( ".plchldrnamep" ).html(datap);

                    
                    });

                    $('#myModal').on('hidden.bs.modal', function () {
                    $( ".plchldrnamea" ).empty();
                    $( ".plchldrnameb" ).empty();
                    $( ".plchldrnamec" ).empty();
                    $( ".plchldrnamed" ).empty();
                    $( ".plchldrnamee" ).empty();
                    $( ".plchldrnamef" ).empty();
                    $( ".plchldrnameg" ).empty();
                    $( ".plchldrnameh" ).empty();
                    $( ".plchldrnamei" ).empty();
                    $( ".plchldrnamej" ).empty();
                    $( ".plchldrnamek" ).empty();
                    $( ".plchldrnamel" ).empty();
                    $( ".plchldrnamem" ).empty();
                    $( ".plchldrnamen" ).empty();
                    $( ".plchldrnameo" ).empty();
                    $( ".plchldrnamep" ).empty();

                            });
                     
                }// action: function
    }]
    });
}
    
</script>
@endpush

@stop