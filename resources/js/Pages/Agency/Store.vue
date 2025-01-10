<template>
    <app-layout>

        <div class="bg-white"> 
            
            <div class="max-w-7xl mx-auto p-6">
                <div class="flex flex-col justify-center items-center relative h-64 bg-black bg-opacity-50 text-white">
                    <img class="h-24 w-24 object-cover rounded-full" :src="agency.picture" >
                    <h1 class="text-2xl font-semibold my-2">{{agency.name}}</h1>
                    <h4 class="text-sm font-semibold">{{agency.adress}}</h4> 
                </div>
                
                
<section class="border rounded mt-10">	

		   <div class="grid grid-cols-9 gap-10 mt-4 md:px-4 md:my-7  ">
			<div class="col-span-9 md:col-span-3 transform transition duration-500 hover:scale-105"  v-for="(product,index) in products" :key="index">
				 <inertia-link :href="route('post', product.id)">
				<div  class="max-w-sm  overflow-hidden my-4 flex flex-col p-4 rounded  border-gray-400 border  hover:border-opacity-100 hover:border-4 cursor-pointer  focus:ring-2 focus:ring-blue-600 h-full bg-white ">  
				    <img class="w-full h-full object-contain border-b-2 my-4 " :src="product.picture" >
						<div class="">
							<div class="font-bold text-xl mt-2 float-left ">{{ product.name }}</div>
						 	<div class="text-md mt-2 float-right text-green-400"> {{ product.price }} DT</div>
						</div>
						<div class=" text-sm mt-2 float-left "> State : {{ product.state }}</div>
						<div class="">
						</div>
				</div>
			 </inertia-link>
			</div>
		   </div>
		</section>

            </div>
        </div>  
     
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    export default {
        props : ['agency','products'],
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
