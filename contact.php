<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
  <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">About</li>
    </ol>
  </nav>
 

<div class="jumbotron mt-5 mb-5 text-center special-color white-text">
  <h3 class="display-5 text-uppercase">Get in touch</h3>
  <ul class="list-unstyled"> 
    <li><i class="fas fa-phone"></i> 222 - 333 - 2456</li>
    <li><i class="fas fa-at"></i> support@puretools.com</li>
    <li><i class="fas fa-map-marker-alt"></i> Unit #212, 245 St. Dei Mahanap, Bermuda Triangle</li>
  </ul>
</div>





 <div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(25.0000, 71.0000),
    zoom:10,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdGWu-7Zz9CAF5Bzvh2jm47rIbGcw02jk&callback=myMap"></script>


</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>