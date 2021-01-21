@extends('layout.lay')
@section('contnent')
<div class="container">
	@foreach($menus as $menu)
	<div class="text-center">
		<hr class="featurette-divider">
		<a href="bettereats/{{$menu->id}}">{{$menu->title}}</a>
	</div>
	@endforeach
</div>
@endsection