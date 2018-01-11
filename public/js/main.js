
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
