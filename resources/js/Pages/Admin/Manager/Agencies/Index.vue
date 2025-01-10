<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Agencies
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 z-20 ">
        <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-56 uppercase ">
            Pending Agencies : 
        </h2>
    </div>

  <div class="grid grid-cols-4 gap-4" >
                    <div class="bg-white border shadow rounded"  v-for="(agency,index) in inactive" :key="index">
                        <div class="flex flex-row p-3" >
                            <div class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="agency.logo"  />
                            </div>
                            <div class="flex-none flex-col"> 
                                <span class="bg-red-500 text-white float-right text-sm rounded px-2" ></span>
                                <h4 class="text-gray-500 text-lg capitalize w-48">{{ agency.name }}</h4>
                                <h3 class="text-gray-400 text-sm">{{ agency.email }}</h3>
                            </div>
                        </div>
                        <div class="flex flex-row text-center"> 
                             <inertia-link :href="route('agencies.show', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Show</inertia-link>
                            <inertia-link method="post" :href="route('agencies.accept', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-green-500 cursor-pointer">Accept</inertia-link>
                            <inertia-link method="delete" :href="route('agencies.destroy', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-red-500 cursor-pointer"  >Decline</inertia-link>
                        </div>
                        
                </div> 
            </div>

                <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 ">
                    <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-40 uppercase ">
                        Agencies list : 
                    </h2>
                </div>
                <div class="grid grid-cols-4 gap-4" >
                    <div class="bg-white border shadow rounded" v-for="(agency,index) in active" :key="index">
                        <div class="flex flex-row p-3" >
                            <div class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="agency.logo"  />
                            </div>
                            <div class="flex-none flex-col"> 
                                <span class="bg-red-500 text-white float-right text-sm rounded px-2" ></span>
                                <h4 class="text-gray-500 text-lg capitalize w-48">{{ agency.name }}</h4>
                                <h3 class="text-gray-400 text-sm">{{ agency.email }}</h3>
                            </div>
                        </div>
                        <div class="flex flex-row text-center"> 
                            <inertia-link :href="route('agencies.show', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Show</inertia-link>
                            <inertia-link :href="route('agencies.edit', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Edit</inertia-link>
                            <inertia-link method="post" :href="route('agencies.disable', agency.id)" class="flex-1 py-2 bg-gray-200 hover:bg-red-500 cursor-pointer hover:text-white">Disable</inertia-link>
                            
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
        props : ['active','inactive'],
        components: {
            AppLayout, 
        },
    }
</script>
