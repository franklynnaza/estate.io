<a href="property-details.php?id=<?php echo $property['id']; ?>"  data-aos="zoom-in-up" data-aos-duration="1000"><div class="piece">
    
    <img src="./uploads/<?php echo htmlspecialchars($property['image_path']); ?>" class="bng" alt="Property Image">
            <div class="context">
              <span class="bi">For Sale</span>
              
                <div class="cont">
                    <div>
                    <span class="location_rx"><i class="fas fa-location-dot"></i> <h6><?= substr($property['location'],0 ,10); ?> </hh6></span>
                    </div>
                    <div>
                   
                    
                    <p>₦<?php echo number_format($property['price'], 0); ?></p>
                  </div>
                  <div class="item d-flex align-self-center room">
                    <i class="fas fa-bed mx-3 align-self-center"></i>
                    <span><?php echo htmlspecialchars($property['rooms']); ?></span>
                    <i class="fas fa-bath mx-3 align-self-center"></i>
                    <span><?php echo htmlspecialchars($property['toilets']); ?></span>
  
                    
                  </div>
                </div>
            </div>
        </div>  </a>