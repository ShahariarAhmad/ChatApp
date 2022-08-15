<template>
	<div class=" bg-gray-100 py-12">
		<div class="flex justify-center items-center">
			<div class="w-80 bg-white rounded shadow-2xl">
				<nav class="w-full h-10 bg-gray-900 rounded-tr rounded-tl flex justify-between items-center">
				<span class="text-xs font-medium text-gray-300 ml-1"></span>
				</nav>
				<div class="overflow-auto px-1 py-1" style="height: 30rem;" id="journal-scroll">
					<div v-for="(data, i) in chats" :key="i" class="flex pr-10 mb-2"
						:class="data.id == 1 ? 'items-center' : 'flex justify-end'">
						<span class="flex ml-1 h-auto  text-gray-200 text-xs font-normal rounded-sm px-1 p-1 items-end"
							:class="data.id == 1 ? 'bg-indigo-600' : 'bg-sky-500'" style="font-size: 10px;">
							{{ data.chat }}
							<br>
							<span class="bg-gray-900 px-2 ml-3" style="font-size: 8px;">{{ data.name }}</span>
						</span>

					</div>
				</div>
				<div class="flex flex-col justify-center items-center">
					<input type="text" @keyup.enter="typing" v-model="text" class="rounded-full pl-6 pr-6 py-2 w-3/4 justify-center  h-auto mb-5 bg-gray-200"
						style="font-size: 11px;" placeholder="Type a message...">
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios';


export default {

	data() {
		return {
			chats: [],
			text: null,
			show: true,
			name: null,
			id: null,
		}
	},
	methods: {
		typing() {

			const obj = new FormData()
			obj.append('chat', this.text)
			obj.append('name', this.name)
			obj.append('id', this.id)

			if (this.text !== '') {
				axios.post('api/event', obj).then(() => {
					this.text = ''
				})

			}

		},
	},
	mounted() {

		axios.get('/user').then(r => {
			// console.log(r.data)
			this.name = r.data.name
			this.id = r.data.id

		});

		Echo.private('chat')
			.listen('sendEvent', (e) => {
				console.table(e)
				this.chats.push(e.texts);

			});
	},


}


</script>




<style>
#journal-scroll::-webkit-scrollbar {
	width: 6px;
	cursor: pointer;


}

#journal-scroll::-webkit-scrollbar-track {
	background-color: rgba(229, 231, 235, var(--bg-opacity));
	cursor: pointer;

}

#journal-scroll::-webkit-scrollbar-thumb {
	cursor: pointer;
	background-color: #a0aec0;
}
</style>