<script type="text/javascript">
function myFunction()
{
  alert("Username is already taken."); // this is the message in ""
}
function myFunction1()
{
  alert("Username is invalid."); // this is the message in ""
}
function myFunction2()
{
  alert("Email is invalid."); // this is the message in ""
}
function myFunction3()
{
  alert("Zipcode is invalid."); // this is the message in ""
}
function myFunction4()
{
  alert("City is invalid."); // this is the message in ""
}
function myFunction5()
{
  alert("Address is invalid."); // this is the message in ""
}
</script>

<?php

$link = mysqli_connect("localhost", "root", "p", "phpmyadmin");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST["btnSubmit"]) && isset($_POST['usernameInput']) && isset($_POST['passwordInput']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zipcode'])){

    $usernameInsert = $_POST['usernameInput'];
    $passwordInsert = $_POST['passwordInput'];
    $emailInsert = $_POST['email'];
    $addressInsert = $_POST['address'];
    $stateInsert = $_POST['state'];
    $cityInsert = $_POST['city'];
    $zipcodeInsert = $_POST['zipcode'];

    $sql = "SELECT * FROM siteusers WHERE name = '".$usernameInsert."'";
    $result = mysqli_query($link,$sql);

    if ( preg_match('/^[a-zA-Z0-9]+$/', $usernameInsert)==false ){
      echo '<script>myFunction1()</script>';
    }
    else if (preg_match('/^[a-zA-Z\s]+$/', $cityInsert)==false){
      echo '<script>myFunction4()</script>';
    }
    else if (!filter_var($emailInsert, FILTER_VALIDATE_EMAIL)){
      echo '<script>myFunction2()</script>';
    }
    else if ( preg_match('/^[0-9]+$/', $zipcodeInsert) == false) {
      echo '<script>myFunction3()</script>';
    }
    else if ( preg_match('/^[\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\.]+$/', $addressInsert) == false){
      echo '<script>myFunction5()</script>';
    }
    else if (mysqli_num_rows($result) >= 1 ) {
      echo '<script>myFunction()</script>';
    }
    else {
      $sql = "INSERT INTO siteusers (name, email, address, city, state, zipcode, password) 
      VALUES ('$usernameInsert', '$emailInsert', '$addressInsert', '$cityInsert', '$stateInsert', '$zipcodeInsert', '$passwordInsert')";

      if(mysqli_query($link, $sql)){
          echo "Records added successfully.";
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
     // function SendMail( $ToEmail) {
      require 'PHPMailerAutoload.php';

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com;smtp1.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'altex.help@gmail.com';                 // SMTP username
      $mail->Password = 'whymeman!';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('altex.help@gmail.com', 'AltEx Support');
      $mail->addAddress($emailInsert, $usernameInsert);     // Add a recipient

      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Welcome to AltEx!';
      $mail->Body    = 'Thanks for joining! We look forward to you exploring your reality. <br> <br> Sincerely, <br> AltEx Team';
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }
    
    header("Location: login.php");
    
    }
}

// Close connection
mysqli_close($link);

?>


<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>About</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="gettemplates.co" />

  <!-- 
  //////////////////////////////////////////////////////

  FREE HTML5 TEMPLATE 
  DESIGNED & DEVELOPED by FreeHTML5.co
    
  Website:    http://freehtml5.co/
  Email:      info@freehtml5.co
  Twitter:    http://twitter.com/fh5co
  Facebook:     https://www.facebook.com/fh5co

  //////////////////////////////////////////////////////
   -->

    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>
    
  <div class="fh5co-loader"></div>
  
  <div id="page">
  <nav class="fh5co-nav" role="navigation">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-2">
          <div id="fh5co-logo"><a href="index.html">AltEx</a></div>
          <div id="slogan">Explore Your Reality.</div>
        </div>
        <div class="col-md-6 col-xs-2 text-center menu-2">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li class="has-dropdown">
              <!-- <a href="shop.html">Shop</a> -->
              <!-- <ul class="dropdown">
                <li><a href="single.html">Single Shop</a></li>
              </ul> -->
            </li>
            <!-- <li><a href="about.html">About</a></li> -->
            <!-- <li class="has-dropdown">
              <a href="services.html">Services</a>
              <ul class="dropdown">
                <li><a href="#">Web Design</a></li>
                <li><a href="#">eCommerce</a></li>
                <li><a href="#">Branding</a></li>
                <li><a href="#">API</a></li>
              </ul>
            </li> -->
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
          <ul>
            <li class="search">
              <div class="input-group">
                  <input type="text" placeholder="Search..">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                  </span>
                </div>
            </li>
            <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
          </ul>
        </div>
      </div>
      
    </div>
  </nav>

