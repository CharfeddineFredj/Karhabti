<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                <div class="grid grid-cols-9 gap-10 mt-4">
                    <div class="col-span-3">
				<div class="max-w-sm rounded overflow-hidden shadow-lg my-2"> <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" >
					<div class="px-6 py-4">
						<div class="font-bold text-xl mb-2 float-right">Price $</div>
						<div class="font-bold text-xl mb-2">The Coldest Sunset</div>
					</div>
                         <div class="flex flex-row text-center"> 
                            <inertia-link  class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Show</inertia-link>
                            <inertia-link  class="flex-1 py-2 bg-gray-200 hover:bg-gray-300 cursor-pointer">Edit</inertia-link>
                            <inertia-link  class="flex-1 py-2 bg-gray-200 hover:bg-red-500 cursor-pointer hover:text-white">Delete</inertia-link>
                        </div>
                        
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
        props : ['products'],
        components: {
            AppLayout, 
        },
    }
</script>
