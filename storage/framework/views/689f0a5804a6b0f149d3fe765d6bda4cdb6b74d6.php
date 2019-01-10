<form class="form-horizontal" method="POST" action="<?php echo e(route('import_process')); ?>">
    <?php echo e(csrf_field()); ?>


    <table class="table">
        <?php $__currentLoopData = $csv_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <td><?php echo e($value); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <tr>
    </table>

    <button type="submit" class="btn btn-primary">
        Import Data
    </button>
</form>