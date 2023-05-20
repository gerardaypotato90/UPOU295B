<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upcoming Appointments') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
    <section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th><div class="text-sm" aria-label="Doctor Name">Doctor Name</div></th>
						      <th><div class="text-sm" aria-label="Department">Department</div></th>
						      <th><div class="text-sm" aria-label="Appointment Date">Appointment Date</div></th>
						      <th><div class="text-sm" aria-label="Status">Status</div></th>
						      <th><div class="text-sm" aria-label="Action">Action<div></th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($plist as $pl)
						    <tr class="alert" role="alert">
						      <th scope="row"><div class="text-sm" aria-label="{{$pl->doctorname}}">{{$pl->doctorname}}</div></th>
						      <td><div class="text-sm" aria-label="{{$pl->department}}">{{$pl->department}}</div></td>
						      <td><div class="text-sm" aria-label="{{$pl->appointmentdate}}">{{$pl->appointmentdate}}</div></td>
						      <td><div class="text-sm" aria-label="{{$pl->status}}">{{$pl->status}}</div></td>
						      <td>
						      	<!--<a href="#" class="close" data-dismiss="alert" aria-label="Close">-->
								  <a href="patientreschedule/{{$pl->id}}" class="btn btn-primary" title="Reschedule">Reschedule</a>
								  <a href="cancelappointment/{{$pl->id}}" class="btn btn-primary" title="Cancel">Cancel</a>
				        	  </td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

    </div>

</x-app-layout>
