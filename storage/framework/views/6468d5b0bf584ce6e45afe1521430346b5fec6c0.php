<?php $__env->startSection('content'); ?>
   <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="15000">
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
    <li data-target="#myCarousel" data-slide-to="9"></li>
    <li data-target="#myCarousel" data-slide-to="10"></li>
    <li data-target="#myCarousel" data-slide-to="11"></li>
    <li data-target="#myCarousel" data-slide-to="12"></li>
    <li data-target="#myCarousel" data-slide-to="13"></li>
    <li data-target="#myCarousel" data-slide-to="14"></li>
    <li data-target="#myCarousel" data-slide-to="15"></li>



  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner ">
    <div class="item active ">
      <img src="<?php echo e(URL::asset('img/pics/main.jpg')); ?>" alt="ayyy">
      <div class="container ">
      <div class="row carousel-caption ">
        <div class="col-xs-12 text-center"><h5>NIA MARIIS</h5></div>
        <div class="col-sm-3 "><h1></h1></div>
        <div class="col-sm-3 "><h1></h1></div>
        <div class="col-sm-3 "><h1></h1></div>
        <div class="col-sm-3 "></div>
        <div class="col-sm-3 "></div>
        <div class="col-sm-3 "></div>
        <div class="col-xs-12"></div>
     </div>
      </div>
    </div>

    <?php $__currentLoopData = $jsonfinale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="item ">
     <img src="<?php echo e(URL::asset('img/pics/'.$siteinfos->pic.'.jpg')); ?>" alt="ayyy">
      <div class="container">
       <div class="row carousel-caption">
        <div class="col-xs-12 text-center"><h5><?php echo e($siteinfos->Site); ?></h5></div>
        <div class="col-xs-12 text-center"><h7><?php echo e($siteinfos->subname); ?></h7></div>
        <div class="col-xs-12 text-center"><h8>LAT: <?php echo e($siteinfos->lattitude); ?></h8></div>
        <div class="col-xs-12 text-center"><h8>LONG: <?php echo e($siteinfos->longtitude); ?></h8></div>
        <?php if( $siteinfos->sensor == 1 ): ?>
        <div class="col-sm-3 text-left"><h2>RF</h2></div>
        <div class="col-sm-3 "><h2>    </h2></div>
        <div class="col-sm-3 "><h2>    </h2></div>
        <?php endif; ?>

           <?php if( $siteinfos->sensor == 5 ): ?>
        <div class="col-sm-3 text-left"><h2>RF</h2></div>
        <div class="col-sm-3 "><h2>    </h2></div>
        <div class="col-sm-3 "><h2>    </h2></div>
        <?php endif; ?>


        <?php if( $siteinfos->sensor == 2 ): ?>
        <div class="col-sm-3 "><h2>LVL</h2></div>
        <div class="col-sm-3 "><h2>     </h2></div>
        <div class="col-sm-3 "><h2>Q</h2></div>
        <?php endif; ?>

         <?php if( $siteinfos->sensor == 3 ): ?>
        <div class="col-sm-3 text-left"><h2>RF</h2></div>
        <div class="col-sm-3 "><h2>LVL</h2></div>
        <div class="col-sm-3 "><h2>Q</h2></div>
        <?php endif; ?>

         <?php if( $siteinfos->sensor == 6 ): ?>
        <div class="col-sm-3 text-left"><h2>RF</h2></div>
        <div class="col-sm-3 "><h2>LVL</h2></div>
        <div class="col-sm-3 "><h2>Q</h2></div>
        <?php endif; ?>

        <div class="col-sm-3 text-right"><h2>BATT</h2></div>

        <?php if( $siteinfos->sensor == 1 ): ?>
            <?php if(($siteinfos->rainten >=0 )&&($siteinfos->rainten <=0.9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGray"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=1 )&&($siteinfos->rainten <=1.9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=2 )&&($siteinfos->rainten <=9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainBlueGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=10 )&&($siteinfos->rainten <=19)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainBlue"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=20 )&&($siteinfos->rainten <=29)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainViolet"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=30 )&&($siteinfos->rainten <=39)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainYellow"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=40 )&&($siteinfos->rainten <=49)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainOrange"></span></div></div>
            <?php endif; ?>
            <?php if($siteinfos->rainten >=50): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainRed"></span></div></div>
            <?php endif; ?>
        <div class="col-sm-3 "><h3>       </h3></div>
        <div class="col-sm-3 "><h3>       </h3></div>
        <?php endif; ?>

       <?php if( $siteinfos->sensor == 5 ): ?>
            <?php if(($siteinfos->minusdrn >=0 )&&($siteinfos->minusdrn <=0.9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGray"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=1 )&&($siteinfos->minusdrn <=1.9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=2 )&&($siteinfos->minusdrn <=9)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainBlueGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=10 )&&($siteinfos->minusdrn <=19)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainBlue"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=20 )&&($siteinfos->minusdrn <=29)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainViolet"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=30 )&&($siteinfos->minusdrn <=39)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainYellow"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->minusdrn >=40 )&&($siteinfos->minusdrn <=49)): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainOrange"></span></div></div>
            <?php endif; ?>
            <?php if($siteinfos->minusdrn >=50): ?>
            <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainRed"></span></div></div>
            <?php endif; ?>
        <div class="col-sm-3 "><h3>       </h3></div>
        <div class="col-sm-3 "><h3>       </h3></div>
        <?php endif; ?>


        <?php if( $siteinfos->sensor == 2 ): ?>
        <?php if(($siteinfos->rainten >=0 )&&($siteinfos->rainten <=0.9)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainGray"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=1 )&&($siteinfos->rainten <=1.9)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=2 )&&($siteinfos->rainten <=9)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainBlueGreen"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=10 )&&($siteinfos->rainten <=19)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainBlue"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=20 )&&($siteinfos->rainten <=29)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainViolet"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=30 )&&($siteinfos->rainten <=39)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainYellow"></span></div></div>
            <?php endif; ?>
            <?php if(($siteinfos->rainten >=40 )&&($siteinfos->rainten <=49)): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainOrange"></span></div></div>
            <?php endif; ?>
            <?php if($siteinfos->rainten >=50): ?>
            <div class="col-sm-3 "><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-stats RainRed"></span></div></div>
            <?php endif; ?>
        <div class="col-sm-3 "><h3>     </h3></div>
        <div class="col-sm-3"><h3><?php echo e($siteinfos->discharge); ?></h3></div>
        <?php endif; ?>


         <?php if($siteinfos->sensor == 3 ): ?>
        <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->rainten); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGray"></span></div></div>
        <div class="col-sm-3 "><h3><?php echo e($siteinfos->water); ?> <h6>meters</h3></div>

        <div class="col-sm-3"><h3><?php echo e($siteinfos->discharge); ?></h3></div>
        <?php endif; ?>


        <?php if($siteinfos->sensor == 6 ): ?>
        <div class="col-sm-3 text-left"><h3><?php echo e($siteinfos->minusdrn); ?> <h6>milimeters</h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-tint RainGray"></span></div></div>
        <div class="col-sm-3 "><h3><?php echo e($siteinfos->water); ?> <h6>meters</h3></div>

        <div class="col-sm-3"><h3><?php echo e($siteinfos->discharge); ?></h3></div>
        <?php endif; ?>


        <!--comment-->
        <?php if($siteinfos->voltage >= 12): ?>
        <div class="col-sm-3 text-right"><h3><?php echo e($siteinfos->voltage); ?> <h6>Volts </h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-ok CarVoltOK"></span></div></div>
        <?php endif; ?>
        
        <?php if($siteinfos->voltage < 12): ?>
          <div class="col-sm-3 text-right"><h3><?php echo e($siteinfos->voltage); ?> <h6>Volts </h6></h3><div class="glyphicon-ring glyphicon-gray"><br><br><span class="glyphicon glyphicon-waRFing-sign CarVoltNot"></span></div></div>
        <?php endif; ?>
        <div class="col-xs-12"><h4>DATA AS OF: <?php echo e($siteinfos->asof); ?></h4></div>
     </div>
      </div>
    </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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