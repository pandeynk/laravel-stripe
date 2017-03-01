<?php if(Session::has('danger') || Session::has('success')): ?>
	<div class="alert alert-dismissible alert-<?php echo e(Session::has('danger')?'danger':'success'); ?>">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <div><?php echo e(Session::has('danger')?Session::get('danger'):Session::get('success')); ?></div>
	</div>
<?php endif; ?>
