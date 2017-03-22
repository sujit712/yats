@extends('layouts.front')

@section('content')

<!-- PORTFOLIO -->
<!-- For item sizes use classes .wide and .tall -->
<div class="container fullwidth">
	<div class="grid gallery" data-gutter="5" data-columns="4">

		<div class="grid-item">
			<a href="img/portfolio/3.jpg" data-background="img/portfolio/3.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item wide">
			<a href="img/portfolio/34.jpg" data-background="img/portfolio/34.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item tall">
			<a href="img/portfolio/52.jpg" data-background="img/portfolio/52.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item wide tall">
			<a href="img/portfolio/1.jpg" data-background="img/portfolio/1.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item tall">
			<a href="img/portfolio/33.jpg" data-background="img/portfolio/33.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item">
			<a href="img/portfolio/31.jpg" data-background="img/portfolio/31.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item">
			<a href="img/portfolio/7.jpg" data-background="img/portfolio/7.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item wide">
			<a href="img/portfolio/6.jpg" data-background="img/portfolio/6.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item">
			<a href="img/portfolio/2.jpg" data-background="img/portfolio/2.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item wide">
			<a href="img/portfolio/12.jpg" data-background="img/portfolio/12.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item">
			<a href="img/portfolio/30.jpg" data-background="img/portfolio/30.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>
		<div class="grid-item">
			<a href="img/portfolio/27.jpg" data-background="img/portfolio/27.jpg" data-rel="lightcase:gal" title="Image Caption"></a>
		</div>

	</div>
</div>
<!-- /PORTFOLIO -->

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

<script type="text/javascript">
	$('document').ready(function(){
		$('#header').removeClass('fixed');
	});
</script>

@endsection