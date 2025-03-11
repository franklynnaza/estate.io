<?php
require 'includes/db.php';


// Query for the first 6 properties (adjusted to include category)
$sql_first_section = "SELECT 
                          properties.id, 
                          properties.title, 
                          properties.price, 
                          properties.location, 
                          properties.rooms, 
                          properties.toilets, 
                          properties.category,  -- Include category
                          COALESCE(images.image_path, 'uploads/default-placeholder.png') AS image_path
                      FROM properties
                      LEFT JOIN images ON properties.id = images.property_id
                      GROUP BY properties.id 
                      ORDER BY properties.id DESC 
                      LIMIT 6";
$result_first_section = $conn->query($sql_first_section);

// Query for the next 8 properties (adjusted to include category)
$sql_second_section = "SELECT 
                           properties.id, 
                           properties.title, 
                           properties.price, 
                           properties.location, 
                           properties.rooms, 
                           properties.toilets, 
                           properties.category,  -- Include category
                           COALESCE(images.image_path, 'uploads/default-placeholder.png') AS image_path
                       FROM properties
                       LEFT JOIN images ON properties.id = images.property_id
                       GROUP BY properties.id 
                       ORDER BY properties.id DESC 
                       LIMIT 8 OFFSET 6";
$result_second_section = $conn->query($sql_second_section);
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
  <link rel="stylesheet" href="./style-2.css">
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
    .room{
    color: white;
    padding-left: 80px !important;
    font-size: 13px;
}
    .home .home_bx {
    width: 100%;
    margin-top: 50px;
    /* border: 1px solid #000; */
    display: flex;
    align-items: center;
    margin: auto;
    flex-wrap: wrap;
    justify-content: space-between;
}
.space_b{
  justify-content: space-around !important;
}
.couple{
  border-radius: 1.5rem !important;
}
.testimonial-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    .testimonial-card .stars {
      color: #f4b400; /* Star color */
      font-size: 1.2rem;
    }
    .testimonial-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }
    .testimonial-heading {
      font-weight: bold;
      margin-bottom: 10px;
    }

.icon-circle {
      width: 50px;
      height: 50px;
      background-color: #ffc107;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: #212529;
    }
    .feature-card {
      margin-bottom: 1.5rem;
    }
    .stat-box {
      background-color: #212529;
      color: #fff;
      border-radius: 1.5rem;
      padding: 2rem;
    }
    .stat-box h3 {
      font-size: 2rem;
      font-weight: bold;
    }
@media screen and (max-width: 582px){
  .heads .content .choose_bx {
    top: 13%;
    width: 100% !important;
  }
  
}
@media screen and (max-width: 541px) {
  .home .home_bx {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }
}
  </style>
</head>

<body>
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


  <header class="header" >
    <div class="">

      <!--boootstrap nav-->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span class="color-primary"><img src="./assets/img/logo.png" alt="" class="polish"></span> <span class="c-name">Ojoor Properties</span>  </a>
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
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

  <section class="headsa">
    <div class="heads">

    
    <img src="./assets/img/mustwork.png" alt="" data-aos="zoom-in-up"  data-aos-duration="1000" data-aos-delay="100" class="moving">
    <img src="./assets/img/digital-marketing-agency-ntwrk-g39p1kDjvSY-unsplash.jpg" alt="" data-aos="zoom-in-up" data-aos-delay="100" class="moving">
    <img src="./assets/img/ralph-ravi-kayden-2d4lAQAlbDA-unsplash.jpg" alt="" data-aos="zoom-in-up" data-aos-delay="100" class="moving">
    <img src="./assets/img/digital-marketing-agency-ntwrk-g39p1kDjvSY-unsplash.jpg" alt="" data-aos="zoom-in-up" data-aos-delay="100" class="moving">   
    <div class="content">
        <div class="cont_bx">
    
        </div>
        <br>
        <br>
        <br>
        <div class="choose_bx" data-aos="fade-right" data-aos-delay="300">
            <div class="stay_bx">
                <button><i class="bi bi-house-door-fill"></i></button>
                <button onclick="previousImage()"><a href="https://www.instagram.com/officialojoorproperties/"><i class="fa-brands fa-instagram fa-beat"></i></a></button>
                <button onclick="nextImage()"><a href="https://api.whatsapp.com/send?phone=2348084671148&text=Hi%20I%20saw%20a%20property%20on%20your%20website%20and%20I'd%20love%20to%20purchase"><i class="fa-brands fa-whatsapp fa-beat"></i></a></button>
               
            </div>
            <div   class="select"  >
                <div class="card">
                    <a href="./rent.php"> <button>For Rent</button></a>
                    
                </div>
                <div class="card">
                   <a href="./Projects.php"> <button>For Sale</button></a>
                    
                   
                </div>
                <div class="card">
                   
                    
                      
                          <a href="./About.html"> <button>About Us </button></a>
                       
                 
                </div>
            </div>
        </div>
    </div>
  </div>
