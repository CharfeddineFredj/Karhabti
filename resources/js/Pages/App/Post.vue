<template>
    <app-layout>
      	<div class="max-w-10/12 mx-40 p-6" >

         	<div class="-mx-3 md:flex mb-4">
         	<div class="md:w-4/5 px-3">
<section class="text-gray-700 body-font overflow-hidden bg-white rounded-lg border shadow ">
           <span @click="showModalReport = true" class="float-right text-xs bg-red-400 rounded shadow m-3 px-2 cursor-pointer">Report</span>

    <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="object-contain h-96 w-full rounded  mb-10"  :src="slider">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-1" v-for="(picture,index) in product.pictures" :key="index">
                        <img  class="object-contain h-20 w-full rounded hover:bg-gray-100 p-2 border-2 hover:border-indigo-400 cursor-pointer" @click="showPicture(picture)" :src="picture">
                    </div>
                </div>
            </div>
                    <div class="lg:w-full w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h1 class=" uppercase tracking-wide text-grey-darker text-2xl font-bold mb-4 ">{{ product.price }} DT.</h1>
                        <div class="flex mb-4">
                            <span class="title-font font-medium text-xs text-gray-900">Added on : {{ product.createdAtText	 }} </span>
                        </div>
                        <div class="flex border-t border-gray-300 mt-10 pt-10">
                        </div>                
                        <p class="leading-relaxed">{{ product.description }}</p>
                        <div class="flex border-t border-gray-300 mt-10 pt-10">
                        </div>
                    <div class="flex items-center gap-4 m-2 max-w-10/12 mx-20 ">
                <span @click="showModalPhone=true" class="w-1/2 px-4 ml- py-2 text-base cursor-pointer border rounded-lg text-grey-500 bg-white hover:bg-gray-200 text-center">
                    View Phone Number
                </span>
         <modal :show="showModalReport" :closeable="true" >

       <span @click="showModalReport=false" class=" text-lg px-3 mt-2 bg-red-400 hover:bg-red-700 border rounded float-right mr-4 cursor-pointer">x</span>

<section class="antialiased text-gray-900 bg-gray-50">
    <div class="card bg-white rounded shadow max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Report Post </h1>
        </div>

        <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
            <p class="w-1/2 mb-2 md:mb-0">I would like to reeport it because of </p>
            <select v-model="Report.reason"  class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                <option value="No" selected>Select an option</option>
                <option value="Bad Content">Bad Content</option>
                <option value="Fake Information">Fake Information</option>
                <option value="Pictures are not real">Pictures are not real</option>
            </select>
        </div>    

            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label  for="title" class="font-bold mb-2">email</label>
                    <input v-model="Report.email" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Enter your email"> 
                </div>

               <div class="text-sm flex flex-col">
                <label for="message" class="font-bold mt-4 mb-2">Message</label>
                   <textarea v-model="Report.message"  class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"  placeholder="Enter your message"></textarea>
               </div>
            </div>

            <div class="submit">
                <button @click="save()" type="submit" class=" w-full bg-indigo-600 shadow rounded text-white px-4 py-2 hover:bg-indigo-700 mt-8 text-center font-semibold focus:outline-none ">Send</button>
            </div>
    </div>
    

