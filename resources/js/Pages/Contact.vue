<template>
    <app-layout>
        <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto">
                <div class="max-w-screen-lg mx-auto my-10 bg-gray-200 p-5 rounded-xl shadow-sm">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Contact Us</h1>
                        <p class="text-gray-400 dark:text-gray-400">Fill up the form below to send us a message.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label  for="Last name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400 ">Last name</label>
                            <input  type="text"  name="last name" id="last name" placeholder="last name" v-model="contact.last_name" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" /> </div>
                        <div>
                            <label for="First name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">First name</label>
                            <input v-model="contact.first_name" type="text" name="First name" id="First name" placeholder="First name" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" /> </div>
                        <div>
                            <label for="Phone Number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Phone Number</label>
                            <input v-model="contact.phone" type="text" name="Phone" id="Phone" placeholder="50989069" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" /> </div>
                        <div>
                            <label for="E-mail" class="block mb-2 text-sm text-gray-600 dark:text-gray-400 ">E-mail</label>
                            <input v-model="contact.email" type="email" name="E-mail" id="E-mail" placeholder="user@mail.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" /> </div>
                        <div>
                            <label for="state" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">state</label>
                            <select v-model="contact.state" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
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
                        <div>
                            <label for="Subject" class="block mb-2 text-sm text-gray-600 dark:text-gray-400 ">Subject</label>
                            <select v-model="contact.subject" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                                <option>Request financing for a vehicle</option>
                                <option>Request a quote for a vehicle</option>
                                <option>Report an error on a vehicle</option>
                                <option>Become a professional salesperson</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400 my-4">Your Message</label>
                        <textarea v-model="contact.message" rows="5" name="message" id="message" placeholder="Your Message" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                    </div>
                    <div class="px-4 py-9  text-right sm:px-6 m-auto"> <span class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Cancel</span>
              <button type="submit" @click="save()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mx-3 ">
              Save
            </button> </div>
                    <p class="text-base text-center text-gray-400" id="result"></p>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
export default {
    data() {
        return {
               contact: this.$inertia.form({
				last_name: null,
				first_name: null,
				phone: null,
				email: null,
				state: null,
				subject: null,
				message: null,

			})
        }
    },
    components: {
        AppLayout,
    },
	methods: {
		save: function(){
			this.contact.post(route("store_contact")) 
		},
        }
}
</script>