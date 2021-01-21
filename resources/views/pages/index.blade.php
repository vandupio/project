@extends('layout.lay')
@section('contnent')

<?php
//echo "<pre>".print_r($thisfeedslist,1)."</pre>";

$shorter = substr($lastpost->article, 0, 500);
$articlex = substr($lastpost->article, 0, strrpos($shorter, ' ')).'...';

?>
<div class="jumbotron">
	<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
	    <ol class="carousel-indicators">
	      <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
	      <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
	      <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
	    </ol>
      
    <div class="carousel-inner">
		<div class="carousel-item active" style="background:url({{asset("/storage/storage/kamyan.jpg") }})no-repeat center center fixed;background-size: cover;">  	
			<div class="container">
				<div class="carousel-caption text-start">
            		<h1>Kamayan: The Ultimate Summer Feast</h1>
					<p>Full of Filipino flavours—sweet, salty, sour and ridiculously delicious—these buffet-style, communal feasts take grilling to a whole new level.</p>
          <p>
            		<a class="btn btn-lg btn-primary" href="mailto:someone@example.com" role="button">Email me</a></p>
          		</div>
        	</div>
      </div>
      @foreach($thisfeedslist as $list)
	        <div class="carousel-item" style="background:url({{asset("/storage/storage/{$list->Imagefilename}")}})no-repeat center center fixed;background-size: cover;">    
      
	        <div class="container">
	          <div class="carousel-caption">
	            <h1>{{$list->title}}</h1>
	            <p>
                <?php
                  $shorter = substr($list->article, 0, 100);
                  $string = substr($list->article, 0, strrpos($shorter, ' ')).'...';
                  echo $string;
                ?>
              </p>
              <p><a class="btn btn-lg btn-primary" href="bettereats/{{$list->id}}" role="button">more</a></p>
	          </div>
	        </div>
      </div>
      @endforeach
     
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
 </div>
</div>


  <div class="container marketing">
  <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">My feed about <span class="text-muted">{{$lastpost->title}}</span></h2>
        <p class="lead"><?php echo $articlex; ?></p><a href="{{$lastpost->id}}">read more</a>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src ="{{asset("/storage/storage/{$limages->Imagefilename}")}}" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

<hr class="featurette-divider">
    <div class="row">
      <div class="col-lg-4">
       <div id="piccon">
            <img id=imagcon src="{{asset("/storage/storage/my.jpg")}}" />
          </div>
        <h2>Me</h2>
        <p>is the most familiar of all experiences. Indeed it is one’s self that is experienced as having one’s experiences: one’s sensations, emotions, memories, feelings of agency, feelings of thinking, deciding and acting, the very feeling of existing. Philosophical traditions encourage us to know ourselves, but also to not take ourselves too seriously and to not get too caught up with the wanting, thinking, deciding and acting “ego” part of the self. But what is this self experience, why do we have it, and what happens if it starts to unravel? I’ll suggest that we should marvel at the experience of the self, and speculate as to why we have it.</p>
        <p><a class="btn btn-secondary" href="mailto:someone@example.com" role="button">Talk to me &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div id="piccon">
            <img id=imagcon src="{{asset("/storage/storage/fil.jpg")}}" />
          </div>

        <h2>Fil Cuisine as Wika</h2>
        <p>During the pre-Hispanic era in the Philippines, the preferred Austronesian methods for food preparation were boiling, steaming and roasting. The ingredients for common dishes were obtained from locally raised livestock. These ranged from water buffalos/carabaos, chicken, and pigs to various kinds of fish and other seafood. In 3200 BCE, Austronesians from southern China (Yunnan-Guizhou Plateau) and Taiwan settled in the region that is now called the Philippines. They brought with them knowledge of rice cultivation and other farming practices which increased the number and variety of edible dish ingredients available for cooking.</p>
        <p><a class="btn btn-secondary" href="https://en.wikipedia.org/wiki/Filipino_cuisine#:~:text=As%20in%20most%20Asian%20countries,and%20cured%20meat%20or%20sausages." role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>About Us</h2>
        <p>As huge fan of the Filipino way of cooking, it is my goal to teach people how to cook Filipino dishes  using the simplest way possible.</p>
        <p><a class="btn btn-secondary" href="/about" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div>
  </div>
</main>
@endsection