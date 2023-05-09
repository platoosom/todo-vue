<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router  } from '@inertiajs/vue3';
import { reactive } from 'vue';
import TodoList from '@/Components/TodoList.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';

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
    tasktype: '',
    company: '',
    contact: '',
    subject: '',
    assignto: '',
    duedate: '',
    duetime: '',
    reminderdate: '',
    remindertime: '',
    priority: '',
    detail: '',
});

/**
 * Store
 */ 
const store = reactive({
    checkedItem: null,
    openModal: false,
})

/**
 * Events
 */ 
const onCheckedItem = (id) => {
    store.checkedItem = id
};
const openModal = () => {
    store.openModal = true;
};
const closeModal = () => {
    store.openModal = false;
};

/**
 * Add Item
 */
const onInsertItem = () => {
    form.post(route('todo.create'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {},
    });
}
 

/**
 * Delete Item event
 */
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
                            <button @click="openModal" class="bg-neutral-100 hover:bg-neutral-300 text-gray-800 font-bold py-2 px-4 mx-2  inline-flex items-center">
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

                    <Modal :show="store.openModal" @close="closeModal">
                        <div class="">
                            
                            
                            <div class="md:flex md:items-center px-6 py-3 border-b">
                                <div class="md:w-1/3">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Add Task
                                    </h2>
                                </div>
                                <div class="md:w-2/3 text-gray-500 ">
                                    <button @click="closeModal" class="float-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                          </svg>
                                    </button>
                                </div>
                              </div>
                            
                            <form @submit.prevent="onInsertItem" class="w-full p-6">
                                <div class="md:flex md:items-center mb-6">
                                  <div class="md:w-1/3">
                                    <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="tasktype">
                                      Task Type
                                    </label>
                                  </div>
                                  <div class="md:w-2/3">
                                    <select v-model="form.tasktype" name="tasktype" id="tasktype" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                                        <option value="todo">Todo</option>
                                        <option value="inprogress">In Progress</option>
                                        <option value="done">Done</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                        <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="company">
                                            Company
                                        </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input v-model="form.company" name="company"  id="company"  class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                  <div class="md:w-1/3">
                                    <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="contact">
                                      Contact
                                    </label>
                                  </div>
                                  <div class="md:w-2/3">
                                    <input v-model="form.contact" name="contact" id="contact" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="text">
                                  </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                  <div class="md:w-1/3">
                                    <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="subject">
                                      Subject/Objective
                                    </label>
                                  </div>
                                  <div class="md:w-2/3">
                                    <input v-model="form.subject" name="subject" id="subject" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="text">
                                  </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                      <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="assignto">
                                        Assigned To
                                      </label>
                                    </div>
                                    <div class="md:w-2/3">
                                      <select v-model="form.assignto" name="assignto" id="assignto" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                                          <option value="4">Administrator</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                      <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="duedate">
                                        Due Date
                                      </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <div class="md:flex md:items-center ">
                                            <div class="md:w-1/2 mr-1">
                                                <input v-model="form.duedate" name="duedate" id="duedate" class="border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="date">
                                            </div>
                                            <div class="md:w-1/2 ml-1">
                                                <input v-model="form.duetime" name="duetime" id="duetime" class="border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="time">
                                            </div>
                                        </div>
                                    </div>
                                  </div>                                  
                                  <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                      <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="reminderdate">
                                        Set Remender
                                      </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <div class="md:flex md:items-center ">
                                            <div class="md:w-1/2 mr-1">
                                                <input v-model="form.reminderdate" name="reminderdate" id="reminderdate" class="border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="date">
                                            </div>
                                            <div class="md:w-1/2 ml-1">
                                                <input v-model="form.remindertime" name="remindertime" id="remindertime" class="border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="time">
                                            </div>
                                        </div>
                                    </div>
                                  </div>                                  
                                  <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                      <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="priority">
                                        Priority
                                      </label>
                                    </div>
                                    <div class="md:w-2/3">
                                      <select v-model="form.priority" name="priority" id="priority" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                                          <option value="low">Low</option>
                                          <option value="medium">Medium</option>
                                          <option value="high">High</option>
                                      </select>
                                    </div>
                                  </div>


                                <div class="md:flex md:items-center mb-6">
                                  <div class="md:w-1/3">
                                    <label class="block font-bold md:text-left mb-1 md:mb-0 pr-4" for="detail">
                                        Details 
                                    </label>
                                  </div>
                                  <div class="md:w-2/3">
                                    <textarea v-model="form.detail" name="detail" id="detail" rows="5" class="border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"></textarea>
                                  </div>
                                </div>
                                
                                <div class="md:flex md:items-center">
                                  <div class="md:w-1/3"></div>
                                  <div class="md:w-2/3">
                                    <DangerButton
                                    class="ml-3"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    @click="onInsertItem" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                    Add Task
                                </DangerButton>
                                  </div>
                                </div>
                              </form>
            
                             
             
                        </div>
                    </Modal>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
