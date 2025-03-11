<?php
require 'includes/db.php';

// Initialize filter variables
$filter_query = "properties.category = 'rent'"; // Default: show only rent category

// Check if additional filters are applied
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['rooms'])) {
        $rooms = intval($_GET['rooms']);
        $filter_query .= " AND properties.rooms = $rooms";
    }

    if (!empty($_GET['toilets'])) {
        $toilets = intval($_GET['toilets']);
        $filter_query .= " AND properties.toilets = $toilets";
    }

    if (!empty($_GET['location'])) {
        $location = $conn->real_escape_string($_GET['location']);
        $filter_query .= " AND properties.location LIKE '%$location%'";
    }

    if (!empty($_GET['price_range'])) {
        switch ($_GET['price_range']) {
            case 'low':
                $filter_query .= " AND properties.price <= 100000000"; // Example range
                break;
            case 'medium':
                $filter_query .= " AND properties.price > 100000000 AND properties.price <= 500000000";
                break;
            case 'high':
                $filter_query .= " AND properties.price > 500000000";
                break;
        }
    }
}

// Fetch filtered properties
$sql_projects = "SELECT 
                     properties.id, 
                     properties.title, 
                     properties.price, 
                     properties.location, 
                     properties.rooms, 
                     properties.toilets, 
                     COALESCE(images.image_path, 'uploads/default-placeholder.png') AS image_path
                 FROM properties
                 LEFT JOIN images ON properties.id = images.property_id
                 WHERE $filter_query
                 GROUP BY properties.id
                 ORDER BY properties.id DESC";

$result_projects = $conn->query($sql_projects);
?>



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
<!-- aos -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- MDB -->
<link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo.png">
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
 <title>Ojoor Properties and Global Consultant</title>
 <style>
    .home .home_bx {
    width: 100%;
    margin-top: 50px;
    /* border: 1px solid #000; */
    display: flex;
    align-items: center;
    margin: auto;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: space-between;
}
.piece{
  flex: 0 0 calc(100% /6-10px);
}
.room{
    color: white;
    padding-left: 80px !important;
    font-size: 13px;
}
.select-card{
  height: 50px;
}
.location_card{
  margin-top: 15px;
}
.heads
{
  min-height: 780px;
}
.btn-search{
background-color: #2289FF !important;
color: white !important;
border-radius: 15px !important;
}
.about-select{
  height:200px !important;
}
.sel-c{
  height: 220px !important;
}
@media screen and (max-width: 541px) {
  .home .home_bx {
        width: 100%;
        display: flex;
        flex: 6;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }
    .select-card{
      width: 100px !important;
    }
    .choose_bx{
    padding-top: 60px;
  min-width:98% !important;
    }
    .heads{
      width: 90% !important;
    }
}
  </style>
</head>

<body>
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
            <a class="nav-link" aria-current="page" href="./index.php">Home</a>
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
                <a class="nav-link active" href="./rent.php">Lettings</a>
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

  <section class="heads container">
  <img src="./assets/img/mustwork.png" alt="" data-aos="zoom-in-up" data-aos-duration="1000" class="moving">
    <img src="./assets/img/digital-marketing-agency-ntwrk-g39p1kDjvSY-unsplash.jpg" alt="" data-aos="zoom-in-up" data-aos-duration="1000"class="moving">
    <img src="./assets/img/ralph-ravi-kayden-2d4lAQAlbDA-unsplash.jpg" alt="" data-aos="zoom-in-up" data-aos-duration="1000" class="moving">
    <img src="./assets/img/digital-marketing-agency-ntwrk-g39p1kDjvSY-unsplash.jpg" alt=""  data-aos="zoom-in-up" data-aos-duration="1000" class="moving">   
    <div class="content">
   
 <div class="content">
     <div class="cont_bx">
 
       
     </div>
     <br>
     <br>
     <br>
     <div class="choose_bx" data-aos="fade-right" data-aos-delay="300" class="moving">
         <div class="stay_bx">
             <button><i class="bi bi-search"></i></button>
            
         </div>
         
         <div   class="sel-c select about-select"  >
         <form method="GET" class="filters-form select about-select">
                 
            
                   <input type="text" name="location" class="select-card location_card" id="location" placeholder="Enter location">
                 
                     <select class=" select-card" name="rooms" id="rooms">
                 
                   <option value="text"> Bedroom</option>
                   <option value="">Any</option>
                   <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                
                         </select>

                         <select class=" select-card"  name="toilets" id="toilets"><option value="text"> Bathroom</option>
                         <option value="">Any</option>
                         <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
               
                          </select>
   
                       <select class=" select-card" name="price_range" id="price_range">
                        <option value="text"> Price</option>
                       <option value="">Any</option>
                <option value="low">Below ₦100,000,000</option>
                <option value="medium">₦100,000,000 - ₦500,000,000</option>
                <option value="high">Above ₦500,000,000</option>
                        
                        </select>
                         <button type="submit" class=" btn btn-search my5">Search</button>
                    
                         </form>
              
           
         </div>
        

     </div>
     
 </div>
 
 
