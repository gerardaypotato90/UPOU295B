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
						      <th>Patient Name</th>
						      <th>Department</th>
						      <th>Appointment Date</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($drappstatus as $pl)
                        <form method="POST" action="{{ route('reschedule', $pl->id) }}">
                        @csrf
						    <tr class="alert" role="alert">
						      <th scope="row">{{$pl->patientname}}</th>
						      <td>{{$pl->department}}</td>
						      <td> <x-input id="rescheddate" id="datepicker" class="block mt-1 w-full datepicker form-control" type="text" name="rescheddate" :value="old('rescheddate')" autofocus /></td>
						      <td>{{$pl->status}}</td>
						      <td>
						      	<!--<a href="/updatedresched/{{$pl->id}}" class="btn btn-primary">Update Schedule</a>-->
                                  <x-button class="ml-3 btn btn-primary">
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
