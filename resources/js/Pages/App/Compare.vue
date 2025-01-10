<template>
    <app-layout>
                <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Car Comparaison
            </h2>
        </template>

      	<div class="max-w-10/12 mx-40 p-6" >
<div class="-mx-3 md:flex mb-6 ">
<div v-for="(item,index) in products" :key="index" class="rounded-lg w-72 p-4 bg-white shadow-lg dark:bg-gray-800 max-w-md mx-10  sticky top-0">
        <img class=" object-cover w-full" :src="item.picture" >
    <p class="text-xl leading-normal text-center font-bold text-black dark:text-white pt-4">
    Make : {{item.make}}
    </p>
    <p class="text-2xl font-inter leading-normal text-center font-bold text-black dark:text-white pb-4">
        Model : {{item.model}}
    </p>
    <ul>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Registration : {{item.year}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Body : {{item.body}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Motor : {{item.motor}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Kilometrage : {{item.kilometrage}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            City/State : {{item.state}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Energie : {{item.energy}}
        </li>
        <li class="text-xs font-inter leading-normal text-center font-medium text-black dark:text-white py-4 border-t border-gray-300">
            Box : {{item.box}}
        </li>

    </ul>
    </div>

    </div>

</div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Modal from '@/jetstream/Modal'
    export default {
        props: ['products'],
        data() {
            return {

            }
        },
        components: {
            AppLayout,
            Modal,
        },
        methods: {
            },

    }
</script>
