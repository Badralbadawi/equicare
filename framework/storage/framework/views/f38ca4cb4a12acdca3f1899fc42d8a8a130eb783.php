 <div class="form-group col-md-12">
     <div class="form-check mb-2">
         <label for="permissions[]"> <?php echo app('translator')->get('equicare.permissions'); ?> </label>

     </div>
     <div class="form-check">
         <input type="checkbox" name="check_all" id="check_all" />
         <label for="check_all"> <?php echo app('translator')->get('equicare.check_all'); ?></label>
         <div class="row">
             <div class="col-lg-12">
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th><?php echo app('translator')->get('equicare.module_name'); ?></th>
                             <th><?php echo app('translator')->get('equicare.view'); ?></th>
                             <th><?php echo app('translator')->get('equicare.create'); ?></th>
                             <th><?php echo app('translator')->get('equicare.edit'); ?></th>
                             <th><?php echo app('translator')->get('equicare.delete'); ?></th>
                             <th><?php echo app('translator')->get('equicare.select_all'); ?></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $__currentLoopData = $module_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr class="moduel_checkbox">
                                 <td><?php echo e($module); ?></td>
                                 <td>
                                     <?php if(in_array('View ' . $module, $permission_array)): ?>
                                         <input type="checkbox" name="permissions[]" data-type ="<?php echo e($module); ?>"
                                             id="role_permissions_view_<?php echo e('View_' . $module); ?>"
                                             value="View <?php echo e($module); ?>"
                                             <?php if(in_array('View ' . $module, $data->permissions->pluck('name')->toArray())): ?> checked <?php endif; ?>>
                                     <?php else: ?>
                                         -
                                     <?php endif; ?>
                                 </td>
                                 <td>
                                     <?php if(in_array('Create ' . $module, $permission_array)): ?>
                                         <input type="checkbox" name="permissions[]" data-type ="<?php echo e($module); ?>"
                                             id="role_permissions_create_<?php echo e('Create_' . $module); ?>"
                                             value="Create <?php echo e($module); ?>"
                                             <?php if(in_array('Create ' . $module, $data->permissions->pluck('name')->toArray())): ?> checked <?php endif; ?>>
                                     <?php else: ?>
                                         -
                                     <?php endif; ?>
                                 </td>
                                 <td>
                                     <?php if(in_array('Edit ' . $module, $permission_array)): ?>
                                         <input type="checkbox" name="permissions[]" data-type ="<?php echo e($module); ?>"
                                             id="role_permissions_edit_<?php echo e('Edit_' . $module); ?>"
                                             value="Edit <?php echo e($module); ?>"
                                             <?php if(in_array('Edit ' . $module, $data->permissions->pluck('name')->toArray())): ?> checked <?php endif; ?>>
                                     <?php else: ?>
                                         -
                                     <?php endif; ?>
                                 </td>
                                 <td>
                                     <?php if(in_array('Delete ' . $module, $permission_array)): ?>
                                         <input type="checkbox" name="permissions[]" data-type ="<?php echo e($module); ?>"
                                             id="role_permissions_delete_<?php echo e('Delete_' . $module); ?>"
                                             value="Delete <?php echo e($module); ?>"
                                             <?php if(in_array('Delete ' . $module, $data->permissions->pluck('name')->toArray())): ?> checked <?php endif; ?>>
                                     <?php else: ?>
                                         -
                                     <?php endif; ?>
                                 </td>
                                 <td>
                                     <input class="select_module" data-type ="<?php echo e($module); ?>" type="checkbox"
                                         name="">
                                 </td>
                             </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                     </tbody>
                 </table>
             </div>

         </div>
     </div>
 </div>
<?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/user_role_permission/table_edit_role.blade.php ENDPATH**/ ?>