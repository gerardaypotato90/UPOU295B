<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Appointment')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
	

    <section>
		<div class="container">
		<form action="<?php echo e(route('scheduleappointment.doclist')); ?>" method="GET">
			<?php echo method_field('GET'); ?>
            <?php echo csrf_field(); ?>
			<select name="query">
			<option value="">Select Department</option>
			<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($dept->departmentname); ?>"><?php echo e($dept->departmentname); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<button type="submit" class="btn btn-primary">Search</button>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Doctor Name</th>
						      <th>Department</th>
						      <th>Available Days</th>
						      <th>Available Time</th>
						      <th>Book Appointment</th>
						    </tr>
						  </thead>
						  <tbody>
						<?php $__currentLoopData = $drlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr class="alert" role="alert">
						      <th scope="row"><?php echo e($drl->doctorname); ?></th>
						      <td><?php echo e($drl->department); ?></td>
						      <td><?php echo e($drl->availabledays); ?></td>
						      <td><?php echo e($drl->availabletime); ?></td>
						      <td>
						      	
								<a href="/doctorschedule/<?php echo e($drl->doctorid); ?>" class="btn btn-primary">Book Appointment</a>
                                  <!--<button type="button" class="btn btn-primary">Book Appointment</button>-->
				        	  </td>
						    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
		</div>
	</section>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /Users/gerard.alainp/Documents/GitHub/UPOUIS295B/laravel/resources/views/scheduleappointment.blade.php ENDPATH**/ ?>