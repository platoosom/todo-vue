<script setup>
import { ref } from 'vue';

const props = defineProps({
    title: {
        type: String,
    },
    todoes: {
        type: Array,
    }
});

const emits = defineEmits(["checked-item"]); 
const currentItem = ref();

/**
 * Item has checked
 */ 
const checkedItem = (e) => {
    if(e.target.checked){
        currentItem.value = parseInt(e.target.value) ;
    }else{
        currentItem.value = 0;
    }

    emits("checked-item", currentItem)
};

</script>

<template>
    <div class="overflow-hidden">
        <h2 class="bg-neutral-300 px-6 py-4 font-bold">{{ title }}</h2>
        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Created</th>
                    <th scope="col" class="px-6 py-4">Subject / Objective</th>
                    <th scope="col" class="px-6 py-4">Created By</th>
                    <th scope="col" class="px-6 py-4">Company</th>
                    <th scope="col" class="px-6 py-4">Assign To</th>
                    <th scope="col" class="px-6 py-4">Due Date & Time</th>
                    <th scope="col" class="px-6 py-4">Priority</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="todo in todoes" class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium"><input type="checkbox" :value="todo.id" @change="checkedItem" /></td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.created_at }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.subject }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.owner }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.company }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.assignto }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ todo.duedate }}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                        </svg>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
