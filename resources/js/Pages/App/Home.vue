<template>
    <app-layout>
        <div class="dark:bg-gray-800 bg-white relative overflow-hidden h-screen">
                    
            <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center my-6 py-4">
                <div class="container mx-auto px-6 flex flex-col justify-between items-center relative py-8">
                    <div class="flex flex-col">
                        <h1 class="font-light w-full uppercase text-center text-4xl sm:text-5xl dark:text-white text-gray-800">
                            YOUR BEST CAR BUYING PLATFORM
                        </h1>
                        <h2 class="font-light max-w-2xl mx-auto w-full text-xl dark:text-white text-gray-500 text-center py-8">
                            Karhabti.tn is an auto traded company, here you can find the car you want with the best price, also we help you to find the best car you need.
                        </h2>
                        <div class="flex items-center justify-center mt-4">
                            <a :href="route('store')" class="uppercase py-2 px-4 bg-indigo-500 border-2 rounded border-transparent text-white text-md mr-4 hover:bg-indigo-700">
                                Select a car
                            </a>
                            <a :href="route('discover')" class="uppercase py-2 px-4 bg-transparent border-2 rounded border-indigo-400 text-bg-indigo-500 dark:text-white hover:bg-indigo-700 hover:text-white text-md">
                                Not sure what to buy
                            </a>
                        </div>
                    </div>
                    <div class="block w-full mx-auto mt-6 md:mt-0 relative">
                        <img src="https://i.ibb.co/4WSDVz7/Two-men-having-car-accident-isolated-flat-vector-illustration-Cartoon-people-looking-at-automobile-d.jpg" class="max-w-xs md:max-w-2xl m-auto py-6"/>
                    </div>
                </div>
            </div>
            
        </div>



</app-layout>


</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            AppLayout,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                 
            }
        },

        methods: { 

            logout() {
                this.$inertia.post(route('logout'));
            },
        },
        created(){
             
        }
    }
</script>

<style>

</style>