<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router  } from '@inertiajs/vue3';
import TodoList from '@/Components/TodoList.vue';
import { reactive } from 'vue';

/**
 * Props
 */
defineProps({
    userType: {
        type: String,
    },
    todoes: {
        type: Array,
    }
});

const form = useForm({
    password: '',
});

/**
 * Store
 */ 
const store = reactive({
    checkedItem: null,
})

/**
 * Events
 */ 
const onCheckedItem = (id) => {
    store.checkedItem = id
}

const onDeleteItem = () => {
    if (confirm('Are you sure you want to delete this user?')) {
        router.delete(
            route("todo.destroy"), 
            {data: {id: store.checkedItem}, preserveScroll: true}
        );
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Todo Lists</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm ">
                    <div class="p-6 text-gray-900">

                        <div class="my-3">
                            <button class="bg-neutral-100 hover:bg-neutral-300 text-gray-800 font-bold py-2 px-4 mx-2  inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                  </svg>
                                <span>New Task</span>
                              </button>
                            <button class="bg-neutral-100 hover:bg-neutral-300 text-gray-800 font-bold py-2 px-4 mx-2  inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                  </svg>
                                  
                                <span>Edit</span>
                              </button>
                            <button class="bg-neutral-100 hover:bg-neutral-300 text-gray-800 font-bold py-2 px-4 mx-2  inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                  </svg>
                                  
                                <span>Detail</span>
                              </button>
                            <button @click="onDeleteItem" :disabled="!store.checkedItem" class="disabled:opacity-25 disabled:cursor-not-allowed bg-red-100 hover:bg-red-300 text-red-800 font-bold py-2 px-4 mx-2  inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                                <span>Delete</span>
                              </button>
                        </div>

                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <TodoList @checked-item="onCheckedItem" :todoes="todoes.filter(todo => todo.tasktype === 'todo')" title="To Do" /> 
                                    <TodoList @checked-item="onCheckedItem" :todoes="todoes.filter(todo => todo.tasktype === 'inprogress')" title="In Progress" /> 
                                    <TodoList @checked-item="onCheckedItem" :todoes="todoes.filter(todo => todo.tasktype === 'done')" title="Done" /> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
