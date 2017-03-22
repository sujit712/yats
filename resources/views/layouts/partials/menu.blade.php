<!-- HEADER -->
<header id="header" class="fixed">
	<!-- LOGO -->
	<a href="index.html" class="logo">
		<!-- <img src="img/logo.png" class="logo-dark" alt=""> -->
		<img src="img/logo/yatin_dandekar_logo.png" class="logo-light" alt="">
	</a>
	<!-- MOBILE MENU ICON -->
	<a href="#" class="mob-menu"><i class="fa fa-bars"></i></a>
	<!-- MENU -->
	<nav>
		<ul class="main-menu">
			<li>
				<a href="{{ URL('/') }}">home</a>
			
			</li>
			<li>
				<a href="{{ URL('portfolio') }}">portfolio</a>							
			</li>						
			<li>
				<a href="{{ URL('about') }}">about</a>
			</li>
			<li>
				<a href="{{ URL('video') }}">Video</a>
			</li>
			<li>
				<a href="{{ URL('contact') }}">contact</a>
			</li>

		</ul>
	</nav>
</header>
<!-- /HEADER -->