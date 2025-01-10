<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white border shadow rounded" v-for="(item,index) in users" :key="index">
                        <div class="flex flex-row p-3">
                            <div class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="item.profile_photo_url" :alt="item.name" />
                            </div>
                            <div class="flex-none flex-col"> 
                                <span class="bg-red-500 text-white float-right text-sm rounded px-2" v-if="item.role == 'admin'">Admin</span>
                                <h4 class="text-gray-500 text-lg capitalize">{{ item.name }}</h4>
                                <h3 class="text-gray-400 text-sm">{{ item.email }}</h3>
                            </div>
                        </div>
                        <div class="flex flex-row text-center"> 
                            <inertia-link :href="route('users.show', item.id)" class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Show</inertia-link>
                            <inertia-link :href="route('users.edit', item.id)" class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Edit</inertia-link>
                            <inertia-link method="delete" :href="route('users.destroy', item.id)" class="flex-1 py-2 bg-gray-200 hover:bg-red-500 cursor-pointer hover:text-white">Delete</inertia-link>
                        </div>
                        
                    </div>
                </div> 
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    export default {
        props : ['users'],
        components: {
            AppLayout, 
        },
    }
</script>
