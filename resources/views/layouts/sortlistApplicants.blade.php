@extends('usernav')

@section('main')
<center><h1><b><u><i>Sort List Candidate</i></u></b></h1></center>
<form action="" method="GET">
		     @csrf
      <div class="row g-2"style="margin-top:6%">
			<div class="col-md-5" style="margin-left:8%">
				<label class="control-label">Vacancy Name</label>
				<select name="vacancy" class="browser-default custom-select" id="vacancy">
				<option value=""selected >Select Vacancy</option>
				@foreach($vacancy as $vac)
					<option value="{{$vac->post}}" >{{$vac->post}}</option>
               @endforeach
				</select>
			</div>
			<div class="col-md-5"style="margin-right:1%">
				<label class="control-label">Company Name </label>
				<select name="company" class="browser-default custom-select" id="company">
				<option value="" >select Comapny</option>
				@foreach($company as $comp)
				<option value="{{$comp->name}}" >{{$comp->name}}</option>
               @endforeach
			</select>
			</div>
			
		</div>
		<center><button class=" btn btn-info" type="submit" style="margin-top:1%">Search</button></center>
         </form>

		 


		 <div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span><large><b>Application List</b></large></span>
		
							</div>
						</div>
						
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
								
									<div class="col-md-2 offset-md-1 text-right"></div>
									<div class="col-md-7">
									<form action="" method="GET">
		                              @csrf
										<input type="search"class="form-control" placeholder="Search By Position/name/company" name="position_filter" id="position_filter" >	  
									 </div>
									<button class=" btn btn-info" type="submit">Search</button>
                                    </form>
								</div>
							</div>
						
						</div>
						<hr><br>
						<table class="table table-bordered table-hover" id="">
							<colgroup>
								<col width="10%">
								<col width="25%">
								<col width="20%">
								<col width="15%">
								<col width="40%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Applicant Information</th>
									<th class="text-center">Company</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($user as $can)
						
								<tr>
								<td class="text-center">{{$can['id']}}</td>
									<td class="">
										<p>Name :<b>{{$can['name']}}</b></p>
										<p>Applied for : <b>{{$can['post']}}</b></p>
										<p>Applied for : <b><a href="{{url('/viewResume',$can->id)}}">{{$can['resume']}}</a></b></p>
									</td>
									<td class="text-center">
									{{$can['company']}}</td>
									
									<td class="text-center">
									{{$can['status']}}
									</td>
									<td class="text-center">
									<button class="btnView btn btn-primary" value="{{$can->id}}" >View</button>
									<button class="btnEdit btn btn-warning" value="{{$can->id}}" >Rseponse</button>	
									<button type="button" class=" btnDelete btn btn-sm btn-danger"  value="{{$can->id}}">Delete</button>
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
	
<!-- Start Delete Application-->
<div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <form action="{{url('/deleteApplicant')}}" enctype="multipart/form-data" method="POST">
		  @csrf
		  @method('DELETE')
		  <div>Do you want to Delete?</div>
		  <input type="hidden" class="form-control"  id="aid" name="aid" >
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
		<button type="submit" class="btn btn-primary"  >Yes</button>
        
	    </div>
     </form>
   </div>
   </div>
  </div>
  </div>
 </div>
<!-- End Delete Application-->

<!--Start Edit Application-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
    <div class="container-fluid">
	  <form action="{{url('update_application')}}" method="post" >
      @csrf
	 <input type="hidden" class="form-control"  id="id" name="id" >
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Messsage</label>
				<textarea name="cover_letter" id="cover_letter" cols="30" rows="3" placeholder="Message To the aooplicant" class="form-control"></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Status</label>
				<select class="custom-select browser-default select2" id="astatus" name="astatus" >
					@foreach($status as $tus)
						<option value="{{$tus->status_label}}">{{$tus->status_label}}</option>
					@endforeach
				</select>
			</div>
		</div>
	 </div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary"  >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
	</div>
	</form>
  </div>
 </div>
  </div>
 </div>
<!-- End Edit Application-->


<!-- Start View Application-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="full name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="address" class="form-control" id="address" placeholder="Address">
    </div>
  </div>
 <br>
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
 <br>
  <div class="form-group row">
    <label for="inputPosition" class="col-sm-2 col-form-label">Position Applying for</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="position" placeholder="position">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputSkill" class="col-sm-2 col-form-label">Skill</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="skill" placeholder="skill">
    </div>
  </div>
 <br>
  <div class="form-group row">
    <label for="inputExperiance" class="col-sm-2 col-form-label">Experiance</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="experiance" placeholder="experiance">
    </div>
  </div>
 <br>
  <div class="form-group">
    <label for="Information">Additional Information</label>
    <textarea class="form-control" id="additional"cols="30" rows="6"  ></textarea>
  </div>
 <br>
 <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	</div>
     </div>
  </form>
  </div>
  </div>
  </div>
 </div>
<!-- End View Application-->

<script Type="text/javascript">
$(document).ready(function(){
  $("#addRoom").on('click',function(){
        $("#addNewroom").modal("show");
    });
     
	$(document).on('click','.btnDelete',function(){
		var id=$(this).val();
		//alert(id);
		$("#myModal3").modal("show");
		   $('#aid').val(id);

    });

    $(".btnEdit").on('click',function(){
        var id=$(this).val();
        $("#myModal1").modal("show");
        //alert(id);
		$('#id').val(id);
        $.ajax({
               type:"GET",
               url:"/update/"+id,
               success: function(response){
                 $('#id').val(id);  
               }
              });
 });
 $(".btnView").on('click',function(){
        var id=$(this).val();
        $("#myModal").modal("show");
        //alert(id);
        $.ajax({
               type:"GET",
               url:"/view/"+id,
               success: function(response){
                 //console.log(response.id);
				 $('#position').val(response.applicants.post);
	             $('#name').val(response.applicants.name);
                 $('#email').val(response.applicants.email);
                 $('#contact').val(response.applicants.contact);
                 $('#address').val(response.applicants.address);
                 $('#additional').val(response.applicants.coverletter);
				 $('#status').val(response.applicants.status);
				 $('#experiance').val(response.applicants.experiance);
				 $('#skill').val(response.applicants.skill);
				 $('#cv').val(response.applicants.resume);
                 $('#id').val(id);
                   
               }
              });
   });
		});
  </script>

 </body>



@endsection