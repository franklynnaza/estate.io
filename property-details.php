<?php
require 'includes/db.php';

// Check if a property ID is provided
if (!isset($_GET['id'])) {
    die("Property ID not provided.");
}

$property_id = intval($_GET['id']);

// Fetch property details
$sql = "SELECT 
            properties.title, 
            properties.price, 
            properties.location, 
            properties.rooms, 
            properties.toilets, 
            properties.description 
        FROM properties 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $property_id);
$stmt->execute();
$property_result = $stmt->get_result();

if ($property_result->num_rows == 0) {
    die("Property not found.");
}
$property = $property_result->fetch_assoc();

// Fetch associated images for the property
$image_sql = "SELECT image_path FROM images WHERE property_id = ?";
$image_stmt = $conn->prepare($image_sql);
$image_stmt->bind_param('i', $property_id);
$image_stmt->execute();
$image_result = $image_stmt->get_result();
?>



<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />
  <!---swiper-->
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
<!-- costum css -->
<link rel="stylesheet" href="./assets/style.css">
<link rel="stylesheet" href="./assets/media.css">

<style>
   .detail_heads img {
    width: 100%;
    height: 70%;
    display: none;
    position: absolute;
    padding-top: 100px !important;
    top: 0;
    left: 0;
    border-radius: 20px !important;
}


.heads .content .choose_bx {
    position: relative;
    width: 90%;
    height: auto;
    
    top: 40%;
    margin: auto;
    /* border: 1px solid #000; */
}
img.active {
    display: block;
}


.php-img-slide{
  display: flex;
  object-fit:contain;
}
@media screen and (max-width: 582px){


  .blog-page .about{
        margin-top: 0px !important;
     }
     .heads .content .choose_bx {
    top: 45%;
    width: 100%;
  }
}
</style>
<!-- aos -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />

<link rel="stylesheet" href="/bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />

<link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo.png">
<!-- MDB -->

<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
 <title><?php echo htmlspecialchars($property['title']); ?></title>
</head>

<body class="blog-page">
  <header class="header" >
    <div class="">

      <!--boootstrap nav-->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span class="color-primary"><img src="./assets/img/logo.png" alt="" class="polish"></span> <span class="c-name">Ojoor Properties Globals</span>  </a>
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <a class="nav-link " aria-current="page" href="./index.php">Home</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="./About.html">About</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="./Blog.html">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Projects.php">Sales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./rent.php">Lettings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Contact.html">Contact</a>
              </li>

             
              <a href="./Projects.php" class="btn  btn-themee">Get started</a>
              
            </ul>
          </div>
        </div>
      </nav>
      <!--boootstrap nav-->
    </div>
  </header>
  
  <section class="blog-about about">
    
    
    <div class="container">
      <section class="heads detail_heads">
      <?php if ($image_result->num_rows > 0): ?>
        <?php while ($image = $image_result->fetch_assoc()): ?>
          <img src="./uploads/<?php echo htmlspecialchars($image['image_path']); ?>" alt="Property Image" class="php-img-slide">
        <?php endwhile; ?>
            <?php else: ?>
                <p>No images available for this property.</p>
            <?php endif; ?>
        <div class="content">
          
            <br>
            <br>
            <br>
            <div class="choose_bx" data-aos="fade-right"  data-aos-offset="100">
                <div class="stay_bx">
                    <button><i class="bi bi-house-door-fill"></i></button>
                    <button onclick="prevImage()"><i class="bi bi-arrow-left"></i></button>
                    <button onclick="nextImage()"><i class="bi bi-arrow-right"></i></button>
                   
                </div>
                <div   class="select"  >
                    <div class="card">
                       <a href="./index.php"> <button>Home</button></a>
                        
                    </div>
                    <div class="card">
                        <a href="./About.html"> <button>About Us</button></a>
                        
                       
                    </div>
                    <div class="card">
                       
                        
                          
                              <a href="./Projects.php"><button>View More Properties</button></a>
                           
                     
                    </div>
                </div>
            </div>
        </div>
        
    </section>
       <br>
       <br>
       <br>
       <br>
    <div class="features-p" >
      <span class="features-main d-flex"><h6 class="h6 color-primary my-2 btn btn-theme" >FOR SALE</h6>
      <h4 class="mx-3 my-3">₦<?php echo number_format($property['price'], 0); ?></h4></span>
      <div class="col ">
      
        <button class="btn btn-theme buy" data-aos="zoom-in"><a href="tel:+234 808 467 1148" >Buy Now</a></button>
        <button class=" btn btn-play">
          <i class="bi bi-caret-right-fill"></i>
        </button>
  
      </div>
    </div>
    <br>
          <h3 class="my-5"><?php echo nl2br(htmlspecialchars($property['description'])); ?>
          <br>
          <br> <span class="prop-location">Location:</span>  <?php echo htmlspecialchars($property['location']); ?>
          </h3>
          <div class="blog-item d-flex">
              <span> <?php echo htmlspecialchars($property['rooms']); ?> <i class="fas fa-bed mx-1 align-self-center"></i></span>
            
            <span class="mx-3"><?php echo htmlspecialchars($property['toilets']); ?> <i class="fas fa-bath mx-1 "></i></span>
            <br>
           
            
          </div>
     
   
    </div>
  </section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <section class="schedule my-3">
    <div class="container">
        <h1>
            Schedule A Meeting
        </h1>
        <div class="meeting">
            <div class="meet">
                <a href="tel:+2348084671148" data-aos="flip-right"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="1000"><span class="btn-theme"> <i class="fas fa-person "></i>In Person</span> </a>
                <a href="https://call.whatsapp.com/video/yfIA9eET3wLHIOWN9kzuT5" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="1000"><span class="btn-theeme">  <i class="fas fa-video"></i>Videochat</span></a> 
            </div>
        </div>
        
    </div>
  </section>
