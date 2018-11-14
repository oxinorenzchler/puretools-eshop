function addToCart(id){
	
	var quantity = $('input[name="quantity"]').val();

	$.ajax({
		'url':'lib/controllers/CartController.php',
		'method':'POST',
		'data':{'id':id, 'quantity':quantity}
	}).done(function(data){
		console.log(data);
		$('#cart-count').text(data);
	});

}