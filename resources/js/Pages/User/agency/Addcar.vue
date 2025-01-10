<template>
	<app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Make new Product
            </h2>
        </template>
		<div class="max-w-7xl mx-auto p-6">
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
				<jet-validation-errors class="mb-4" />
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-make"> Make </label>
						<div class="relative">
							<select v-model="product.make" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-make">
								<option value="AlfaRomeo">Alfa Romeo</option>
								<option value="Audi">Audi</option>
								<option value="Bmw">BMW</option>
								<option value="Chery">Chery</option>
								<option value="Chevrolet">Chevrolet</option>
								<option value="Citroen">Citroen</option>
								<option value="Ford">Ford</option>
								<option value="fiat">fiat</option>
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
					</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-model"> Model </label>
						<div class="relative">
							<select v-model="product.model" :class="{'border-red-400 text-red-500':errors.model}" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"  id="grid-model">
								<option :value="item" v-for="(item,index) in models[product.make]" :key="index">{{ item }}</option>
							</select>
						</div>
				    </div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-model-year"> Model year </label>
					<div class="relative">
							<select v-model="product.model_year" :class="{'border-red-400 text-red-500':errors.model_year}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-Model-year">
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								<option value="2012">2012</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
								<option value="2009">2009</option>
								<option value="2008">2008</option>
								<option value="2007">2007</option>
								<option value="2006">2006</option>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="2003">1996</option>
								<option value="2002">1995</option>
								<option value="2001">1994</option>
								<option value="1999">1993</option>
								<option value="1998">1992</option>
								<option value="1997">1991</option>
								<option value="1997">1990</option>
							</select>
						</div>
					 </div>
				</div>
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-month"> Registration Month </label>
						<div class="relative">
							<select v-model="product.month" :class="{'border-red-400 text-red-500':errors.month}"   class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-month">
								<option value="12">12</option>
								<option value="11">11</option>
								<option value="10">10</option>
								<option value="09">09</option>
								<option value="08">08</option>
								<option value="07">07</option>
								<option value="06">06</option>
								<option value="05">05</option>
								<option value="04">04</option>
								<option value="03">03</option>
								<option value="02">02</option>
								<option value="01">01</option>
							</select>
						</div>
						</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-year"> Registration Year </label>
						<div class="relative">
							<select v-model="product.year" :class="{'border-red-400 text-red-500':errors.year}" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-year">
                                <option value="2024">2024</option>
								<option value="2023">2023</option>
								<option value="2022">2022</option>
                                <option value="2021">2021</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								<option value="2012">2012</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
								<option value="2009">2009</option>
								<option value="2008">2008</option>
								<option value="2007">2007</option>
								<option value="2006">2006</option>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="2003">1996</option>
								<option value="2002">1995</option>
								<option value="2001">1994</option>
								<option value="1999">1993</option>
								<option value="1998">1992</option>
								<option value="1997">1991</option>
								<option value="1997">1990</option>
							</select>
						</div>
						</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-motor"> Motor </label>
						<input v-model="product.motor" :class="{'border-red-400 text-red-500':errors.motor}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-motor" type="text" placeholder="Motor/Finition"> </div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-body"> Body </label>
						<div class="relative">
							<select v-model="product.body" :class="{'border-red-400 text-red-500':errors.body}"   class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-body">
								<option value="SUV">SUV</option>
								<option value="SEDAN">SEDAN</option>
								<option value="MINTVAN">MINIVAN</option>
								<option value="HATCHBACK">HATCHBACK</option>
								<option value="CONVERTIBLE">CONVERTIBLE</option>
								<option value="WAGON">WAGON</option>
								<option value="COUPE">COUPE</option>
								<option value="PICKUP">PICKUP</option>
								<option value="Others">Others</option>
							</select>
				             </div>
						</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-kilometrage"> kilometrage </label>
						<input v-model="product.kilometrage" :class="{'border-red-400 text-red-500':errors.kilometrage}"   class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-kilometrage" type="text" placeholder="84 000"> </div>
				</div>
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-1/2 px-3 mb-6 md:mb-0">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city"> City </label>
						<input v-model="product.city" :class="{'border-red-400 text-red-500':errors.city}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Cité el ghazala "> </div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state"> State </label>
						<div class="relative">
							<select v-model="product.state" :class="{'border-red-400 text-red-500':errors.state}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
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
					</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip"> Zip </label>
						<input v-model="product.zip" :class="{'border-red-400 text-red-500':errors.zip}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="2083"> </div>
				</div>
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-energie"> Energie </label>
						<div class="relative">
							<select v-model="product.energy" :class="{'border-red-400 text-red-500':errors.energy}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-energie">
								<option>Diesel</option>
								<option>Petrol</option>
							</select>
						</div>
					</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-box"> Box </label>
						<div class="relative">
							<select v-model="product.box" :class="{'border-red-400 text-red-500':errors.box}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-box">
								<option>Manuelle</option>
								<option>Automatique</option>
							</select>
						</div>
					</div>
					    <div class="md:w-1/2 px-3">
						    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-color"> Color </label>
							<div class="relative">
						        <select v-model="product.color" :class="{'border-red-400 text-red-500':errors.color}"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-color">
								<option value="Noir">Black</option>
								<option value="Gris argent">Silver grey</option>
								<option value="Gris antharcite">Charcoal grey</option>
								<option value="Blanc">White</option>
								<option value="Rouge">Red</option>
								<option value="Bleu">Blue</option>
								<option value="Beige">Beige</option>
								<option value="Jaune">Yellow</option>
								<option value="Orange">Orange</option>
								<option value="Vert">Green</option>
								<option value="Aubergine">Eggplant</option>
								<option value="Marron">Brown</option>
								<option value="Others">Others</option>
							</select>
						</div>
					</div>
				</div>
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-1/2 px-3">
						<div class="border border-gray-200 p-6 rounded-lg">
							<div class="flex items-center flex-wrap ">
								<div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" /> </svg>
								</div>
								<h1 class="text-lg text-gray-900 font-medium title-font mb-2 px-2"> Inside Options</h1> </div>
							<div class="flex flex-col">
                                    								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Climate_control" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700">Climate control</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Cruise_control" type="checkbox" class="form-checkbox h-5 w-5 text-red-600"><span class="ml-2 text-gray-700">Cruise control</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Touchscreen_infotainment" type="checkbox" class="form-checkbox h-5 w-5 text-orange-600"><span class="ml-2 text-gray-700">Touchscreen infotainment</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Heated_seats" type="checkbox" class="form-checkbox h-5 w-5 text-yellow-600"><span class="ml-2 text-gray-700">Heated seats</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Leather_seats" type="checkbox" class="form-checkbox h-5 w-5 text-green-600"><span class="ml-2 text-gray-700">Leather seats</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Apple_CarPlay" type="checkbox" class="form-checkbox h-5 w-5 text-purple-600"><span class="ml-2 text-gray-700">Apple CarPlay</span> </label>
								<label class="inline-flex items-center mt-3">
									<input v-model="product.Eq_Android_Auto" type="checkbox" class="form-checkbox h-5 w-5 text-blue-200"><span class="ml-2 text-gray-700">Android Auto</span> </label>
						</div>
						</div>

					</div>
					<div class="md:w-1/2 px-3">
						<div class="border border-gray-200 p-6 rounded-lg">
							<div class="flex items-center flex-wrap ">
								<div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" /> </svg>
								</div>
								<h1 class="text-lg text-gray-900 font-medium title-font mb-2 px-2"> Outside Options</h1> </div>
							<div class="flex flex-col">
                            <label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_Foglights" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700">Fog lights</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_parking_sensor" type="checkbox" class="form-checkbox h-5 w-5 text-red-600"><span class="ml-2 text-gray-700">Parking sensor</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_Rearview_camera" type="checkbox" class="form-checkbox h-5 w-5 text-orange-600"><span class="ml-2 text-gray-700">Rearview camera</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_Reversing_radar" type="checkbox" class="form-checkbox h-5 w-5 text-yellow-600"><span class="ml-2 text-gray-700">Reversing Radar</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_LED_lights" type="checkbox" class="form-checkbox h-5 w-5 text-green-600"><span class="ml-2 text-gray-700">Led lights</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_Sunroof" type="checkbox" class="form-checkbox h-5 w-5 text-purple-600"><span class="ml-2 text-gray-700">Sunroof</span> </label>
							<label class="inline-flex items-center mt-3">
								<input v-model="product.Eq_Tinted_glass" type="checkbox" class="form-checkbox h-5 w-5 text-blue-200"><span class="ml-2 text-gray-700">Tinted Glass</span> </label>
							</div>
						</div>
					</div>
				</div>
			   <div class="-mx-3 md:flex mb-6">
				   <div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-price"> Price </label>
						<input v-model="product.price" :class="{'border-red-400 text-red-500':errors.price}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-price" type="text" placeholder="110 000">
					</div>
					<div class="md:w-1/2 px-3">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-phone"> Phone Number </label>
						<input v-model="product.phone" :class="{'border-red-400 text-red-500':errors.phone}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-phone" type="text" placeholder="50 123 770">
					</div>
				</div>
				<div class="-mx-3 md:flex mb-6">
					<div class="md:w-full px-3">
 						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-3" for="grid-motor"> Description </label>
                        <textarea v-model="product.description" maxlength="255" :class="{'border-red-400 text-red-500':errors.description}"  class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
                    </div>

        		</div>
            <upload-pictures @refreshUpload="refreshUpload"></upload-pictures>
          <div class="px-4 py-3  text-right sm:px-6 m-auto py-6">
             <button type="reset" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Cancel
            </button>
            <button @click="save()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mx-3 ">
              Save
            </button>
         		 </div>
			</div>
		</div>
	</app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import JetValidationErrors from '@/Jetstream/ValidationErrors'
