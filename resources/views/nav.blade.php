<li>
	<a href="{{ route('home') }}">
		Accueil
	</a>
</li>
<li>
	<a href="{{ route('profile') }}">
		Profil
	</a>
</li>
<li>
	<a href="{{ route('comptes') }}">
		Comptes
	</a>
</li>
<li role="separator" class="divider">
</li>
<li>
	<a>Transactions : </a>
</li>
<li>
	<a href="{{ route('seeMyTransactions') }}">
		<button class="btn btn-default btn-xs" >My</button>
	</a>
</li>
<li>
	<a href="{{ route('seeAllTransactions') }}">
		<button class="btn btn-default btn-xs" >All</button>
	</a>
</li>
<li>
	<a href="{{ route('doTransaction') }}">
		<button class="btn btn-default btn-xs" >Do</button>
	</a>
</li>
