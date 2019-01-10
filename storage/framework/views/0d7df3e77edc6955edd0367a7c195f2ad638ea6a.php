<?php $__env->startSection('content'); ?>
  <!--removethis-->

  <!-- Modal -->
   <?php echo $__env->yieldContent('modcontent'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>