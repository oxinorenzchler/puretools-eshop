<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/PublicController.php'); ?>
<?php unset($_SESSION['productID']); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/carousel.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/info.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/featured.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/advertise.php') ?>
<script type="text/javascript">
	function rate(pts,id,uid){

    $.ajax({
      'url':'lib/controllers/RatingController.php',
      'method':'POST',
      'data':{'pts':pts, 'id':id, 'rating':'rating', 'uid':uid}
    }).done(function(data){

      console.log(data);

    });

  }

function getProduct(id){
	$('#getproductform-' + id ).submit();
}
</script>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>