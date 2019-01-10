@extends('masterdesign')


@section('content')
<!--**************************************MODAL********************************************-->

<h1>ADD DATA</h1><hr>

 <form method= "POST" action= "addsite/addsitedata">
      {{ csrf_field() }}
<input type="text" name="sitename" placeholder="site id"><br><br>
<input type="text" name="lattitude" placeholder="water level"><br><br>
<input type="text" name="longtitude" placeholder="rain"><h5><br><br>
<input type="text" name="elevation" placeholder="date/time"><br><br>

<input type="submit" value="ADD DATA">
</form>
