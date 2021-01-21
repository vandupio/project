@extends('layout.admin')
@section('admincontnent')
	<div class="col bg-dark text-light text-center" style="font-size:40pt;">
		New Feed
	</div>

{!! Form::open(['action' => 'FeedController@store','method'=>'POST','enctype' => 'multipart/form-data'])!!}
<div class="container mt-5">
	<div class="row">
		<div class="form-group col-md-9">
			<div class="input-group">
				<div class="input-group-append">
					<span class="input-group-text" >Title</span>
				</div>
					{{Form::text('title','',['class'=>'form-control', 'id'=>'pilltale'])}}
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="input-group">
				<div class="input-group-append">
					<span class="input-group-text" >Date</span>
				</div>
					{{Form::text('Date',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control', 'disabled'=>'pilltale'])}}
			</div>
		</div>

		<div class="form-group col-md-4">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="primeImage">Image</span>
				</div>
				<div class="custom-file"> 
					{{Form::file('primeimage',array('id'=>'pimage','class'=>'custom-file-input','onchange'=>'preview()'))}}
						<label class="custom-file-label" for="proimage">Add image</label>
				</div>
			</div>
		</div>
		<div class="form-group col-md-4">
			<div class="input-group">
				<div class="input-group-append">
					
				</div>
				<select class="form-control"  id="category" name="category">
					<option value="0">Select Category</option>
					@foreach($cats as $cat)
					<option value={{$cat->id}}>{{$cat->categoryName}}</option>
			    	@endforeach
				</select>
			</div>
		</div>
		<div class="form-group col-md-4">
			<div class="input-group">
				<div class="input-group-append">
					<span class="input-group-text" >+</span>
				</div>
					{{Form::text('ascat','',['class'=>'form-control','placeholder'=>'Add Catagory'])}}
			</div>
		</div>
		<div class="col-sm-12 pt-2" style="text-align: center;">
			<img id="frame" class="m-2" src="{{asset("/storage/storage/adminbanana.png")}}" width="250px;" alt="Primary Image" />
		</div>
	</div>
	<!-- -->
	<label>Article</label>
		<textarea name="editor" style="height: 250px;"></textarea>
	        <script>
	            CKEDITOR.replace( 'editor' );
	        </script>
		
		<div class="p-3 m-1 text-center" >
			<button class="btn btn-primary">Add</button>
			
		</div>
	<!-- -->

</div>



		

{!! Form::close() !!}
<script>
function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection