<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule an appointment') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
	

    <section>
		<div class="container">
		<x-auth-validation-errors />
		<form action="{{ route('scheduleappointment.doclist') }}" method="GET">
			@method('GET')
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
						      <th><div class="text-sm" aria-label="Doctor Name">Doctor Name</div></th>
						      <th><div class="text-sm" aria-label="Department">Department</div></th>
						      <th><div class="text-sm" aria-label="Available Days">Available Days</div></th>
						      <th><div class="text-sm" aria-label="Available Time">Available Time</div></th>
						      <th><div class="text-sm" aria-label="Book Appointment">Book Appointment</div></th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($drlist as $drl)
						    <tr class="alert" role="alert">
						      <th scope="row"><div class="text-sm" aria-label="{{$drl->doctorname}}">{{$drl->doctorname}}</div></th>
						      <td><div class="text-sm" aria-label="{{$drl->department}}">{{$drl->department}}</div></td>
						      <td><div class="text-sm" aria-label="{{$drl->availabledays}}">{{$drl->availabledays}}</div></td>
						      <td><div class="text-sm" aria-label="{{$drl->availabletime}}">{{$drl->availabletime}}</div></td>
						      <td>
						      	
								<a href="/doctorschedule/{{$drl->doctorid}}" class="btn btn-primary" title="Book Appointment">Book Appointment</a>
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
