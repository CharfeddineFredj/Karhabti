<template>
<app-layout> 
<div class="max-w-7xl mx-auto my-10 p-6 bg-white">
    <div class="grid grid-cols-3 min-w-full border rounded" style="min-height: 80vh;">
            <div class="col-span-1 bg-white border-r border-gray-300">
                <div class="my-3 mx-3 ">
                    <div class="relative text-gray-600 focus-within:text-gray-400">

                    </div>
                </div>

                <ul class="overflow-auto" style="height: 500px;">
                    <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Chats</h2>
                      <div v-if="list.length" class="">
                       <template v-for="(u,index) in list " :key="index" >
                    <li v-if="u.partner" > 
                        <inertia-link :href="route('chat',{type:u.type,username:u.partner.username})"  class="hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-10 w-10 rounded-full object-cover"
                            :src="u.partner.picture"
                             />
                            <div class="w-full pb-2">
                                <div class="flex justify-between">
                                    <span class="block ml-2 font-semibold text-base text-gray-600 ">{{u.partner.name}}</span>
                                    <span class="block ml-2 text-sm text-gray-600">{{u.createdAtText}}</span>
                                </div>
                                <span class="block ml-2 text-sm text-gray-600">{{ u.last_msg }}</span>
                            </div>
                        </inertia-link>
                        
                    </li>
                    </template>
                    </div>
                </ul>
            </div>
            <div class="col-span-2 bg-white">
<div class="flex-1 p:2 sm:p-6  mt-8 ">
   <div class="flex sm:items-center  py-3 border-b-2 border-gray-200">
      <div class="flex items-center space-x-4">
         <img :src="item.picture" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
         <div class="flex flex-col leading-tight">
            <div class="text-2xl mt-1 flex items-center">
               <span class="text-gray-700 mr-3">{{item.name}}</span>
               <span class="text-green-500">
                  <svg width="10" height="10">
                     <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                  </svg>
               </span>
            </div>
            <span class="text-lg text-gray-600 mb-2">{{item.email}}</span>
         </div>
      </div>
   </div>
   <div id="messages" class=" space-y-4 p-3 mb-2 ">
      <template v-for="(msg,key) in allMessages" :key="key">
            <div class="chat-message" v-if="msg.sender_id == item.username">
               <div class="flex items-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{msg.message}}</span></div>
                  </div>
                  <img :src="item.picture" alt="My profile" class="w-6 h-6 rounded-full order-1">
               </div>
            </div>
            <div class="chat-message" v-else>
               <div class="flex items-end justify-end">
                  <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                     <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-indigo-600 text-white ">{{msg.message}}</span></div>
                  </div>
                  <img :src="$page.props.user.profile_photo_url" alt="My profile" class="w-6 h-6 rounded-full order-2">
               </div>
            </div>
      </template>


      
   </div>
   <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0  ">
      <div class="relative flex">
         <input v-model="message" maxlength="250" type="text" placeholder="Write Something" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-4 bg-gray-200 rounded-full py-3">
         <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button @click="send()" type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-indigo-500 hover:bg-indigo-700 focus:outline-none">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                  <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
               </svg>
            </button>
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
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
       props : ['item','type','messages','list'] ,
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
                 message : '',
                 allMessages : []

            }
        },

        methods: { 

            send() {
               let form = this.$inertia.form({
                  receiver : this.item.username,
                  type : this.type,
                  message : this.message
               })
              form.post(route('chat.send'));
              this.message = ''
            },
            getMsg(){
               axios.post(route('api.chat'),{
                  me:this.$page.props.user.username,
                  partner:this.item.username,
                  token:this.$page.props.user.ChatToken
               }).then((response)=>{
                  this.allMessages = response.data
               })
            }
        },
        created(){
            this.allMessages = this.messages
            setInterval(() => {
                this.getMsg()
             }, 10000);
        }
    }
</script>