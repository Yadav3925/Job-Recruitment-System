
@extends('usernav')
@section('main')

<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span><large><b><center>Report of Applicants</center></b></large></span>
							
							</div>
						</div>
						
					</div>
					
								</div>
							</div>
						</div>
						<hr><br>
						<table class="table table-bordered table-hover">
					
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Applicants Name</th>
									
									<th class="text-center">Company</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Status</th>
									<th class="text-center">Description</th>
								</tr>
							</thead>
							<tbody>
							
							@foreach($result as $comp)
								<tr>
								<td class="text-center">{{$comp['id']}}</td>
									<td class="">
										<b>{{$comp['name']}}</b>
										
									</td>
								
									<td class="text-center">
									{{$comp['company']}}
									</td>
                                    <td class="text-center">
									{{$comp['post']}}
									</td>
                                    <td class="text-center">
									{{$comp['status']}}
									</td>
									<td class="text-center">
									{{$comp['coverletter']}}
									</td>
									</tr>
									@endforeach	
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- Table Panel -->
		</div>
	</div>	
	
</div>
@endsection