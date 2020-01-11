<?php 
    session_start();         
    if(!isset($_SESSION['admin_login'])) 
        header('location:admin_login.php');   
?>
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
  $sql = "SELECT * FROM endroit where etat = 'false' "; 
  $result = mysql_query($sql);

  if(isset($_POST['ajouter']))
  {
    $nomtype = $_POST['nomtype'] ;
    $sql = "SELECT * FROM type where nomtype='$nomtype' ";
    $resultt = mysql_query($sql);
    $rowss = mysql_fetch_array($resultt) ;
    if ($rowss == null) {
    $sqll = "INSERT INTO  type(nomtype) VALUES ('$nomtype')"; 
    $current_id = mysql_query($sqll) or die("<b>Error:</b> il y a un problem <br/>" . mysql_error());
    if(isset($current_id)) {
      header("Location: admin.php");
    }
  }else {
    die("<b>Error:</b> le type existe déjà <br/>");
      }
  }

    if(isset($_POST['supprimer']))
  {
    $nomtype = $_POST['nomtype'] ;
    $sqll = "DELETE FROM type WHERE nomtype='$nomtype'"; 
    $current_id = mysql_query($sqll) or die("<b>Error:</b> il y a un problem <br/>" . mysql_error());
    if(isset($current_id)) {
      header("Location: admin.php");
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
                 <li ><a href="#menu">Parametre</a></li>
                 <li ><a href="#Ajout">Verification</a></li>
                 <li ><a href="#mymap">Carte</a></li>
              </ul>
            </div>
             <li ><a href="admin_logout.php">Se Deconnecter</a></li>
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
              <p class="animated bounceInLeft">Adiministrateur</p>
             <a href="#menu" class="explore animated bounceInDown"><i class="fa fa-angle-down  fa-3x"></i></a>
              </div>
            </div>
          </div>
</div>
<!-- #Slider Ends -->
</div>
<!-- Cirlce Starts -->
<div id="menu"  class="container spacer about">
<h2 class="text-center wowload fadeInUp"> Parametre </h2>  
  <div class="row">
    <div class="col-sm-6 wowload fadeInLeft">
        <h4><i class="fa fa-camera-retro"></i> Ajouter Un Type </h4>
        <div class="container contactform center">
        <div class="row wowload fadeInLeftBig">      
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
          <form method="post" enctype="multipart/form-data" action="">
            <input type="text" name="nomtype" placeholder="Nom Du Type" />    
            <input type="submit" value="Ajouter" name="ajouter">
          </form>
        </div> 
      </div>
    </div>
    <h4><i class="fa fa-camera-retro"></i> Supprimer Un Type </h4>
        <div class="container contactform center">
        <div class="row wowload fadeInLeftBig">      
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
          <form method="post" enctype="multipart/form-data" action="">
            <input type="text" name="nomtype" placeholder="Nom Du Type" />    
            <input type="submit" value="Supprimer" name="supprimer">
          </form>
        </div> 
      </div>
    </div>
      </div>
    </div>
  </div>
<!-- #Cirlce Ends -->
<div id="Ajout" class="spacer">
<!--Contact Starts-->
<div class="container contactform center">
  <h2 class="text-center  wowload fadeInUp">Verifiacation</h2>
  <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">

<?php while($rows = mysql_fetch_array($result)) { ?>

        <form method="post" enctype="multipart/form-data" action="verifier.php">
          <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
          <input type="text" name="titre" value="<?php echo $rows['titre']; ?>"  readonly />    
          <select name="type" required>
            <option value="<?php echo $rows['type']; ?>">
             -- <?php echo $rows['type']; ?> --
            </option>
            <?php
              $montype = $rows['type'];
              $sqll="SELECT * FROM type where nomtype <> '$montype'";
              $resultt= mysql_query($sqll);
              while($rowss = mysql_fetch_array($resultt)) {
            ?>
            <option value="<?php echo $rowss['nomtype']; ?>">
              <?php echo $rowss['nomtype']; ?>
            </option>
            <?php } ?>
          </select>   
          <input type="text" name="lat" id="lat" value="<?php echo $rows['lat']; ?>"   />    
          <input type="text" name="lng" id="lng"  value="<?php echo $rows['lng']; ?>"   />
          <br>
          <img width="500" height="400" src="mesimages/<?php echo $rows['image']; ?>">
          <br>
          <video width="500" height="300" controls>
            <source src="mesvideos/<?php echo $rows['video']; ?>" type="video/mp4">
          </video> 
          <br><br>
          <input type="text" name="adresse" value="<?php echo $rows['adresse']; ?>"  readonly />    
          <input type="number" name="telephone" value="<?php echo $rows['telephone']; ?>"  readonly />    
          <input type="email" name="email" value="<?php echo $rows['email']; ?>"  readonly />
          <textarea rows="5" name="description"  value="<?php echo $rows['description']; ?>" readonly ><?php echo $rows['description']; ?>
          </textarea>  
          <input type="submit" value="Approuver" name="approuver">
          <input type="submit" value="Modifier" name="modifier">
          <input type="submit" value="Supprimer" name="supprimer">
        </form>
      <?php } ?>
      </div>
  </div>
</div>
</div>
  <div id="mymap" style="width:100%;height:400px;"></div>

<?php    
  $sqll = "SELECT * FROM endroit where etat = 'false' "; 
  $resultt = mysql_query($sqll);   
?>

<script>
  var markers;
function myMap() {

  var latt ;
  var lngg ;
  var titre = [] ;
  var mar = [] ;

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

   <?php while($rowss = mysql_fetch_array($resultt)) { ?> 
        latt = <?php echo $rowss['lat']; ?>;
        lngg = <?php echo $rowss['lng']; ?> ;
        titre.push("<?php echo $rowss['titre']; ?>");
        mar.push(new google.maps.LatLng(latt,lngg));
    <?php } ?>


    for (var i = mar.length - 1; i >= 0; i--) 
    {
      cherch(map, mar[i], titre[i]);
    };


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
function cherch(map, location, titre) {
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