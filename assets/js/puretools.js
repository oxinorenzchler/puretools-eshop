  $(document).ready(function(){
      $('.featured-items').slick({
     infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });
  });

//Pagination  
var monkeyList = new List('test-list', {
    //item
    valueNames: ['name'],
    page: 10,
    pagination: true


  });
  
//Product rating
function rate(pts,id,uid){

    $.ajax({
      'url':'lib/controllers/RatingController.php',
      'method':'POST',
      'data':{'pts':pts, 'id':id, 'rating':'rating', 'uid':uid}
    }).done(function(data){

      console.log(data);

    });

  }

//Get product
function getProduct(id){
	$('#getproductform-' + id ).submit();
}

//get by category
function getByCategory(id){
  $.ajax({
    'url':'lib/controllers/FilterController.php',
    'method': 'GET',
    'data':{'id':id, 'search':'search'}
  }).done(function(){

    $('#catalog-container').empty().load('category.php');

  });
}

//Submit filter query
function submitFilter(){
  $('#filter-form').on('submit',function(e){
    e.preventDefault();
  });
  
  var rating = $('#ratingpoints').val();
  var category = $('#category').val();
  var minprice = $('#minprice').val();
  var maxprice = $('#maxprice').val();
  var range;

  if(rating == "" && category == "" && minprice == "" && maxprice == ""){
    alert("Empty fields");
  }else{

    $.ajax({
    'url':'lib/controllers/FilterController.php',
    'method':'GET',
    'data' : {
      'rating':rating, 
      'category':category, 
      'minprice':minprice, 
      'maxprice':maxprice, 
      'filter':'filter'
    }
  }).done(function(data){
       $('#catalog-container').empty().load('filtered.php');
       // console.log(data);
  });
  }

}