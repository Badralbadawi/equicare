<?php $__env->startSection('body-title'); ?>
    <?php echo app('translator')->get('equicare.call_entries'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    | <?php echo app('translator')->get('equicare.preventive_maintenance_call_entry'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo app('translator')->get('equicare.preventive_maintenance'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
        
			

			
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="box-title"><?php echo app('translator')->get('equicare.preventive_maintenance'); ?>
                        <?php if(Auth::user()->hasDirectPermission('Create Preventive Maintenance')): ?>
                            <a href="<?php echo e(route('preventive_maintenance.create')); ?>"
                                class="btn btn-primary btn-flat"><?php echo app('translator')->get('equicare.add_new'); ?></a>
                        <?php endif; ?>
                    </h4>
                    <div class="export-btns" style="display:inline-block;float:right;">
					<a class="btn btn-primary" href="<?php echo e(route('preventive.export','excel')); ?>" target="_blank"><?php echo app('translator')->get('equicare.export_excel'); ?></a>
					<a class="btn btn-success" href="<?php echo e(route('preventive.export','pdf')); ?>"><?php echo app('translator')->get('equicare.export_pdf'); ?></a>
					</div>
                </div>
                <div class="box-body">
                    <div class="table-responsive overflow_x_unset">
                        <table id="data_table" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> <?php echo app('translator')->get('equicare.equipment_name'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.user'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.call_handle'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.working_status'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.report_number'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.call_registration_date_time'); ?></th>
                                    <th> <?php echo app('translator')->get('equicare.next_due_date'); ?></th>
                                    <th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.first_attended_on'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.completed_on'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.action'); ?> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; ?>
                                <?php if(isset($p_maintenance)): ?>
                                    <?php $__currentLoopData = $p_maintenance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preventive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $count++; ?>
                                        <tr>
                                            <td> <?php echo e($count); ?> </td>
                                            <td> <?php echo e($preventive->equipment->name ?? '-'); ?> </td>
                                            <td> <?php echo e($preventive->user->name ?? '-'); ?></td>
                                            <td> <?php echo e($preventive->call_handle ? ucfirst($preventive->call_handle) : '-'); ?> </td>
                                            <td> <?php echo e($preventive->working_status ? ucfirst($preventive->working_status) : '-'); ?>

                                            </td>
                                            <td> <?php echo e($preventive->report_no ? sprintf('%04d', $preventive->report_no) : '-'); ?>

                                            </td>
                                            <td>
                                                <?php echo e($preventive->call_register_date_time ? date('Y-m-d h:i A', strtotime($preventive->call_register_date_time)) : '-'); ?>

                                            </td>
                                            <td> <?php echo e(date_change($preventive->next_due_date) ?? '-'); ?></td>
                                            <td><?php echo e($preventive->user_attended_fn ? $preventive->user_attended_fn->name : '-'); ?>

                                            </td>
                                            <td><?php echo e($preventive->user_attended_fn ? date('Y-m-d H:i A', strtotime($preventive->call_attend_date_time)) : '-'); ?>

                                            </td>
                                            <td><?php echo e($preventive->call_complete_date_time ? date('Y-m-d H:i A', strtotime($preventive->call_complete_date_time)) : '-'); ?>

                                            </td>
                                            <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <span class="fa fa-cogs"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>

                                                    <ul class="dropdown-menu custom" role="menu">
                                                        <?php if(Auth::user()->hasDirectPermission('Edit Preventive Maintenance')): ?>
                                                            <li>
                                                                <a href="<?php echo e(route('preventive_maintenance.edit', $preventive->id)); ?>"
                                                                    class="" title="<?php echo app('translator')->get('equicare.edit'); ?>"><i
                                                                        class="fa fa-edit purple-color"></i> <?php echo app('translator')->get('equicare.edit'); ?>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        <li>
                                                            <?php if(is_null($preventive->call_attend_date_time)): ?>
                                                                <a href="#attend_modal" data-target="#attend_modal"
                                                                    data-toggle="modal" title="<?php echo app('translator')->get('equicare.attend_call'); ?>"
                                                                    class="attend_btn"
                                                                    data-status="<?php echo e($preventive->working_status); ?>"
                                                                    data-id="<?php echo e($preventive->id); ?>">
                                                                    <i class="fa fa-list-alt yellow-color"></i>
                                                                    <?php echo app('translator')->get('equicare.attend_call'); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <?php if(!is_null($preventive->call_attend_date_time) && is_null($preventive->call_complete_date_time)): ?>
                                                            <li>
                                                                <a href="#call_complete_modal"
                                                                    data-target="#call_complete_modal" data-toggle="modal"
                                                                    title="<?php echo app('translator')->get('equicare.call_complete'); ?>" class="call_complete_btn"
                                                                    data-status="<?php echo e($preventive->working_status); ?>"
                                                                    data-id="<?php echo e($preventive->id); ?>">
                                                                    <i class="fa fa-thumbs-o-up green-color"></i>
                                                                    <?php echo app('translator')->get('equicare.call_complete'); ?>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if(Auth::user()->hasDirectPermission('Delete Preventive Maintenance')): ?>
                                                            <li>
                                                                <a class=""
                                                                    href="javascript:document.getElementById('form1').submit();"
                                                                    onclick="return confirm('<?php echo app('translator')->get('equicare.are_you_sure'); ?>')"
                                                                    title="<?php echo app('translator')->get('equicare.delete'); ?>"><span
                                                                        class="fa fa-trash-o red-color"
                                                                        aria-hidden="true"></span>
                                                                    <?php echo app('translator')->get('equicare.delete'); ?>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <?php echo Form::open([
                                                    'url' => 'admin/call/preventive_maintenance/' . $preventive->id,
                                                    'method' => 'DELETE',
                                                    'id' => 'form1',
                                                    'class' => 'form-horizontal',
                                                ]); ?>

                                                <input type="hidden" id="id" name="id"
                                                    value="<?php echo e($preventive->id); ?>">
                                                <?php echo Form::close(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> <?php echo app('translator')->get('equicare.equipment_name'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.user'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.call_handle'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.working_status'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.report_number'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.next_due_date'); ?></th>
                                    <th> <?php echo app('translator')->get('equicare.call_registration_date_time'); ?></th>
                                    <th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.first_attended_on'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.completed_on'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.action'); ?> </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="attend_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open([
                    'route' => 'preventive_attend_complete',
                    'method' => 'POST',
                    'class' => 'attend_call_form',
                    'id' => 'attend_call_form',
                ]); ?>


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo app('translator')->get('equicare.attend_call'); ?></h4>
                </div>
                <div class="modal-body">
                    <?php if(count($errors->attend_call) > 0): ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="alert alert-danger">
                                    <ul class=" mb-0">
                                        <?php $__currentLoopData = $errors->attend_call->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="row">

                        <div class="form-group col-md-6">
                            <?php echo Form::label('call_attend_date_time', __('equicare.call_attend_date_time')); ?>

                            <?php echo Form::text('call_attend_date_time', null, ['class' => 'form-control call_attend_date_time']); ?>

                            <?php echo e(Form::hidden('b_id', null, ['class' => 'b_id'])); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('user', __('equicare.user_attended')); ?>

                            <?php echo Form::select('user_attended', $users, null, [
                                'placeholder' => 'select user',
                                'class' => 'form-control
                            						user_attended',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('service_rendered', __('equicare.service_rendered')); ?>

                            <?php echo Form::text('service_rendered', null, ['class' => 'form-control service_rendered']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('remarks', __('equicare.remarks')); ?>

                            <?php echo Form::textarea('remarks', null, ['class' => 'form-control remarks', 'rows' => 2]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('equicare.working_status'); ?></label>
                            <?php echo Form::select(
                                'working_status',
                                [
                                    'working' => __('equicare.working'),
                                    'not working' => __('equicare.not_working'),
                                    'pending' => __('equicare.pending'),
                                ],
                                null,
                                ['placeholder' => '--select--', 'class' => 'form-control test working_status'],
                            ); ?>

                        </div>
                        <input type="hidden" name="id" class="id" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo Form::submit(__('equicare.submit'), ['class' => 'btn btn-primary submit_attend btn-sm']); ?>

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('equicare.close'); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="call_complete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['method' => 'post', 'route' => 'preventive_call_complete', 'files' => true]); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo app('translator')->get('equicare.complete_call'); ?></h4>
                </div>
                <div class="modal-body">
                    <?php if(count($errors->complete_call) > 0): ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="alert alert-danger">
                                    <ul class=" mb-0">
                                        <?php $__currentLoopData = $errors->complete_call->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('call_complete_date_time', __('equicare.call_complete_date_time')); ?>

                            <?php echo Form::text('call_complete_date_time', null, ['class' => 'form-control call_complete_date_time']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="next_due_date">
                                <?php echo app('translator')->get('equicare.next_due_date'); ?>
                            </label>
                            <div class="input-group">
                                <?php echo Form::text('next_due_date', null, ['class' => ['form-control', 'next_due_date']]); ?>

                                <span class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('service_rendered', __('equicare.service_rendered')); ?>

                            <?php echo Form::select(
                                'service_rendered',
                                [
                                    'Cleaning of filters' => __('equicare.cleaning_filters'),
                                    'Check electrics and wiring' => __('equicare.electrics_wiring'),
                                    'Internal Cleaning' => __('equicare.internal_cleaning'),
                                    'Display Working' => __('equicare.display_working'),
                                    'Parts replaced accounrding to the manufacturer guidlines' => __(
                                        'equicare.parts_replaced_accounrding_manufacturer_guidlines',
                                    ),
                                    'Other Parameters' => __('equicare.other_parameters'),
                                    'add_new' => '+' . __('equicare.add_new'),
                                ],
                                null,
                                ['placeholder' => __('equicare.select_option'), 'class' => 'form-control test service_rendered_select2'],
                            ); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label>&nbsp;</label>
                            <input type="text" name="new_item" value=""
                                class="new_item form-control none-display" placeholder="<?php echo app('translator')->get('equicare.enter_service'); ?>" />
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('equicare.working_status'); ?></label>
                            <?php echo Form::select(
                                'working_status',
                                [
                                    'working' => __('equicare.working'),
                                    'not working' => __('equicare.not_working'),
                                    'pending' => __('equicare.pending'),
                                ],
                                null,
                                ['placeholder' => '--select--', 'class' => 'form-control test working_status'],
                            ); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('remarks', __('equicare.remarks')); ?>

                            <?php echo Form::textarea('remarks', null, ['class' => 'form-control remarks', 'rows' => 2]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('sign_of_engineer', __('equicare.sign_of_engineer')); ?>

                            <?php echo Form::file('sign_of_engineer', [
                                'class' => 'form-control sign_of_engineer',
                                'id' => 'sign_of_engineer',
                            ]); ?>

                            <?php echo e(Form::hidden('b_id', null, ['class' => 'b_id'])); ?>

                            <!-- <a class="view_image_sign_of_engineer" href="" target="_blank">
                                view
                            </a> -->
                            
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('sign_stamp_of_incharge', __('equicare.sign_stamp_of_incharge')); ?>

                            <?php echo Form::file('sign_stamp_of_incharge', [
                                'class' => 'form-control sign_stamp_of_incharge',
                                'id' => 'sign_stamp_of_incharge',
                            ]); ?>

                            
                        </div>
                        <input type="hidden" name="id" class="id" value="">

                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo Form::submit(__('equicare.submit'), ['class' => 'btn btn-primary submit_call btn-sm']); ?>

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('equicare.close'); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.service_rendered_select2').select2({
                placeholder: '<?php echo e(__('equicare.select_option')); ?>',
                allowClear: true,
                tags: true,

            });
            $('.next_due_date').datepicker({
                todayHighlight: true,
                format: "<?php echo e(env('date_settings') == '' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
            })
            if ( $('.service_rendered_select2').val() == 'add_new') {
                    $('.new_item').show();
            }
            $('.service_rendered_select2').on('change', function() {
                var val = $(this).val();
                if (val == 'add_new') {
                    $('.new_item').show();
                } else {
                    $('.new_item').hide();
                }
                $('.new_item').on('blur', function() {
                    var result = $('.new_item').val();
                    $.ajax({
                        url: '<?php echo e(url('call_complete_preventive_new_item')); ?>',
                        method: 'post',
                        data: {
                            'new_item': result
                        },
                        success: function(response) {
                            if ($(".service_rendered_select2").find("option[value='" +
                                    response.new_item_db.new_item + "']").length) {
                                $(".service_rendered_select2").val(response.new_item_db
                                    .new_item).trigger("change");
                            } else {
                                var newItem = new Option(response.new_item_db.new_item,
                                    response.new_item_db.new_item, true, true);
                                // Append it to the select
                                $(".service_rendered_select2 option:last").before(
                                    newItem).trigger('change');
                            }
                            $('.service_rendered_select2').next(".select2-container")
                                .show();
                            $('.new_item').hide();
                        }
                    });

                });
            });

            <?php if(count($errors->attend_call) > 0): ?>
                $('#attend_modal').modal('show');
            <?php endif; ?>
            <?php if(count($errors->complete_call) > 0): ?>
                $('#call_complete_modal').modal('show');
            <?php endif; ?>
            $('.call_complete_date_time').datetimepicker({
                format: 'Y-MM-D hh:mm A',

            });
			$('.call_attend_date_time').datetimepicker({
                format: 'Y-MM-D hh:mm A',

            });

        });
        $('.attend_btn').on('click', function() {
            var id = $(this).attr('data-id');
            $('.test').val($(this).attr('data-status'));
            $.ajax({
                url: '<?php echo e(url('admin/call/preventive_maintenance/attend')); ?>' + '/' + id,
                method: 'get',
                data: {
                    id: id,
                },
                success: function(response) {
                    $('.call_attend_date_time').datetimepicker({
                        format: 'Y-MM-D hh:mm A',
                    });
                    $('.call_attend_date_time').datetimepicker('destroy');
                    $('.call_attend_date_time').val(response.p_m.call_attend_date_time);

                    $('.call_attend_date_time').datetimepicker({
                        format: 'Y-MM-D hh:mm A',
                    });
                    $('.user_attended').val(response.p_m.user_attended);
                    $('.service_rendered').val(response.p_m.service_rendered);
                    $('.remarks').text(response.p_m.remarks);
                    $('.working_status').val(response.p_m.working_status);
                    $('.b_id').val(response.p_m.id);
                }
            });
        });
        $('.call_complete_btn').on('click', function() {
            var id = $(this).attr('data-id');
            $('.test').val($(this).attr('data-status'));
            $.ajax({
                url: '<?php echo e(url('admin/call/preventive_maintenance/call_complete')); ?>' + '/' + id,
                method: 'get',
                data: {
                    id: id,
                },
                success: function(response) {
                    $('.call_complete_date_time').datetimepicker({
                        format: 'Y-MM-D hh:mm A',
                    });
                    $('.next_due_date').datepicker({
                        todayHighlight: true,
                        format: "<?php echo e(env('date_settings') == '' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
                    });
                    $('.next_due_date').datepicker('destroy');
                    $('.call_complete_date_time').datetimepicker('destroy');
                    $('.call_complete_date_time').val(response.p_m.call_complete_date_time);
                    $('.call_complete_date_time').datetimepicker({
                        format: 'Y-MM-D hh:mm A',
                    });
                    $('.service_rendered_select2').val(response.p_m.service_rendered);
                    $('.next_due_date').val(response.p_m.next_due_date);
                    $('.next_due_date').datepicker({
                        todayHighlight: true,
                        format: "<?php echo e(env('date_settings') == '' ? 'yyyy-mm-dd' : env('date_settings')); ?>",
                    });
                    $('.service_rendered_select2').val(response.p_m.service_rendered);
                    $.each(response.n_i, function(key, value) {

                        if ($(".service_rendered_select2").find("option[value='" + value
                                .new_item + "']").length) {
                            $(".service_rendered_select2").val(value.new_item).trigger(
                            'change');
                        } else {
                            var newItem = new Option(value.new_item, value.new_item, false,
                                false);
                            $('.service_rendered_select2 option:last').before(newItem).trigger(
                                'change');

                        }

                    });
                    $('.service_rendered_select2').val(response.p_m.service_rendered);
                    $('.remarks').text(response.p_m.remarks);

                    $('.working_status').val(response.p_m.working_status);
                    $('.b_id').val(response.p_m.id);

                   $('.view_image_sign_stamp_of_incharge').attr('href',"<?php echo e(asset('uploads')); ?>"+'/'+response.b_m.sign_stamp_of_incharge);
                    if (response.p_m.sign_stamp_of_incharge != null) {
                        $('.view_image_sign_stamp_of_incharge').show();
                    } else {
                        $('.view_image_sign_stamp_of_incharge').hide();
                    }
                 	$('.view_image_sign_of_engineer').attr('href',"<?php echo e(asset('uploads')); ?>"+'/'+response.b_m.sign_of_engineer);
                    if (response.p_m.sign_of_engineer != null) {
                        $('.view_image_sign_of_engineer').show();
                    } else {
                        $('.view_image_sign_of_engineer').hide();
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
    <style type="text/css">
        .select2-container {
            display: block;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/call_preventive/index.blade.php ENDPATH**/ ?>