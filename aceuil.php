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
  if(count($_FILES) > 0) {

  $titre=$_POST['titre'];
  $type=$_POST['type'];
  $lat=$_POST['lat'];
  $lng=$_POST['lng'];
  $description=$_POST['description'];
  $adresse=$_POST['adresse'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $etat = 'false' ;
  $maj = 'false' ;
  $target_dir_image = "mesimages/";
  $target_dir_video= "mesvideos/";

  $target_file_image = $target_dir_image . basename($_FILES["image"]["name"]);
  $target_file_video = $target_dir_video . basename($_FILES["video"]["name"]);

  $imageFileType = pathinfo($target_file_image,PATHINFO_EXTENSION);
  $videoFileType = pathinfo($target_file_video,PATHINFO_EXTENSION);

  if(($imageFileType != "jpg" && $imageFileType != "gif" && $imageFileType != "png" && $imageFileType != "jpeg" )||($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "3gp" && $videoFileType != "mpeg"))
  {
  echo "File Format Not Suppoted";
  }  
  else
  {
  $image_path=$_FILES['image']['name'];
  $video_path=$_FILES['video']['name'];

  move_uploaded_file($_FILES["image"]["tmp_name"],$target_file_image);
  move_uploaded_file($_FILES["video"]["tmp_name"],$target_file_video);

  $sqldeux="INSERT INTO  endroit(titre,type,lat,lng,image,video,description,adresse,telephone,email,etat,maj) 
  VALUES ('$titre','$type','$lat','$lng','$image_path','$video_path','$description','$adresse','$telephone','$email','$etat','$maj')"; 

  $current_id = mysql_query($sqldeux) or die("<b>Error:</b>il y a un probleme <br/>" . mysql_error());


  if(isset($current_id)) {
  header("Location: aceuil.php");
  }
  }
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
                 <li ><a href="#cherch">Chercher Un Endroit</a></li>
                 <li ><a href="#ville">La Ville</a></li>
                 <li ><a href="#Ajout">Ajouter Un Endroit</a></li>
                 <li ><a href="#mymap">Carte</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->
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
             <a href="#cherch" class="explore animated bounceInDown"><i class="fa fa-angle-down  fa-3x"></i></a>
              </div>
            </div>
          </div>
</div>
<!-- #Slider Ends -->
</div>
<!-- Cirlce Starts -->
<div id="cherch"  class="container spacer about">
<h2 class="text-center wowload fadeInUp"> Chercher Un Endroit </h2>  
  <div class="row">
    <div class="col-sm-6 wowload fadeInLeft">
        <h4><i class="fa fa-camera-retro"></i> Selectionner Un Type </h4>
        <div class="container contactform center">
          <div class="row wowload fadeInLeftBig">      
            <div class="col-sm-6 col-sm-offset-3 col-xs-12">
              <form method="post" enctype="multipart/form-data" action="chercher.php">
                <select name="type" required>
                  <?php
                    $sqll="SELECT * FROM type";
                    $resultt= mysql_query($sqll);
                    while($rowss = mysql_fetch_array($resultt)) {
                  ?>
                  <option value="<?php echo $rowss['nomtype']; ?>">
                    <?php echo $rowss['nomtype']; ?>
                  </option>
                  <?php } ?>
                </select>
                <input type="submit" value="Chercher" name="chtype">
              </form>
            </div> 
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-6 wowload fadeInLeft">
        <h4><i class="fa fa-camera-retro"></i> Entrer Un Nom </h4>
        <div class="container contactform center">
          <div class="row wowload fadeInLeftBig">      
            <div class="col-sm-6 col-sm-offset-3 col-xs-12">
              <form method="post" enctype="multipart/form-data" action="chercher.php">
                <input type="text" name="nomEndroit" placeholder="Nom De L'Endroit" />    
                <input type="submit" value="Chercher" name="chercher">
              </form>
            </div> 
          </div>
        </div> 
      </div>
    </div>
  </div>
<!-- #Cirlce Ends -->
<!-- works -->
<div id="ville"  class=" clearfix grid"> 
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/mag1.png" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/mag1.png" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/mag99.png" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/mag99.png" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/mag3.jpg" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/mag3.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/mag5.jpg" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/mag5.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
     
     <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/mm.png" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/mm.png" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/image1.jpg" alt="img01"/>
        <figcaption>
            <h2>text</h2>
            <p>text<br>
            <a href="images/portfolio/image1.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
</div>
<!-- works -->

<!-- About Starts -->

<!-- About Ends -->
<div id="Ajout" class="spacer">
<!--Contact Starts-->
<div class="container contactform center">
  <h2 class="text-center  wowload fadeInUp">Formulaire</h2>
  <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <form method="post" enctype="multipart/form-data" action="">
          <input type="text" name="titre" placeholder="Nom de l'endroit" />    
          <select name="type" required>
            <?php
              $sqll="SELECT * FROM type";
              $resultt= mysql_query($sqll);
              while($rowss = mysql_fetch_array($resultt)) {
            ?>
            <option value="<?php echo $rowss['nomtype']; ?>">
              <?php echo $rowss['nomtype']; ?>
            </option>
            <?php } ?>
          </select>    
          <input type="text" name="lat" id="lat"  value=""/>    
          <input type="text" name="lng" id="lng"  value="" />
          <label for="image" class="custom-file-upload">
          <i class="fa fa-cloud-upload"></i>Choisissez Une Image</label>
          <input type="file" name="image" id="image"  />    
          <label for="video" class="custom-file-upload">
          <i class="fa fa-cloud-upload"></i>Choisissez Un Video</label>
          <input type="file" name="video" id="video"  />    
          <input type="text" name="adresse" placeholder="Adresse" />    
          <input type="number" name="telephone" placeholder="Telephone" />    
          <input type="email" name="email" placeholder="Email"/>
          <textarea rows="5" name="description" placeholder="Description"></textarea>  
          <input type="submit" value="Valider">
        </form>
      </div>
  </div>
</div>
</div>
  <div id="mymap" style="width:100%;height:400px;"></div>
<script>
  var markers;
function myMap() {
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
  markers = marker;
    // Zoom to 9 when clicking on marker
  google.maps.event.addListener(marker,'click',function() {
    map.setZoom(9);
    map.setCenter(marker.getPosition());
  });

  google.maps.event.addListener(map, 'click', function(event) {
    markers.setMap(null);
    markers = placeMarker(map, event.latLng,markers);
  });
}
function placeMarker(map, location,markers) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers=marker;
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
  sendIt(location.lat(),location.lng());
  return markers ;
}
function sendIt(lat,lng)
{
  document.getElementById('lat').value  = lat;
  document.getElementById('lng').value  = lng;
}
</script>
<script type="text/javascript">

</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAczwTN3MgtBVfsZYdc_uFo6YA4ChmsMbU&callback=myMap"></script>
<!--Contact Ends-->



<!-- Footer Starts -->
<div class="footer text-center spacer">
 Projet fin d'etude Bachir Belmehdi Chahrazed Bouchra & Chelif Malika
</div>
<!-- # Footer Ends -->
<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>





<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
</div>



<!-- jquery -->
<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="assets/script.js"></script>

</body>
</html>