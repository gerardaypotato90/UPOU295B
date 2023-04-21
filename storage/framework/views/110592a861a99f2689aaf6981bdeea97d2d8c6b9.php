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
            <?php echo e(__('Doctors Upcomming Appointment')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
    <section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Patient Name</th>
						      <th>Department</th>
						      <th>Appointment Date</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						<?php $__currentLoopData = $drappstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr class="alert" role="alert">
						      <th scope="row"><?php echo e($pl->patientname); ?></th>
						      <td><?php echo e($pl->department); ?></td>
						      <td><?php echo e($pl->appointmentdate); ?></td>
						      <td><?php echo e($pl->status); ?></td>
						      <td>
								<?php if($pl->status == 'For Approval'): ?>
						      	  <a href="approved/<?php echo e($pl->patientid); ?>/<?php echo e($pl->id); ?>" class="btn btn-primary">Approved</a>
								<?php endif; ?>
								<?php if($pl->status != 'Done Check-up'): ?>
								  <a href="reschedule/<?php echo e($pl->id); ?>" class="btn btn-primary">Reschedule</a>
								<?php endif; ?>
								<?php if($pl->status == 'Approved/Active'): ?>
								  <a href="cancel/<?php echo e($pl->patientid); ?>/<?php echo e($pl->id); ?>" class="btn btn-primary">Cancel</a>
								<?php endif; ?>
				        	  </td>
						    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /Users/gerard.alainp/Documents/GitHub/UPOUIS295B/laravel/resources/views/doctorspatientappointment.blade.php ENDPATH**/ ?>