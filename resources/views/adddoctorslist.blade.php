<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Doctor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors />
                 

                    <form method="POST" action="{{ route('adddoctorslist.adddoctor') }}">
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
                                    <x-label for="did" :value="__('Doctor Name and ID')" />
                                    <select name="did" id="did" class="block mt-1 w-full">
                                        <option value="">Select Doctor Name</option>
                                        @foreach ($user as $users)
                                        <option atval="{{ $users->name }}" value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input id="doctornamev" class="block mt-1 w-full" type="hidden" name="" value="" disabled autofocus />
                                </div>
                                <div>
                                    <x-label for="department" :value="__('Department')" />
                                    <select id="department" class="block mt-1 w-full" name="department" >
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $dept)
                                        <option value="{{ $dept->departmentname }}">{{ $dept->departmentname }}</option>
                                        @endforeach
                                    </select>   
                                    <!--<x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" autofocus />-->
                                </div>
                                <div>
                                    <x-label for="availabledays" :value="__('Available Days')" />
                                    <x-input id="availabledays" class="block mt-1 w-full" type="text" name="availabledays" :value="old('availabledays')" autofocus />
                                </div>
                                <div>
                                    <x-label for="availabletime" :value="__('Available Time')" />
                                    <x-input id="availabletime" class="block mt-1 w-full" type="text" name="availabletime" :value="old('availabletime')" autofocus />
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
        <script>
            $(document).ready(function(){
                $('#did').on('change', function(){
                    var selectedOption = $(this).val();
                    $('#doctornamev').val(selectedOption);
                });
            });
        </script>
    </div>
</x-app-layout>
