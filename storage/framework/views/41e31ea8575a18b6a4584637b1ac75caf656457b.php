<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- New task form -->
			<form action="<?php echo e(url('tasks')); ?>" method="POST">
				<?php echo e(csrf_field()); ?>


				<div class="form-group">
					<div class="input-group">
						<!-- New task name -->
						<label for="newTaskName" class="sr-only">New Task Name</label>
						<input type="text" name="name" id="newTaskName" class="form-control" placeholder="Enter your tasks name">
						
						<!-- Add task button -->
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Add Task</button>
						</span>
					</div>
				</div>

				<!-- Display validation errors -->
				<?php echo $__env->make('commons.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</form>			

			
			<!-- Current tasks -->
			<div class="panel panel-info">
				<div class="panel-heading">Tasks</div>

				<div class="panel-body">
					<?php if(count($tasks)): ?>
						<table class="table table-hover" id="taskListTable">
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<!-- Task name -->
										<td>
											<?php if($task->done): ?>
												<del><?php echo e($task->name); ?></del>
											<?php else: ?>
												<?php echo e($task->name); ?>

											<?php endif; ?>
										</td>
										<td class="text-center">
											<!-- Mark as done/undone button -->
											<form class="inline" action=<?php echo e(url('tasks/'.$task->id)); ?> method="POST">
												<?php echo e(csrf_field()); ?>

												<?php echo e(method_field('PATCH')); ?>


												<?php if($task->done): ?>
													<button class="btn btn-danger" type="submit" aria-label="Undone" title="Mark as undone">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												<?php else: ?>
													<button class="btn btn-success" type="submit" aria-label="Done" title="Mark as done">
														<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
													</button>
												<?php endif; ?>
											</form>											
											<!-- Delete button -->
											<form class="inline" action="<?php echo e(url('tasks/'.$task->id)); ?>" method="POST">
												<?php echo e(csrf_field()); ?>

												<?php echo e(method_field('DELETE')); ?>

												
												<button class="btn btn-default" type="submit" aria-label="Delete" title="Delete task">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>
											</form>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					<?php else: ?>
						<p class="text-center">
							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> You don't have any task yet. Adding new task lists!
						</p>
					<?php endif; ?>

					<?php echo e($tasks->links()); ?>

				</div>
			</div>	
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Full Moon\Documents\Assignment\Assignment\laravel-sample-intermediate-task-list\resources\views/tasks/index.blade.php ENDPATH**/ ?>