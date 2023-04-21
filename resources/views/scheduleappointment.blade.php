<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
	

    <section>
		<div class="container">
		<form action="{{ route('scheduleappointment.doclist') }}" method="GET">
			@method('GET')
            @csrf
			<select name="query">
			<option value="">Select Department</option>
			@foreach ($departments as $dept)
			<option value="{{ $dept->departmentname }}">{{ $dept->departmentname }}</option>
			@endforeach
			</select>
			<button type="submit" class="btn btn-primary">Search</button>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Doctor Name</th>
						      <th>Department</th>
						      <th>Available Days</th>
						      <th>Available Time</th>
						      <th>Book Appointment</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($drlist as $drl)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$drl->doctorname}}</th>
						      <td>{{$drl->department}}</td>
						      <td>{{$drl->availabledays}}</td>
						      <td>{{$drl->availabletime}}</td>
						      <td>
						      	
								<a href="/doctorschedule/{{$drl->doctorid}}" class="btn btn-primary">Book Appointment</a>
                                  <!--<button type="button" class="btn btn-primary">Book Appointment</button>-->
				        	  </td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
		</div>
	</section>

    </div>

</x-app-layout>
