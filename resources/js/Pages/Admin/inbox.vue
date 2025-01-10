<template>
    <app-layout>
        <template #header>            
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Inbox
            </h2>
        </template>
    <div class="bg-white w-1/2 mx-auto p-5 rounded shadow m-10 text-center border ">
        <div class="flex flex-col">
            <div class="grid grid-cols-12 hover:bg-gray-100 p-5 cursor-pointer" v-for="(msg,index) in inbox" :key="index"> 
                <div class="col-span-1">{{ msg.id }}</div>
                <div class="col-span-7 text-left">{{ msg.subject }}</div>
                <div class="col-span-2 gap-4 ml-6">
                    <span @click="showInbox(msg)" class="border mx-1 rounded p-2 border-gray-400 text-gray-400 hover:bg-gray-400 hover:text-white">View</span>
                     <a :href="`mailto:${msg.email}?subject=Replying to :${msg.subject}`" class="border mx-1 rounded p-2 border-green-400 text-green-400 hover:bg-green-400 hover:text-white">Reply</a>
                    <inertia-link method="post" :href="route('delete_msg', msg.id)" class="border mx-1 rounded p-2 border-red-400 text-red-400 hover:bg-red-400 hover:text-white">Delete</inertia-link>
                </div>
                                   
 <modal :show="showModalInbox" :closeable="true" >

     <span @click="showModalInbox=false" class=" text-lg px-3 mt-2 bg-red-400 hover:bg-red-700 border rounded float-right mr-4 cursor-pointer">x</span>
        <section class="antialiased text-gray-900 bg-gray-50">
    <div class="card bg-white rounded shadow max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold  mb-2 text-center"> Ticket Number : {{message.id}} </h1>
            <h2 class="text-bold text-center text-indigo-400">Subject : </h2>
            <h2 class="text-center" > {{message.subject}} </h2>
            <h2 class="text-bold  text-center text-green-400">Message :  </h2>
            <h2 class="text-center" > {{message.message}} </h2>
            <h2 class="text-bold text-center text-pink-400">sent by :  </h2>
            <h2 class="text-center" > {{message.email}} </h2>
            <h2 class="text-bold text-center text">User From : </h2>
            <h2 class="text-center" > {{message.state}} </h2>
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
            props: ['inbox'],
            components: {
            AppLayout, 
            Modal,
        },
    data(){
        return {
           showModalInbox : false,
           message : {

           }

        }
    },
    methods: {
        showInbox: function(data){
            this.message = data
            this.showModalInbox=true
        }
    }
}
</script>
