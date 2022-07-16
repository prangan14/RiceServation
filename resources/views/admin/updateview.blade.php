<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

  	<base href="/public">
    
    @include("admin.admincss")
    
  </head>
  <body>
    
    <div class="container-scroller">

  	@include("admin.navbar")

  	  	<div style="position: relative; top: 60px; right: -100px;">
  		
  		<form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data" >

  			@csrf
  			
  			<div>
  				<label>Title</label>
  				<input style="color: black;" type="text" name="title" value="{{$data->title}}" required>
  			</div>

  			<div>
  				<label>Price</label>
  				<input style="color: black;" type="number" name="price" value="{{$data->price}}" required>
  			</div>

  			

  			<div>
  				<label>Description</label>
  				<input style="color: black;" type="text" name="description" value="{{$data->description}}" required>
  			</div>

  			<div>
  				<label>old Image</label>
  				<img height="200" width="200" src="/productimage/{{$data->image}}">
  			</div>

  			<div>
  				<label>New Image</label>
  				<input style="color: white;" type="file" name="image"  required>
  			</div>

  			<div>
  				
  				<input type="submit" value="Save">
  			</div>

  		</form>



  		<div>




  </div>

  	@include("admin.adminscript")
       
   
  </body>
</html>