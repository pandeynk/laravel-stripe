 <?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered" id="usersTable" width="100%">
            	<thead>
            		<tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Options</th>
                    </tr>
            	</thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!($user->hasRole('admin'))): ?>
                    <tr>
                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                        <?php echo e($user->roles->implode('display_name', ', ')); ?>

      					</td>
                        <td>
                        	<div class="btn-group blocks">
                        		<a class="btn btn-primary" data-toggle="tooltip" title="Edit" href="/users/<?php echo e($user->id); ?>">
                                	<i class="fa fa-edit"></i>
	                            </a>
	                            <a class="btn btn-danger" data-toggle="tooltip" title="Delete" href="/users/delete/<?php echo e($user->id); ?>">
	                                <i class="fa fa-remove" ></i>
	                            </a>
                        	</div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
          <script type="text/javascript">
		  	$(function(){
		  		$("#usersTable").DataTable({
                    "responsive": true,
                    "scrollX": true,
			        dom: 'Bfrtip',
			        buttons: [
			            'excel', 'pdf'
			        ]
		    	});
		  		$('[data-toggle="tooltip"]').tooltip();
		  		$(".dt-buttons").addClass('button-group');
		  		$(".dt-button").addClass("btn").addClass("btn-default");
		  	});
		  </script>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>