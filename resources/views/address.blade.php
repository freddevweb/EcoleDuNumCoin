@extends('home')

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Adresses</h2>
	</div>
	<div class="row jumbotron">
		<div class="col-md-10">
			<div class="row">
				<div class="alert alert-light" role="alert">
					<div class="col-md-2">
						<div class="row" id="value">
							{{ ucfirst ($values['datas']->name) }}
						</div>
						<div class="row"> {{ strtoupper($values['datas']->abbreviation) }} </div>
					</div>
					<div class="col-md-6 h-200 d-inline-block align-middle">
							{{ $values['datas']->adressNumber }}
					</div>
					<div class="col-md-3">
						<div class="row">{{$values['datas']->sum}}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1 col-md-offset-1">
			
		</div>
	</div>
	<div class="row">
		@include('coins')
	</div>
</div>
@endsection



