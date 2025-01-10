<template>
    <app-layout>
        <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto">
                <div class="max-w-screen-lg mx-auto my-10 bg-gray-200 p-5 rounded-xl shadow-sm">
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