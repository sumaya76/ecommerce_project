
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project/config.php");
?>
<style>
.about {
    padding: 1.4rem 0;
}

.about .heading h1 {
    font-size: 1.3rem;
    font-weight: 700;
    margin: 0;
    padding: 0;

}

.about .heading h1 span {
    color: #F24259;
}

.about .heading p {
    font-size: 15px;
    font-weight: 400;
    line-height: 1.7;
    color: #999999;
    margin: 20px 0 60px;
    padding: 0;
}

.about.h3 {
    font-size: 25px;
    font-weight: 700;
    margin: 0;
    padding: 0;
}
.choose {
margin-top: 4rem;
margin-bottom: 1.8rem ;
}


.about p {
    font-size: 15px;
    font-weight: 400;
    line-height: 1.7;
    color: #999999;
    margin: 20px 0 15px;
    padding: 0;
    
}
.sidestyle{
    margin-left: 5rem;
   
}
.about_icon i {
    font-size: 22px;
    height: 65px;
    width: 65px;
    line-height: 65px;
    display: inline-block;
    background: #fff;
    border-radius: 35px;
    color: #F24259;
    box-shadow: 0 8px 20px -2px rgba(158, 152, 153, 0.5);
}

.about_header_main .about_heading {
    max-width: 450px;
    font-size: 24px;
}

.about_icon span {
    position: relative;
    top: -10px;
}

.about_content_box_all {
    padding: 28px;
}

.team-boxed {
    color:#313437;
    background-color:white;
  }
  
  .team-boxed p {
    color:#7d8285;
  }
  
  .team-boxed h2 {
    font-weight:bold;
    margin-bottom:1.5rem;
   margin-top:4rem;
    color:inherit;
  }
  
 
    .team-boxed h2 {
      margin-bottom:25px;
      padding-top:25px;
      font-size:24px;
    }
  
  
  .team-boxed .intro {
    font-size:16px;
    max-width:500px;
    margin:0 auto;
  }
  
  .team-boxed .intro p {
    margin-bottom:0;
  }
  
  .team-boxed .people {
    padding:50px 0;
  }
  
  .team-boxed .item {
    text-align:center;
  }
  
  .team-boxed .item .box {
    text-align:center;
    padding:30px;
    background-color:#fff;
    margin-bottom:30px;
  }
  
  .team-boxed .item .name {
    font-weight:bold;
    margin-top:28px;
    margin-bottom:8px;
    color:inherit;
  }
  
  .team-boxed .item .title {
    text-transform:uppercase;
    font-weight:bold;
    color:#d0d0d0;
    letter-spacing:2px;
    font-size:13px;
  }
  
  .team-boxed .item .description {
    font-size:15px;
    margin-top:15px;
    margin-bottom:20px;
  }
  
  .team-boxed .item img {
    max-width:160px;
  }
  
  .team-boxed .social {
    font-size:18px;
    color:#F24259;
  }
  
  .team-boxed .social a {
    color:inherit;
    margin:0 10px;
    display:inline-block;
    opacity:0.7;
  }
  
  .team-boxed .social a:hover {
    opacity:1;
  }
  


  .testimonials {
    padding: auto;
  }
  .testimonials h3 {
    margin-bottom:1.8rem;
    margin-top:3rem;
    font-weight:bold;
  }
  .testimonials .card {
    border-bottom: 3px #007bff solid !important;
    transition: 0.5s;
    margin-top: 60px;
  }
  .testimonials .card i {
    background-color: #007bff;
    color: #ffffff;
    width: 75px;
    height: 75px;
    line-height: 75px;
    margin: -40px auto 0 auto;
  }
