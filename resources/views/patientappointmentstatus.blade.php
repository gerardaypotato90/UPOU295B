<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients Appointment Status') }}
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
						      <th>Doctor Name</th>
						      <th>Department</th>
						      <th>Appointment Date</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($plist as $pl)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$pl->doctorname}}</th>
						      <td>{{$pl->department}}</td>
						      <td>{{$pl->appointmentdate}}</td>
						      <td>{{$pl->status}}</td>
						      <td>
						      	<!--<a href="#" class="close" data-dismiss="alert" aria-label="Close">-->
								  <a href="patientreschedule/{{$pl->id}}" class="btn btn-primary">Reschedule</a>
                                  <button type="button" class="btn btn-primary">Cancel</button>
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
