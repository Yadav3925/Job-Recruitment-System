
@extends('usernav')
@section('main')



<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span><large><b>Vacancy List</b></large></span>
								<button type="button" class="btnProdEdit btn btn-primary btn-sm col-md-2 float-right" data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus"></i> New Vacancy</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<colgroup>
								<col width="10%">
								<col width="30%">
								<col width="20%">
								<col width="10%">
								<col width="30%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Vacancy Information</th>
									<th class="text-center">Availabilty</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($vacancy as $vacn)
								<tr>
									<td class="text-center">{{$vacn['id']}}</td>
									<td class="">
										<p>Position : <b>{{$vacn['post']}}</b></p>
										<p class=" truncate"><i><small>{{$vacn['description']}}</small></i></p>
									</td>
									<td class="text-center">{{$vacn['availabiliy']}}</td>
									
									<td class="text-center">
											<span class="badge badge-success">{{$vacn['status']}}</span>
											
										</td>
									<td class="text-center">
									   
										<button type="button" class="btnEdit btn btn-warning"value="{{$vacn->id}}" >Edit</button>
										<button class="btn btn-sm btn-danger delete_vacancy" value="{{$vacn->id}}" >Delete</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						
					</div>

				</div>
				
			
				
<!-- Start Edit Vacancy-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Vacancy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
  <div class="container-fluid">
  <form action="{{url('editVacancy')}}" method="POST">
		@csrf	
		<input type="hidden" name="id" class="form-control" id="id">	
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Position Name</label>
				<input type="text" name="vposition" class="form-control" id="vposition">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Skill Requries</label>
				<input type="text" name="vskill" class="form-control" id="vskill">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Address</label>
				<input type="text" name="vaddress" class="form-control" id="vaddress">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Salary</label>
				<input type="text" name="vsalary" class="form-control" id="vsalary">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Job Time</label>
				<select name="vtime" class="browser-default custom-select" id="vtime">
					<option value="Full Time" >Full Time</option>
					<option value="Part Time" >Part Time</option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Vacancy Number</label>
				<input type="number" name="vavailability" min='1' class="form-control text-right" id="vavailability">
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Status</label>
				<select name="vstatus" class="browser-default custom-select" id="vstatus">
					<option value="Active" >Active</option>
					<option value="Closed" >Closed</option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">category</label>
				<select name="vcategory" class="browser-default custom-select" id="vcategory">
				@foreach($cate as $cat)
					<option value="{{$cat['jobcategory']}}" >{{$cat['jobcategory']}}</option>
					
					@endforeach
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Description</label>
				<textarea name="vdescription"id="vdescription" cols="30" rows="7" class="text-jqte"></textarea>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
	</form>
   </div>
	 </div>
   </div>
  </div>
 </div>
 </div>
<!--End Edit Vacancy-->

<!--start Add Vacancy-->
<div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Vacancy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
  <div class="container-fluid">
	<form action="{{url('insertVacancy')}}" method="POST">
		@csrf	
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Company</label>
				<select name="company" class="browser-default custom-select" id="company">
				<option selected>Select Company</option>
					@foreach($company as $comp)
					<option value="{{$comp['name']}}" >{{$comp['name']}}</option>
					
					@endforeach
				</select>
			</div>
		</div>	
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Position Name</label>
				<input type="text" name="position" class="form-control" id="position">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Skill Requries</label>
				<input type="text" name="skill" class="form-control" id="skill">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Address</label>
				<input type="text" name="address" class="form-control" id="address">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Salary</label>
				<input type="text" name="salary" class="form-control" id="salary">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Job Time</label>
				<input type="text" name="time" class="form-control" id="time">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Availability</label>
				<input type="number" name="availability" min='1' class="form-control text-right" id="availability">
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Status</label>
				<select name="status" class="browser-default custom-select" id="status">
					<option value="Active" >Active</option>
					<option value="Closed" >Closed</option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">category</label>
				<select name="category" class="browser-default custom-select" id="category">
					@foreach($cate as $cat)
					<option value="{{$cat['jobcategory']}}" >{{$cat['jobcategory']}}</option>
					
					@endforeach
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Description</label>
				<textarea name="description"id="description" ></textarea>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
	</form>
   </div>

	 </div>
   </div>
  </div>


			</div>
			<!-- Table Panel -->
		</div>
	</div>

<!-- End  Add vacancy-->



<!-- Start Delete Vacancy-->
<div class="modal" id="myModal4">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete vacancy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <form action="{{url('/deleteVacancy')}}" enctype="multipart/form-data" method="POST">
		  @csrf
		  @method('DELETE')
		  <div>Do you want to Delete?</div>
		  <input type="hidden" class="form-control"  id="vid" name="vid" >
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
		<button type="submit" class="btn btn-primary"  >Yes</button>
        
	</div>
  </form>
  </div>
   </div>
	</div>
  </div>
  
<!-- End Delete Vacancy--> 


<script Type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.delete_vacancy',function(){
		var id=$(this).val();
		//alert(id);
		$("#myModal4").modal("show");
		   $('#vid').val(id);

    });
    $('.text-jqte').jqte();
    $(".btnEdit").on('click',function(){
        var id=$(this).val();
        $("#myModal1").modal("show");
        //alert(id);
        $.ajax({
               type:"GET",
               url:"/updateVacancy/"+id,
               success: function(response){
                 //console.log(response.id);
				 $('#vposition').val(response.vacancy.post);
	             $('#vavailability').val(response.vacancy.availabiliy);
                 $('#vdescription').val(response.vacancy.description);
				 $('#vskill').val(response.vacancy.skills);
	             $('#vaddress').val(response.vacancy.address);
                 $('#vsalary').val(response.vacancy.salaryrange);
				 $('#vtime').val(response.vacancy.time);
	             $('#vcategory').val(response.vacancy.category);
                 $('#vstatus').val(response.vacancy.status);
                 $('#id').val(id);
                   
               }
              });
});

    
});
</script>

   @endsection

  

	

