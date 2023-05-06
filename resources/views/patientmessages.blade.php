<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
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
						      <th>From</th>
						      <th>Message</th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($patientsmessages as $patientsmessage)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$patientsmessage->doctorname}}</th>
						      <td>{{$patientsmessage->message}}</td>
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