</section>




<div class="home" id="home">
  <div class="title_button">
      <h2>Explore Our Houses</h2>
      <a href="./Projects.php"> <button class="btn btn-theme">See All <i class="bi bi-arrow-right "></i> </button></a>
  </div>
 
<?php if ($result_first_section->num_rows > 0): ?>
<div class="home_bx">
  <?php while ($property = $result_first_section->fetch_assoc()): ?>
    <?php 
      // Check the category of the property and include the correct card
      if ($property['category'] == 'sale') {
          include 'property_card.php'; // Include the sale property card
      } elseif ($property['category'] == 'rent') {
          include 'rents_card.php'; // Include the rent property card
      }
    ?>
  <?php endwhile; ?>
</div>
<?php else: ?>
  <p>No properties available at the moment.</p>
<?php endif; ?>
</div>


<br>
<br>




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






  <section class="services ">
    <div class="container">
      <h6 class="h6 color-primary m-0 centerr">Work</h6>
      <h1 class="h1 h1-responsive mb-4 centerr">How It Works!</h1>
      
     
      <div class="d-flex space_b">

        <div class=" shadow service-show" data-aos="fade-up"  data-aos-duration="1000">
        <i class="fa-solid fa-search"></i>
        <h4 class="h5 mb-46">Find a Home</h4>
          <p>Search and explore our properties and select any of your choice. </p>
        </div>
        <div class=" shadow service-show" data-aos="fade-up"   data-aos-duration="1000">
        <i class="fa-solid fa-shield"></i>
        <h4 class="h5 mb-4">Meet Our Agent</h4>
        <p>Place an order or a direct call to us via the links available.</p>
        </div>
        <div class=" shadow service-show" data-aos="fade-up"  data-aos-duration="1000">
        <i class="fa-solid fa-people-carry"></i>
        <h4 class="h5 mb-4">Make It Official</h4>
          <p>Live and enjoy the beautiful comfort of your newly acquired home/property.</p>
        </div>
       

      </div>
    </div>
  </section>

<section>
<div class="container py-5">
    <div class="row align-items-center">
      <!-- Left Side: Features -->
      <div class="col-md-6">
        <h2 class="fw-bold">Why Choose Ojoorproperties?</h2>
        <p class="text-secondary">
        Our team takes the time to understand your unique needs and preferences, ensuring a personalized experience that meets your exact requirements.
        </p>

        <!-- Features List -->
        <div class="feature-card d-flex align-items-start">
          <div class="icon-circle me-3">
            ➤
          </div>
          <div>
            <h5 class="fw-bold">Excellent Communication</h5>
            <p class="text-secondary mb-0">
            We keep you informed with quick updates and responses.
            </p>
          </div>
        </div>
        <div class="feature-card d-flex align-items-start">
          <div class="icon-circle me-3">
            ➤
          </div>
          <div>
            <h5 class="fw-bold">Extensive Market Knowledge</h5>
            <p class="text-secondary mb-0">
            Accurate insights to help you make smart decisions.
            </p>
          </div>
        </div>
        <div class="feature-card d-flex align-items-start">
          <div class="icon-circle me-3">
            ➤
          </div>
          <div>
            <h5 class="fw-bold">Strong Negotiators</h5>
            <p class="text-secondary mb-0">
            Tools to help you secure the best deals.
            </p>
          </div>
        </div>

        <!-- Button -->
        <button class="btn btn-theme buy mt-3 mb-6"><a href="./About.html">Learn More</a></button>
      </div>

      <!-- Right Side: Statistics & Images -->
      <div class="col-md-6">
        <!-- Stat Box -->
        <div class="stat-box mb-3 text-center" data-aos="fade-up"   data-aos-duration="1000">
          <h3>10,000 +</h3>
          <p class="mb-0">Properties Sold</p>
        </div>

        <!-- Image -->
       
      </div>
    </div>
  </div>
</section>



