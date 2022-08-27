@extends('user/layout')
@section('body')
<br><br><br><br>

<table class="table table-hover">
  <thead>
   
    <tr>
      <th scope="col">S.N</th>
     <th scope="col">Applied Post</th>
      <th scope="col">Status</th>
      <th scope="col">Description</th>
    </tr>
   
  </thead>
  <tbody>
  @foreach($stat as $res)
    <tr>
      <th scope="row">{{$res->id}}</th>
      <td>{{$res->post}}</td>
      <td>{{$res->status}}</td>
      <td>{{$res->coverletter}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
<br><br><br>



       
     


 
  @endsection
