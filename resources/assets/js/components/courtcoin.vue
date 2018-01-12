<template>
    <div class="container">
		blabla
        <div class="row">
            <div class="col-md-6">
				<h3 class="text-center">Usd</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
			<div class="col-md-6">
				<h3 class="text-center">Eur</h3>
				<div class="panel-heading">Example Component</div>

				<div class="panel-body">
					I'm an example component!
				</div>
            </div>
        </div>
    </div>
</template>

<script>
console.log('coucou 1');
    export default {
		
		mounted(  ) {
			console.log('coucou 2');
			var value = $('#monnaycoin').val();
			console.log(value);

			$.ajax({
				url : " https://api.coinmarketcap.com/v1/ticker/" + value + "/",
				method : "get",
				dataType : "json",
				success : function( data ){
					
					console.log(data)

				},
				error : function( error ){
					console.log( error );
				}
			});
		},

		getEltsEur( value ){
			var that = this;
			$.ajax({
				url : "https://api.coinmarketcap.com/v1/ticker/" + value + "/?convert=EUR",
				method : "get",
				dataType : "json",
				success : function( data ){
					console.log(data)
					

				},
				error : function( error ){
					console.log( error );
				}
			});
		}

		
// $(document).ready(function(){

// 	var table = $("contenttable");
// 	console.log(table);
	
// 	$.ajax({
// 		url: that.url + "musiques",
// 		dataType :  "json",
// 		method :    "GET",
// 		success : function( data ){

// 			for( var music of data){

// 				var checkbox = '<span class="checkbox-line">';
// 				checkbox += '<input type="checkbox" id="' + music.name + '" value="' + music.name  + '"class="search checkSearch">';
// 				checkbox += '<label for="' + music.name + '">' + music.name.toUpperCase() + '</label>';
// 				checkbox += '</span>';

// 				that.$checkboxeSearch.append(checkbox);
// 				that.$checkboxeAdd.append(checkbox);
// 				that.musiques[music.id] = music.name;
// 			}
// 		},
// 		error : function( error ){ 
// 			console.log(error);
// 		}  
// 	});
// })

    }
</script>
