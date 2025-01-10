<template>
    <app-layout>
                
        <div class=""> 
            <div class="max-w-7xl mx-auto p-6">
                <div class="flex flex-col justify-center items-center relative h-64 bg-black bg-opacity-50 text-white">
                    <img class="h-24 w-24 object-cover rounded-full" :src="item.picture">
                    <h1 class="text-2xl font-semibold my-2">{{ item.name }}</h1>
                    <h4 class="text-sm font-semibold">{{ item.address }}</h4> 
                </div>
                <div class="bg-white shadow w-full py-4">
                    <inertia-link :href="route('agency.addcar', item.id )"  class="hover:text-blue-500 text-gray-400 font-bold py-2 px-4" >
                        Add New product
                    </inertia-link>
                      <inertia-link :href="route('ad.create', item.id)"  class="hover:text-blue-500 text-gray-400 font-bold py-2 px-4" >
                        Add New Advertisement
                    </inertia-link>
                     <inertia-link :href="route('chat',{type:'inbox',username:null})"  class="hover:text-blue-500 text-gray-400 font-bold py-2 px-4" >
                        Messages
                    </inertia-link>
                      <inertia-link :href="route('agency.setting', item.id)"  class="hover:text-blue-500 text-gray-400 font-bold px-4 float-right" >
                       Agency Setting
                    </inertia-link>
                </div>
                <div class="grid grid-cols-9 gap-10 mt-4 md:px-4 md:my-7 ">
                    <div class="col-span-3" v-for="(product,index) in products" :key="index">
                         <inertia-link :href="route('post', product.id)">
                        <div class="max-w-xs flex flex-col rounded overflow-hidden shadow-lg my-2">
                            <img class="w-full h-full object-contain border-b-2 my-4" :src="product.picture" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold mb-2 text-green-400 ">{{ product.price }} DT</div> 
                                <div class="font-bold mb-2">{{ product.name }}</div> 
                            </div> 
                        <div class="flex flex-row text-center shadow rounded"> 
                            <inertia-link :href="route('post', product.id)" class="flex-1 py-2 hover:bg-gray-200 cursor-pointer">Show</inertia-link>
                            <inertia-link :href="route('editcar', product.id)" class="flex-1 py-2 hover:bg-gray-200 cursor-pointer">Edit</inertia-link>
                            <inertia-link  class="flex-1 py-2 hover:bg-red-500 cursor-pointer hover:text-white">Delete</inertia-link>
                        </div>
                        </div>
                        	 </inertia-link>
                    </div> 
                </div> 
        </div>  
     </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    export default {
        props : ['item','products'],
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
