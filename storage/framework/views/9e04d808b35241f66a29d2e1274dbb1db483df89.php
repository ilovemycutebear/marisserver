<?php echo $map['js']; ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

      <div class="container">
      <hr>
      </div>
	<div class="row">
		<div class="col-md-6">
		  <?php echo $map['html']; ?>

		</div>
		<div class="col-md-6">
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>