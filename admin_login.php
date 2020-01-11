<?php 
  session_start();
  if(isset($_SESSION['admin_login'])) 
      header('location:admin.php');   
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
  if(!isset($_SESSION['admin_login']))
  {
    if(isset($_POST['connexion']))
    {
      $sql="SELECT * FROM admin WHERE id='1'";
      $result=mysql_query($sql);
      $rws=  mysql_fetch_array($result);
      $username=$_POST['nom'];
      $password=$_POST['mdp'];
      if($username==$rws['nom'] && $password==$rws[mdp]) 
      {
        $_SESSION['admin_login']=1;
        header('location:admin.php'); 
      }
      else
      {
          header('location:admin_login.php');   
      }   
    }
  }
  else {
      header('location:admin.php');
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
                 <li ><a href="#con">Connexion</a></li>
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
             <a href="#con" class="explore animated bounceInDown"><i class="fa fa-angle-down  fa-3x"></i></a>
              </div>
            </div>
          </div>
</div>
<!-- #Slider Ends -->
</div>
<!-- Cirlce Starts -->
<!-- #Cirlce Ends -->
<!-- works -->
<!-- works -->
<!-- About Ends -->
<div id="con" class="spacer">
<div class="container contactform center">
  <h2 class="text-center  wowload fadeInUp">Connexion</h2>
  <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <form method="post" enctype="multipart/form-data" action="">    
          <input type="text" name="nom"   value="" placeholder="Nom D'Administrateur" />    
          <input type="password" name="mdp"   value="" placeholder="Mot De Passe "/>
          <input type="submit" name="connexion" value="Se Connecter">
        </form>
      </div>
  </div>
</div>
</div>
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