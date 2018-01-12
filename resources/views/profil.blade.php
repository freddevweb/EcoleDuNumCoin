@extends('home')

@section('dashboard-content')

	<h2 class="text-center">Profil</h2>
	<div class="jumbotron ">
		<div class="row">
			<h4 class="col-md-3">Nom :</h4>
			<h4 class="col-md-8">{{$user->name}}</h4>
		</div>
		<div class="row">
			<h4 class="col-md-3">Email :</h4>
			<h4 class="col-md-8">{{$user->email}}</h4>
		</div>
		<div class="row">
			<h4 class="col-md-3">Clef :</h4>
			<h4 class="col-md-8">{{$user->account}}</h4>
		</div>

	</div>
	

@endsection