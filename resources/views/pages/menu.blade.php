@extends('layout.lay')
@section('contnent')
<?php
//$decoded=htmlspecialchars_decode($foodx->article);
?>
<div class="row">

	<div class="col-md-12" style="background:url({{asset("/storage/storage/".$pic->Imagefilename)}})no-repeat center center fixed;background-size: cover;height: 400px;">
		
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="row">
			
			<div class="col-md-12" >
				<h2 class="featurette-heading text-center">{{$foodx->title}}</h2>
			</div>
			<div class="col-md-12 p-5">
				<img src="{{asset("/storage/storage/".$pic->Imagefilename)}}" alt="" style="width: 300px;height: auto; display: block;margin-left: auto;margin-right: auto">
			</div>
			<div class="col-md-12">
				<?php echo $foodx->article; ?>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<hr class="featurette-divider">
		<div class="text-center"><a href="../menu">Feeds</a></div>
@endsection