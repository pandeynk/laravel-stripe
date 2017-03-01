@include('layouts.header')
@include('layouts.sidebar')
	<div class="content-wrapper">
		@include('layouts.message')
		@yield('content')
	</div>
@include('layouts.footer')
