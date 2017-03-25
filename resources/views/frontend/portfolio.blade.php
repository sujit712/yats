@extends('layouts.front')

@section('content')

<!-- PORTFOLIO -->
<!-- For item sizes use classes .wide and .tall -->
<div class="container fullwidth">
	<div class="grid gallery" data-gutter="5" data-columns="4">
@foreach($data as $data)
	@if($data->caption=="")
	<?php $title="Yatin Dandekar Photography"; ?>
	@else
	<?php $title=$data->caption; ?>
	@endif
	@if($data->status==1)
		<div class="grid-item {{$data->property}}">
			<a href="{{$data->image}}" data-background="{{$data->image}}" data-rel="lightcase:gal" title="{{$title}}"></a>
		</div>
	@endif
@endforeach
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