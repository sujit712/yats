<!DOCTYPE html>
<html lang="en" class="no-js">
@section('htmlheader')
    @include('layouts.partials.header')
@show
<body id="body" class="dark-theme">
	<!-- MAIN_WRAPPER -->
	<div class="main-wrapper animsition">
	@include('layouts.partials.menu')
	
		@yield('content')

		@yield('footer')
	</div>
@section('scripts')
    @include('layouts.partials.scripts')
@show
	
</body>
<script type="text/javascript">
$(document).keydown(function(a){return 123!=a.keyCode&&((!a.ctrlKey||!a.shiftKey||73!=a.keyCode)&&((!a.ctrlKey||!a.shiftKey||74!=a.keyCode)&&((!a.ctrlKey||83!=a.keyCode)&&((!a.ctrlKey||!a.shiftKey||67!=a.keyCode)&&void 0))))}),$(document).on("contextmenu",function(a){a.preventDefault()});
</script>
</html>