</section>
                </modal>


                   
 <modal :show="showModalPhone" :closeable="true" >

       <span @click="showModalPhone=false" class=" text-lg px-3 mt-2 bg-red-400 hover:bg-red-700 border rounded float-right mr-4 cursor-pointer">x</span>
        <section class="antialiased text-gray-900 bg-gray-50">
    <div class="card bg-white rounded shadow max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">{{item.name}} Phone Number :  </h1>
            <div class="text-center mt-4">{{item.phone}}</div>
        </div>
            </div>

    

        </section>
     </modal>


    
                <inertia-link :href="route('chat',{type:product.Created_type,username:item.username})" class="w-1/2 px-4 py-2 text-base border rounded-lg text-white bg-indigo-500 hover:bg-indigo-700 text-center cursor-pointer ">
                    Contact Seller
                </inertia-link>
            </div>
        <div class="my-10 -mx-3 md:flex"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDI2LjY2NyA0MjYuNjY3IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0MjYuNjY3IDQyNi42Njc7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8Zz4NCgkJCTxwYXRoIGZpbGw9IiM2ODg3QkEiIGQ9Ik0yMTMuMjI3LDBDOTUuMzYsMCwwLDk1LjQ2NywwLDIxMy4zMzNzOTUuMzYsMjEzLjMzMywyMTMuMjI3LDIxMy4zMzNzMjEzLjQ0LTk1LjQ2NywyMTMuNDQtMjEzLjMzM1MzMzEuMDkzLDAsMjEzLjIyNywwDQoJCQkJeiBNMjEzLjMzMywzODRjLTk0LjI5MywwLTE3MC42NjctNzYuMzczLTE3MC42NjctMTcwLjY2N1MxMTkuMDQsNDIuNjY3LDIxMy4zMzMsNDIuNjY3UzM4NCwxMTkuMDQsMzg0LDIxMy4zMzMNCgkJCQlTMzA3LjYyNywzODQsMjEzLjMzMywzODR6Ii8+DQoJCQk8cmVjdCBmaWxsPSIjNjg4N0JBIiB4PSIxOTIiIHk9IjI3Ny4zMzMiIHdpZHRoPSI0Mi42NjciIGhlaWdodD0iNDIuNjY3Ii8+DQoJCQk8cmVjdCBmaWxsPSIjNjg4N0JBIiB4PSIxOTIiIHk9IjEwNi42NjciIHdpZHRoPSI0Mi42NjciIGhlaWdodD0iMTI4Ii8+DQoJCTwvZz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" alt="warning" width="30">
            <div class="m-2">
                <div class="px-2">
                    <p><span><strong>For your safety,</strong> do not pay up front. Check the product and make the transaction personally in a safe place.</span></p>
                </div>
                
            </div>

        </div>


        </div>
</div>
</section>

    </div>

<div class="rounded-lg w-72 p-4 bg-white shadow-lg dark:bg-gray-800 max-w-md mx-10  sticky top-0">
    
    <p class="text-2xl leading-normal text-center font-bold text-black dark:text-white pt-4">
        {{ product.make }}
    </p>
    <p class="text-4xl font-inter leading-normal text-center font-bold text-black dark:text-white pb-4">

        {{ product.model }}
    </p>
    <ul>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Registration : {{ product.month }} / {{ product.year }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Body : {{ product.body }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Motor : {{ product.price }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Kilometrage : {{ product.kilometrage }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            City/State : {{ product.city }} / {{ product.state }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Energie : {{ product.energy }}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Box : {{ product.box }}
        </li>
        <li class="text-md font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300 mb-10">
            Seller : 
        </li>
    </ul>
    <div class="py-4 text-center">


<div class="w-full mx-auto max-w-xl  bg-white dark:bg-gray-800 shadow rounded px-5 py-4 text-gray-800 dark:text-gray-50">
    <div class="w-full pt-1 text-center -mt-16 mx-auto">
        <a href="#" class="block relative">
            <img alt="profil" :src="item.photo" class="mx-auto object-cover rounded-full h-20 w-20 "/>
        </a>
    </div>
    <div class="w-full">
        <div class="text-center mb-6">
            <p class="text-gray-800 dark:text-white text-xl font-medium">
                {{item.name}}
            </p>
            <p class="text-gray-400 text-xs">
                {{item.adress}}
            </p>
        </div>
        <div class="rounded bg-pink-100  p-2 w-full mb-4">
            <div class=" text-sm text-gray-400 dark:text-black text-center">
                <p class="flex flex-col">
                    Cars.
                    <span class="text-black dark:text-indigo-500 font-bold">
                        {{ count }}
                    </span>
                </p>

            </div>
        </div>
       <div v-if="product.Created_type == 'agency'">
        <inertia-link :href="route('agency',item.username)" type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            View Agency
        </inertia-link>
        </div>
    </div>
    
</div>


    </div>
	  <a :href="ad.url" v-if="ad">
	<div class="object-fill h-80 bg-grey-lightest mx-auto shadow rounded pb-4 bg-cover" :style="{backgroundImage:`url(${ad.photo})`}">
	 <span class="float-right text-xs bg-white rounded shadow m-3 px-2 cursor-pointer">Advertisement</span>
		</div>
		</a>
</div>

</div>

    </div>



    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    import Modal from '@/jetstream/Modal'
    export default {
        props : ['item','product','ad','count'],
        data() {
            return {
                slider : "",
                showModalReport : false,
                showModalPhone : false,
                reason : "",

               Report: this.$inertia.form({
                    reason: null,
                    email: null,
                    message: null,
                    reported_by: null,
                    reported_post: this.product.id,
			})
            }
        },
        components: {
            AppLayout, 
            Modal,
        },
        methods: {
            showPicture: function(picture){
                this.slider = picture
            },
            save:function(){
                this.Report.post(route("reports.store")) 
            },
        },

        created(){
            this.slider = this.product.picture
        },

        
    }
</script>
