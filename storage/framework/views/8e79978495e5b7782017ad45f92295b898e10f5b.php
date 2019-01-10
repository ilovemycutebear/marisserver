<?php $__env->startSection('content'); ?>

	<h1><?php echo e($sitelog->id); ?></h1>

	<ul>	
	<?php $__currentLoopData = $sitelog -> logger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <!--called logger method to connect two tables.-->


		<li><?php echo e($logs->datemrcvd); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</ul>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>