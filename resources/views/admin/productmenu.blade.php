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

  	<div style="position: relative; top: 20px; right: -100px;">
  		
  		<form action="{{url('/uploadproduct')}}" method="post" enctype="multipart/form-data" >

  			@csrf
  			
  			<div>
  				<label>Title</label>
  				<input style="color: black;" type="text" name="title" placeholder="Write a title" required>
  			</div>

  			<div>
  				<label>Price</label>
  				<input style="color: black;" type="number" name="price" placeholder="Write a price" required>
  			</div>

  			<div>
  				<label>Image</label>
  				<input style="color: white;" type="file" name="image"  required>
  			</div>

  			<div>
  				<label>Description</label>
  				<input style="color: black;" type="text" name="description" placeholder="Write a description" required>
  			</div>

  			<div>
  				
  				<input type="submit" value="Save">
  			</div>

  		</form>



  		<div>
  			<table bgcolor="black">
  				<tr>
  					<th style="padding: 30px">Product Name</th>
  					<th style="padding: 30px">Price</th>
  					<th style="padding: 30px">Description</th>
  					<th style="padding: 30px">Image</th>
  					<th style="padding: 30px">Action</th>
  					<th style="padding: 30px">Action2</th>
  				</tr>

  				@foreach($data as $data)

  				<tr align="center">
  					<td>{{$data->title}}</td>
  					<td>{{$data->price}}</td>
  					<td>{{$data->description}}</td>
  					<td><img height="200" width="200" src="productimage/{{$data->image}}"></td>

  					<td><a href="{{url('/deletemenu',$data->id)}}">DELETE</a></td>
  					<td><a href="{{url('/updateview',$data->id)}}">UPDATE</a></td>
  				</tr>

  				@endforeach

  			</table>
  		</div>






  	</div>



  </div>

  	@include("admin.adminscript")
       
   
  </body>
</html>