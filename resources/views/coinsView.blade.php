@extends('layouts.app')

@section('content')
	<header>
		<div>
			
		</div>
	</header>
	<main class="container">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<td class="text-center lead">#</td>
					<td class="text-center lead">Name</a></td>
					<td class="text-center lead">Price</td>
					{{--  <td class="text-center">Volume (24h)</td>  --}}
					<td class="text-center lead">Circulating Supply</td>
					<td><p class="text-center lead">Change(24h)</p></td>
				</tr>
			</thead>
			<tbody class="contenttable">
				{{--  @foreach( $response as $coin  )
					<tr>
						<td class="lead">{{ $coin->rank }}</td>
						<td class="lead"><a href="{{ route('coin', array('coin', $coin->id)) }}"> {{ $coin->name }}</a></td>
						<td class="text-right lead">$ {{ $coin->price_usd }}</td>
						{{--  <td class="text-right">{{ $coin["24h_volume_usd"] }}</td>  --}}
						{{--  <td class="text-right lead">{{ $coin->available_supply }} {{$coin->symbol}}</td>

						@if( $coin->percent_change_24h < 0 )
							<td class="text-right text-danger lead">{{ $coin->percent_change_24h }}</td>
						@elseif( $coin->percent_change_24h > 0)
							<td class="text-right text-success lead">{{ $coin->percent_change_24h }}</td>
						@endif
					</tr>
				@endforeach  --}} 
			</tbody>
		</table>
	</main>

	

	

@endsection