<section class="py-5 bg-light">
    <div class="container">
      <!-- Heading -->
      <div class="text-center mb-4">
        <h2 class="fw-bold">Hear What They Say</h2>
        <p class="text-muted">About us</p>
      </div>

      <div class="row g-4">
        <!-- Left Image -->
        <div class="col-lg-4 d-flex justify-content-center">
          <img src="./assets/img/testimonialllll.jpg" alt="Couple" class="couple img-fluid rounded">
        </div>

        <!-- Testimonial Cards -->
        <div class="col-lg-8">
          <div class="row g-4">
            <!-- Testimonial 1 -->
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="stars mb-2">★★★★★</div>
                <p class="text-muted mb-3">
                  My wife and I have been dealing with Ojoor for over 18 months, and they are outstanding. Cooperative and very efficient.
                </p>
                <div class="d-flex align-items-center">
                  <img src="./assets/img/paschal.jpg" alt="Marc Pillay" class="testimonial-img">
                  <div>
                    <p class="mb-0 testimonial-heading">Marc Pillay</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="stars mb-2">★★★★★</div>
                <p class="text-muted mb-3">
                  Ojoor is a pioneer and trusted company in the Real Estate sector in Lagos, and I’m happy to have had their assistance.
                </p>
                <div class="d-flex align-items-center">
                  <img src="./assets/img/paschall.jpg" alt="Shifaath Shariff" class="testimonial-img">
                  <div>
                    <p class="mb-0 testimonial-heading">Shifaath Shariff</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="stars mb-2">★★★★★</div>
                <p class="text-muted mb-3">
                  Ojoor properties is reliable and professional. We’ve worked with Ms. Ishola and she has assisted my family extensively.
                </p>
                <div class="d-flex align-items-center">
                  <img src="./assets/img/paschalll.jpg" alt="Ifhaam I." class="testimonial-img">
                  <div>
                    <p class="mb-0 testimonial-heading">Ifhaam I.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Testimonial 4 -->
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="stars mb-2">★★★★★</div>
                <p class="text-muted mb-3">
                  Ojoorproperties has been one of the most helpful agencies. They manage our new store, and they've been remarkable!
                </p>
                <div class="d-flex align-items-center">
                  <img src="./assets/img/paschallll.jpg" alt="Shahid Ahmed" class="testimonial-img">
                  <div>
                    <p class="mb-0 testimonial-heading">Shahid Ahmed</p>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End of Testimonial Cards -->
        </div>
      </div>
    </div>
  </section>

  <section class="property-section ">
    <div class="container ">
      <h6 class="h6 color-primary m-0">Recents</h6>
      <h1 class="h1 h1-responsive mb-4">Find More Properties!</h1>
      <div class="text-right">
        <button class="btn btn-theme buy"><a href="./projects.php">Find More Projects </a></button>
      </div>

    </div>
    <div class="home" id="home">
      <?php if ($result_second_section->num_rows > 0): ?>
<div class="home_bx">
  <?php while ($property = $result_second_section->fetch_assoc()): ?>
    <?php 
      // Check the category of the property and include the correct card
      if ($property['category'] == 'sale') {
          include 'property_card.php'; // Include the sale property card
      } elseif ($property['category'] == 'rent') {
          include 'rents_card.php'; // Include the rent property card
      }
    ?>
  <?php endwhile; ?>
</div>
<?php else: ?>
  <p>No properties available at the moment.</p>
<?php endif; ?>


</div>
  </section>




 




 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

  <div class="ggmp">
    <div class="address_bx">
        <div class="location_bx">
            <h6>Location</h6>
            <h4>Use Map</h4>
        </div>
        <i class="bi bi-fullscreen-exit"></i>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8069790.435797271!2d8.677456999999999!3d9.0338725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1683925432637!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allow="geolocation" width="100%" height="400px" frameborder="0" scrolling="no" allowfullscreen></iframe>
</div>





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
<script src="./assets/jquery.js"></script>

<script src="./assets/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(form);
        
        fetch('mail_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            if(data.includes('Thank you')) {
                form.reset();
            }
        })
        .catch(error => {
            alert('An error occurred. Please try again later.');
        });
    });
});
</script>
<script>
  // Function to animate the counter
  function animateCounter(element, start, end, duration) {
    let startTime = null;

    function updateCounter(currentTime) {
      if (!startTime) startTime = currentTime;
      const progress = Math.min((currentTime - startTime) / duration, 1);
      element.textContent = Math.floor(progress * (end - start) + start) + "+"; // Add the "+" sign

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        element.textContent = end.toLocaleString() + "+"; // Final formatted value with "+"
      }
    }

    requestAnimationFrame(updateCounter);
  }

  // IntersectionObserver to trigger counter on scroll
  document.addEventListener("DOMContentLoaded", () => {
    const statBox = document.querySelector(".stat-box h3"); // Select the number element
    let counterTriggered = false;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !counterTriggered) {
            counterTriggered = true;
            animateCounter(statBox, 0, 1000, 2000); // Count from 0 to 1,000 in 2 seconds
          }
        });
      },
      { threshold: 0.5 } // Trigger when 50% of the section is visible
    );

    observer.observe(statBox);
  });
</script>

 

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