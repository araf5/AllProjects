<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

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
            <a href="buy.php">buy</a>
            <a href="payment.php">Payment</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <!-- Header Section Ends -->

    <div class="heading" style="background: url(Image/IT.avif) no-repeat ;">
        <h1>Pay now</h1>

    </div>


    <!-- Booking section start here  -->

    <div class="form">
        <form action="payment.php">
            <div>
                <h3>Name:</h3>
                <input type="text" placeholder="Enter your name">
            </div>
            <div>
                <h3>Email:</h3>
                 <input type="email" placeholder="Enter your email">
            </div>
            <div>
                  <h3>Phone:</h3>
                <input type="phone" placeholder="Enter your number">
            </div>
            <div>
            <h3>Description:</h3>
                <textarea name="" id="" cols="30" rows="20"></textarea>
            </div>
            <input type="submit" value="submit" class="btn" name="send">
        </form>
    </div> <br>
    <!-- Booking section ends here  -->









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