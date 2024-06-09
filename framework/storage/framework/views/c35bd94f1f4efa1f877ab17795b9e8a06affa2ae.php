<?php $__env->startSection('body-title'); ?>
    <?php echo app('translator')->get('equicare.reports'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    | <?php echo app('translator')->get('equicare.report_time'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><?php echo app('translator')->get('equicare.report'); ?> </li>
    <li class="active"><?php echo app('translator')->get('equicare.time_report'); ?> </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="box-title"><?php echo app('translator')->get('equicare.filters'); ?> </h4>
                </div>
                <div class="box-body">
                    <?php
                        function format_interval(DateInterval $interval)
                        {
                            $result = '';
                            if ($interval->y) {
                                $result .= $interval->format('%y years ');
                            }
                            if ($interval->m) {
                                $result .= $interval->format('%m months ');
                            }
                            if ($interval->d) {
                                $result .= $interval->format('%d day(s) ');
                            }
                            if ($interval->h) {
                                $result .= $interval->format('%h hours ');
                            }
                            if ($interval->i) {
                                $result .= $interval->format('%i minutes ');
                            }
                        
                            return $result;
                        }
                        function convert_seconds($seconds)
                        {
                            $dt1 = new DateTime('@0');
                            $dt2 = new DateTime("@$seconds");
                            return format_interval($dt1->diff($dt2));
                        }
                        
                        function calculateIntervalAverage()
                        {
                            $arr = func_get_args();
                            $offset = new DateTime('@0');
                        
                            foreach ($arr as $int) {
                                $count_i = count($int);
                                foreach ($int as $interval) {
                                    $offset->add($interval);
                                }
                            }
                        
                            return convert_seconds(round($offset->getTimestamp() / $count_i));
                        }
                    ?>
                    <?php echo Form::open([
                        'url' => 'admin/reports/time_indicator/filter',
                        'method' => 'GET',
                        'style' => 'width:100%',
                        'class' => 'filter_form',
                        'name' => 'filter_form',
                    ]); ?>

                    <div class="row m-0">
                        <div class="form-group col-md-2">
                            <?php echo Form::label('hospital', __('equicare.hospital')); ?>

                            <?php echo Form::select('hospital', $hospitals, $hospital ?? null, [
                                'class' => 'form-control hospital_select',
                                'placeholder' => 'Select',
                            ]); ?>

                        </div>

                        <div class="form-group col-md-2">
                            <?php echo Form::label('equipment', __('equicare.equipment')); ?>

                            <?php echo Form::select('equipment', $equipments, $equipment_selected ?? null, [
                                'class' => 'form-control equipment_select',
                                'placeholder' => 'Select',
                            ]); ?>

                        </div>
                        <div class="form-group col-md-2">
                            <?php echo Form::label('call_type', __('equicare.call_type')); ?>

                            <?php echo Form::select(
                                'call_type',
                                ['breakdown' => __('equicare.breakdown'), 'preventive' => __('equicare.preventive')],
                                $call_type ?? null,
                                ['class' => 'form-control', 'placeholder' => 'Select'],
                            ); ?>

                        </div>
                        <div class="form-group col-md-2">
                            <?php echo Form::label('call_flow', __('equicare.date_filter')); ?>

                            <?php echo Form::select(
                                'call_flow',
                                [
                                    'call_register_date_time' => 'Call Register Date time',
                                    'call_attend_date_time' => 'Call Attend Date time',
                                    'call_complete_date_time' => 'Call Complete Date time',
                                ],
                                $call_flow ?? null,
                                ['class' => 'form-control', 'placeholder' => __('equicare.select')],
                            ); ?>

                        </div>
                        <div class="form-group col-md-2">
                            <?php echo Form::label('from_date', __('equicare.from_date')); ?>

                            <?php echo Form::text('from_date', $from_date ?? null, [
                                'class' => 'from_date form-control',
                                'placeholder' => __('equicare.select_from_date'),
                            ]); ?>

                        </div>
                        <div class="form-group col-md-2">
                            <?php echo Form::label('to_date', __('equicare.to_date')); ?>

                            <?php echo Form::text('to_date', $to_date ?? null, [
                                'class' => 'to_date form-control',
                                'placeholder' => __('equicare.select_to_date'),
                            ]); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" value="excel" id="excel_hidden" name="excel_hidden" class="hidden" />
                            <input type="submit" value="pdf" id="pdf_hidden" name="pdf_hidden" class="hidden" />

                            <input type="submit" value="<?php echo app('translator')->get('equicare.submit'); ?>" class="btn btn-primary btn-flat" />
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 table-responsive">
                            <table class="table table-avg">
                                <tr>
                                    <th> <?php echo app('translator')->get('equicare.avg_response_time'); ?>: </th>
                                    <td class="result_res_avg"></td>
                                    <th><?php echo app('translator')->get('equicare.avg_breakdown_time'); ?>: </th>
                                    <td class="result_brk_avg"></td>
                                    <th><?php echo app('translator')->get('equicare.avg_attend_complete_time'); ?>: </th>
                                    <td class="result_att_to_cmplt_avg"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="box-title"><?php echo app('translator')->get('equicare.time_report'); ?></h4>
                    <?php echo Form::label('excel_hidden', __('equicare.export_excel'), [
                        'class' => 'btn btn-success btn-flat excel',
                        'name' => 'action',
                        'tabindex' => 1,
                    ]); ?>

                    <?php echo Form::label('pdf_hidden', __('equicare.export_pdf'), [
                        'class' => 'btn btn-primary btn-flat pdf',
                        'name' => 'action',
                        'tabindex' => 2,
                    ]); ?>

                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> <?php echo app('translator')->get('equicare.equip_id'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.call_type'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.response_time'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.breakdown_time'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.attend_to_complete_time'); ?> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($call_entries) && $call_entries->count() > 0): ?>
                                    <?php $count = 0;
                                        
                                    ?>
                                    <?php $__currentLoopData = $call_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $count++;
                                            $reg_dt = new DateTime($entry->call_register_date_time);
                                            $attend_dt = new DateTime($entry->call_attend_date_time);
                                            $complete_dt = new DateTime($entry->call_complete_date_time);
                                            
                                            // Response time
                                            $res_interval = $reg_dt->diff($attend_dt);
                                            $resposne_time = format_interval($res_interval);
                                            if ($entry->call_attend_date_time) {
                                                $res_avg[] = $res_interval;
                                            }
                                            
                                            // Breakdown time
                                            $breakdown_interval = $reg_dt->diff($complete_dt);
                                            $breakdown_time = format_interval($breakdown_interval);
                                            if ($entry->call_register_date_time && $entry->call_complete_date_time) {
                                                $breakdown_avg[] = $breakdown_interval;
                                            }
                                            // Attend to Complete time
                                            $attend_to_complete_interval = $attend_dt->diff($complete_dt);
                                            $attend_to_complete_time = format_interval($attend_to_complete_interval);
                                            if ($entry->call_attend_date_time && $entry->call_complete_date_time) {
                                                $attend_to_complete_avg[] = $attend_to_complete_interval;
                                            }
                                        ?>

                                        <tr>
                                            <td> <?php echo e($count); ?></td>
                                            <td> <?php echo e($entry->equipment->unique_id ?? '-'); ?></td>
                                            <td> <?php echo e($entry->equipment->hospital->name ?? '-'); ?></td>
                                            <td> <?php echo e(ucfirst($entry->call_handle) ?? '-'); ?></td>
                                            <td> <?php echo e($entry->user_attended_fn->name ?? '-'); ?></td>
                                            <td> <?php echo e($entry->call_attend_date_time ? $resposne_time : '-'); ?> </td>
                                            <td> <?php echo e($entry->call_complete_date_time ? $breakdown_time : '-'); ?></td>
                                            <td> <?php echo e($entry->call_complete_date_time ? $attend_to_complete_time : '-'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($res_avg)): ?>
                                        <input type="hidden" name="res_avg" id="res_avg"
                                            value="<?php echo e(calculateIntervalAverage($res_avg)); ?>">
                                    <?php endif; ?>
                                    <?php if(isset($breakdown_avg)): ?>
                                        <input type="hidden" name="brk_avg" id="brk_avg"
                                            value="<?php echo e(calculateIntervalAverage($breakdown_avg)); ?>">
                                    <?php endif; ?>
                                    <?php if(isset($attend_to_complete_avg)): ?>
                                        <input type="hidden" name="att_to_cmplt_avg" id="att_to_cmplt_avg"
                                            value="<?php echo e(calculateIntervalAverage($attend_to_complete_avg)); ?>">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <tr class="text-center">
                                        <td colspan="8"> No Data available </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> # </th>
                                    <th> <?php echo app('translator')->get('equicare.equip_id'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.hospital'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.call_type'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.attended_by'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.response_time'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.breakdown_time'); ?> </th>
                                    <th> <?php echo app('translator')->get('equicare.attend_to_complete_time'); ?> </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php if(isset($call_entries)): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $call_entries->appends(request()->except(request()->all()))->render(); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".result_res_avg").text($('#res_avg').val());
            $(".result_brk_avg").text($('#brk_avg').val());
            $(".result_att_to_cmplt_avg").text($('#att_to_cmplt_avg').val());

            // Export buttons
            $('.excel').on('click', function() {
                var clicked = $('.export_hidden').val("1");
                $('.filter_form').submit();
            });
            $('.pdf').on('click', function() {
                var clicked = $('.pdf_hidden').val("1");
                $('.filter_form').submit();
            });
            <?php if(request('hospital')): ?>
                var hospital_id = <?php echo e(request('hospital')); ?>

                if (hospital_id) {
                    $.ajax({
                        url: "<?php echo e(url('admin/reports/time_indicator/ajax_equipment_based_on_hospital')); ?>",
                        method: 'get',
                        data: {
                            'hospital_id': hospital_id
                        },
                        success: function(data) {
                            $('.equipment_select').empty();
                            $('.equipment_select').append('<option value="">Select</option>');
                            $.each(data.equipments_filter, function(key, value) {
                                if (key == '<?php echo e($equipment ?? ''); ?>') {
                                    $('.equipment_select').append('<option value="' + key +
                                        ' selected">' + value + '</option>');
                                } else {
                                    $('.equipment_select').append('<option value="' + key +
                                        '">' + value + '</option>');
                                }
                            });
                        }
                    });
                }
            <?php endif; ?>
            <?php if(empty($res_avg)): ?>
                $(".result_res_avg").prev('label').css('display', 'none');
                $(".result_res_avg").parentsUntil('.row').remove();
                $(".result_res_avg").css('display', 'none');
            <?php endif; ?>
            <?php if(empty($breakdown_avg)): ?>
                $(".result_brk_avg").prev('label').css('display', 'none');
                $(".result_brk_avg").css('display', 'none');
            <?php endif; ?>
            <?php if(empty($attend_to_complete_avg)): ?>
                $(".result_att_to_cmplt_avg").prev('label').css('display', 'none');
                $(".result_att_to_cmplt_avg").css('display', 'none');
            <?php endif; ?>
            $('.from_date').datetimepicker({
                format: 'Y-MM-DD hh:mm A'
            });
            $('.to_date').datetimepicker({
                format: 'Y-MM-DD hh:mm A'
            });
            $('.hospital_select').on('change', function() {
                var hospital_id = $(this).val();
                if (hospital_id) {
                    $.ajax({
                        url: "<?php echo e(url('admin/reports/time_indicator/ajax_equipment_based_on_hospital')); ?>",
                        method: 'get',

                        data: {
                            'hospital_id': hospital_id
                        },
                        success: function(data) {
                            $('.equipment_select').empty();
                            $('.equipment_select').append('<option value="">Select</option>');
                            $.each(data.equipments_filter, function(key, value) {
                                $('.equipment_select').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
    <style type="text/css">
        .m-0 {
            margin: 0px;
        }

        div.row>.col-md-2 {
            padding-right: unset;
        }

        .table-avg th {
            padding-right: 0px !important;
            border-bottom: 1px solid #f4f4f4 !important;
        }

        .table-avg td {
            border-right: 1px solid #f4f4f4 !important;
            border-bottom: 1px solid #f4f4f4 !important;
            padding-left: 0px !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\equicare - main\framework\resources\views/reports/time_indicator.blade.php ENDPATH**/ ?>