@extends('layouts.front')

@section('content')

<!-- HERO -->
<!-- <div class="container fullwidth pt140 pb140" data-background="img/home-slider/yatin-dandekar-home-3.jpg"> -->
<div class="container fullwidth pt140 pb140" data-background="{{$image}}">
	<div class="pt140 pb140">

		<div class="entrance">
			@if(!empty($caption))
				<h1 class="title">{{$caption}}</h1>
			@else
				<h1 class="title">Who We Are</h1>
			@endif
			
		</div>
		
	</div>
</div>
<!-- /HERO -->

<!-- ABOUT -->
<div class="bg-grey pt120 pb120">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="img/about-us/yatin-dandekar.jpg">
			</div>
			<div class="col-md-8">
				<p>Yatin K.Dandekar is an alumnus of the prestigious L.S. Raheja School of Art (Mumbai, India) with specialization in photography, and later went on to master his skills further by working in the capacity of Art Director in some of India's top ad agencies. Needless to say, the years of experience has helped him to polish his visual art further.</p>
				<p>Today, he is a known face worldwide in the world of fashion photography, shooting both Indian and foreign models for various brands ranging from apparel (Indian and Western), jewelry, condom and others. The most appealing aspect of his work is the way he handles each brand and genre keeping in mind the clients’ requirements. In recent times, much of his work has been in catalogue creation, branding and for advertising agencies.</p>
				<p>“Yatin strongly believes that photography is not just a career, but a path by which one can express his heart and soul. It is a mission to express beauty beyond the confines of stereotype. His mission is to show the magnificence of beauty in the ordinary and that is where miracles take form”</p>
			</div>
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<h3 class="title">About Academy</h3>
				<p class="separator-left"></p>
				<p><b>The Academy of Fine Art & Fashion Photography</b> is an initiative of the ace fashion photographer, Yatin K.Dandekar. With over 30 years of experience in the field of Fine Art and Fashion Photography, he wants to impart – through this Academy – his knowledge and experiences with the next generation of aspiring photographers.</p>
			</div>

			<!-- <div class="col-md-3">							
				<img src="img/about-us/yatin-dandekar.jpg">
			</div> -->
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<h4>1) Complete action packed detail study course for beginners : </h4>
				<p>With 30 years of experience in the field of Art and Photography, Yatin – via <b>the Academy of Fashion Photography</b> – wants to share his experience, and knowledge of photography with those who wants to make a carrier in the field of photography, especially, in Fashion and Fine Art Photography. Keeping this objective in mind, he has decided to launch an <b><i>All-inclusive Course in Fine Art & Fashion Photography at his studio in Mumbai.</i></b> Equipped with the state-of-the-art studio, this course will offer intensive workshops and one-on-one creative counseling that focuses on both the creative and business aspects of the commercial photography industry.</p>
				<p>With a combined experience and a comprehensive understanding of the industry for the last 3 decades, we are pretty sure of where the industry is headed and know how to help you stay ahead of the curve. Competition is tough and we can help you navigate your career to the next level. With this course, we will teach you all the tricks, techniques and trades of fashion photography and in 4 months, you will come out with a stunning portfolio of international standard using Indian/International models, stylist, makeup stylist, hair stylist, editing besides the assistance to market your creation, so that you start earning as soon as you are out in the market.</p>
				<p><b>Learn to play with various light sources – From natural to studio lights:</b></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<img src="img/about-us/natural-light.jpg">
			</div>
			<div class="col-md-6">
				<img src="img/about-us/studio-lights.jpg">
			</div>
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<p>Whether for editorial or advertising use, the purpose of a fashion photograph is to sell a product or a service. In this 4 months intensive course, we will teach you about the creative light controls involved in producing a successful fashion photograph, along with concepts, casting choices, creative use of hair, make-up and styling of the garment. As there is more to photography than just firing the shutter, the course will deal in great details about the creative use of photographic techniques, directing, and working with the model on the set.</p>
				<p>The focus and intent of this academy is to help students discover their own style, create new pictures for their portfolios, and ultimately leave them fully prepared to produce creative fashion images for personal and commercial use. Yatin is very good in catering to every skill level and in ensuring that all his students would go back with a powerful portfolio. After spending the best part of his life in this field, he is now ready to share with you all his experiences and tricks, and most importantly, to show you how he does it.</p>
			</div>
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<b>Subjects covered:</b><br><br>
				<b>The Basics of Photography</b>
				<p>
					<ul style="list-style-position: inside;">
						<li>Introduction to Digital Photography Other topics that will be covered throughout the course:
						
							<div class="row">
								<div class="col-md-6">
									<ul style="list-style-position: inside;">
										<li>Lighting equipment & Light modifiers</li>
										<li>Cameras and light meters</li>
										<li>Backgrounds and props</li>
										<li>The principles, language and behavior of light</li>
										<li>Basic Rules of Portraiture</li>
										<li>Rembrandt lighting</li>
										<li>One light portrait</li>
										<li>Key light</li>
										<li>Fill light</li>
										<li>Open loop vs. Closed loop</li>
										<li>Short lighting vs. Broad lighting</li>
										<li>Three lights portrait</li>
										
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
											<li>Creating Rapport with your Subject-Model</li>
											<li>Directing and posing your Subject-Model</li>
											<li>Four lights portrait</li>
											<li>Five lights portrait</li>
											<li>Natural Light</li>
											<li>Composition</li>
											<li>Backgrounds</li>
											<li>Managing Natural Light</li>
											<li>Managing Artificial Light</li>
											<li>Reflector and Retractors</li>
											<li>Combining Natural & Artificial Light</li>
											<li>On-camera Flash and Speedlights</li>
											<li>Location shooting</li>

									</ul>
								</div>
							</div>

						</li>
						<li>Understanding Color Palette, working with model, make-up artist and hair dresser.</li>
						<li>Students shoot: Fashion, Editorial, Beauty, Commercial, Advertising, Glamour, Catalog & Look book, Portrait & Corporate Photography, Fine Art Photography.</li>
					</ul>
				</p>

			</div>
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<div class="row">
			<div class="col-md-8">
				<b>Business of Photography:</b>
				<p>In this Academy, you will teach how to run your day to day operation and more importantly, on how to get MORE work. We all know the need of more work to grow as a photographer and that is the core of this Course! Yatin Dandekar has grown his photography business at an incredible rate and he will be sharing his secrets with you. This course is you’re A to Z in photography; everything from getting your portfolio ready for all types of photography to running a profitable business. Every student in this course will be trained on how to market your work to the right people and to the right magazines. This course is worth the price!</p>
				<p>We will also discuss the current industry and what clients are looking for in your website and portfolios. Below are the topics to be covered:</p>
			</div>
			<div class="col-md-4">
				<img src="img/about-us/money.jpg">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul style="list-style-position: inside;">
					<li>Business Management: Setting Up Your Business, Business Practices, etc.</li>
					<li>Hiring the right people like models, stylist, makeup & hair artist, set designers, etc.</li>
					<li>How to find the people who hire studios, props, Indian/International models.</li>
					<li>Marketing Techniques:  Email blasts, Postcard Mailers, Cold Calling</li>
					<li>The Portfolio Building and Reviewing (including your website), Picking the right style to suite your work, Assignments for Preparing Your Portfolio.</li>
					<li>Setting up and preparing for meetings with magazines and other potential clients.</li>
				</ul>
			</div>
		</div>
		<br>
		<br>
		<p class="separator"></p>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4">
				<img src="img/about-us/folio.jpg">
			</div>
			<div class="col-md-8">
				<h4>2) Portfolio Building workshop for photographers who wish to upgrade themselves.</h4>
				<p>So far not one workshop or seminar has ever been the same, there is no exact science on how I do things but what remains consistent in all my classes are my specific instructions in perfect lighting, directing the entire shoot and how to create astonishing images you will observe the creative process I use as well as how I take charge of my team and the models to get what I envision. Remember you are the creative mind, the director and the vision behind every image you create, so leading your team is extremely important and can effect the outcome of your shoots drastically.</p>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>On average we create at least 4-5 different lighting setups with detailed explanation for each set. This workshop is for photographers that want to excel in their creative and technical skills very quickly in a short amount of time and become great photographers.</p>
				<p>As a photographer you will be able to work with Yatin Dandekar and his brilliant team in order to create the most incredible eye catching and exciting portfolio images for your professional portfolio, promotional use & website in order to impress the type of customers you wish to attract.</p>
				<p>Everything in this course is designed to help you get MORE work. We believe in creating Quality students, so boys and girls, <br><center><h4><u><i>GRAB it! ‘The world is yours!’</i></u></h4></center> </p>
				<br>
				<p><b>GET IN TOUCH RIGHT NOW</b> and book your seat for this Amazing Course! Drop an Email at <a href="mailto:yatindandekar31@gmail.com" target="_blank">yatindandekar31@gmail.com</a> or <a href="mailto:yatin_31d@yahoo.com" target="_blank">yatin_31d@yahoo.com</a></p>
			</div>						
		</div>

	</div>
</div>
<!-- /ABOUT -->

<!-- CTA -->
<div class="container fullwidth overlay-dark-3x text-light text-center pt70 pb70" data-background="img/home-slider/yatin-dandekar-home-4.jpg">
	<h3 class="title">Want To Join With Us?</h3>
	<a href="#" class="button light outline mt10">Get In Touch</a>
</div>	
<!-- /CTA -->

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

@endsection