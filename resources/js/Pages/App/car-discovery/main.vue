<template>
   <app-layout>
	<div class="dark:bg-gray-800 bg-white relative overflow-hidden ">
		<div class="max-w-10/12 md:mx-40 p-6 my-10">
			<div class="relative pt-1">
				<div class="flex mb-2 items-center justify-between">
					<div> <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-purple-600 bg-purple-200">
                        Task in progress
                    </span> </div>
					<div class="text-right"> <span class="text-xs font-semibold inline-block text-purple-600">
                       {{ progress }} %
                    </span> </div>
				</div>
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-200">
                    <div :style="'width:'+progress+'%'" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500"></div>
                </div>
  			</div>
			<div class="bg-white">
				<div id="step1" v-if="step == 1">
					<h1 class="mt-10 mb-10 text-3xl text-gray-600 font-bold">What’s your budget?</h1>
					<div class="-mx-3 md:flex mb-6">
						<div class="md:w-1/3 px-3">
							<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-8" for="grid-min-price"> Min Budget </label>
							<div class="relative">
								<select v-model="form.price_min" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-min-price">
									<option value="0">Any</option>
									<option value="10000">10,000 DT.</option>
									<option value="20000">20,000 DT.</option>
									<option value="30000">30,000 DT.</option>
									<option value="50000">50,000 DT.</option>
									<option value="100000">100,000 DT.</option>
									<option value="200000">200,000 DT.</option>
									<option value="500000">500,000 DT.</option>
								</select>
							</div>
						</div>
						<div class="md:w-1/3 px-3">
							<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-8" for="grid-max-price"> Max Budget </label>
							<div class="relative mb-32">
								<select  v-model="form.price_max" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-max-price">
									<option value="0">Any</option>
									<option value="10000">10,000 DT.</option>
									<option value="20000">20,000 DT.</option>
									<option value="30000">30,000 DT.</option>
									<option value="50000">50,000 DT.</option>
									<option value="100000">100,000 DT.</option>
									<option value="200000">200,000 DT.</option>
									<option value="500000">500,000 DT.</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div id="step2"  v-if="step == 2">
					<h1 class="mt-10 text-3xl text-gray-600 font-bold">Which fuel type would you like?</h1>
					<h4 class="text-sm mt-2 px-4 text-gray-600 font-bold">You prefer Petrol ? or Diesel ?</h4>
					<div class="grid grid-cols-1 gap-2 w-full max-w-screen-sm mt-10">
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-8" for="diesel"> <span class="text-lg font-bold uppercase">                            
                            <input  v-model="form.energy" class="form-checkbox top-2 float-left h-5 w-5 rounded text-purple-300" id="diesel" type="checkbox" value="diesel" name="diesel" >Diesel</span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-offset-2 focus:ring-green-500 py-8 mt-4" for="petrol"> <span class="text-lg font-bold uppercase">
                            <input  v-model="form.energy" class=" form-checkbox top-2 float-left h-5 w-5 rounded text-purple-300" id="petrol" type="checkbox" value="petrol" name="petrol" > Petrol</span> </label>
						</div>
					</div>
				</div>
				<div id="step3"  v-if="step == 3">
					<h1 class="mt-10 text-3xl text-gray-600 font-bold">Which body types you want?</h1>
					<div class="grid grid-cols-4 gap-4 w-full mt-10">
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="suv">
							<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="suv" type="checkbox" value="suv" name="suv"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                            <as24-icon  type="bodytypes/offroad"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M58.6 9.6L45 7.7l-7.6-5C35.8 1.6 34.7 1 32.1 1H13.3c-2.6 0-4.7.9-6.3 2.6L1.8 9l-.1.1-.2.2C.6 10.4 0 12 0 14v3.5c0 1.2.6 2.4 1.3 2.9L3 21h3v-1.6c0-4.2 3.2-7.1 7.2-7.1s7.2 2.9 7.2 7.1V21h23.4v-1.6c0-4.2 3.2-7.1 7.2-7.1s7.2 2.9 7.2 7.1V21H61c.6-.9 1-2.5 1-3.7v-2.1c0-2.9-1.5-5.2-3.4-5.6zM16 8H9l2.4-3.3c1-1.4 2.5-1.7 4.5-1.7h1.5L16 8zm2 0l1.7-5h6l.8 5H18zm11 0l-1-5h4.5c1.5 0 2.7.1 4.1 1.1L42 8H29zm-15.8 9.1c-1.7 0-3 1.3-3 3s1.4 3 3 3c1.7 0 3-1.3 3-3s-1.3-3-3-3zm37.8 0c-1.7 0-3 1.3-3 3s1.4 3 3 3c1.7 0 3-1.3 3-3s-1.3-3-3-3zm-32.9 3c0 2.7-2.2 4.9-4.9 4.9s-4.9-2.2-4.9-4.9 2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9zm37.9 0c0 2.7-2.2 4.9-4.9 4.9s-4.9-2.2-4.9-4.9 2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9z"></path></svg></as24-icon>
                            SUV
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="sedan">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="sedan" type="checkbox" value="sedan" name="sedan"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                                <as24-icon type="bodytypes/limousine"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M13.6 15.9c-1.6 0-2.8 1.2-2.8 2.7s1.3 2.7 2.8 2.7c1.6 0 2.8-1.2 2.8-2.7s-1.2-2.7-2.8-2.7zm37.8 0c-1.6 0-2.8 1.2-2.8 2.7s1.3 2.7 2.8 2.7 2.8-1.2 2.8-2.7-1.2-2.7-2.8-2.7zm7.3-4.4L45.2 9.8l-7.6-4.4c-1.7-1-2.8-1.5-5.3-1.5h-9.1c-2.5 0-3.6.5-5.3 1.5l-5.2 3.4-8.9 1C1.8 10.6 0 12.2 0 15c0 2.1 1.1 4.2 2.5 5h5.1v-1.4c0-3.2 2.7-5.8 6-5.8s6 2.6 6 5.8V20h25.7v-1.4c0-3.2 2.7-5.8 6-5.8s6 2.6 6 5.8V20h3.2c.8-.9 1.3-2.1 1.3-3.6.2-2.5-1.2-4.6-3.1-4.9zM17 10l2.2-2.9c1.1-1.2 2.5-1.6 4.8-1.6h1.7L27 10H17zm12 0l-1-4.5h4.3c2.2 0 3 .4 4.5 1.3L42 10H29zm-10.9 8.6c0 2.4-2 4.4-4.5 4.4s-4.5-2-4.5-4.4 2-4.4 4.5-4.4 4.5 2 4.5 4.4zm37.9 0c0 2.4-2 4.4-4.5 4.4S47 21 47 18.6s2-4.4 4.5-4.4c2.4 0 4.5 2 4.5 4.4z"></path></svg></as24-icon>                      
                                SEDAN
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="hatchback">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="hatchback" type="checkbox" value="hatchback" name="hatchback"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                                <as24-icon type="bodytypes/compact"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M7.2 15C4.9 15 3 16.8 3 19s1.9 4 4.2 4 4.2-1.8 4.2-4-1.8-4-4.2-4zm0 6.5c-1.4 0-2.6-1.1-2.6-2.5s1.2-2.5 2.6-2.5 2.6 1.1 2.6 2.5-1.1 2.5-2.6 2.5zM33.8 15c-2.3 0-4.2 1.8-4.2 4s1.9 4 4.2 4 4.2-1.8 4.2-4-1.9-4-4.2-4zm0 6.5c-1.4 0-2.6-1.1-2.6-2.5s1.2-2.5 2.6-2.5 2.6 1.1 2.6 2.5-1.2 2.5-2.6 2.5z"></path><path d="M18.1 10L17 5h.8c1.1 0 4.4.6 6.2 1.3 2.4.9 7.1 2.7 8.4 3.7H18.1zm-9.3 0c-.7 0-1.6-.6-1.8-1.6C7.8 6.5 9.6 5 12.5 5h2.2l1.1 5h-7zm28.9.7c-1.5-.4-4.1-1.6-4.1-1.6s-6.1-2.9-9.1-4c-2-.7-5.4-1.2-6.8-1.2h-6C9.4 4 7.1 5.3 5.4 6.7 2.3 9.3 0 14.1 0 17c0 .8.3 2.3.5 3H2v-1.1c0-3.1 2.4-5.6 5.5-5.6s5.5 2.5 5.5 5.6V20h15v-1.1c0-3.1 2.4-5.6 5.5-5.6s5.5 2.5 5.5 5.6V20h1.6c.3-1.1.4-2.4.4-3.4 0-1.5-1-5.2-3.3-5.9z" fill-rule="evenodd" clip-rule="evenodd"></path></svg></as24-icon>   
                                HATCHBACK
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="minivan">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="minivan" type="checkbox" value="minivan" name="minivan"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                            <as24-icon type="bodytypes/van"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M11.3 17.7c-1.6 0-2.8 1.3-2.8 2.8s1.3 2.8 2.8 2.8c1.6 0 2.8-1.3 2.8-2.8s-1.2-2.8-2.8-2.8zm40.9 0c-1.6 0-2.8 1.3-2.8 2.8s1.3 2.8 2.8 2.8S55 22 55 20.5s-1.3-2.8-2.8-2.8zm6.5-6.3L46.6 4c-2.6-1.4-5-3-10.3-3H15.7C6.5 1 4.2 4.3 3 7.2c0 0-3 6-3 8v2.2c0 2.1 1.1 3.6 2.5 4.5h2.8v-1.5c0-3.3 2.7-6 6-6s6 2.7 6 6V22H46v-1.5c0-3.3 2.7-6 6-6s6 2.7 6 6V22h2.5c.8-.9 1.3-2.2 1.3-3.8.2-2.5-.6-5.4-3.1-6.8zM14.1 9H5.6c.4-1 .6-1.5 1.1-2.8.9-2.1 3.8-3.2 8.8-3.2l-1.4 6zm2.1 0l1.4-6h11.2l1 6H16.2zM32 9l-1-6h5.3c4.3 0 6.9 1 9 2.2L52.1 9H32zM15.9 20.5c0 2.5-2 4.5-4.5 4.5s-4.5-2-4.5-4.5 2-4.5 4.5-4.5c2.4 0 4.5 2 4.5 4.5zm40.8 0c0 2.5-2 4.5-4.5 4.5s-4.5-2-4.5-4.5 2-4.5 4.5-4.5 4.5 2 4.5 4.5z"></path></svg></as24-icon>                          
                                MINIVAN
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="coupe">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="coupe" type="checkbox" value="coupe" name="coupe"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                                <as24-icon type="bodytypes/sports"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M13.4 15.6c-1.5 0-2.8 1.3-2.8 2.8 0 1.6 1.2 2.9 2.8 2.9s2.8-1.3 2.8-2.9c0-1.5-1.3-2.8-2.8-2.8zm36.4 0c-1.5 0-2.8 1.3-2.8 2.8 0 1.6 1.2 2.9 2.8 2.9 1.5 0 2.8-1.3 2.8-2.9 0-1.5-1.2-2.8-2.8-2.8zm6-4c-4.7-1.9-12.6-1.5-12.6-1.5S36 5.7 32.6 4.9c-1.7-.4-4.8-.9-8-.9-2.3 0-4.7.2-6.9.9-2.6.8-7 2.2-10.9 4.3L2.2 7.8l-.7.8 1.9 2.6c-2.2 1.3-3.4 3.4-3.4 5C0 20 3.5 21 5.2 21h2.2v-2.6c0-3.4 2.7-6.1 6-6.1s6 2.7 6 6.1V21h24.5v-2.6c0-3.4 2.7-6.1 6-6.1s6 2.7 6 6.1V21l3.7-.3c1-1 1.5-1.8 1.5-3-.1-1.6-1.3-4.5-5.3-6.1zm-37.2-1.5c-1.5 0-4.2-.4-4.2-1.5 0-1.3 3-2.1 3.7-2.3 1.2-.3 2.6-.6 4.3-.7l1.5 4.5h-5.3zm7.4 0l-1.5-4.6h.7c3.5 0 5.4.4 6.9.8 1.9.5 6.5 2.6 8 3.7H26zm-8.1 8.3c0 2.5-2 4.6-4.5 4.6s-4.5-2-4.5-4.6c0-2.5 2-4.6 4.5-4.6s4.5 2.1 4.5 4.6zm36.4 0c0 2.5-2 4.6-4.5 4.6s-4.5-2-4.5-4.6c0-2.5 2-4.6 4.5-4.6s4.5 2.1 4.5 4.6z"></path></svg></as24-icon>                          
                                COUPE
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="convertible">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="convertible" type="checkbox" value="convertible" name="convertible"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                            <as24-icon type="bodytypes/roadster"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M24.3 9.1c-.4-.6-.2-1.4.5-1.7s1.4-.1 1.8.5l1.4 2.3h-3l-.7-1.1zm34.4 3.4l-13.5-1.7L35.3 5h-.4c-.3 0-.6.2-.6.5 0 .2 0 .3.2.4l6.5 5H17.6c-2.6 0-3.4-1.5-3.4-1.5L3.9 10.8C1.8 11.6 0 13.2 0 16c0 2.1 1.1 4.2 2.5 5h5.1v-1.4c0-3.2 2.7-5.8 6-5.8s6 2.6 6 5.8V21h25.7v-1.4c0-3.2 2.7-5.8 6-5.8s6 2.6 6 5.8V21h3.2c.8-.9 1.3-2.1 1.3-3.6.2-2.5-1.2-4.6-3.1-4.9zm-42.3 7.1c0 1.5-1.3 2.7-2.8 2.7s-2.8-1.2-2.8-2.7 1.3-2.7 2.8-2.7 2.8 1.2 2.8 2.7zm37.8 0c0 1.5-1.3 2.7-2.8 2.7s-2.8-1.2-2.8-2.7 1.3-2.7 2.8-2.7 2.8 1.2 2.8 2.7zm-40.6-4.4c-2.5 0-4.5 2-4.5 4.4s2 4.4 4.5 4.4 4.5-2 4.5-4.4-2-4.4-4.5-4.4zm37.8 0c-2.5 0-4.5 2-4.5 4.4s2 4.4 4.5 4.4 4.5-2 4.5-4.4-2-4.4-4.5-4.4z"></path></svg></as24-icon> 
                                CONVERTIBLE
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="pickup">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="pickup" type="checkbox" value="pickup" name="pickup"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                            <as24-icon  type="bodytypes/offroad"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M58.6 9.6L45 7.7l-7.6-5C35.8 1.6 34.7 1 32.1 1H13.3c-2.6 0-4.7.9-6.3 2.6L1.8 9l-.1.1-.2.2C.6 10.4 0 12 0 14v3.5c0 1.2.6 2.4 1.3 2.9L3 21h3v-1.6c0-4.2 3.2-7.1 7.2-7.1s7.2 2.9 7.2 7.1V21h23.4v-1.6c0-4.2 3.2-7.1 7.2-7.1s7.2 2.9 7.2 7.1V21H61c.6-.9 1-2.5 1-3.7v-2.1c0-2.9-1.5-5.2-3.4-5.6zM16 8H9l2.4-3.3c1-1.4 2.5-1.7 4.5-1.7h1.5L16 8zm2 0l1.7-5h6l.8 5H18zm11 0l-1-5h4.5c1.5 0 2.7.1 4.1 1.1L42 8H29zm-15.8 9.1c-1.7 0-3 1.3-3 3s1.4 3 3 3c1.7 0 3-1.3 3-3s-1.3-3-3-3zm37.8 0c-1.7 0-3 1.3-3 3s1.4 3 3 3c1.7 0 3-1.3 3-3s-1.3-3-3-3zm-32.9 3c0 2.7-2.2 4.9-4.9 4.9s-4.9-2.2-4.9-4.9 2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9zm37.9 0c0 2.7-2.2 4.9-4.9 4.9s-4.9-2.2-4.9-4.9 2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9z"></path></svg></as24-icon>
                            PICKUP
                            </span> </label>
						</div>
						<div>
							<label class="flex flex-col p-4 border-2 rounded border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer text-center focus:ring-2 focus:ring-blue-600 py-12" for="wagon">
								<input  v-model="form.body" class="form-checkbox top-2 float-left h-5 w-5 -my-8 rounded text-purple-300" id="wagon" type="checkbox" value="wagon" name="wagon"> <span class="text-lg font-bold uppercase mt-12 text-gray-500">  
                            <as24-icon type="bodytypes/delivery"><svg class="h-20 w-20 mx-20 -my-5 text-gray-500 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 26"><path d="M16.4 21.5c0 1.5-1.3 2.8-2.8 2.8s-2.8-1.2-2.8-2.8 1.3-2.8 2.8-2.8 2.8 1.3 2.8 2.8zm37.8 0c0 1.5-1.3 2.8-2.8 2.8s-2.8-1.2-2.8-2.8 1.3-2.8 2.8-2.8 2.8 1.3 2.8 2.8zm6.4-10L53 2.2C52 .8 50.3 0 48.4 0h-46C1 .7 0 2.5 0 4.6V18s0-.1 0 0c0 2.1 1.1 4.1 2.5 5h5.1v-1.5c0-3.3 2.7-5.9 6-5.9s6 2.7 6 5.9V23h25.7v-1.5c0-3.3 2.7-5.9 6-5.9s6 2.7 6 5.9V23h3.2c.8-.9 1.3-2.2 1.3-3.7v-3.2c.2-1.4-.2-3.3-1.2-4.6zm-13-1.5c-1.9 0-2.6-.9-2.6-3V2h4c1.1 0 2.5.8 3.2 1.7L57 10h-9.4zm-34 7.1c-2.5 0-4.5 2-4.5 4.5s2 4.5 4.5 4.5 4.5-2 4.5-4.5-2-4.5-4.5-4.5zm37.8 0c-2.5 0-4.5 2-4.5 4.5s2 4.5 4.5 4.5 4.5-2 4.5-4.5c.1-2.5-2-4.5-4.5-4.5z"></path></svg></as24-icon>                         
                                WAGON
                            </span> </label>
						</div>
					</div>
				</div>
				<div id="step4"  v-if="step == 4">
					<h1 class="mt-10 text-3xl text-gray-600 font-bold">Which equipments You like?</h1>
					<h1 class="text-lg font-bold text-gray-600  title-font px-2 mt-4"> Inside Options : </h1>
					<form class="grid grid-cols-1 gap-2 w-full mt-4">
						<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="climate_control"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="form.climate_control"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="climate_control" type="checkbox" name="climate_control" >Climate Control</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="cruise_control"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="form.cruise_control" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="cruise_control" type="checkbox" name="cruise_control" >Cruise control</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="touchscreen_infotainment"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="touchscreen_infotainment" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="touchscreen_infotainment" type="checkbox" name="touchscreen_infotainment" >Touchscreen infotainment</span> </label>
								</div>
							</div>
						</div>
						<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="heated_seats"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="heated_seats" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="heated_seats" type="checkbox" name="heated_seats" >Heated seats</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="leather_seats"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="leather_seats" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="leather_seats" type="checkbox" name="leather_seats" >Leather seats</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="apple_android"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="android_auto" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="apple_android" type="checkbox" name="apple_android" >Apple CarPlay / Android Auto </span> </label>
								</div>
							</div>
						</div>
						<h1 class="text-lg font-bold text-gray-600  title-font px-2 mt-2"> Outside Options : </h1>
						<div class="-mx-3 md:flex mb-2 mt-3">
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="fog_lights"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="fog_lights" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="fog_lights" type="checkbox" name="fog_lights" >Fog lights</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="parking_sensor"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="parking_sensor" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="parking_sensor" type="checkbox" name="parking_sensor" >Parking sensor</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="rearview_camera"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="rearview_camera" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="rearview_camera" type="checkbox" name="rearview_camera" >Rearview camera</span> </label>
								</div>
							</div>
						</div>
						<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="reversing_radar"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="reversing_radar" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="reversing_radar" type="checkbox" name="reversing_radar" >Reversing Radar</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="led_lights"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="led_lights" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="led_lights" type="checkbox" name="led_lights" >Led lights</span> </label>
								</div>
							</div>
							<div class="md:w-1/3 px-2">
								<div>
									<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="sunroof"> <span class="text-lg text-justify font-bold uppercase">  
                                <input v-model="sunroof" class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="sunroof" type="checkbox" name="sunroof" >Sunroof</span> </label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="step5"  v-if="step == 5">
					<h1 class="mt-10 text-3xl text-gray-600 font-bold">Are you considering any specific brands?</h1>
					<form class="grid grid-cols-1 gap-2 w-full mt-4">
						<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="All"> <span class="text-lg text-justify font-bold uppercase">  
                        			 <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="All" value="All" type="checkbox" name="All" >All</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Nissan"> <span class="text-lg text-justify font-bold uppercase">  
                                   <span class="car-nissan"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Nissan" type="checkbox" name="Nissan" value="Nissan" >Nissan</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Mazda"> <span class="text-lg text-justify font-bold uppercase">  
                               <span class="car-mazda"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Mazda" type="checkbox" name="Mazda" value="Mazda" >Mazda</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Hyundai"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-hyundai"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Hyundai" type="checkbox" name="Hyundai" value="Hyundai" >Hyundai</span> </label>
								</div>
							</div>
						</div>
							<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="AlfaRomeo"> <span class="text-lg text-justify font-bold uppercase">  
                                 <span class="car-alfa-romeo"></span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="AlfaRomeo" type="checkbox" name="AlfaRomeo" value="AlfaRomeo" >Alfa Romeo</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Audi"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-audi"></span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Audi" type="checkbox" name="Audi" value="Audi" >Audi</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Bmw"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-bmw"></span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Bmw" type="checkbox" name="Bmw" value="Bmw" >Bmw</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="fiat"> <span class="text-lg text-justify font-bold uppercase">  
                                 <span class="car-fiat"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="fiat" type="checkbox" name="fiat" value="fiat">Fiat</span> </label>
								</div>
							</div>
						</div>
							<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Chevrolet"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-chevrolet"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Chevrolet" type="checkbox" name="Chevrolet" value="Chevrolet">Chevrolet</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Mitsubishi"> <span class="text-lg text-justify font-bold uppercase">  
                                 <span class="car-mitsubishi"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Mitsubishi" type="checkbox" name="Mitsubishi" value="Mitsubishi">mitsubishi</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Ford"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-ford"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Ford" type="checkbox" name="Ford" value="Ford">Ford</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Honda"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-honda"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Honda" type="checkbox" name="honda" value="Honda">Honda</span> </label>
								</div>
							</div>
						</div>
							<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Porsche"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-porsche"> </span>  <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Porsche" type="checkbox" name="Porsche" value="Porsche">Porsche</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Volkswagen"> <span class="text-lg text-justify font-bold uppercase">  
                                  <span class="car-volkswagen"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Volkswagen" type="checkbox" name="Volkswagen" value="Volkswagen">Volkswagen</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Toyota"> <span class="text-lg text-justify font-bold uppercase">  
                                <span class="car-toyota"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Toyota" type="checkbox" name="Toyota" value="Toyota">Toyota</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Suzuki"> <span class="text-lg text-justify font-bold uppercase">  
                               <span class="car-suzuki"> </span> <input  v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Suzuki" type="checkbox" name="Suzuki" value="Suzuki">Suzuki</span> </label>
								</div>
							</div>
						</div>
						<div class="-mx-3 md:flex mb-2">
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Isuzu"> <span class="text-lg text-justify font-bold uppercase">  
                                 <span class="car-isuzu"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Isuzu" type="checkbox" name="Isuzu" value="Isuzu">Isuzu</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Kia"> <span class="text-lg text-justify font-bold uppercase">  
                               <span class="car-kia"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Kia" type="checkbox" name="Kia" value="Kia">Kia</span> </label> 
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="LandRover"> <span class="text-lg text-justify font-bold uppercase">  
                                 <span class="car-land-rover"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="LandRover" type="checkbox" name="LandRover" value="LandRover">Land Rover</span> </label>
								</div>
							</div>
							<div class="md:w-1/4 px-2">
								<div>
								<label class="flex flex-col p-4 border-2 rounded text-gray-500 border-gray-400 border-opacity-50 hover:border-opacity-100 cursor-pointer  focus:ring-2 focus:ring-blue-600 py-3" for="Mercedes"> <span class="text-lg text-justify font-bold uppercase">  
                                  <span class="car-mercedes-benz"> </span> <input v-model="form.make"  class="form-checkbox float-left  h-5 w-5 rounded text-purple-300 mr-3 mt-1 -ml-1" id="Mercedes" type="checkbox" name="Mercedes" value="Mercedes">Mercedes Benz</span> </label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
             <div class="px-3 sticky mt-20 bg-white dark:bg-gray-800 text-2 text-gray-500 dark:text-gray-200 transition-colors duration-200">
					<div class="pt-2">
						<div class=" pb-5 px-3 m-auto pt-5 fixed bottom-0 left-0 bg-white shadow w-full
							border-t border-gray-500 text-gray-400 text-sm">
							<div class="">
								<div  class="px-4 py-2  text-right sm:px-6 m-auto space-y-4 md:space-y-0 ">
									<button v-if="step>1" @click="back()" class="text-gray-500  bg-transparent border border-solid border-gray-500  font-bold uppercase text-base px-16 py-3 rounded-lg outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" type="button"> Back </button>
									<button v-if="step<limit" @click="next()" class="bg-green-500 float-right text-white font-bold uppercase text-base px-16 py-3 rounded-lg shadow hover:shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 ml-4" type="button"> Next </button>
                                    <button v-else @click="search()" class="bg-green-500 float-right text-white font-bold uppercase text-base px-16 py-3 rounded-lg shadow hover:shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 ml-4" type="button"> Find my car </button>
								</div>
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
import  'car-makes-icons/dist/style.css'
export default {
    props: [''],
    data() {
        return {
            progress : 0,
            step: 1,
            limit: 5,
            form: this.$inertia.form({
                price_min : 0,
                price_max : 0,
                energy : [],
                body : [],
				make: [],
                climate_control : null,
                cruise_control : null,
                touchscreen_infotainment : null,
                heated_seats : null,
                leather_seats : null,
                android_auto : null,
                fog_lights : null,
                parking_sensor : null,
                rearview_camera : null,
                reversing_radar : null,
                led_lights : null,
                sunroof : null,


            })
        }
    },
    components: {
        AppLayout,
    },
    methods: {
        progressCount : function() {
            this.progress = ((this.step -1) / this.limit )*100

        },
        next : function(){
            this.step++
            this.progressCount()
        },
        back : function(){
            this.step--
            this.progressCount()
        },
        search : function(){
                this.form.post(route('discover.store'))
        }
    }
}
</script>