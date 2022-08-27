@extends('user/layout')
@section('body')
<br><br><br><br>

<table class="table table-hover">
  <thead>
   
    <tr>
      <th scope="col">S.N</th>
     <th scope="col">Subject</th>
      <th scope="col">Message</th>
  
    
      
    </tr>
   
  </thead>
  <tbody>
  @foreach($stat as $res)
    <tr>
      <th scope="row">{{$res->id}}</th>
      <td>{{$res->subject}}</td>
      <td>{{$res->message}}</td>
   
      
    </tr>
    @endforeach
    
  </tbody>
</table>
<br><br><br>
@endsection