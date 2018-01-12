@extends('home')

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Adresses</h2>
	</div>
	<div class="row">
		<div class="col-md-10">
			@if( empty($addresses) )
				<div class="row">
					<div  class="alert alert-danger" role="alert">
						Vous n'avez pas d'adresse, créez en une !
					</div>
				</div>
			@else
				<div class="row">
					<div class="alert alert-light" role="alert">
						<div class="col-md-2">
							<div class="row">Monnaie</div>
							<div class="row">Symbol</div>
						</div>
						<div class="col-md-7">
							Address
						</div>
						<div class="col-md-3">
							<div class="row">Montant</div>
							<div class="row"></div>
						</div>
						<div class="col-md-9">
							
						</div>
					</div>
				</div>
				@foreach( $addresses as $address )
				<div class="row">
					<div class="alert alert-light" role="alert">
						<div class="col-md-2">
							<div class="row">	
									{{ ucfirst ($address->name) }}
							</div>
							<div class="row"> {{ strtoupper($address->abbreviation) }} </div>
						</div>
						<div class="col-md-6 h-200 d-inline-block align-middle">
							<a href="{{'/address/'. $address->adressNumber}}">
								{{ $address->adressNumber }}
							</a>
						</div>
						<div class="col-md-3">
							<div class="row">{{$address->sum}}</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif

		</div>
		<div class="col-md-1 col-md-offset-1">
			<a href="{{ route('creer-adresse') }}" type="button" class="btn btn-default">Créer une adresse</a>
		</div>
	</div>
</div>
@endsection