<template >
    <app-layout>
    <div class="dark:bg-gray-800 bg-white relative h-screen">
     <div class="max-w-7xl mx-auto p-2">          
        <div class="relative bg-white dark:bg-gray-800 p-4">
            <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-12 lg:items-center">
                <div class="lg:col-start-2 md:pl-20">
                    <h4 class="text-2xl leading-8 font-extrabold text-gray-900 dark:text-white tracking-tight sm:leading-9">
                        Why Pro Sellers ?
                    </h4>
            <ul class="mt-10">
                <li>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                Good Prices
                            </h5>
                            <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                               Buying a car from agency is always cheaper .
                            </p>
                        </div>
                    </div>
                </li>
                <li class="mt-10">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                All info provided, 100% Honesty
                            </h5>
                            <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                               You will not be afraid from fake infos from vendor (Modified Kilometrage, Cars Problem ...).
                            </p>
                        </div>
                    </div>
                </li>
                <li class="mt-10">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                After sale Service
                            </h5>
                            <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                               A quality afte sale service, The agency will help you with everything you need.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mt-10 -mx-4 md:-mx-12 relative lg:mt-0 lg:col-start-1">
            <img src="https://i.ibb.co/C8LVN9S/Pngtree-car-dealer-showroom-flat-illustration-5426815.png" alt="illustration" class="relative mx-auto w-50 h-70 w-auto"/>
        </div>
    </div>
<div class="bg-white dark:bg-gray-800 ">
</div>
    <div class="bg-white ">
    <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 z-20 ">
        <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-40 uppercase ">
            Agencies list : 
        </h2>
    </div>
</div>
 <div class="grid grid-cols-9 gap-10 mt-4 px-4 my-7 ">
<div  v-for="(agency,index) in agencies" :key="index"  class=" col-span-3 rounded shadow border-2 p-4 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600">
    <div class="flex flex-row items-start gap-4">
        <img :src="agency.picture" class="w-28 h-28 rounded-lg"/>
        <div class="h-28 w-full flex flex-col justify-between">
            <div>
                <p class="text-gray-800 dark:text-white text-xl font-medium">
                    {{ agency.name }}
                </p>
                <p class="text-gray-400 text-xs">
                        {{ agency.adress }}
                </p>
            </div>
            <div class="rounded-lg bg-blue-100 dark:bg-white p-2 w-full">
                <div class="text-center text-sm text-gray-400 dark:text-black">
                    <p class="flex flex-col text-center">
                        Cars
                        <span class="text-black dark:text-indigo-500 font-bold">
                            {{agency.carNumber}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between gap-4 mt-6">
         <inertia-link :href="route('chat',{type:'agency',username:agency.username})" class="w-1/2 px-4 py-2 text-base border rounded-lg text-grey-500 bg-white hover:bg-gray-200 text-center">
            Chat
        </inertia-link>
        <inertia-link :href="route('agency',agency.username)"  class="w-1/2 px-4 py-2 text-base border rounded-lg text-white bg-indigo-500 hover:bg-indigo-700 text-center ">
            View store
        </inertia-link>
    </div>
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
        props : ['agencies'],
        data() {
            return {


            }
        },
        components: {
            AppLayout, 
        },
        methods: {
            
        }
    }
</script>
