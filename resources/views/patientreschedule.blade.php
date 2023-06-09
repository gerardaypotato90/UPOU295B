<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Upcomming Appointment') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        
    <div class="py-12">
    <section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th><div class="text-sm" aria-label="Patient Name">Patient Name</div></th>
						      <th><div class="text-sm" aria-label="Department">Department</div></th>
						      <th><div class="text-sm" aria-label="Appointment Date">Appointment Date</div></th>
						      <th><div class="text-sm" aria-label="Status">Status</th>
						      <th><div class="text-sm" aria-label="Action">Action</div></th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($patientapptstatus as $pl)
                        <form method="POST" action="{{ route('patientreschedule', $pl->id) }}">
						@if(Session::has('success'))
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
										<div class="alert alert-success">
											{{ Session::get('success') }}
										</div>
								</div>
							</div>
						</div>
                                @endif
                                @if(Session::has('failed'))
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">								
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                    </div>
								</div>
							</div>
						</div>
                        @endif
                        @csrf
						    <tr class="alert" role="alert">
						      <th scope="row"><div class="text-sm" aria-label="{{$pl->doctorname}}">{{$pl->doctorname}}</div></th>
						      <td><div class="text-sm" aria-label="{{$pl->department}}">{{$pl->department}}</div></td>
						      <td> <x-input id="rescheddate" id="datepicker" class="block mt-1 w-full datepicker form-control" type="text" name="rescheddate" :value="old('rescheddate')" aria-describedby="Appointment Date" autofocus /></td>
						      <td><div class="text-sm" aria-label="{{$pl->status}}">{{$pl->status}}</div></td>
						      <td>
						      	<!--<a href="/updatedresched/{{$pl->id}}" class="btn btn-primary">Update Schedule</a>-->
                                  <x-button class="ml-3 btn btn-primary" aria-label="Update Schedule">
                               		 {{ __('Update Schedule') }}
                            	  </x-button>
				        	  </td>
						    </tr>
                        </form>
						@endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		flatpickr("#datepicker", {
			enableTime: true,
			dateFormat: "Y-m-d h:i K",
			time_24hr: false,
			minDate: "today"
		});
	</script>
    </div>

</x-app-layout>
