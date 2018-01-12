@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="navbar navbar-default col-md-6 col-md-offset-3">
			<ul class="nav navbar-nav">
				@include('nav')
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@yield('dashboard-content')
		</div>
	</div>
    
</div>
@endsection
