
   <!-- Modal -->
   <div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="apply">CV Submission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal form -->
   <form method="GET"enctype="multipart/form-data" action="{{url('store')}}">
  <div class="modal-body">
    {{csrf_field()}}
    <input type="hidden" class="form-control" id="vid" name="vid" >
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="full name">
    </div>
    <span class="text-danger">
     @error('name')
       {{$message}}
     @enderror
    </span>
  </div>
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="address" class="form-control" name="address" placeholder="Address">
      <span class="text-danger">
     @error('address')
       {{$message}}
     @enderror
    </span>
    </div>
  </div>
 <br>
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Email">
      @error('email')
       {{$message}}
     @enderror
    </div>
  </div>
<br>
  <div class="form-group row">
    <label for="inputSkill" class="col-sm-2 col-form-label">Skill</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="skill" placeholder="skill" >
      <span class="text-danger">
     @error('skill')
       {{$message}}
     @enderror
    </span>
    </div>
  </div>
 <br>
  <div class="form-group row">
    <label for="inputExperiance" class="col-sm-2 col-form-label">Experiance</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="experiance" placeholder="experiance">
      <span class="text-danger">
     @error('experiance')
       {{$message}}
     @enderror
    </span>
    </div>
  </div>
<br>
  <div class="form-group">
    <label for="Information">Additional Information</label>
    <textarea class="form-control" name="additional" ></textarea>
    <span class="text-danger">
     @error('additional')
       {{$message}}
     @enderror
    </span>
  </div>
<br>
  <div class="form-group">
    <label for="uploadCV">Upload your CV Here</label>
    <input type="file" class="form-control-file" id="resume" name="resume">
    <span class="text-danger">
     @error('resume')
       {{$message}}
     @enderror
    </span>
  </div>
  <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('#applyform').on('submit',function(e){
      e.preventDefault();
      $ajax({
        type:"POST",
        url:"/apply",
        data:$('#applyform').serialize(),
        success:function(response){
          console.log(response)
          $('#apply').modal('hide')
          alert("Data saved");
        },
        error:function(error){
          console.log(error)
          alert("Data not saved");
        }

      });
    });
  });
  </script>

