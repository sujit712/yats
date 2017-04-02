@extends('layouts.front')

@section('content')
	
	<!-- INTRO TEXT -->
	
	<section class="pb100 overlay-dark-2x" data-background="{{$image}}">
		<div class="container pt100 pb100 mt0">
			<div class="col-md-8 col-md-offset-2 mb0">
				<p class="intro text-center text-light">{{$title}}</p>
			</div>
		</div>
	</section>
	<!-- /INTRO TEXT -->
	
	<!-- Video Portfolio -->
	<!-- For item sizes use classes .wide and .tall -->
	<div class="container negative-margin">
		<div class="grid albums video-portfolio" data-gutter="3" data-columns="2">
		@foreach($data as $show_data)
			@if($show_data->status==1)
			<div class="grid-item {{$show_data->property}}">
				<div data-background="{{$show_data->display_image}}">
					<!-- lightbox expand link -->
					@if($show_data->caption=="")
					<?php $title='Yatin Dandekar Photography'; ?>
					@else
					<?php $title=$show_data->caption; ?>
					@endif
					<a href="{{$show_data->video_url}}" class="expand" data-rel="lightcase:gal" title="{{$title}}">
						<i class="fa fa-play"></i>
					</a>
					<!-- title -->
					<div class="title">
						<a href="#" class="link">{{$title}}</a>
					</div>							
				</div>
			</div>
			@endif
		@endforeach
		</div>
	</div>			
	<!-- /Video Portfolio -->

@endsection

@section('footer')

	<!-- FOOTER -->
<footer id="footer">
	
	<!-- FOOTER LINKS -->
	<div class="footer-links">
		&copy; <?php echo date("Y");?>. All Rights Reserved |
		<a href="https://www.facebook.com/yatindandekarphotography/" target="_blank">Facebook</a> |
		<a href="https://www.instagram.com/yatindandekarphotography/" target="_blank">Instagram</a>
	</div>

</footer>
<!-- /FOOTER -->
	
@endsection