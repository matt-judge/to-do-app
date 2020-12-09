<?php $__env->startSection('title', 'To Do Application'); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(mix('/js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="app" v-cloak>
	<h1 class="text-center">To Do List Application</h1>
	<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
		<div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
			<div class="grid grid-cols-1 md:grid-cols-2">
				<div class="p-6">
					<h4>My Tasks</h4>
					<h6 v-text="'You have ' + tasks.length + ' task' + (tasks.length == 1 ? '' : 's') + ' to do:'"></h6>
					<ul>
						<li v-for="task in tasks">
							<span v-text="task"></span>
							<a href="#" class="pl-2" @click="completeTask(task)">&#9744;</a>
						</li>
					</ul>
					<div v-if="recentlyCompletedTasks.length">
						<hr>
						<h4>Recently Completed Tasks:</h4>
						<ul>
							<li v-for="task in recentlyCompletedTasks">
								<span v-text="task"></span>
								<a href="#" class="text-success pl-2" @click="restoreTask(task)">&#9745;</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
					<h4>New Task</h4>
					<h6>Busy day ahead? Jot down a task you need to do here:</h6>
					<input type="text" autofocus v-model="create.task" placeholder="What do you need to do?">
					<div class="input-group-button">
						<input type="submit" @click="addTask" class="button success" value="Add Task">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\wwwroot\www\to-do-app\resources\views/index.blade.php ENDPATH**/ ?>