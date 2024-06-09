<!-- Modal -->
<div id="get_info_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->get('equicare.maintenance_cost_details'); ?></h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>
            <th><?php echo app('translator')->get('equicare.hospital'); ?></th>
            <td><?php echo e($cost->hospital->name); ?></td>

            <th><?php echo app('translator')->get('equicare.type'); ?></th>
            <td><?php echo e(strtoupper($cost->type??"-")); ?></td>
          </tr>
          <tr>
            <th><?php echo app('translator')->get('equicare.by'); ?></th>
            <?php
              if($cost->cost_by =='tp'){
                $text = trans('equicare.third_party');
              }else{
                $text = isset(\App\Setting::first()->company)?\App\Setting::first()->company:config('app.name');
              }
            ?>
            <td><?php echo e($text); ?></td>

          <?php if($cost->cost_by == 'tp'): ?>

              <th><?php echo app('translator')->get('equicare.third_p_name'); ?></th>
              <td><?php echo e($cost->tp_name); ?></td>
            </tr>
            <tr>
              <th><?php echo app('translator')->get('equicare.third_p_mobile'); ?></th>
              <td><?php echo e($cost->tp_mobile); ?></td>

              <th><?php echo app('translator')->get('equicare.third_p_email'); ?></th>
              <td><?php echo e($cost->tp_email); ?></td>
            </tr>
          <?php endif; ?>
           <?php if(count($decoded_ids) > 0): ?>
            <?php $__currentLoopData = $decoded_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $equipment = App\Equipment::find($id);
            ?>
            <?php if($k == 0 && $cost->cost_by != 'tp'): ?>

            <tr>
            <?php endif; ?>
              <th><?php echo app('translator')->get('equicare.equipment'); ?> <?php echo e(($k+1)); ?> </th>
              <td><?php echo e(($equipment->name)??"-"); ?></td>
              <th><?php echo app('translator')->get('equicare.equipment'); ?> <?php echo e(($k+1)); ?> Start Date </th>
              <td><?php echo e(($decoded_start_date[$k]) ??"-"); ?></td>
            </tr>
            <tr>
              <th><?php echo app('translator')->get('equicare.equipment'); ?> <?php echo e(($k+1)); ?> End Date </th>
              <td><?php echo e(($decoded_end_dates[$k]) ??"-"); ?></td>

              <th><?php echo app('translator')->get('equicare.equipment'); ?> <?php echo e(($k+1)); ?> Cost </th>
              <td><?php echo e(($decoded_costs[$k]) ??"-"); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('equicare.close'); ?></button>
      </div>
    </div>

  </div>
</div><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/maintenance_cost/get_info.blade.php ENDPATH**/ ?>