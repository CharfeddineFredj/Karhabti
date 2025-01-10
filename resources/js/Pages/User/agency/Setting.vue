<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Agencies / {{agency.name}}
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-5 gap-10">
                    <div class="col-span-1">
                    <img :src="photoPreview" alt="" class="w-full border bg-white shadow rounded p-2">
                    <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview" accept="image/*">
                 <button class="bg-indigo-400 hover:bg-indigo-500 text-white font-bold my-2 py-1 px-4 rounded focus:outline-none focus:shadow-outline px-4 ml-4 " type="button" @click.prevent="selectNewPhoto" >
                    Select A New Photo
                </button>
                    </div>
                    <div class="col-span-4 bg-white shadow w-full py-4 rounded-lg ">
                    <div class=" m-4 ">
                        <input type="text"  placeholder="Name" name="name" v-model="agency.name" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-1 " > 
                        <input type="text"  placeholder="Email" name="email" v-model="agency.email" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Adress" name="adress" v-model="agency.adress" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Phone" name="phone" v-model="agency.phone" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-2 "> 
                         <textarea v-model="agency.description"  placeholder="Description" maxlength="255"  class="w-full px-3 py-2  bg-gray-50  border border-gray-200 rounded py-3 my-2 " rows="4"></textarea>   			
                        <button @click="save()" class=" px-2 float-right bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline px-4" type="button">Save </button>
                        <inertia-link  :href="route('agency.destroy', agency.id)"  class=" mr-2 float-right bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline px-4" type="button">Delete </inertia-link>

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
        props : ['agency'],
        data() {
            return {
                    photoPreview : null,
                    photo : null,
            }
        },
        components: {
            AppLayout, 
        },
        created (){
            this.photoPreview = this.agency.picture
        },
        methods: {

            
            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
                const fd = new FormData();
                fd.append('file',this.$refs.photo.files[0]);
                axios.post(route('upload'),fd).then((response)=>{ 
                    this.photo = response.data.url
                })
            },
            save:function(){
                let form = this.$inertia.form({
                   // _method: 'put',
                    name: this.agency.name,
                    email: this.agency.email,
                    adress: this.agency.adress,
                    phone: this.agency.phone,
                    description: this.agency.description,
                    photo: this.photo,
                });
                form.post(route('agency.storeSetting',this.agency.id));
            },
            

        }
    }
</script>
