<template>
    <app-layout>
   


<div class="">
	<div class="max-w-7xl mx-auto p-6">
		<a :href="ad.url" v-if="ad" >
	<div class="object-contain bg-grey-lightest mx-auto shadow rounded pb-4 bg-cover h-96" :style="{backgroundImage:`url(${ad.photo})`}">
	 <span class="float-right text-xs bg-white rounded shadow m-3 px-2 cursor-pointer">Advertisement</span>
		</div>
		</a>

		<div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow rounded-lg my-10">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
							<div class=" my-4 text-md font-normal">
								<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-make"> Make </label>
								<select v-model="form.make" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-make">
								<option value="AlfaRomeo">Alfa Romeo</option>
								<option value="Audi">Audi</option>
								<option value="Bmw">BMW</option>
								<option value="Chery">Chery</option>
								<option value="Chevrolet">Chevrolet</option>
								<option value="Citroen">Citroen</option>
								<option value="Ford">Ford</option>
								<option value="fiat">Fiat</option>
								<option value="Honda">Honda</option>
								<option value="Hyundai">Hyundai</option>
								<option value="Isuzu">Isuzu</option>
								<option value="Kia">Kia</option>
								<option value="LandRover">Land Rover</option>
								<option value="Mercedes">Mercedes-Benz</option>
								<option value="Mitsubishi">Mitsubishi</option>
								<option value="Mazda">Mazda</option>
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
							<select v-model="form.model" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"  id="grid-model">
								<option :value="item" v-for="(item,index) in models[form.make]" :key="index">{{ item }}</option> 
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
					</div>
                    <div class="flex justify-center">
						<button @click="search()" class="p-2 border w-1/4 rounded-md bg-indigo-400 hover:bg-indigo-600 text-white">Search</button>
					</div>
                </div>
			<section class="border rounded">	

		   <div class="grid grid-cols-9 gap-10 mt-4 md:px-4 md:my-7  ">
			<div class="col-span-9 md:col-span-3 transform transition duration-500 hover:scale-105"  v-for="(product,index) in products" :key="index">
				<div :class="(product.Created_type=='agency')?'border-indigo-500 border':'border-gray-400 border'" class="max-w-sm  overflow-hidden my-2 flex flex-col p-4 rounded   hover:border-opacity-100 hover:border-4 cursor-pointer  focus:ring-2 focus:ring-blue-600 h-full bg-white ">
					           <span v-if="(compare &&!compare.includes(product.id))" @click="addCompare(product)" class="float-right text-xs w-20 bg-indigo-400 rounded shadow px-2">+ Compare</span>  
					           <span v-if="(compare &&compare.includes(product.id))"  @click="removeCompare(product)" class="float-right text-xs w-20 bg-red-400 rounded shadow px-2">- Compare</span>  
				 				 <inertia-link :href="route('post', product.id)">
				    <img class="w-full h-full object-scale-down  border-b-2 my-4 " :src="product.picture" >
						</inertia-link>
						<div class=" mt-6">
							<div class="font-bold text-xl mt-2 float-left ">{{ product.name }}</div>
						 	<div class="text-md mt-2 float-right text-green-400"> {{ product.price }} DT</div>
						</div>
						<div class=" text-sm mt-2 float-left "> State : {{ product.state }}</div>
						<div class="">
						</div>
				 <p class="px-2 bg-indigo-400 rounded text-xs shadow w-full text-center text-white mt-4" v-if="product.Created_type=='agency'">Added by Agency</p>
			 

				</div>
			</div>
		   </div>
		</section>

	</div>

</div>
     <div v-if="compare.length>0" class="fixed bg-white left-0 bottom-0 px-4 py-6 w-full shadow">
		 <div class="flex flex-row">
			 <div class="flex flex-auto">
				<p> {{compare.length}} product to compare</p>
			 </div>
			 <div class="flex flex-none">
				 <inertia-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('compare')">Compare</inertia-link>
			 </div>
		 </div>
	 </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout' 
