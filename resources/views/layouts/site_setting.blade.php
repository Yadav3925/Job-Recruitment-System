@extends('usernav')
@section('main')
<div class="container-fluid">
	
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					@foreach($result as $site)
					<label for="name" class="control-label">System Name</label>
					<input type="text" class="form-control" id="name" name="name" value="{{$site['name']}}" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="{{$site['email']}}" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Contact</label>
					<input type="text" class="form-control" id="contact" name="contact" value="{{$site['contact']}}" required>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">About Content</label>
					<textarea name="about" class="">{{$site['about_content']}}</textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">Image</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? 'assets/img/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
			@endforeach
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>


<style>
	
</style>
</div>
@endsection