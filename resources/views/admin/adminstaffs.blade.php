<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include("admin.admincss")
    
  </head>
  <body>
    
    <div class="container-scroller">

  	@include("admin.navbar")
    <div style="position: relative; top: 20px; right: -150px;">


  	<form action="{{url('/uploadstaffs')}}" method="Post" enctype="multipart/form-data">

  		@csrf


  		<div>
  			<label>Name</label>
  			<input style="color: black;" type="text" name="name" required="" placeholder="Enter name">
  		</div>

  		<div>
  			<label>Speciality</label>
  			<input style="color: black;" type="text" name="speciality" required="" placeholder="Enter the speciality">
  		</div>

  		<div>
  			
  			<input type="file" name="image" required="">
  		</div>

  		<div>
  			
  			<input  style="color: green ;" type="submit" value="Save">
  		</div>


  	</form>


    <table bgcolor="black">
      <tr>
        <th style="padding: 30px;">Staff Name</th>
        <th style="padding: 30px;">Speciality</th>
        <th style="padding: 30px;">Image</th>
        <th style="padding: 30px;">Action</th>
        <th style="padding: 30px;">Action2</th>
      </tr>

      @foreach($data as $data)

      <tr align="center">
        <td>{{$data->name}}</td>
        <td>{{$data->speciality}}</td>
        <td><img height="100" width="100" src="/staffsimage/{{$data->image}}"></td>
        <td><a href="{{url('/updatestaffs',$data->id)}}">Update</a></td>
        <td><a href="{{url('/deletestaff',$data->id)}}">Delete</a></td>
      </tr>

      @endforeach



    </table>


  </div>

  	@include("admin.adminscript")
       
   
  </body>
</html>