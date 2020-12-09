let app = new Vue({
	el: '#app',
	data: {
		tasks: [],
		recentlyCompletedTasks: [],
		create: {
			task: null
		}
	},
	methods: {
		addTask() {
			window.localStorage.clear() // Clearing tasks to re-add after creation
			this.tasks.push(this.create.task) // Adding to task array for instant result
			window.localStorage.setItem('tasks', JSON.stringify(this.tasks)); //Adding task to browsers storage
			toastr.success('Task Added!')
			this.create.task = null
		},
		completeTask(task) {
			this.recentlyCompletedTasks.push(task) // Adds to recently completed tasks
			let key = this.tasks.find((x) => { return x == task })
			this.tasks.splice(key, 1) // Removes task from array
			toastr.success('Task: "' + task + '" completed!')
		},
		restoreTask(task) {
			this.tasks.push(task) // Re-adds to array
			let key = this.recentlyCompletedTasks.find((x) => { return x == task })
			this.recentlyCompletedTasks.splice(key, 1) // Removes task from array
			toastr.success('Task: "' + task + '" restored!')
		}
	},
	mounted() {
		let storedTasks = window.localStorage.getItem('tasks'); // Gets tasks from browser storage
		if (storedTasks) {
			this.tasks = JSON.parse(storedTasks) // Turns JSON string into array
		}
	}
})