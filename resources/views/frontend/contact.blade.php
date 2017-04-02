@extends('layouts.front')

@section('content')
	
	<!-- HERO -->
	<div class="container fullwidth pt140 pb140 overlay-dark" data-background="{{$image}}">
		<div class="pt140 pb140">
			<div class="entrance">
				@if(!empty($caption))
					<h2 class="title">{{$caption}}</h2>
				@else
					<h2 class="title">Get In Touch</h2>
				@endif
			</div>
		</div>
	</div>
	<!-- /HERO -->

	<div class="container pt100 pb100">
		<div class="row">
			
			<!-- CONTACT DETAILS -->
			<div class="col-md-4 col-md-offset-1">

				<h3 class="title title-tooltip">Contact Us</h3>
				@if(!empty($contact_us_text))
					<p class="small mb40">{{$contact_us_text}}</p>

				@endif
				
				
				<div class="contact-info">
					<a href="#">
						<b>Mail:</b> {{$email}}
					</a>
					<a href="#">
						<b>Address:</b> {{$address}}
					</a>
					<a href="#">
						<b>Phone:</b> +91 {{$phone}}
					</a>
				</div>
				
			</div>
			<!-- /CONTACT DETAILS -->

			<!-- CONTACT FORM -->
			<div class="col-md-6">

				<div class="contact-message"></div>
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
				        <strong>Whoops!</strong> There were some problems with your input.<br><br>
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			
				<form action="{{action('ContactusController@sendmail')}}" method="POST">
				{{csrf_field()}}
					<input name="name" id="name" type="text" placeholder="Name:" required autocomplete="off">
					<input name="email" id="email" type="email" placeholder="Email:" required autocomplete="off">
					<textarea name="message" id="message" placeholder="Message:" required rows="4"></textarea>
					<input type="submit" id="submit" value="send" class="button outline">
				</form>

			</div>
			<!-- /CONTACT FORM -->

		</div>
	</div>

	<!-- GOOGLE MAP -->
	<div id="google-map"></div>	

@endsection

@section('footer')

	<!-- FOOTER -->
	<footer id="footer">		
		<!-- FOOTER LINKS -->
		<div class="footer-links">
			&copy; 2017. All Rights Reserved |
			<a href="https://www.facebook.com/yatindandekarphotography/" target="_blank">Facebook</a> |
			<a href="https://www.instagram.com/yatindandekarphotography/" target="_blank">Instagram</a>
		</div>
	</footer>
	<!-- /FOOTER -->

	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
@endsection