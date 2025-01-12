<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Live Chat Code Start Here  -->

    <!-- Start of Async Drift Code -->
<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('6fgxnma6xh32');
</script>
<!-- End of Async Drift Code -->

    <!-- Live Chat Code Ends Here  -->

    <!-- Swiper CSS Link -->
    <link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    
    <!-- Header Section Start -->
 
    <section class="header">
        <a href="home.pho" class="logo">ATN IT FIRM</a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="service.php">service</a>
            <a href="buy.php">Buy</a>
            <a href="payment.php">Payment</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <!-- Header Section End -->


    <!-- home section starts here -->
        <section class="home">
            <div class=" swiper home-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide" style="background: url(Image/IT-Technology1.jpg) no-repeat">
                        <div class="content">
                            <span>explore, invention</span>
                            <h3>get involved with the world technology</h3>
                            <a href="service.php" class="btn">Find more</a>
                        </div>
                    </div>

                    <div class="swiper-slide slide" style="background: url(Image/IT-Technology2.jpg) no-repeat">
                        <div class="content">
                            <span>explore, invention</span>
                            <h3>Know about new technology</h3>
                            <a href="service.php" class="btn">Find more</a>
                        </div>
                    </div>

                    <div class="swiper-slide slide" style="background: url(Image/IT-Technology3.jpg) no-repeat">
                        <div class="content">
                            <span>explore, invention</span>
                            <h3>Make your visit our website remarkable</h3>
                            <a href="service.php" class="btn">Find more</a>
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </section>
    <!-- home section ends here -->

    <!-- Service section starts -->
        <section class="service">
            <h1 class="heading-titile">our services</h1>
            <div class="box-container">

                <div class="box">
                    <img src="Image/web-design.png" alt="">
                    <h3>Web-Design</h3>
                </div>

                <div class="box">
                    <img src="Image/facebook-marketing.png" alt="">
                    <h3>Facebook Marketing</h3>
                </div>

                <div class="box">
                    <img src="Image/graphic-design.png" alt="">
                    <h3>Graphics-Design</h3>
                </div>

                <div class="box">
                    <img src="Image/digital-marketing.png" alt="">
                    <h3>Digital Marketing Service</h3>
                </div>

                <div class="box">
                    <img src="Image/social-media-marketing.png" alt="">
                    <h3>Social Media Marketing</h3>
                    
                </div>

                <div class="box">
                    <img src="Image/website-maintanance.png" alt="">
                    <h3>Website Maintanance Service</h3>
                </div>

            </div>
        </section>
    <!-- Service section ends -->

    <!-- Home about section starts -->
        <section class="home-about">
            <div class="image">
                <img src="Image/conference.webp" alt="">
            </div>

            <div class="content">
                <h3>about us</h3>
                <p>
                    Welcome to our website <b>"ATN IT Firm"</b>, where innovation meets excellence in the world of technology.
                     Founded on the principles of passion, expertise, and commitment, we stand as a beacon of 
                     cutting-edge solutions and unparalleled service.
                     At ATN, we are not just a team of professionals; we are a collective
                      force of visionary minds dedicated to transforming businesses through technology. 
                      Empowering businesses to thrive in the digital landscape is our mission.
                      Join us on the journey to technological excellence. At our ATN IT Firm,
                       we turn ideas into reality, challenges into opportunities, and aspirations into achievements.
                    </p>
                   <a href="about.php" class="btn">Read More</a>
            </div>

        </section>
    <!-- Home about section ends -->

    <!-- Home service section starts here -->
        <section class="home service">
            <h1 class="heading">Our services</h1>

            <div class="box-container">

                <div class="box">
                    <div class="image">
                        <img src="Image/IT-Technology4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Business & Invention</h3>
                        <p>Our focus is on meeting new challenges and businesses. innovation
                            new things is also the part of this.
                        </p>
                        <a href="buy.php" class="btn">buy new</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="Image/IT-Technology4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Business & Invention</h3>
                        <p>Our focus is on meeting new challenges and businesses. innovation
                            new things is also the part of this.
                        </p>
                        <a href="buy.php" class="btn">buy now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="Image/IT-Technology4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Business & Invention</h3>
                        <p>Our focus is on meeting new challenges and businesses. innovation
                            new things is also the part of this.
                        </p>
                        <a href="buy.php" class="btn">buy now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="Image/IT-Technology4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Business & Invention</h3>
                        <p>Our focus is on meeting new challenges and businesses. innovation
                            new things is also the part of this.
                        </p>
                        <a href="buy.php" class="btn">buy now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="Image/IT-Technology4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Business & Invention</h3>
                        <p>Our focus is on meeting new challenges and businesses. innovation
                            new things is also the part of this.
                        </p>
                        <a href="buy.php" class="btn">buy now</a>
                    </div>
                </div>

            </div>
            <div class="load-more"><a href="service.php" class="btn">Load more</a></div>
        </section>
    <!-- Home service section ends here -->

    <!-- Home offer Section starts -->
     <section class="home-offer">
        <div class="content">
            <h3>upto 50% off</h3>
            <p>We are giving upto 50% offer on our product on the occasion of Eid</p>
            <a href="buy.php" class="btn">buy now</a>
        </div>
     </section>
    <!-- Home offer Section starts -->








    <!-- Footer Start Here -->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Quick links</h3>
                    <a href="home.php"> <i class="fas fa-angle-right"></i>home</a>
                    <a href="about.php"> <i class="fas fa-angle-right"></i>about</a>
                    <a href="package.php"> <i class="fas fa-angle-right"></i>service</a>
                    <a href="book.php"> <i class="fas fa-angle-right"></i> buy</a>
                </div>

                <div class="box">
                    <h3>Extra links</h3>
                    <a href="#"> <i class="fas fa-angle-right"></i>Ask Question</a>
                    <a href="#"> <i class="fas fa-angle-right"></i>About Us</a>
                    <a href="#"> <i class="fas fa-angle-right"></i>Privacy Policy</a>
                    <a href="#"> <i class="fas fa-angle-right"></i>Terms of Use</a>  
                </div>

                <div class="box">
                    <h3>Contact info</h3>
                    <a href="#"> <i class="fas fa-phone"></i>+8801758752528</a>  
                    <a href="#"> <i class="fas fa-phone"></i>+8801710478859</a>  
                    <a href="#"> <i class="fas fa-phone"></i>+8801910478859</a>  
                    <a href="#"> <i class="fas fa-envelope"></i>nazrulislam.cse28@gmail.com</a>  
                    <a href="#"> <i class="fas fa-map"></i>Gulistan, Bangladesh - 400106</a>  
                </div>

                <div class="box">
                    <h3>Follow us</h3>
                    <a href="#"> <i class="fab fa-facebook-f"></i>Facebook</a>
                    <a href="#"> <i class="fab fa-twitter"></i>Twitter</a>
                    <a href="#"> <i class="fab fa-instagram"></i>Instagram</a>
                    <a href="#"> <i class="fab fa-linkedin"></i>Linkedin</a>
                </div>
                
            </div>

            <div class="credit">Created by<span> Mr.Nazrul Islam, Mr. Arafat, Ms. Tamanna</span> | all rights reserved!</div>

        </section>
    <!-- Footer End Here -->

    
    <!-- Swiper Js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Custom Js link -->
    <script src="main.js"></script>


</body>
</html>