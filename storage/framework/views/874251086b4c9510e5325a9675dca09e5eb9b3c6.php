
		<form action="<?php echo e(route('search.index')); ?>" method="GET">
			<?php echo method_field('GET'); ?>
            <?php echo csrf_field(); ?>
		<!--<input type="text" name="query" placeholder="Search...">-->
		<select name="query">
			<option value="">Select Department</option>
			<?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($dept->departmentname); ?>"><?php echo e($dept->departmentname); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
		<button type="submit" class="btn btn-primary">Search</button>
		</form><?php /**PATH /Users/gerard.alainp/Documents/GitHub/UPOUIS295B/laravel/resources/views/layouts/search.blade.php ENDPATH**/ ?>