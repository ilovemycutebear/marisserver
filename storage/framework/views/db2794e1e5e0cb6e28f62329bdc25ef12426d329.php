<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4"><h1 class="text-primary">LATEST DATA MONITOR</h1></div>
  <div class="col-xs-6 col-md-4"></div>
</div>



<?php $__env->startSection('content'); ?>

   <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <?php $__currentLoopData = $latestdt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo e($siteinfos->site_id); ?>"></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="https://4.bp.blogspot.com/-8XZDV1oVx9U/WYmHefsDdjI/AAAAAAAAAAk/JmDq35HON2cOe1YCJ3x_WGLkgs9nMpX9gCLcBGAs/s1600/IMG_1492%255B1%255D.JPG" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>ABRA FEWS</h1>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $latestdt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="item">
          <img class="second-slide" src="https://4.bp.blogspot.com/-8XZDV1oVx9U/WYmHefsDdjI/AAAAAAAAAAk/JmDq35HON2cOe1YCJ3x_WGLkgs9nMpX9gCLcBGAs/s1600/IMG_1492%255B1%255D.JPG" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1> RAIN: <?php echo e($siteinfos->rain10); ?> || WATER LEVEL: <?php echo e($siteinfos->rain60); ?><h1>
              <h3><?php echo e($siteinfos->name); ?></h3>
              <H4> DATA AS OF: <?php echo e($siteinfos->datemrcvd); ?></H4>
            </div>
          </div>
        </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>