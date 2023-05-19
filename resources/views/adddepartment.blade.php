<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors />
                 

                    <form method="POST" action="{{ route('adddepartment.adddept') }}">
                        @method('PUT')

                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('failed'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                    </div>
                                @endif
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-2 gap-6"> 
                                <div>
                                    <x-label for="department" :value="__('Department')" />
                                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" aria-describedby="department" autofocus />
                                </div>              
                            </div> 
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
