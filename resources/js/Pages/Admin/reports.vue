<template>
    <app-layout>
        <template #header>            
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reports
            </h2>
        </template>
    <div class="bg-white w-1/2 mx-auto p-5 rounded shadow m-10 text-center border ">
        <div class="flex flex-col">
            <div class="grid grid-cols-12 hover:bg-gray-100 p-5 cursor-pointer" v-for="(report,index) in reports" :key="index"> 
                <div class="col-span-1">{{ report.id }}</div>
                <div class="col-span-7 text-left">{{ report.message }}</div>
                <div class="col-span-2 gap-4 ml-6">
                <span @click="showModalReport(report)"  class="border mx-1 rounded p-2 border-gray-400 text-gray-400 hover:bg-gray-400 hover:text-white">View</span>
                <inertia-link  method="post" :href="route('accept_report', report.id)" class="border mx-1 rounded p-2 border-green-400 text-green-400 hover:bg-green-400 hover:text-white">Validate</inertia-link>
                 <inertia-link method="post" :href="route('delete_report', report.id)" class="border mx-1 rounded p-2 border-red-400 text-red-400 hover:bg-red-400 hover:text-white">Delete</inertia-link>
                </div>
                                   
 <modal :show="showModalReports" :closeable="true" >

     <span @click="showModalReports=false" class=" text-lg px-3 mt-2 bg-red-400 hover:bg-red-700 border rounded float-right mr-4 cursor-pointer">x</span>
        <section class="antialiased text-gray-900 bg-gray-50">
    <div class="card bg-white rounded shadow max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold  mb-2 text-center"> Report Number : {{Rep.id}} </h1>
            <h2 class="text-bold text-center text-indigo-400">Reason : </h2>
            <h2 class="text-center" > {{Rep.reason}} </h2>
            <h2 class="text-bold  text-center text-green-400">Message :  </h2>
            <h2 class="text-center" > {{Rep.message}} </h2>
            <h2 class="text-bold text-center text-pink-400">Reported_by :  </h2>
            <h2 class="text-center" > {{Rep.reported_by}} </h2>
            <h2 class="text-bold text-center text">Reported_post : </h2>
            <h2 class="text-center" > {{Rep.reported_post}} </h2>
            <h2 class="text-center underline text-blue-500"><a v-bind:href="'http://127.0.0.1:8000/listing/'+Rep.reported_post">Post Link</a></h2>

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
            props: ['reports'],
            components: {
            AppLayout, 
            Modal,
        },
    data(){
        return {
           showModalReports : false,
           Rep : {

           }

        }
    },
    methods: {
        showModalReport: function(data){
            this.Rep = data
            this.showModalReports=true
        }
    }
}
</script>
