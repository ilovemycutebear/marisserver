<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MARIIS FFWS</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css">
  <link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.Default.css' rel='stylesheet' />

 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.2.2/css/autoFill.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css"/>





    <style type="text/css">
        body{
    height: 100%;
    padding-top: 40px;
    background-image: url("<?php echo e(URL::asset('img/background.jpg')); ?>");
    background-repeat: no-repeat;
    background-size: cover;
}  
h1 { 
    color: #99e6ff;
}
  .myCSSClass {
  background:rgba(89, 89, 89, 0.33);
  color: white;
}
.map { position:absolute; top:0; bottom:0; width:100%; height: 700px; }
.color_table{
    color: white !important;
    background-color: #eeeeee !important;
}
/*navbar customiziation*/
/* Red */
/* Green * /
 $bgDefault      : #2ecc71;
 $bgHighlight    : #27ae60;
 $colDefault     : #ecf0f1;
 $colHover       : #d1ffed; /*/
/* Purple * /
 $bgDefault      : #9b59b6;
 $bgHighlight    : #8e44ad;
 $colDefault     : #ecf0f1;
 $colHover       : #ecdbff; /*/
/* Orange * /
 $bgDefault      : #e67e22;
 $bgHighlight    : #d35400;
 $colDefault     : #ecf0f1;
 $colHover       : #ffe6d1; /*/
/* --- Style --- */
.navbar-default {
  background-color: #052e5c;
  border-color: #c4fb79;
}
.navbar-default .navbar-brand {
  color: #02b25f;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #91d451;
}
.navbar-default .navbar-nav > li > a {
  color: #02b25f;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #91d451;
}
.navbar-default .navbar-nav .active > a, .navbar-default .navbar-nav .active > a:hover, .navbar-default .navbar-nav .active > a:focus {
  color: #91d451;
  background-color: #c4fb79;
}
.navbar-default .navbar-nav .open > a, .navbar-default .navbar-nav .open > a:hover, .navbar-default .navbar-nav .open > a:focus {
  color: #91d451;
  background-color: #c4fb79;
}
.navbar-default .navbar-nav .open > a .caret, .navbar-default .navbar-nav .open > a:hover .caret, .navbar-default .navbar-nav .open > a:focus .caret {
  border-top-color: #91d451;
  border-bottom-color: #91d451;
}
.navbar-default .navbar-nav > .dropdown > a .caret {
  border-top-color: #02b25f;
  border-bottom-color: #02b25f;
}
.navbar-default .navbar-nav > .dropdown > a:hover .caret, .navbar-default .navbar-nav > .dropdown > a:focus .caret {
  border-top-color: #91d451;
  border-bottom-color: #91d451;
}
.navbar-default .navbar-toggle {
  border-color: #c4fb79;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #c4fb79;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #02b25f;
}
@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #02b25f;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #91d451;
    background-color: #c4fb79;
  }
}
/* Do not take in account */
html {
  padding-top: 30px;
}
a.solink {
  position: fixed;
  top: 0;
  width: 100%;
  text-align: center;
  background: #f3f5f6;
  color: #cfd6d9;
  border: 1px solid #cfd6d9;
  line-height: 30px;
  text-decoration: none;
  transition: all 0.3s;
  z-index: 999;
}
a.solink::first-letter {
  text-transform: capitalize;
}
a.solink:hover {
  color: #428bca;
}

/*navbar customization*/
    </style>
</head>
<body>
      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">MARIIS FFWS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">HOME</a>
            </li>
            <li class="<?php echo e(Request::is('rainmapview') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('rainmapview')); ?>">RAIN</a>
            </li>
            <li class="<?php echo e(Request::is('wlevelmapview') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('wlevelmapview')); ?>">WATER LEVEL</a>
            </li>
            <li class="<?php echo e(Request::is('rtcurve') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('rtcurve')); ?>">RATING CURVES</a>
            </li>
            <li class="<?php echo e(Request::is('fldhzd') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('fldhzd')); ?>">FLOOD</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
             <li class="<?php echo e(Request::is('about') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('about')); ?>">CONTACT US</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
            <?php echo $__env->yieldContent('content'); ?>


        <!-- jQuery -->

        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
        <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/leaflet.markercluster.js'></script>


        <!--script src="<?php echo e(URL::asset('js/dataTables.altEditor.free.js')); ?>"></script-->
        <!-- App scripts -->
        <?php echo $__env->yieldPushContent('map-scripts'); ?>

 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.2.2/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    </body>

</html>