</style>
<section class="about" id="about">
            <div class="container">
                <div class="heading text-center">
                    <h1>About
                        <span class="color ">Us</span></h1>
                    <p>Welcome to FurniFrenzy!<br> We're passionate about making stylish home decor accessible to all. Our curated collection offers quality, affordability, and sustainability. From modern to eclectic, we're here to help you create spaces that inspire and bring joy to your life.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="img/product/banner lami .jpg" alt="about" class="img-fluid" width="100%">
                    </div>
                    <div class="col-lg-6">
                        <h3 class="choose">Why Choose Us?</h3>
                        <p>Elevate your space affordably with FurniFrenzy's curated selection of high-quality furniture and decor. Our commitment to sustainability and personalized service ensures guilt-free shopping. Explore our user-friendly site, get inspired, and join our community for an exceptional experience where quality, affordability, and style meet seamlessly.</p>
                       
                    </div>
                </div>
            </div>
         
            <div class="row mt-4 mx-5">
          
              <div class="col-lg-3">
                  <div class="about_content_box_all mt-3">
                      <div class="about_detail text-center">
                          <div class="about_icon">
                            <i class="fa-solid fa-truck-fast"></i>
                          </div>
                          <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Fast & Free Shipping</h5>
                          <p class="edu_desc mt-3 mb-0 text-muted">Get your orders delivered quickly and at no extra cost. We believe in getting your purchases to you as soon as possible, without hidden fees.</p>
                      </div>
                  </div>
              </div>

              <div class="col-lg-3">
                  <div class="about_content_box_all mt-3">
                      <div class="about_detail text-center">
                          <div class="about_icon">
                            <i class="fa-solid fa-headset"></i>
                          </div>
                          <h5 class="text-dark text-capitalize mt-3 font-weight-bold">24/7 Support</h5>
                          <p class="edu_desc mb-0 mt-3 text-muted">We're here for you, anytime, anywhere. Our friendly customer support team is available 24 hours a day, 7 days a week to answer your questions and help with any issues.</p>
                      </div>
                  </div>
              </div>

              <div class="col-lg-3">
                  <div class="about_content_box_all mt-3">
                      <div class="about_detail text-center">
                          <div class="about_icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                          </div>
                          <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Easy to shopping</h5>
                          <p class="edu_desc mb-0 mt-3 text-muted">Our website is designed with you in mind. Find what you need quickly and easily with intuitive navigation, clear product descriptions, and helpful search filters. No more frustration, just effortless shopping.</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Hassle Free Returns</h5>
                        <p class="edu_desc mb-0 mt-3 text-muted">Not satisfied with your purchase? No problem! Our hassle-free return policy makes it easy to return or exchange items for a full refund or store credit.</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="team-boxed">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Meet Our Team
     </h2>
    
                </div>
                <div class="row people">
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="img/team-member1.jpg">
                            <h3 class="name">Sania Akter</h3>
                            <p class="title">Server Engineer</p>
                            
                            <div class="social">
                              <a href="#">
                                <i class="fa-brands fa-facebook"></i>
                              </a>
                              <i class="fa-brands fa-twitter"></i>
                              </a>
                              <a href="#"><i class="fa-brands fa-instagram"></i>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="img/team-member2.jpg">
                            <h3 class="name"> Shahed Ahamed</h3>
                            <p class="title">Developer - Backend</p>
                            
                            
                              <div class="social">
                                <a href="#">
                                  <i class="fa-brands fa-facebook"></i>
                                </a>
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="#"><i class="fa-brands fa-instagram"></i>
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box"><img class="rounded-circle" src="img/team-member3 .jpg">
                            <h3 class="name">Sumaya Akter</h3>
                            <p class="title">Frontend -Developer</p>
                            
                            <div class="social">
                              <a href="#">
                                <i class="fa-brands fa-facebook"></i>
                              </a>
                              <i class="fa-brands fa-twitter"></i>
                              </a>
                              <a href="#"><i class="fa-brands fa-instagram"></i>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="testimonials text-center">

          <div class="container">
            <h3>Testimonials</h3>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="card border-light bg-light text-center">
                  <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
                  <div class="card-body blockquote">
                    <p class="card-text">"Launching our online furniture store was a bold move, but with the amazing team we built, it turned out to be a huge success. We're proud to offer a diverse selection of high-quality furniture, delivered quickly and conveniently, all while providing exceptional customer service. Seeing the positive feedback from our customers and the growth we've achieved fills me with immense satisfaction."</p>
                    <footer class="blockquote-footer"><cite title="Source Title">CEO, Sumaya Akter, FurniFrenzy</cite></footer>
                  </div>
                </div>
              </div>
      
              <div class="col-md-6 col-lg-4">
                <div class="card border-light bg-light text-center">
                  <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
                  <div class="card-body blockquote">
                    <p class="card-text">"From the beginning, we envisioned creating an online furniture shopping experience that was both easy and enjoyable. We poured our passion for design and functionality into every aspect of the website and service, and it's incredibly rewarding to see customers finding the perfect pieces for their homes and businesses. The dedication of our team and the trust of our customers are what truly drive us forward."</p>
                    <footer class="blockquote-footer"><cite title="Source Title">Co-Founder, Zara Zamman, FurniFrenzy.</cite></footer>
                  </div>
                </div>
              </div>
      
              <div class="col-md-6 col-lg-4">
                <div class="card border-light bg-light text-center">
                  <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
                  <div class="card-body blockquote">
                    <p class="card-text">"Furni-Frenzy is a fast-growing Global Furniture Brand that caters to the customers across geographies. Originated in Bangladesh and in the hand of a family who is considered to be the game changer in country’s furniture industry, Furni-Frenzy is best known for its inimitable design, extraordinary craftsmanship and unparalleled quality."</p>
                    <footer class="blockquote-footer"><cite title="Source Title">Founder, Sumaya Akter, FurniFrenzy.</cite></footer>
                  </div>
                </div>
              </div>
      
            </div>
          </div>
      
        </div>
        </section>