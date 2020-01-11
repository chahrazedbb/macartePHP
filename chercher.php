<?php 
   $host = "localhost";   //Host
$username = "root";    //User
$password = ""; //Passsword
$database = "macarte";     // Database Name
 
//creating a new connection object using mysqli 
$conn = new mysqli($host, $username, $password, $database);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error.
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
  ?>

<?php
  if(isset($_POST['chtype']))
  {
    $type = $_POST['type'] ;
    $sql = "SELECT * FROM endroit where etat = 'true' and type = '$type' "; 
    $result = mysql_query($sql);
  }
  else if(isset($_POST['chercher']))
  {
    $titre = $_POST['nomEndroit'] ;
    $sql = "SELECT * FROM endroit where etat = 'true' and titre like '%$titre%' "; 
    $result = mysql_query($sql); 
  }

?>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">    

  <title>Ma Ville</title>
  <!-- Google fonts -->
  <!-- font awesome -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/animate/animate.css" />
  <link rel="stylesheet" href="assets/animate/set.css" />
  <!-- gallery -->
  <link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/style.css">

  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <style type="text/css">
    * {
      box-sizing: border-box;
  }
  input[type="file"] {
    position: fixed;
    right: 200%;
    bottom: 100%;
  }
  .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
  }
  .lina{
          width:1000px;
          padding-left:200px;
          background: white;
  }
  .chahrazed{
    padding-left:200px;
  }
  a{
  color: white;
  }
  
  </style>
</head>
<body>
<div class="topbar animated fadeInLeftBig"></div>
<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="images/log.png" alt="logo"></a>
              <!-- #Logo Ends -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li class="active"><a href="#home">Aceuille</a></li>
                 <li ><a href="#resultat">Endroits</a></li>
                 <li ><a href="#mymap">Carte</a></li>
              </ul>
            </div>
              <li ><a href="aceuil.php">Retourner</a></li>
          </div>
        </div>
      </div>
</div>
<!-- #Header Starts -->
<div id="home">
<!-- Slider Starts -->
<div class="banner">
          <img src="images/wallpaper.jpg" alt="banner" class="img-responsive">
          <div class="caption">
            <div class="caption-wrapper">
              <div class="caption-info">              
              <h1 class="animated bounceInUp">Sidi Bel Abbes</h1>
              <p class="animated bounceInLeft">Petit Paris</p>
             <a href="#resultat" class="explore animated bounceInDown"><i class="fa fa-angle-down  fa-3x"></i></a>
              </div>
            </div>
          </div>
</div>
<!-- #Slider Ends -->
</div>
<!-- Cirlce Starts -->
  <?php while($rows = mysql_fetch_array($result)) { ?> 
  <div id="resultat"  class="container spacer about">
    <div class="lina">
      <br>
    <h2 class="chahrazed"><?php echo $rows['titre']; ?></h2>
      <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Image </h4>
           <img width="500" height="400" src="mesimages/<?php echo $rows['image']; ?>">
        </div>
      </div>  
      <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Type </h4>
          <p><center><?php echo $rows['type']; ?></center></p>
        </div>
      </div>
       <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Description </h4>
          <p><center><?php echo $rows['description']; ?></center></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Adresse </h4>
          <p><center><?php echo $rows['adresse']; ?></center></p>
        </div>
      </div>
       <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Contacter </h4>
          <p><center>Telephone:     <?php echo $rows['telephone']; ?></center></p>
          <p><center>Email:     <?php echo $rows['email']; ?></center></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
          <h4> Video </h4>
          <video width="600" height="400" controls>
            <source src="mesvideos/<?php echo $rows['video']; ?>" type="video/mp4">
          </video>
            <br><br><br><br>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div id="mymap" style="width:100%;height:400px;"></div>
  <?php
    if(isset($_POST['chtype']))
    {
      $type = $_POST['type'] ;
      $sqll = "SELECT * FROM endroit where etat = 'true' and type = '$type' "; 
      $resultt = mysql_query($sqll); 
    }
    else if(isset($_POST['chercher']))
    {
      $titre = $_POST['nomEndroit'] ;
      $sqll = "SELECT * FROM endroit where etat = 'true' and titre like '%$titre%' "; 
      $resultt = mysql_query($sqll); 
    }
    ?>
  <script>
function myMap()
{
  var lat ;
  var lng ;
  var titre = [] ;
    var mymar = [] ;
    var mapCanvas = document.getElementById("mymap");
    var myCenter = new google.maps.LatLng(35.202483, -0.633441); 
    var mapOptions = {center: myCenter, zoom:13};
    var map = new google.maps.Map(mapCanvas,mapOptions);
    var marker = new google.maps.Marker({
      position: myCenter,
         icon: "MapMarker_Flag5_Pink.png",
         animation: google.maps.Animation.BOUNCE
    });
    var infowindow = new google.maps.InfoWindow({
      content: "Bien Venu"
    });
    infowindow.open(map,marker);
    marker.setMap(map);
      // Zoom to 9 when clicking on marker
    google.maps.event.addListener(marker,'click',function() {
      map.setZoom(9);
      map.setCenter(marker.getPosition());
    });

    <?php while($rowss = mysql_fetch_array($resultt)) { ?> 
        lat = <?php echo $rowss['lat']; ?>;
        lng = <?php echo $rowss['lng']; ?> ;
        titre.push("<?php echo $rowss['titre']; ?>");
        mymar.push(new google.maps.LatLng(lat,lng));
    <?php } ?>


    for (var i = mymar.length - 1; i >= 0; i--) 
    {
      placeMarker(map, mymar[i], titre[i]);
    };

  }
  function placeMarker(map, location, titre) {
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    var infowindow = new google.maps.InfoWindow({
      content: titre 
    });
    infowindow.open(map,marker);
}

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAczwTN3MgtBVfsZYdc_uFo6YA4ChmsMbU&callback=myMap"></script>
  <div class="footer text-center spacer">
   Projet fin d'etude Bachir Belmehdi Chahrazed Bouchra & Chelif Malika
  </div>
  <a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
  <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
      <!-- The container for the modal slides -->
      <div class="slides"></div>
      <!-- Controls for the borderless lightbox -->
      <h3 class="title">Title</h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
  </div>
  <script src="assets/jquery.js"></script>
  <script src="assets/wow/wow.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
  <script src="assets/mobile/touchSwipe.min.js"></script>
  <script src="assets/respond/respond.js"></script>
  <script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>
  <script src="assets/script.js"></script>
</body>
</html>