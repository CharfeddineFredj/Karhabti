<template>
	<app-layout> 
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Create New Advertissement
            </h2>
        </template>
    <div class="max-w-7xl mx-auto p-6">
	    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2"> 				
                      <div class="m-2">
                          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-url"> Ad Place </label>
              <select v-model="ad.place"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-place">
              	<option value="top">Top</option>
								<option value="sidebar">Sidebar</option>
							</select>			
	    
                   </div>
                  <div class="m-2">
                 <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-url"> Ad duration </label>
               <select v-model="ad.duration"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-place">
								<option value="1">1 Jour</option>
								<option value="2">2 Jour</option>
								<option value="3">3 Jour</option>
								<option value="4">4 Jour</option>
								<option value="5">5 Jour</option>
								<option value="6">6 Jour</option>
								<option value="7">7 Jour</option>
								<option value="15">15 Jour</option>
								<option value="30">30 Jour</option>
							</select>
            </div>
                    <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-url"> Ad Url </label>
						<input v-model="ad.url"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-url" type="text" placeholder="http://karhabti.tn/Agency/1"> 
				    </div>
            <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-photo"> Ad photo url </label>
						<input v-model="ad.photo" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-photo" type="text" placeholder="domain@photo.png"> 
				    </div>
             <div class="m-2">
 						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-3" for="grid-description"> Description </label>
                 <textarea v-model="ad.description" maxlength="255"  class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>   			
            </div>
            <div v-if="ad.place=='top'">
            <div class="text-left text-lg text-green-400  ">
            <p>  Prix = 5 Tnd/Day * {{ad.duration}} day </p>
            </div>
            <div v-if="ad.place=='sidebar'" class="text-left text-sm text-green-400  ">
           <p>   Prix = 10*{{ad.duration}} Tnd </p>
            </div>
            </div>
            <div class="px-4 py-3  text-right sm:px-6 m-auto py-6">
             <button  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

export default {
    	props : ['agency'],

        components: {
        AppLayout,
    },
    data() {
        return {
        ad: this.$inertia.form({
        place: null,
        duration:null,
				adress: null,
				url: null,
				photo: null,
				description: null,
        price:null,

               })
        }
        },
        
    methods: {
        save: function(){
			this.ad.post(route("ad.store",this.agency.id)) 
    },
    }
 }
    

       
</script>