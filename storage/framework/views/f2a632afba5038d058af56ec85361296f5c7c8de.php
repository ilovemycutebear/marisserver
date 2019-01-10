<?php $__env->startSection('content'); ?>

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo e(URL::asset('img/pics/1.jpg')); ?>" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/2.jpg')); ?>" alt="ayyy">
    </div>

    <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/3.jpg')); ?>" alt="ayyy">
    </div>

    <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/4.jpg')); ?>" alt="ayyy">
    </div>

     <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/5.jpg')); ?>" alt="ayyy">
    </div>

     <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/6.jpg')); ?>" alt="ayyy">
    </div>

     <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/8.jpg')); ?>" alt="ayyy">
    </div>

    <div class="item">
      <img src="<?php echo e(URL::asset('img/pics/9.jpg')); ?>" alt="ayyy">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>