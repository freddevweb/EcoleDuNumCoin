<div class="container">
	<div class="row">
		<div class="col-md-12">
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
						<div class="col-lg-6">Last updated</div>
						<div class="col-lg-6 updated"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
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
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h3 class="text-center">Eur</h3>
				</div>
				<div class="panel-body" id='eur'>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6 24hvol"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-6"></div>
					</div>
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
				
				// USD
				$('#usd .price').html( val.price_usd );

				// EUR
				

				//$()
				//$('#usd .')
				
				console.log(data[0].available_supply);
				
			},
			error : function( error ){ 
				console.log(error);
			}  
		});
	});

</script>