@extends('masterdesign')


@section('content')
<!--**************************************MODAL********************************************-->

<h1>ADD SITE INFORMATION</h1><hr>

 <form method= "POST" action= "addsite/addsitedata">
      {{ csrf_field() }}
<input type="text" name="sitename" placeholder="name"><br><br>
<input type="text" name="lattitude" placeholder="lattitude"><h5>(must use google maps format)</h5><br>
<input type="text" name="longtitude" placeholder="longtitude"><h5>(must use google maps format)</h5><br><br>
<input type="text" name="elevation" placeholder="elevation"><br><br>
<input type="text" name="alert" placeholder="alert"><br><br>
<input type="text" name="alarm" placeholder="alarm"><br><br>
<input type="text"  name="critical" placeholder="critical"><br><br>

<input type="submit" value="ADD SITE INFORMATION">
</form>
