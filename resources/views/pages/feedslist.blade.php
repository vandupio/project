@extends('layout.admin')
@section('admincontnent')
<div class="col bg-dark text-light text-center" style="font-size:40pt;">
		Feeds
</div>
<div>
	<table class="table">
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Posted Date</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($thisfeedslist as $list)
			<tr>
				<th scope="row">{{$list->id}}</th>
      			<th>{{$list->title}}</th>
      			<th>{{$list->created_at}}</th>
      			<th>
      				<a href='feedlist/{{$list->id}}' class="btn btn-sm btn-success">View</a>
      				<a href='../feed/{{$list->id}}' class="btn btn-sm btn-primary">Update</a>
      				{!!Form::open(['action' => ['FeedController@destroy', $list->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                 {{Form::submit('Purge', ['class' => 'btn btn-danger btn-sm'])}}
      			{!!Form::close()!!}
      			</th>
      		</tr>
      		@endforeach
		</tbody>
	</table>
</div>
@endsection
