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
</html>
