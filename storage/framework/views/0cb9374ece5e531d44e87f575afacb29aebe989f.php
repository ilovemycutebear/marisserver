 <?php $__env->startSection('modcontent'); ?>
 <div id="modalcontainer">
  <div class="modal fade" id="myModal<?php echo e($sitelog->id); ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
          <?php echo e($sitelog->name); ?>


          </h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Date/Time</th>
                <th>Rain</th>
            </tr>
        </thead>
    </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(window).load(function(){
        $('#myModal<?php echo e($sitelog->id); ?>').modal('show');
    });
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(URL::asset('data/'.$sitelog->id)); ?>",
        columns: [
            { data: 'site_id', name: 'site_id' },
            { data: 'name', name: 'name' },
            { data: 'datetime_10mins', name: 'datetime_10mins' },
            { data: 'rain10', name: 'rain10' }
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('popup.modaltmpl', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>