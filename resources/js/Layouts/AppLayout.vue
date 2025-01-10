<template>
    <div>
        <jet-banner />

        <div class=" min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <inertia-link :href="route('home')">
                             <img class="block h-14 w-auto" src="https://i.ibb.co/K7rsWmz/logo.png" >
                                </inertia-link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" v-if="$page.props.user">
                                     <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8" v-if="$page.props.user.role == 'admin'">
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('dashboard')"  :active="route().current('dashboard')">
                                    Dashboard
                                </jet-nav-link>
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('users.index')"  :active="route().current('users.index')">
                                    Users
                                </jet-nav-link>
                                 <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('agencies.index')"  :active="route().current('agencies.index')">
                                   Agencies
                                </jet-nav-link>
                                  <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('ads')"  :active="route().current('pending')">
                                  Ads
                                </jet-nav-link>
                                 <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('reports')"  :active="route().current('reports')">
                                    Reports
                                </jet-nav-link>
                                 <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('inbox')"  :active="route().current('inbox')">
                                    Inbox
                                </jet-nav-link>
                            </div>
                              <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8" v-else > 
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('home')" :active="route().current('home')">
                                    Home
                                </jet-nav-link>
                                  <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('store')" :active="route().current('store')">
                                    Store
                                </jet-nav-link>
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('agencies')" :active="route().current('agencies')">
                                    Agencies
                                </jet-nav-link>
                               <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('contact')" :active="route().current('contact')">
                                    Contact us
                                </jet-nav-link>
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 "  :href="route('chat',{type:'user',username:null})"   >
                                    Messages ({{msgcount}})
                                </jet-nav-link>
                             </div>
                            </div>
                    <div class="flex  -mx-1 md:mx-0" v-else>
                        
                    <div class="  md:flex -mx-4 md:flex-row md:items-center md:mx-8">
                                <jet-nav-link class="  px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('home')" :active="route().current('home')">
                                    Home
                                </jet-nav-link>
                                  <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('store')" :active="route().current('store')">
                                    Store
                                </jet-nav-link>
                                <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('agencies')" :active="route().current('agencies')">
                                    Agencies
                                </jet-nav-link>
                               <jet-nav-link class="px-2 py-1 mx-4 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 " :href="route('contact')" :active="route().current('contact')">
                                    Contact us
                                </jet-nav-link>
                        <div class=" float-right ml-96 ">
                        <a class=" ml-12 float-right block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-indigo-600 md:mx-0 md:w-auto" :href="route('register')" :active="route().current('register')">Sign up</a>
                         <a class="  float-right block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-indigo-600 md:mx-2 md:w-auto" :href="route('login')" :active="route().current('login')">Sign in</a>
                       </div>                            

                             </div>

                    </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <!-- Teams Dropdown -->
                                <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.user.current_team.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
 
                                </jet-dropdown>
                            </div>

                            <!-- Settings Dropdown -->

                            <div class="ml-3 relative" v-if="$page.props.user">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                            <span class="pl-3 py-2 text-gray-500">{{ $page.props.user.name }}</span>
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>


                                        <jet-dropdown-link :href="route('mycars',$page.props.user.username)">
                                            My Store
                                        </jet-dropdown-link>

                                       <jet-dropdown-link :href="route('myagency',$page.props.user.agency.id)"  v-if="($page.props.user.haveAgency)">
                                            {{$page.props.user.agency.name}}
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('agency.create')" v-if="(!$page.props.user.haveAgency)&&($page.props.user.role == 'user')">
                                            Create new Agency
                                        </jet-dropdown-link>
                                        
                                        <jet-dropdown-link :href="route('profile.show')">
                                            Settings
                                        </jet-dropdown-link> 

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Log Out
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                             
                        


                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div v-if="$page.props.user" :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1" v-if="$page.props.user">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-dropdown-link :href="route('agency.create')" v-if="(!$page.props.user.haveAgency)&&($page.props.user.role == 'user')">
                                Create new Agency
                            </jet-dropdown-link>

                            <jet-dropdown-link v-if="$page.props.user.role == 'user'" :href="route('store',$page.props.user.username)">
                                My Store
                            </jet-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form> 
                        </div>
                    </div>
                </div>
                    <div v-else :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('login')" :active="route().current('login')">
                            Sing in
                        </jet-responsive-nav-link>
                          <jet-responsive-nav-link :href="route('register')" :active="route().current('register')">
                            Sign up
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->

                </div>

            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
                msgcount: 0,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
            msgNotif(){
                axios.post(route('api.msg'),{username:this.$page.props.user.username,token:this.$page.props.user.ChatToken}).then((response)=>{
                    this.msgcount = response.data
                })
            }
        },
        created(){
             if(this.$page.props.user){
                 this.msgNotif()
              setInterval(() => {
                     this.msgNotif()
                 }, 10000);
             }

        }
    }
</script>