</section>


<div class="home mt-20" id="home">
  <div class="title_button">
      <h2>Explore Our houses</h2>
      <a href="./index.php"> <button class="btn btn-theme"><i class="bi bi-arrow-left "></i>Back Home </button></a>
  </div>
  
<div class="home_bx">

<?php if ($result_projects->num_rows > 0): ?>
<div class="home_bx">
<?php while ($property = $result_projects->fetch_assoc()) : ?>
  <?php include 'rents_card.php'; ?>

      <?php endwhile; ?>

</div>
<?php else: ?>
  <p>No properties available at the moment.</p>
<?php endif; ?>

  
      
  </div>
</div>


<section class="services sales-service">
  <div class="container">
  
    <h6 class="  mb-4 color-primary centerr">How It Works!</h6>
    <h1 class="service-p ">How Getting A Property From Us Actually Works!</h1>
   
    <div class="d-flex ">

      <div class=" shadow service-show" data-aos="fade-up" data-aos-duration="1000">
        <i class="fa-solid fa-search"></i>
        <h4 class="h5 mb-46">Find a Home</h4>
        <p>Search and explore our properties and select any of your choice.</p>
      </div>
      <div class=" shadow service-show" data-aos="fade-up"  data-aos-duration="1000">
        
        <i class="fa-solid fa-shield"></i>
        <h4 class="h5 mb-4">Meet Our Agent</h4>
        <p>Place an order or a direct call to us via the links available.</p>
      </div>
      <div class=" shadow service-show" data-aos="fade-up"  data-aos-duration="1000">
      <i class="fa-solid fa-people-carry"></i>
        <h4 class="h5 mb-4">Make It Official</h4>
        <p>Get to meet in person and get a signed deal on your property.</p>
      </div>



    </div>
  </div>
</section>
<br>
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




<span class="bg-blur">  </span> 
<div class=" contact-form">
  <div class="formcont">
    <div class="formbtn">
        <span onclick="login()">
            LOG IN
        </span>
        <span  onclick="register()">
            REGISTER
        </span>
        <hr id="indicator">
    </div>
    <form action="" id="log">
        <input type="text" placeholder="username">
        <input type="password" placeholder="password">
        <button type="submit" class="btn">Log in</button>
        <br>
        <a href=""> Forgot password</a>
    </form>
    <form action="" id="reg">
        <input type="text" placeholder="username">
        <input type="email" placeholder="email">
        <input type="password" placeholder="password">
        <button type="submit" class="btn">register</button>
      
    </form>
  </div>
</div>






<!--smaller screen-->


<span class="bg-blurr"></span>
<div class=" contact-form">
  <div class="form-cont">
    <div class="form-btn">
        <span onclick="loginn()">
            LOG IN
        </span>
        <span  onclick="registerr()">
            REGISTER
        </span>
        <hr id="indicatorr">
    </div>
    <form action="" id="logg">
        <input type="text" placeholder="username">
        <input type="password" placeholder="password">
        <button type="submit" class="btn">Log in</button>
        <br>
        <a href=""> Forgot password</a>
    </form>
    <form action="" id="regg">
        <input type="text" placeholder="username">
        <input type="email" placeholder="email">
        <input type="password" placeholder="password">
        <button type="submit" class="btn">register</button>
       
    </form>
  </div>
</div>


<script type="text/javascript" src="./jquery-3.6.4.slim.js"> </script>
<script src="./assets/jquery.js"></script>

<script src="./assets/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 
  <script>
    var swiper = new Swiper('.swiper', {
      // Optional parameters


      loop: true,
      slidesPerView: 1.5,
      spaceBetween: 30,
      centeredSlides: true,
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      }
    })



    var firstIndex=0;

function automaticSlide(){

setTimeout(automaticSlide, 5000); var pics;

const img=document.querySelectorAll('.moving');

for(pics=0; pics<img.length;pics++){ img[pics].style.display="none";

}

firstIndex++;

if(firstIndex > img.length) { firstIndex =1;

}

img[firstIndex -1].style.display="block";

} automaticSlide();


   
   
  </script>
</body>

</html>