import Button from '../../Jetstream/Button.vue'
    export default {
        props : ['products','compare','ad'],
        data() {
            return {
				models: {
                Bmw : ['1 Series','2 Series','3 Series','4 Series','5 Series','6 Series','7 Series','M Series','X Series','Z Series','Others'],
                Ford : ['Atlas','Bronco','Edge','B-Max','Bronco Sport','EcoSport','Escape','Expedition','Explorer','F-150','F250','F350','Fiesta','Focus','GT','Galaxy','Kuga','Mondeo','Mustang Mach-E','Mustang','Puma','Ranger','S-Max','Super Chief','Super Duty','Others'],
                Audi : ['A1','A2','A3','A4','A5','A6','A7','A8','Allroad','Cabriolet','Coupe','Q1','Q2','Q3','Q5','Q7','Q8','Quattro','RS','s1','S2','S3','S4','S5','S6','S7','S8','SQ','TT','V8','Others',],
                Kia : [ 'Ceed GT' ,'Ceed SW Hybride','Ceed SW' ,'Ceed' ,'Niro Hybride ','Niro Hybride Rech' ,'Picanto' ,'ProCeed' ,'Rio' ,'Sorento Hybride Rech' ,'Sportage Hybride' ,'Stinger','Stonic','XCeed Hybride Rech','XCeed' ,'e-Soul 100% électrique','Others' ],
                Honda:['AMAZE','Brio','CITY HATCHBACK','CIVIC HATCHBACK','E','ENVIX','Fit/Jazz/Life','INSIGHT','LEGEND','MOBILIO','Shuttle','Others'],
                Isuzu:['Campo','D-Max DC','D-Max SC','Gemini','Midi','NKR 66','PICK UP','Tropper','Others'],
                Hyundai: ['Accent','Aura','Celesta','Creta','Elantra','Grandeur','HB20','HB20S','Mistra','Santro','Sonata','i','Others'],
                Mercedes:['Classe A','Classe B','Classe C','Classe E','Classe G','Classe S','Classe x','CLA','CE','CL','','Others'],
                Mitsubishi:['3000GT','Diamante','Eclipse','Endeavor','Expo','Galant','L200 Simple cabine','L300','L400','Lancer Evolution','Lancer','Mighty Max','Montero Sport','Montero','Pickup','Precis','Raider','i-MiEV','Others'],
                Peugeot:['108','206','207','208','301','308','408','508','2008','3008','5008','RCZ','605','607','Others'],
                Nissan:['100 NX','200 SX','240 SX','280 ZX','300 ZX','350 Z','370 Z','Almera','Cabstar','Cargo','GT-R','Juke','XTerra','Others'],
                Opel:['Agila','Ampera','Antara','Combo','Cascada','Corsa','Diplomat','Frontera','GT','Insignia','Karl','Mokka','Omega','Rekord','Tigra','Others'],
                Suzuki:['Across (crossover)','Aerio','Alto','APV','Cara','Cappuccino','Carry','Celerio','Cervo','Ciaz','Cultus Crescent', 'Ignis','Others'],
                Toyota:['Camry','Corolla','Crown','Etios','Mirai','Prius','Etios','Passo','Yaris XP150','Yaris XP210','Land Cruiser Prado','Rush','Others'],
                Volkswagen:['181','Amarok','Bora','cc','Eos','Fox','Golf 1','Golf 2','Golf 3','Golf 4','Golf 5','Golf 6','Golf 7','Golf Plus','Polo','Others'],
				Renault:['Alpine','Arkana','Avantime','Clio','Coupe','Espace','Express','Fluence','Fuego','Kadjar','Latitude','Logan','R','Symbol','Trafic','Wind','ZOE','Others'],
				Chevrolet:['Alero','Astro','Bel Air','Bolt','C1500','Captiva','Chevelle','Monza','Corvette','Epica','G','HHR','K','Matiz','Niva','S-10','SSR','Trax','Others'],
				AlfaRomeo:['Alfa 6','Alfasud','GT','GTV','Montreal','RZ','Sprint','Stelvio','SZ','Spider','Tonale','Others'],
				Citroen:['Ami','Ax','Axel','Berlingo','BX','Classe C','DS','Dyane','GSA','Jumper','LNA','Saxo','SM','Visa','XM','ZX','Others'],
				Chery:['A','Amulet','B','CrossEastar','eQ','Fora','Karry','M','MPV','QQ','S18','Sweet','Tiggo','Very','WOw','Others'],
				LandRover:['Defender','Discovery','Freelander','LRX','Range Rover','Series','Others'],
				Porsche:['Boxster','Carrera','Cayenne','Cayman','Macan','Panamera','Tagra','Others'],
				Mazda:['Atenza','Axela','B','Bongo','Capella','Demio','E','Familia','MPV','MX','Pick up','RX','Tribute','Others'],
				fiat:['Albea','Brava','Coupe','Dino','Fullback','Idea','Linea','Marea','Palio','Punto','Stilo','Tipo','Uno','Others'],
            },

					form: this.$inertia.form(
						{
							make:0,
							model:0,
							state:0,
							price:null,

						}
					), 

            }
        },
        components: {
            	AppLayout,  
                Button
			},
        methods: {

			search : function(){
				this.form.post(route('store.search'))

			},
			addCompare : function(product){
				if(this.compare.length < 3){ 
					axios.post(route('addCompare'),{product:product.id}).then((resp)=>{
						this.compare.push(product.id)
						this.compare_message = product.name
					})
				}
			},
			removeCompare : function(product){ 
				this.$inertia.post(route('addCompare'),{product:product.id,action:"remove"})
			},
            
        }
    }
</script>