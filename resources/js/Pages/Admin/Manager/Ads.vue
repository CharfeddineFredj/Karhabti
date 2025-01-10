<template>
    <app-layout>
        <template #header>            
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Advertisement
            </h2>
        </template>
    <div class="bg-white w-1/2 mx-auto p-5 rounded shadow m-10 text-center border ">
        <div class="flex flex-col">
            <div class="grid grid-cols-12 hover:bg-gray-100 p-5 cursor-pointer" v-for="(ad,index) in adv" :key="index"> 
               
                <div class="col-span-1">{{ ad.id }}</div>
                <div class="col-span-4 text-left"> Ad Location : {{ ad.place }}  </div>
                <div  v-if="ad.active=='1'" class="col-span-3 text-left">  Ad Statut : <span class=" text-green-600">Active</span> </div>
                <div  v-if="ad.active=='0'" class="col-span-3 text-left">  Ad Statut : <span class=" text-red-600">Disabled</span>   </div>
                <div class="col-span-2 gap-4 ml-6">
                    <span @click="showModalAd(ad)" class="border mx-1 rounded p-2 border-gray-400 text-gray-400 hover:bg-gray-400 hover:text-white">View</span>
                 <span v-if="ad.active=='1'"><inertia-link  method="post" :href="route('disable_ad', ad.id)" class="border mx-1 rounded p-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-white">Disable</inertia-link> </span>
                 <span v-else ><inertia-link  method="post" :href="route('accept_ad', ad.id)" class="border mx-1 rounded p-2 border-green-400 text-green-400 hover:bg-green-400 hover:text-white">Activate</inertia-link></span>
                 <inertia-link method="post" :href="route('destroy_ad', ad.id)" class="border mx-1 rounded p-2 border-red-400 text-red-400 hover:bg-red-400 hover:text-white">Delete</inertia-link>
                </div>                            
 <modal :show="showModalAds" :closeable="true" >

     <span @click="showModalAds=false" class=" text-lg px-3 mt-2 bg-red-400 hover:bg-red-700 border rounded float-right mr-4 cursor-pointer">x</span>
        <section class="antialiased text-gray-900 bg-gray-50">
    <div class="card bg-white rounded shadow max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold  mb-2 text-center"> Ticket Number : {{modal.id}} </h1>
            <h2 class="text-bold text-center text-indigo-400">Location : </h2>
            <h2 class="text-center" > {{modal.location}} </h2>
            <h2 class="text-bold  text-center text-green-400">Demand by :  </h2>
            <h2 class="text-center" > {{modal.created_by}} </h2>
            <h2 class="text-center underline text-blue-500"><a v-bind:href="'http://127.0.0.1:8000/agency/'+modal.created_by">Agency Link</a></h2>
             <h2 class="text-bold text-center text-red-400"> Advertised URL :  : </h2>
            <h2 class="text-center underline text-blue-500">  <a v-bind:href="modal.url"> {{modal.url}}</a></h2>
            <h2 class="text-bold text-center text mb-4"> Ad Info : </h2>
            <h2 class=" text-xs" > {{modal.description}} </h2>
            <img class="mt-4" :src="modal.photo" alt="">
        </div>
            </div>
        </section>
     </modal>
            </div>

        </div>
            </div>
    </app-layout>
</template>


<script>
 import AppLayout from '@/Layouts/AppLayout' 
import Modal from '@/jetstream/Modal'
export default {
            props: ['adv'],
            components: {
            AppLayout, 
            Modal,
        },
    data(){
        return {
           showModalAds : false,
           modal : {

           }

        }
    },
    methods: {
        showModalAd: function(data){
            this.modal = data
            this.showModalAds=true
        }
    }
}
</script>
