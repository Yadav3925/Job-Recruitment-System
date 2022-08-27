@extends('usernav')
@section('main')
<div class="container-fluid">
	<form id="manage_application">
		<input type="hidden" name="id" value="">
	<div class="col-md-12">
		<div class="row form-group">
			<div class="col-md-6">
				<label for="" class="control-label">Position</label>
				<select class="custom-select browser-default select2" name="position_id">
					<option value=""></option>
					
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Last Name</label>
				<input type="text" class="form-control" name="lastname" required="" value="">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">First Name</label>
				<input type="text" class="form-control" name="firstname" required="" value="">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Middle Name</label>
				<input type="text" class="form-control" name="middlename" required="" value="">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Gender</label>
				<select name="gender" id="" class="custom-select browser-default">
					<option >Male</option>
					<option >Female</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email" required="" value="">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Contact</label>
				<input type="text" class="form-control" name="contact" required="" value="">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-10">
				<label for="" class="control-label">Address</label>
				<textarea name="address" id="" cols="30" rows="3" required class="form-control"></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-10">
				<label for="" class="control-label">Cover Letter</label>
				<textarea name="cover_letter" id="" cols="30" rows="3" placeholder="(Optional)" class="form-control"></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="input-group col-md-10 mb-3">
				<div class="input-group-prepend">
			    <span class="input-group-text" id="">Resume</span>
			  </div>
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="resume" onchange="displayfname(this,$(this))" name="resume" accept="application/msword,text/plain, application/pdf">
			    <label class="custom-file-label" for="resume"></label>
			  </div>
			  
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-6">
				<label for="" class="control-label">Status</label>
				<select class="custom-select browser-default select2" name="status">
					<option value="0">New</option>
					
						<option value="" ></option>
					
				</select>
			</div>
		</div>
		
	</div>
	</form>
</div>

<script>
	function displayfname(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	console.log(input.files[0].name)
        	_this.siblings('label').html(input.files[0].name);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
	$('.select2').select2({
		width:"100%",
		placeholder:'Please select here'
	})
	$('#manage-application').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_application',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Application successfully submitted.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
})
</script>
@endsection