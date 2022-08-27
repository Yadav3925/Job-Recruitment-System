@extends('usernav')
@section('main')


<style>
table, th, td {
  border: 2px solid green;
  border-collapse: collapse;
  margin-left: 13%;
}
th, td {
  padding: 7px;
  text-align: left;
}
</style>	
<h2><center>Report of The System</center></h2>
						
						<table class=""style="width:70%" id='myfrm'>
				
								<tr>
									<th class=""><b><center>Report Topic</center></b></th>
                                    <td class=""><b>Result</b></td>
                                </tr> 
                                <tr>
                                   <th class="">Register Company</th>
                                    <td class="">{{$cCount}}</td>
                                </tr> 
                                <tr>
                                   <th class="">Total Applicants</th>
                                    <td class="">{{$tapplicants}}</td>
                                </tr> 
                                <tr>
                                <th class="">Selected Appplicants</th>
                                    <td class="">{{$scan}}</td>
                                </tr> 
                                <tr>
                                    <th class="">Rejected Applicants</th>
                                    <td class="">{{$rcan}}</td>
                                </tr> 
                                <tr>
                                    <th class="">Most Applied Job</th> 
                                    @foreach($vacan as $can)
                                    <td class="">{{$can[0]->post}}</td>
                                    @endforeach
                                </tr> 
                                <tr>	
                                <th class="">Most Job Applied Company </th>
                                @foreach($vacan as $cap)
                                    <td class="">{{$cap[0]->company}}</td>
                                 @endforeach
                                </tr> 
                                <tr>
                                     <th class="">Most Job Applied Sector </th>
                                     @foreach($vacan as $set)
                                    <td class="">{{$set[0]->category}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="">Least Applied Job</th> 
                                    @foreach($vljob as $can)
                                    <td class="">{{$can[0]->post}}</td>
                                    @endforeach
                                </tr> 
                                <tr>	
                                <th class="">Least Job Applied Company </th>
                                @foreach($vljob as $cap)
                                    <td class="">{{$cap[0]->company}}</td>
                                 @endforeach
                                </tr> 
                                <tr>
                                     <th class="">Least Job Applied Sector </th>
                                     @foreach($vljob as $set)
                                    <td class="">{{$set[0]->category}}</td>
                                    @endforeach
                                </tr>
                              
							
						
							
						</table>
      
                        <td><input type="submit" value="print" name="submit"onclick="myPrint('myfrm')" class="btn btn-primary"/>
                                   
    <script>

         function myPrint(myfrm){

          var printdata=document.getElementById(myfrm);

          newwin=window.open("");

          newwin.document.write(printdata.outerHTML);

    newwin.print();

    newwin.close();

  }

  </script>
@endsection