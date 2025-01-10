<template>
	<app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Create New Agency
            </h2>
        </template>
    <div class="max-w-7xl mx-auto p-6">
	    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			       <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-nom"> Nom </label>
						<input v-model="agency.name"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-nom" type="text" placeholder="Agence Foulen ben Foulen">
				    </div>
                    <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-adress"> Adress </label>
						<input v-model="agency.adress"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-adress" type="text" placeholder="Epi sousse">
				    </div>
                    <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-email"> Email </label>
						<input v-model="agency.email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-email" type="text" placeholder="agency@mail.com">
				    </div>
                     <div class="m-2">
						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-phone"> Phone Number </label>
						<input v-model="agency.phone" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-phone" type="text" placeholder="50 123 770">
				    </div>
                	<div class="m-2">
 						<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-3" for="grid-motor"> Description </label>
                        <textarea v-model="agency.description" maxlength="255"  class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
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
        components: {
        AppLayout,
    },
    data() {
        return {
               agency: this.$inertia.form({
             	name: null,
				adress: null,
				email: null,
				phone: null,
				description: null,
               })
        }
        },

    methods: {
        save: function(){
			this.agency.post(route("agency.store"))
    },
    }
 }



</script>