<li style="background-image: url(images/signup.jpg);">

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="signup.php">Sign Up</a></li>
        <li class="tab"><a href="login.php">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up</h1>
          
          <form action="signup.php" method="post" name="signupform"> <!--onsubmit="return validate()"-->
          <div class="field-wrap">
            <label>
              Username<span class="req"></span>
            </label>
            <input type="text"required autocomplete="on" name="usernameInput" id="usernameInput" maxlength="50" />
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req"></span>
            </label>
            <input type="email"required autocomplete="on" name="email" id="email" maxlength="50" />
          </div>
          
          <div class="field-wrap">
            <label>
              Address<span class="req"></span>
            </label>
            <input type="text"required autocomplete="on" name="address" id="address" maxlength="50" />
          </div>

          <div class="top-row">
            <div class="field-wrap">
              <label>
                City<span class="req"></span>
              </label>
              <input type="text" required autocomplete="on" name="city" id="city" maxlength="50" style="width: 250px"/>
          </div>
        
          <div class="field-wrap">
            <label>
                State<span class="req"></span>
              </label>
            <div class="select-style">
                <select name="state">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                  </select>
                </div>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Zip Code<span class="req"></span>
            </label>
            <input type="text"required autocomplete="off" name="zipcode" id="zipcode" maxlength="5" minlength="5" />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req"></span>
            </label>
            <input type="password"required autocomplete="off" name="passwordInput" id="passwordInput" minlength="8" maxlength="50"/>
          </div>
          
          <button type="submit" id="btnSubmit" name="btnSubmit" class="button button-block"/>Get Started</button>

          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
   </div> <!-- /form -->

  
  </li>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>


  <footer id="fh5co-footer" role="contentinfo">
    <div class="container">
      <div class="row row-pb-md">
        <div class="col-md-4 fh5co-widget">
          <h3>AltEx</h3>
          <p>Explore your reality.</p>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
          <ul class="fh5co-footer-links">
            <!-- <li><a href="shop.html">Shop</a></li> -->
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="signup.html">Sign up</a></li>
          </ul>
        </div>

<!--        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
          <ul class="fh5co-footer-links">
            <li><a href="#">Shop</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Handbook</a></li>
            <li><a href="#">Held Desk</a></li>
          </ul>
        </div> -->

<!--        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
          <ul class="fh5co-footer-links">
            <li><a href="#">Find Designers</a></li>
            <li><a href="#">Find Developers</a></li>
            <li><a href="#">Teams</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">API</a></li>
          </ul>
        </div>
      </div>
 -->
      <div class="row copyright">
        <div class="col-md-12 text-center">
          <!-- <p>
            <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
            <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
          </p> -->
<!--          <p>
            <ul class="fh5co-social-icons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-linkedin"></i></a></li>
              <li><a href="#"><i class="icon-dribbble"></i></a></li>
            </ul>
          </p> -->
        </div>
      </div>

    </div>
  </footer> </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
  
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Carousel -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- countTo -->
  <script src="js/jquery.countTo.js"></script>
  <!-- Flexslider -->
  <script src="js/jquery.flexslider-min.js"></script>
  
  <!-- Main -->
  <script src="js/main.js"></script>
  </body>
</html>

