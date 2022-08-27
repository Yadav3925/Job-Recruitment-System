@extends('usernav')
@section('main')


<div class="container-fluid">
	
	<div class="col-lg-20">
		<div class="row">

			<!-- Table Panel -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span><large><b>Company List</b></large></span>
								<button class="btn btn-sm btn-block btn-primary btn-sm col-md-2 float-right" data-toggle="modal" data-target="#myModal2"data-id=""><i class="fa fa-plus"></i> New Company</button>
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
									<th class="text-center">Company Name</th>
									
									<th class="text-center">Email</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">PAN no</th>
									<th class="text-center">Action</th>
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
									{{$comp['email']}}
									</td>
                                    <td class="text-center">
									{{$comp['contact']}}
									</td>
                                    <td class="text-center">
									{{$comp['panno']}}
									</td>
									<td class="text-center">
								
									<button type="button" class="btnEdit btn btn-warning" value="{{$comp->id}}" >Edit</button>
										<button class="btn btn-sm btn-danger delete_company" value="{{$comp->id}}" >Delete</button>
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

<script Type="text/javascript">
$(document).ready(function(){
  $("#addRoom").on('click',function(){
        $("#addNewroom").modal("show");
    });
     
	$(document).on('click','.delete_company',function(){
		var id=$(this).val();
		//alert(id);
		$("#myModal").modal("show");
		   $('#cid').val(id);

    });

    $(".btnEdit").on('click',function(){
        var id=$(this).val();
        $("#myModal1").modal("show");
        //alert(id);
        $.ajax({
               type:"GET",
               url:"/updateCompany/"+id,
               success: function(response){
                 //console.log(response.id);
				 $('#cname').val(response.company.name);
	             $('#panno').val(response.company.panno);
                 $('#email').val(response.company.email);
                 $('#contact').val(response.company.contact);
                 $('#address').val(response.company.address);
                 $('#id').val(id);
                   
               }
              });
});


	
   
    

    
});
</script>
<!-- View company-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Company</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <form action="{{url('/deleteCompany')}}" enctype="multipart/form-data" method="POST">
		  @csrf
		  @method('DELETE')
		  <div>Do you want to Delete?</div>
		  <input type="hidden" class="form-control"  id="cid" name="cid" >
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
 
  
<!-- Edit company-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EditCompany</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
   <div class="container-fluid">
	  <form action="{{url('/editCompany')}}" method="POST">
		@csrf
		<input type="hidden" name="id" id="id">
	     <div class="col-md-12">
		
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Company Name</label>
				<input type="text" class="form-control" name="cname" required="" id="cname">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Company Address</label>
				<input type="text" class="form-control" name="address" required="" id="address">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email" required="" id="email">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Contact</label>
				<input type="number" class="form-control" name="contact" required="" id="contact">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">PAN NO</label>
				<input type="text" class="form-control" name="panno" required="" id="panno">
			</div>
		</div>
	 </div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
   </div>
   </form>
  </div>
   </div>
   
  </div>
</div>

<!-- Add Company-->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Company</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
   <div class="container-fluid">
	  <form action="{{url('insertCompany')}}" method="POST">
		@csrf
	     <div class="col-md-12">
		
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Company Name</label>
				<input type="text" class="form-control" name="Cname" required="" id="Cname">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email" required="" id="email">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Address</label>
				<input type="text" class="form-control" name="address" required="" id="address">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Contact</label>
				<input type="number" class="form-control" name="contact" required="" id="contact">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">PAN NO</label>
				<input type="text" class="form-control" name="pano" required="" id="pano">
			</div>
		</div>
	 </div>
	</div>
	<div class="modal-footer">
		<button type="Submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
   </div>
   </form>
  </div>
   </div>
   
  </div>
</div>

@endsection