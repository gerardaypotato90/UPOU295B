<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Upcomming Appointment') }}
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
						      <th>Patient Name</th>
						      <th>Department</th>
						      <th>Appointment Date</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($drappstatus as $pl)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$pl->patientname}}</th>
						      <td>{{$pl->department}}</td>
						      <td>{{$pl->appointmentdate}}</td>
						      <td>{{$pl->status}}</td>
						      <td>
								@if($pl->status == 'For Approval')
						      	  <a href="approved/{{$pl->patientid}}/{{$pl->id}}" class="btn btn-primary">Approved</a>
								@endif
								@if($pl->status != 'Done Check-up')
								  <a href="reschedule/{{$pl->id}}" class="btn btn-primary">Reschedule</a>
								@endif
								@if($pl->status == 'Approved/Active')
								  <a href="cancel/{{$pl->patientid}}/{{$pl->id}}" class="btn btn-primary">Cancel</a>
								@endif
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
