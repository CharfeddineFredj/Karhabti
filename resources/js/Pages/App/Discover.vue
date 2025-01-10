<template>
    <app-layout>
   


<div class="">
	<div class="max-w-7xl mx-auto p-6">

		<div class="container bg-grey-lightest mx-auto shadow rounded pb-4 bg-cover" style="color:#606F7B;background-color: rgb(165, 182, 198); background-image:url('https://i.ibb.co/g7sZrjG/header-bild-komponenten.jpg');">
			<div class="mt-2 p-4 "> <span class="text-4xl font-thin p-6 text-center">Your Advertissement here </span> </div>
			<div class="flex justify-left">
				<div class="text-left p-2">
					<div class="text-lg text-grey-light"> <span class="text-right">Contact us : </span> </div>
					<div class="text-lg text-grey-light"> <span class="text-right">support@karhabti.tn </span> </div>
					<div class="text-lg text-grey-light"> <span class="text-right">Company adress : </span> </div>
					<div class="text-grey-light tracking-wide"> Zone touristique Mahdia 5110 </div>
				</div>
			</div>
		</div>

		<div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow rounded-lg my-10">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
							<div class=" my-4 text-md font-normal">
								<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-make"> Make </label>
								<select v-model="form.make" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-make">
									<option value="0"> All</option>
									<option value="AlfaRomeo">Alfa Romeo</option>
									<option value="Audi">Audi</option>
									<option value="Bmw">BMW</option>
									<option value="Chery">Chery</option>
									<option value="Chevrolet">Chevrolet</option>
									<option value="Citroen">Citroen</option>
									<option value="Ford">Ford</option>
									<option value="Honda">Honda</option>
									<option value="Hyundai">Hyundai</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="LandRover">Land Rover</option>
									<option value="Mercedes">Mercedes-Benz</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Opel">Opel</option>
									<option value="Peugeot">Peugeot</option>
									<option value="Porsche">Porsche</option>
									<option value="Renault">Renault</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Toyota">Toyota</option>
									<option value="Volkswagen">Volkswagen</option>
								</select>
							</div>
							<div class=" my-4 text-md font-normal">
								<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-model"> Model </label>
								<select v-model="form.model" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-model">
									<option value="0"> All </option>
									<option value="AlfaRomeo">Alfa Romeo</option>
								<option value="Audi">Audi</option>
								<option value="Bmw">BMW</option>
								<option value="Chery">Chery</option>
								<option value="Chevrolet">Chevrolet</option>
								<option value="Citroen">Citroen</option>
								<option value="Ford">Ford</option>
								<option value="Honda">Honda</option>
								<option value="Hyundai">Hyundai</option>
								<option value="Isuzu">Isuzu</option>
								<option value="Kia">Kia</option>
								<option value="LandRover">Land Rover</option>
								<option value="Mercedes">Mercedes-Benz</option>
								<option value="Mitsubishi">Mitsubishi</option>
								<option value="Nissan">Nissan</option>
								<option value="Opel">Opel</option>
								<option value="Peugeot">Peugeot</option>
								<option value="Porsche">Porsche</option>
								<option value="Renault">Renault</option>
								<option value="Suzuki">Suzuki</option>
								<option value="Toyota">Toyota</option>
								<option value="Volkswagen">Volkswagen</option>
								</select>
							</div>
                        </div>
						
                        <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
								<div class=" my-4 text-md font-normal">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state"> State </label>
							<select v-model="form.state" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
								<option value="0">All</option>
								<option value="Ariana">Ariana</option>
								<option value="Beja">Beja</option>
								<option value="Ben Arous">Ben Arous</option>
								<option value="Bizerte">Bizerte</option>
								<option value="El Kef">El Kef</option>
								<option value="Gabes">Gabes</option>
								<option value="Gafsa">Gafsa</option>
								<option value="Jendouba">Jendouba</option>
								<option value="Kairouan">Kairouan</option>
								<option value="Kasserine">Kasserine</option>
								<option value="Kebili">Kebili</option>
								<option value="Mahdia">Mahdia</option>
								<option value="Manouba">Manouba</option>
								<option value="Medenine">Medenine</option>
								<option value="Monastir">Monastir</option>
								<option value="Nabeul">Nabeul</option>
								<option value="Sfax">Sfax</option>
								<option value="Sidi Bou Zid">Sidi Bou Zid</option>
								<option value="Siliana">Siliana</option>
								<option value="Sousse">Sousse</option>
								<option value="Tataouine">Tataouine</option>
								<option value="Tozeur">Tozeur</option>
								<option value="Tunis">Tunis</option>
								<option value="Zaghouan">Zaghouan</option>
							</select>
						</div>
						<div class=" my-4 text-md font-normal ">
                          <label class="ml-2 block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-price"> Price </label>
						<div class="-mx-3 md:flex mb-4 ml-2">
							<input v-model="form.price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-price" type="text" placeholder="Any"> 
						</div>
						</div>
                        </div>
                    </div>
					 <div class="flex justify-center">
						<input   class="appearance-none block bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 w-1/3 text-center"  placeholder="Search Something"> 

					</div>
                    <div class="flex justify-center">
						<button @click="search()" class="p-2 border w-1/4 rounded-md bg-indigo-400 hover:bg-indigo-600 text-white">Search</button>
					</div>
                </div>
			<section class="border rounded">	

		   <div class="grid grid-cols-9 gap-10 mt-4 md:px-4 md:my-7  ">
			<div class="col-span-9 md:col-span-3 transform transition duration-500 hover:scale-105"  v-for="(product,index) in products" :key="index">
				 <inertia-link :href="route('post', product.id)">
				<div :class="(product.Created_type=='agency')?'border-indigo-500 border':'border-gray-400 border'" class="max-w-sm  overflow-hidden my-4 flex flex-col p-4 rounded   hover:border-opacity-100 hover:border-4 cursor-pointer  focus:ring-2 focus:ring-blue-600 h-full bg-white ">
				    <img class="w-full h-full object-contain border-b-2 my-4 " :src="product.picture" >
						<div class="">
							<div class="font-bold text-xl mt-2 float-left ">{{ product.name }}</div>
						 	<div class="text-md mt-2 float-right text-green-400"> {{ product.price }} DT</div>
						</div>
						<div class=" text-sm mt-2 float-left "> State : {{ product.state }}</div>
						<div class="mb-2">
						</div>
				 <p class="px-2 bg-indigo-400 rounded text-xs shadow w-full text-center text-white mt-2" v-if="product.Created_type=='agency'">Added by Agency</p>

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
import Button from '../../Jetstream/Button.vue'
    export default {
        props : ['item','products'],
        data() {
            return {
					form: this.$inertia.form(
						{
							make:0,
							model:0,
							state:0,
							price:null,

						}
					)

            }
        },
        components: {
            AppLayout, 
       
                Button },
        methods: {

			search : function(){
				this.form.post(route('store.search'))

			},
			addCompare : function(){
				alert("add")
			}
            
        }
    }
</script>