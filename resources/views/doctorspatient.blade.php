<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Dashboard') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
             
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><circle cx="12" cy="8" r="5" /><path stroke-linecap="round" stroke-linejoin="round" d="M3,21 h18 C 21,12 3,12 3,21" /></svg>
                                <a href="{{ route('doctorsappointment') }}" class="ml-4 text-lg leading-7 font-semibold">Patient Check History</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Browse through patient's history.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><circle cx="12" cy="8" r="5" /><path stroke-linecap="round" stroke-linejoin="round" d="M3,21 h18 C 21,12 3,12 3,21" /></svg>
                                <a href="{{ route('doctorspatientslist') }}" class="ml-4 text-lg leading-7 font-semibold">Patient List</a>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Browse through patient's list.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>

</x-app-layout>
