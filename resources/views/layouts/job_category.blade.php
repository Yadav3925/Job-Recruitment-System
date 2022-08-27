
@extends('usernav')
@section('main')
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="{{url('insertCategory')}}" enctype="multipart/form-data"method="POST">
				@csrf
				<div class="card">
					<div class="card-header">
					   Job Category Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Category Name</label>
								<textarea name="category_label" id="category_label" cols="30" rows="2" class="form-control"></textarea>
							</div>
							<div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label float-left">Image</label>
                              <input type="file" class="form-control" id="image" name ="image" aria-describedby="title">
                            </div>	
					  </div>		
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Job Category</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($result as $cat)
								<tr>
									<td class="text-center">{{$cat['id']}}</td>
									<td class="">
										 <p> <b>{{$cat['jobcategory']}}</b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_jcat" value="{{$cat['id']}}" >Edit</button>
										<button class="btn btn-sm btn-danger delete_jcat"  value="{{$cat['id']}}" >Delete</button>
									</td>
									
								
                        </tbody>
						@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	  							  
<!-- Start Edit Categoty-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
   <div class="container-fluid">
	  <form action="{{url('update_category')}}" method="post" >
      @csrf
		
		  <input type="hidden" class="form-control"  id="id" name="id" >
	   
		<div class="row form-group">
			<div class="col-md-10">
				<label for="" class="control-label">Category Name</label>
				<textarea name="Cname" id="Cname" cols="30" rows="3" required class="form-control" ></textarea>
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
  </div>
  </div>
  </div>
<!-- End Edit Category-->

 <!--Start Delete Category-->
 <div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <form action="{{url('/deleteJobCat')}}" enctype="multipart/form-data" method="POST">
		  @csrf
		  @method('DELETE')
		  <div>Do you want to Delete?</div>
		  <input type="hidden" class="form-control"  id="jid" name="jid" >
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
		<button type="submit" class="btn btn-primary"  >Yes Delete</button> 
	</div>
  </form>
  </div>
   </div>
	</div>
   </div>
</div>
<script Type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.delete_jcat',function(){
		var id=$(this).val();
		//alert(id);
		$("#myModal3").modal("show");
		$('#jid').val(id);

    });

    $(".edit_jcat").on('click',function(){
        var id=$(this).val();
        $("#myModal1").modal("show");
       // alert(id);
        $.ajax({
               type:"GET",
               url:"/ViewJob/"+id,
               success: function(response){
                // console.log(response.id);
				 $('#Cname').val(response.jobCat.jobcategory);
				
	            $('#id').val(id);
                   
               }
              });
  });
    $(".btnView").on('click',function(){
        var id=$(this).val();
        $("#myModal").modal("show");
       // alert(id);
        $.ajax({
               type:"GET",
               url:"/view/"+id,
               success: function(response){
                // console.log(response.id);
				 $('#position').val(response.applicants.post);
	             $('#name').val(response.applicants.name);
                 $('#email').val(response.applicants.email);
                 $('#Cname').val(response.applicants.Cname);
                 $('#vaddress').val(response.applicants.address);
                 $('#e_desc').val(response.applicants.description);
                 $('#id').val(id);
                   
               }
              });
    });

    
    
});
</script>

@endsection