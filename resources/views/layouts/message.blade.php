@extends('usernav')
@section('main')





	
	
		<div class="card-body">
				<table class="table table-bordered table-hover">
			
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">User_id</th>
					<th class="text-center">User Name</th>
					<th class="text-center">Email</th>
					
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($result as $ma)
				 <tr>
				 	<td>
				 	{{$ma['id']}}
				 	</td>
				 	<td>
				 	{{$ma['user_id']}}
				 	</td>
				 	<td>
				 	{{$ma['name']}}
				 	</td>
					 <td>
				 	{{$ma['email']}}
				 	</td>
					
					
				 	<td class="text-center">
				 	
					 <button type="button" class="btnEdit btn btn-warning"value="{{$ma['id']}}" >View</button>
					 <button type="button" class="btnDelete btn btn-danger"value="{{$ma['id']}}" >Delete</button>
								  
								
				 	</td>
				 </tr>
				@endforeach
			</tbody>
		</table>
		
	
	</div>

<!-- Reply message-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Reply Message </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	<form action="{{url('/editMessage')}}" method="POST">
		@csrf
		<input type="hidden" name="mid" id="mid">
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Subject</label>
				<textarea name="subject" id="subject" cols="30" rows="3" placeholder="(Optional)" class="form-control"></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="" class="control-label">Message</label>
				<textarea name="message" id="message" cols="30" rows="3" placeholder="(Optional)" class="form-control"></textarea>
			</div>
		</div>
	<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
		<button type="submit" class="btn btn-primary" >Reply</button>
	</form>
   </div>
  </div>
 
   </div>
  </div>
</div>
</div>

<!-- Delete message-->
  <div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Message!!</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> <div class="modal-body">
	  <div class="container-fluid">
	  <form action="{{url('/deleteMessage')}}" enctype="multipart/form-data" method="POST">
		  @csrf
		  @method('DELETE')
		  <div>Do you want to Delete?</div>
		  <input type="text" class="form-control"  id="aid" name="aid" >
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
</div>
  

  <script Type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.btnDelete',function(){
		var id=$(this).val();
		//alert(id);
		$("#myModal3").modal("show");
		   $('#aid').val(id);

    });
    $(".btnEdit").on('click',function(){
        var id=$(this).val();
        $("#myModal1").modal("show");
		$('#mid').val(id);
        
        $.ajax({
               type:"GET",
               url:"/updateMessage/"+id,
               success: function(response){
                 //console.log(response.id);
				 $('#subject').val(response.umessage.subject);
	             $('#message').val(response.umessage.message);
               
                 $('#mid').val(id);
                   
               }
              });
   });
		});
</script>
@endsection