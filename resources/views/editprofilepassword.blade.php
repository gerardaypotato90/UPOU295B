<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <div class="profile-card">
    <div class="container mt-5">
    
    <div class="row d-flex justify-content-center">       
        <div class="col-md-7">            
            <div class="card p-3 py-4">               
                <div class="text-center">
                    <img src="{{ asset('images/logo.png') }}" width="100" class="rounded-circle img-center">
                </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">{{Auth::user()->name}}</h5>
                    <div>{{Auth::user()->email}}</div>
                    <div>{{Auth::user()->address}}</div>
                    <div>{{Auth::user()->telephone_number}}</div>
                </div>  
            </div>     
            </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6">
                            <div class="flex items-center" aria-label="Edit Profile">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><circle cx="12" cy="8" r="5" /><path stroke-linecap="round" stroke-linejoin="round" d="M3,21 h18 C 21,12 3,12 3,21" /></svg>
                                <a href="{{ route('editprofile') }}" class="ml-4 text-lg leading-7 font-semibold" title="Edit Profile">Edit Profile</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" aria-label="Edit your profile">
                                    Edit your profile.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700" aria-label="Change password">
                            <div class="flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><circle cx="12" cy="8" r="5" /><path stroke-linecap="round" stroke-linejoin="round" d="M3,21 h18 C 21,12 3,12 3,21" /></svg>
                                <a href="{{ route('editpassword') }}" class="ml-4 text-lg leading-7 font-semibold" title="Change password">Change password.</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" aria-label="Change password">
                                    Change password.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>

</x-app-layout>
