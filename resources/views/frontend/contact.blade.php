@extends('layouts.front')

@section('content')
	
	<!-- HERO -->
	<div class="container fullwidth pt140 pb140 overlay-dark" data-background="img/home-slider/yatin-dandekar-home-5.jpg">
		<div class="pt140 pb140">
			<div class="entrance">
				<h2 class="title">Get In Touch</h2>
			</div>
		</div>
	</div>
	<!-- /HERO -->

	<div class="container pt100 pb100">
		<div class="row">
			
			<!-- CONTACT DETAILS -->
			<div class="col-md-4 col-md-offset-1">

				<h3 class="title title-tooltip">Contact Us</h3>

				<p class="small mb40">GET IN TOUCH RIGHT NOW and book your seat for  Amazing Courses  </p>
				
				<div class="contact-info">
					<a href="#">
						<b>Mail:</b> yatindandekar31@gmail.com
					</a>
					<a href="#">
						<b>Address:</b> >Workshop Studio Address: 14 Sainath Industrial Estate, Mahakali Caves Road, Opp Domino's Pizza, Andheri East, Mumbai 400093.
					</a>
					<a href="#">
						<b>Phone:</b> +91 90040 66588
					</a>
				</div>
				
			</div>
			<!-- /CONTACT DETAILS -->

			<!-- CONTACT FORM -->
			<div class="col-md-6">

				<div class="contact-message"></div>
			
				<form id="contact" action="http://achtungthemes.com/borano/php/contact.php">
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