<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users / {{item.name}}
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-5 gap-10">
                    <div class="col-span-1">
                        <img :src="item.profile_photo_url" alt="" class="w-full border bg-white shadow rounded p-2">

                    </div>
                    <div class="col-span-4 bg-white shadow w-full py-4 rounded-lg ">
                    <div class=" m-4 ">
                        <input type="text"  placeholder="Name" name="name" v-model="item.name" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-1 " > 
                        <input type="text"  placeholder="Email" name="email" v-model="item.email" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Adress" name="adress" v-model="item.adress" class=" w-full bg-gray-50 border border-gray-200 rounded py-3 my-1 "> 
                        <input type="text"  placeholder="Phone" name="phone" v-model="item.phone" class=" w-full bg-gray-50  border border-gray-200 rounded py-3 my-2 "> 
                        Role : 
                        <label for="role-user" class="ml-4">
                            User <input type="radio" id="role-user" name="role" value="user" v-model="item.role">
                        </label>
                        <label for="role-admin" class="ml-4" >
                            Admin : <input type="radio" id="role-admin" name="role" value="admin" v-model="item.role">
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
                    role: this.item.role
                });
                form.post(route('users.update',this.item.id));
            },

        }
    }
</script>
