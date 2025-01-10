<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
                <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
          
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Users</span>
                    <span class="text-lg font-semibold">{{ count.users }}</span>
                  </div>
                  <div class=" box-border h-20 w-20 rounded-lg bg-gray-200 p-4">
                    <img class="py-2 object-contain" src="https://devtalk.blender.org/uploads/default/original/2X/c/cbd0b1a6345a44b58dda0f6a355eb39ce4e8a56a.png" alt="">
                  </div>
                </div>
                <div>
                  <span class="inline-block mx-2 px-2 text-sm text-white bg-green-300 rounded">30%</span>
                  <span>From 2021</span>
                </div>
              </div>
            
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">New Users</span>
                    <span class="text-lg font-semibold">{{ count.new_users}}</span>
                  </div>
                  <div class=" box-border h-20 w-20 rounded-lg bg-gray-200 p-4">
                    <img class="py-2 object-contain" src="https://devtalk.blender.org/uploads/default/original/2X/c/cbd0b1a6345a44b58dda0f6a355eb39ce4e8a56a.png" alt="">
                  </div>
                      </div>
                <div>
                  <span class="inline-block px-2 mx-2 text-sm text-white bg-green-300 rounded">17%</span>
                  <span>Last Month </span>
                </div>
              </div>
            
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400"> Cars </span>
                    <span class="text-lg font-semibold">{{ count.cars }}</span>
                  </div>
                  <div class=" box-border h-20 w-20 rounded-lg bg-gray-200 p-4">
                    <img class=" object-contain" src="https://pics.freeicons.io/uploads/icons/png/10320105721596026964-512.png" alt="">
                  </div>
                  </div>
                <div>
                  <span class="inline-block px-2 mx-2 text-sm text-white bg-green-300 rounded">24%</span>
                  <span>From 2021</span>
                </div>
              </div>
            
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Agencies</span>
                    <span class="text-lg font-semibold">{{ count.agencies }}</span>
                  </div>
                  <div class=" box-border h-20 w-20 rounded-lg bg-gray-200 p-4">
                    <img class=" object-contain" src="https://cdn.iconscout.com/icon/premium/png-512-thumb/travel-agency-2-1053470.png" alt="">
                  </div>
             </div>
                <div>
                  <span class="inline-block px-2 mx-2 text-sm text-white bg-green-300 rounded">44%</span>
                  <span>From 2021 </span>
                </div>
              </div>
            </div>
    <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 z-20 ">
        <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-full uppercase ">
             Shortcuts : 
        </h2>
    </div>
      <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
                  
    <inertia-link :href="route('home')" class="w-full items-center  justify-items-center pt-5 h-20 bg-indigo-500 shadow-2xl rounded-lg  text-center ">
        <h2 class="text-2xl  font-bold  text-white sm:text-4xl sm:leading-10">
            HOME
        </h2>
    </inertia-link>
    <inertia-link :href="route('store')" class="w-full items-center  justify-items-center pt-5 h-20 bg-yellow-500 shadow-2xl rounded-lg  text-center ">
        <h2 class="text-2xl  font-bold  text-white sm:text-4xl sm:leading-10">
            Store
        </h2>
    </inertia-link>
    <inertia-link :href="route('agencies')" class="w-full items-center  justify-items-center pt-5 h-20 bg-red-500 shadow-2xl rounded-lg  text-center ">
        <h2 class="text-2xl  font-bold  text-white sm:text-4xl sm:leading-10">
            Agencies
        </h2>
    </inertia-link>
        <inertia-link :href="route('contact')" class="w-full items-center  justify-items-center pt-5 h-20 bg-green-500 shadow-2xl rounded-lg  text-center ">
        <h2 class="text-2xl  font-bold  text-white sm:text-4xl sm:leading-10">
            Contact Us
        </h2>
    </inertia-link>
                  
              </div>
        <div class="grid grid-cols-2	">
            <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 z-20 ">
        <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-full uppercase ">
          Last 10 Users : 
        </h2>
<div class="mt-4 mt-6w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="w-full bg-white table-auto">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
          <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
          <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
          <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
        </tr>
      </thead>
    <tbody class="text-gray-700">
      <tr v-for="(u,index) in users" :key="index">
        <td class="w-1/12 text-left py-3 px-4">{{u.id}}</td>
        <td class="w-1/6 text-left py-3 px-4">{{u.name}}</td>
        <td class="w-1/6 text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:">{{u.phone}}</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:">{{u.mail}}</a></td>
      </tr>
    </tbody>
    </table>
  </div>
</div>
    </div>
                <div class=" w-full mx-auto py-4 px-4 sm:px-6 lg:py-4 lg:px-10 z-20 ">
        <h2 class="text-lg font-bold text-gray-600  title-font px-2 mt-4 pb-2 border-b-2 border-indigo-300 w-full uppercase ">
           Last 10  Agencies : 
        </h2>
        <div class="mt-4 mt-6w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="w-full bg-white table-auto">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
          <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
          <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
          <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
        </tr>
      </thead>
    <tbody class="text-gray-700">
      <tr v-for="(ag,index) in agencies" :key="index">
        <td class="w-1/12 text-left py-3 px-4">{{ag.id}}</td>
        <td class="w-1/6 text-left py-3 px-4">{{ag.name}}</td>
        <td class="w-1/6 text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:">{{ag.phone}}</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:">{{ag.mail}}</a></td>
      </tr>
    </tbody>
    </table>
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
        props: ['count','users','agencies'],
        components: {
            AppLayout, 
        },
    }
</script>
