<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

        main {

            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
            font-weight: 800;
        }

        p {

            text-align: justify;
            text-justify: inter-word;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .ss {
            color: #2B2D2D;
            line-height: 1.6;
        }

        .m {
            color: #333;
            font-weight: 900;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>learntocode.com</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php"><span> ATN It Firm</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home.php">Home</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="services.php">Services</a></li>
          <!--<li><a href="#feature">Features</a></li>-->
          <li><a href="contact.php" style="color:green">Contact Us</a></li>
          <li><a href="aboutus.php">About us</a></li>


          <li><a href="/loginltc.php" data-target="#login" data-toggle="modal">Log in</a></li>
          <li class="btn-trial"><a href="/signupltc.php" data-target="#signin" data-toggle="modal">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  
  
  <!--Login-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:white;">Login</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Log in to start your session</p>
            <div class="form-group">
              <form id="loginForm" action="loginltc.php" method="get">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pwd" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox" id="loginrem"> Remember Me
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Log In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Login-->


  <!--    signup form-->
  <div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:white;">Create Account</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Sign In to start your session</p>
            <div class="form-group">
              <form name="" id="loginForm" method="post" action="signupltc.php">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class=" form-control-feedback glyphicon glyphicon-user" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- mail -------------->
                  <input class="form-control" placeholder="E-mail" type="text" autocomplete="off" name="email" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-envelope form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pass" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox" id="loginrem"> Remember Me
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <br>
  <br>
    <header>
        <div style="font-weight: 900; color:white; font-size: 100px;" >About Us</div>
        
    </header>

    <main>
        <section>
            <h2>Our Success Story</h2>
            <div class="ss">
                ATN IT Firm's success story is one defined by innovation, dedication, and client satisfaction. From its humble beginnings, the firm has emerged as a trailblazer in the competitive IT industry, thanks to a visionary leadership team and a talented group of professionals. The firm's commitment to staying at the forefront of technological advancements has led to the successful delivery of cutting-edge solutions, ranging from web development and database management to user-centric design.
                ATN IT Firm has cultivated a dynamic environment that thrives on creativity and excellence. This commitment to excellence, combined with a client-centric approach, has garnered trust from a diverse clientele, resulting in sustained growth and recognition as a reliable partner in the digital landscape.
            </div>
        </section>
        <br>
        <br>
        <section>
            <h2>Meet the dynamic trio leading innovation and excellence at <b>ATN IT Firm</b>:</h2>
            <div class="ss">
                As our Lead Web Developer, <b class="m">Arafat</b> is the driving force behind the development of cutting-edge web applications. With a keen eye for detail and a passion for creating seamless user experiences, Arafat leads our web development team in crafting responsive and innovative solutions. <br>
                <b class="m">Nazrul</b> is the linchpin of our data infrastructure, serving as the Database Engineer at ATN IT Firm. With a deep understanding of database architecture and management, Nazrul ensures the reliability and efficiency of our data systems. <br>
                <b class="m">Jubira</b>, our Web & Software Designer, brings creativity and innovation to the forefront of our projects. With an artistic flair and a focus on user-centric design.
            </div>
        </section>
    </main>

    <footer>
        <div style="color: blue;"> 
        Contact us at: atnitfirm.com
        </div>
    </footer>

    <script>
        // You can add JavaScript functionality here if needed
    </script>
</body>

</html>