import UploadPictures from '@/Jetstream/UploadPictures'
export default {
	props : ['errors','agency'],
	components: {
		AppLayout,
		JetValidationErrors,
		UploadPictures
	},
	data(){
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
				fiat:['Albea','Brava','Coupe','Dino','Fullback','Idea','Linea','Marea','Palio','Punto','Stilo','Tipo','Uno','Others'],
				AlfaRomeo:['Alfa 6','Alfasud','GT','GTV','Montreal','RZ','Sprint','Stelvio','SZ','Spider','Tonale','Others'],
				Citroen:['Ami','Ax','Axel','Berlingo','BX','Classe C','DS','Dyane','GSA','Jumper','LNA','Saxo','SM','Visa','XM','ZX','Others'],
				Chery:['A','Amulet','B','CrossEastar','eQ','Fora','Karry','M','MPV','QQ','S18','Sweet','Tiggo','Very','WOw','Others'],
				LandRover:['Defender','Discovery','Freelander','LRX','Range Rover','Series','Others'],
				Porsche:['Boxster','Carrera','Cayenne','Cayman','Macan','Panamera','Tagra','Others'],
				Mazda:['Atenza','Axela','B','Bongo','Capella','Demio','E','Familia','MPV','MX','Pick up','RX','Tribute','Others'],
            },
			product: this.$inertia.form({
				make: 'bmw',
				model: null,
				model_year: null,
				month: null,
				year: null,
				motor: null,
				body: null,
				kilometrage: null,
				price: null,
				city: null,
				state: null,
				zip: null,
				phone: null,
				energy: null,
				box: null,
				color: null,
				photos: null,
				description: null,
				Eq_Foglights: false,
				Eq_Reversing_radar: false,
				Eq_LED_lights: false,
				Eq_Sunroof: false,
				Eq_Tinted_glass: false,
				Eq_parking_sensor: false,
				Eq_Satnav: false,
				Eq_Rearview_camera: false,
				Eq_Climate_control: false,
				Eq_Cruise_control: false,
				Eq_Touchscreen_infotainment: false,
				Eq_Heated_seats: false,
				Eq_Apple_CarPlay: false,
				Eq_Leather_seats: false,
				Eq_Android_Auto: false,
			})
		}
	},
	methods: {
		save: function(){
			this.product.post(route("agency.storecar",this.agency.id))
		},
		refreshUpload: function(pictures){
			console.log(pictures);
			this.product.photos = pictures
		}
	},
	created(){
		this.product.phone = this.$page.props.user.phone
	}
}
</script>
