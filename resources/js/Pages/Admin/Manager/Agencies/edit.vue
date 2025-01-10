<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Agencies / {{item.name}}
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-5 gap-10">
                    <div class="col-span-1">
                    <!--img :src="item.profile_photo_url" alt="" class="w-full border bg-white shadow rounded p-2"-->

                    </div>
                    <div class="col-span-4 bg-white shadow w-full py-4 rounded-lg ">
                    <div class=" m-4 ">
                        <input type="text"  placeholder="Name" name="name" v-model="item.name" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-1 " > 
                        <input type="text"  placeholder="Email" name="email" v-model="item.email" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Adress" name="adress" v-model="item.adress" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Phone" name="phone" v-model="item.phone" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-2 "> 
                         <textarea v-model="item.description" maxlength="255"  class="w-full px-3 py-2  bg-gray-50  border border-gray-200 rounded py-3 my-2 " rows="4"></textarea>   			
                        Statut : 
                        <label for="statut-active" class="ml-4">
                            Active : <input type="radio" id="statut-active" name="statut" value="1" v-model="item.active">
                        </label>
                        <label for="statut-pending" class="ml-4" >
                            Pending : <input type="radio" id="statut-pending" name="statut" value="0" v-model="item.active">
                        </label>
                        <button @click="save()" class=" float-right bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline px-4" type="button">Save </button>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    export default {
        props : ['item'],
        data() {
            return {


            }
        },
        components: {
            AppLayout, 
        },
        methods: {
            save:function(){
                let form = this.$inertia.form({
                    _method: 'PUT',
                    name: this.item.name,
                    email: this.item.email,
                    adress: this.item.adress,
                    phone: this.item.phone,
                    description: this.item.description,
                    active: this.item.active
                });
                form.post(route('agencies.update',this.item.id));
            },

        }
    }
</script>
