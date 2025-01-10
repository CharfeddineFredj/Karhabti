<template>
<app-layout>

<div class="max-w-7xl mx-auto p-6 my-12 bg">

        <jet-validation-errors class="mb-4" />



        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

    <div class="w-full max-w-sm p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <div class="flex-shrink-0 flex items-center">
                <inertia-link :href="route('home')">
                     <img class="block h-12 w-auto ml-20" src="default/logo.png" >
                </inertia-link>
            </div>

        <form  @submit.prevent="submit" class="mt-6">
             <div>
                <label for="name" class="block text-sm text-gray-800 dark:text-gray-200">Name</label>
                <jet-input id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-indigo-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-blue-500 focus:outline-none focus:ring" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <label for="email" class="block text-sm text-gray-800 dark:text-gray-200">Email</label>
                <jet-input id="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-indigo-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-blue-500 focus:outline-none focus:ring" v-model="form.email" required autofocus />
            
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm text-gray-800 dark:text-gray-200">Password</label>
                <jet-input id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-indigo-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-blue-500 focus:outline-none focus:ring" v-model="form.password" required autocomplete="current-password" />
            </div>
            
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm text-gray-800 dark:text-gray-200">Password</label>
                <jet-input id="password_confirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-indigo-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-blue-500 focus:outline-none focus:ring" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-6">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </button>
            </div>
            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
        </form>

       

        <p class="mt-8 text-xs font-light text-center text-gray-400"> Already Registred? 
            <a :href="route('login')" class="font-medium text-gray-800 dark:text-gray-200 hover:underline">Login</a></p>
    </div>
    </div>



  </app-layout>
    
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            AppLayout, 
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
