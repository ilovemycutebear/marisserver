<?php $__env->startSection('content'); ?>
<!--**************************************MODAL********************************************-->

<h1>ADD DATA</h1><hr>

 <form method= "POST" action= "addsite/addsitedata">
      <?php echo e(csrf_field()); ?>

<input type="text" name="sitename" placeholder="site id"><br><br>
<input type="text" name="lattitude" placeholder="water level"><br><br>
<input type="text" name="longtitude" placeholder="rain"><h5><br><br>
<input type="text" name="elevation" placeholder="date/time"><br><br>

<input type="submit" value="ADD DATA">
</form>

<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>