<br>
<br>
<br>
 
<section class="mail-section">
 
 <div class="container">
   <h1 class="h1 h1-responsive mb-4">Have Any Questions In Mind?</h1>
   <h4>Let Us Help You.</h4>
 </div>
 <form class="contact-form" action="mail_handler.php" method="POST">
 <div class="  form shadow" data-aos="fade-right"
  data-aos-offset="300"
  data-aos-easing="ease-in-sine">
   <div class="" >
     <div class=" my-auto" >
       <input type="email"  id="email" name="email"   class=" form-control "  placeholder="your Email">
     </div>
   </div>
 </div>
 <div class=" text-right" data-aos="fade-up"   data-aos-duration="1000">
   <button class="btn btn-theme btn-feature buy" type="submit">Submit</button>
 </div>
 </form>
</section>


<section class="footer">
  <div class="container">
    <div class="row">
      
      <div class="col-md-2 my-md-auto my-4">
       <img src="./assets/img/logo.png" alt="" class="footer-logo">
       <h4 class="h3"> Ojoor Properties And  Global Consultants   NIG LTD </h4>
      </div>
      
      <div class="col-md-2 my-md-auto my-4 ">
        <h6> Access </h6>
        <center><hr></center>
        <ul>
         
          <li><a href="https://www.instagram.com/officialojoorproperties/"><i class="fa-brands fa-instagram"></i>Instagram</a></li>
          <li><a href="https://www.facebook.com/profile.php?id=61571080933832"><i class="fa-brands fa-facebook"></i>Facebook</a></li>
          <li><a href="https://api.whatsapp.com/send?phone=2348084671148&text=Hi%20I%20saw%20a%20property%20on%20your%20website%20and%20I'd%20love%20to%20purchase"><i class="fa-brands fa-whatsapp"></i>Whatsapp </a></li>
         
        </ul>
      </div>
      <div class="col-md-2 my-md-auto my-4 footer-location">
        
        <h6>Locatiion</h6>
        <center><hr></center>
        <ul>

          <li><a href=""><i class="fas fa-location-dot"></i> Lagos</a></li>
          <li><a href=""><i class="fas fa-location-dot"></i> Ibadan</a></li>
          <li><a href=""><i class="fas fa-location-dot"></i> Ogun</a></li>
        </ul>
      </div>
      <div class="col-md-2 my-md-auto my-4">
        
        <h6>services</h6>
        <center><hr></center>
        <ul>
          <li><a href="">Real Estate And General Construction</a></li>
          <li><a href="">Real Estate Advisory/Project Supervisor</a></li>
          <li><a href=""> Property Management</a></li>
          <li><a href=""> Property Dvelopement</a></li>
          
        </ul>
      </div>
      <div class="col-md-2"> 
        
        <h6>contact</h6>
       <center><hr></center>
         <ul>
         <li> <a href="tel:+234 808 467 1148"><i class="fas fa-phone"></i>+234 808 467 1148</a></li>
          <li><a href="mailto:orjoomancity1@gmail.com"><i class="fas fa-envelope"></i>orjoomancity1@gmail.com</a></li>
         
        </ul>
      </div>
    </div>
    
  </div>
</section>

<script type="text/javascript" src="./jquery-3.6.4.slim.js"> </script>
<script src="./jquery.js"></script>

<script src="./script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 
  

   
   
  </script>
    <script>
        const images = document.querySelectorAll('.detail_heads img');
        let currentIndex = 0;

        function showImage(index) {
            // Hide all images
            images.forEach((img, i) => {
                img.classList.remove('active');
                if (i === index) {
                    img.classList.add('active');
                }
            });
        }

        function prevImage() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            showImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            showImage(currentIndex);
        }

        // Initialize slider by showing the first image
        if (images.length > 0) {
            showImage(currentIndex);
        }
    </script>

</body>

</html>