<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h3 class="text-center">Generals</h3>
				</div>
				<div class="panel-body" id='general'>
					<div class="col-md-4">
						<div class="col-lg-6">Available supply</div>
						<div class="col-lg-6 supply"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Max supply</div>
						<div class="col-lg-6 max-supply"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Total supply</div>
						<div class="col-lg-6 totalSupply"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Percent change 1h</div>
						<div class="col-lg-6 1h"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Percent change 24h</div>
						<div class="col-lg-6 24h"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Percent change 7d</div>
						<div class="col-lg-6 7d"></div>
					</div>
					<div class="col-md-4">
						<div class="col-lg-6">Price</div>
						<div class="col-lg-6 price_btc"></div>
					</div>


					<div class="col-md-4">
						<div class="col-lg-6">Last updated</div>
						<div class="col-lg-6 updated"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h3 class="text-center">Usd</h3>
				</div>
				<div class="panel-body" id='usd'>
					<div class="row">
						<div class="col-lg-6">Price</div>
						<div class="col-lg-6 usd-price"></div>
					</div>
					<div class="row">
						<div class="col-lg-6">Market cap</div>
						<div class="col-lg-6 marketUsd"></div>
					</div>
					{{--  <div class="row">
						<div class="col-lg-6">24h volume</div>
						<div class="col-lg-6 24h-usd"></div>
					</div>  --}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h3 class="text-center">Eur</h3>
				</div>
				<div class="panel-body" id='eur'>
					<div class="row">
						<div class="col-lg-6">Price</div>
						<div class="col-lg-6 priceEur"></div>
					</div>
					<div class="row">
						<div class="col-lg-6">Market cap</div>
						<div class="col-lg-6 market-eur"></div>
					</div>
					{{--  <div class="row">
						<div class="col-lg-6">24h volume</div>
						<div class="col-lg-6 vol-eur"></div>
					</div>  --}}
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		var value = $("#value").html();
		$.ajax({
			url : "https://api.coinmarketcap.com/v1/ticker/" + value + "/?convert=EUR",
			dataType :  "json",
			method :    "GET",
			success : function( data ){
				var val = data[0]
				console.log(data[0]);
				console.log($('#general .supply'))
				// GENERAL
				$('#general .supply').html( val.available_supply);
				$('#general .updated').html( val.last_updated);
				$('#general .max-supply').html( val.max_supply);
				$('#general .1h').html( val.percent_change_1h);
				$('#general .7d').html( val.percent_change_7d);
				$('#general .24h').html( val.percent_change_24h);
				$('#general .price_btc').html( val.price_btc + " Btc");
				$('#general .totalSupply').html( val.total_supply);
				
				// USD
				$('#usd .usd-price').html( val.price_usd );
				$('#usd .marketUsd').html( val.market_cap_usd );
				//console.log(val['24h_volume_usd']):
				//$('#usd .24h-usd').html( val.24h_volume_usd );

				// EUR
				//$('#eur .priceEur').html( val.price_eur );
				//$('#eur .market-eur').html( val.market_cap_eur );
				// $('#eur .vol-eur').html( val.24h_volume_eur );


				console.log(data[0].24h_volume_usd);
				
			},
			error : function( error ){ 
				console.log(error);
			}  
		});
	});

</script>