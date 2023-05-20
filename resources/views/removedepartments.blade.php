<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Remove Patient') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
        <table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th><div class="text-sm" aria-label="Department">Department</div></th>
                  <th><div class="text-sm" aria-label="Actions">Actions</div></th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($departments as $department)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$department->departmentname}}</th>
                              <td><a href="removedepartment/{{ $department->id }}" title="Remove">Remove</a></td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
        </div>
    </div>

</x-app-layout>
