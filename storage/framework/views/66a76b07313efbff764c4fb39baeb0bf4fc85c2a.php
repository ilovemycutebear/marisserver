<?php $__env->startSection('content'); ?>

	<h1>All Rain values Here</h1>

	<?php $__currentLoopData = $siteinfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

		<div>
			<a href ="/data/<?php echo e($siteinfos->id); ?>"><?php echo e($siteinfos->name); ?></a>
		</div>





	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>