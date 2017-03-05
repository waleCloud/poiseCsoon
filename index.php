<?php
if( isset($_POST['submit']) )
{

  $mysqli = new mysqli("localhost", "root", "", "poiseng");
  if($mysqli->connect_error){
    echo "error mysqliecting to database: ".mysqli_error();
  }
  else
  {
    //$_POST = (array) $_POST;
    
    
    // prepare and bind
    if(!$stmt = $mysqli->prepare("INSERT INTO contact_us (firstname, lastname, org, tel, email, how_contact, when_contact, subject, msg, date_reg) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if(!$stmt->bind_param("ssssssssss", $firstname, $lastname, $org, $tel, $email, $how_contact, $when_contact, $subject, $msg, $date))
    {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    // set parameters and execute
    $firstname = $_POST['firstname'];
    $lastname = $_POST['surname'];
    $org = $_POST['org'];
    $tel = $_POST['tel'];
    $email = $_POST['email']; 
    $how_contact = $_POST['how_contact'];
    $when_contact = $_POST['when_contact'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    $date = date("d-m-Y");

    if(!$stmt->execute())
      { echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error; }

    // the message
$msg = "EMAIL: $email <br> NAME: $firstname $lastname <br> PHONE: $tel <br> Organization: $org <br> Preferred contact: $how_contact <br>
Time to contact: $when_contact <br> SUBJECT: $subject <br> MESSAGE: $msg <br> Date: $date.";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("poise@poisenigeria.org","New Message from poise one pager",$msg);
  }

}

?>
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
<title>Poise nigeria</title>
<meta name="description" content="">
<meta name="author" content="WebThemez">
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link href="css/animate.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/style.css" />
<link href="font/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
  #smiley:after {
  content: '\1F60A';
  color:red;
}
</style>
</head>

<body>
<nav id="mainNav">
  <div id="menuToggle"><i class="fa fa-bars"></i></div>
  <ul class="menuLinks">
    <li class="active" id="firstLink"><a href="#home" class="scroll-link">Home</a></li>
    <li><a href="#aboutUs" class="scroll-link">About Us</a></li>
    <li><a href="#contactUs" class="scroll-link">Contact us</a></li>
  </ul>
</nav>
<!--/.header-->
<div id="#top"></div>
<section id="home">
  <div class="banner-container">
    <div class="container">
      <div class="row">
        <div class="" style="text-align: center;"> <img width="500" src="images/poise3.png" alt="POISE"/> </div>
      </div>
      <div class="heading text-center">
        <h2 id="smiley">We are reconstructing to serve you better </h2>
        <strong>Stay tuned for something amazing</strong> </div>
      <!-- <div class="countdown styled"></div> -->


      <div id="time_countdown" class="time-count-container">

          
        <div class="row">
  <div class="col-sm-4"><a href="#home" class="scroll-link btn btn-secondary">Home</a></div>
  <div class="col-sm-4"><a href="#aboutUs" class="scroll-link btn btn-secondary">About Us</a></div>
  <div class="col-sm-4"><a href="#contactUs" class="scroll-link btn btn-secondary">Contact Us</a></div>
</div>


    </div>
  </div>
</section>
<section id="aboutUs">
  <div class="container">
    <div class="row feature design">
      <div class="six columns right">
        <h2>Our Company</h2>
        <p>Poise Nigeria Limited is a Consultancy and Training organization with a first rate, dynamic and highly adaptable training package.</p>
        <p>Poise Nigeria is about Total Personality Development &amp; Impression Management; we create class &amp; brand people.</p>
        <p>Poise Nigeria is certified by The Protocol School of Washington, USA, which is an international consulting firm that specialises in international protocol, etiquette certification and training.</p>
        <p>Poise Nigeria was recently one of the beneficiaries of Nigeria’s 50 fastest growing companies. With a growth rate of 181% in the period of 2009-2011, Poise Nigeria has been awarded the 20th fastest growing company on the listed organisations by AllWorld Network International.</p>
      </div>
      <div class="six columns feature-media left"> <img width="700" height="400" src="images/phouse.jpg" alt=""> </div>
    </div>
  </div>
</section>
<section id="contactUs" class="contact-parlex">
  <div class="parlex-back">
    <div class="container">
      <div class="row">
        <div class="heading text-center"> 
          <!-- Heading -->
          <h2>Contact Poise Nigeria</h2>
        </div>
      </div>
      <div class="row mrgn30">
	  <div id="contactfrm">
	  <form method="POST" id="contact-form" class="form-horizontal" action="" onSubmit="alert('Thank you for your feedback!');">
							<div class="col-sm-12">
							<div class="form-group">
							<input type="text" name="firstname" id="Name" class="form-control wow fadeInUp" placeholder="Name" required="true"/>
							</div>
              <div class="form-group">
              <input type="text" name="surname" id="SName" class="form-control wow fadeInUp" placeholder="Surname" required="true"/>
              </div>
              <div class="form-group">
              <input type="text" name="org" id="org" class="form-control wow fadeInUp" placeholder="organization" required="true"/>
              </div>
              <div class="form-group">
              <input type="tel" name="tel" id="tel" class="form-control wow fadeInUp" placeholder="0801 234 5678" required="true"/>
              </div>
							<div class="form-group">
							<input type="email" name="email" id="Email" class="form-control wow fadeInUp" placeholder="Email" required="true"/>
							</div>
              <label for="how_contact">How can we contact you?</label>	
              <div class="form-group">
                <select name="how_contact" id="how_contact" class="form-control wow fadeInUp" required="true">
                  <option value="email" style="color: red;" class="form-control">Email ?</option>
                  <option value="phone" style="color: red;" class="form-control">Phone ?</option>
                </select>
              </div>
              <label for="when_contact">When can we contact you?</label>  
              <div class="form-group">
                <input type="date" name="when_contact" id="date" class="form-control">
              </div>
              <label for="subject">Subject</label>  
              <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="subject">
              </div>	
              <label for="Message">Enquiry</label>  
							<div class="form-group">
							<textarea name="msg" rows="10" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="I'm a young Biochemistry graduate and would love to be a part of your Making An Impact Project. I'd like to know what necessary steps are needed to enroll. I look forward to hearing from you soon. Many thanks." required></textarea>
							</div>
							<div class="form-group">
							<input type="submit" name="submit" value="Submit" class="btn btn-success wow fadeInUp" />
							</div>
							</div>
						</form>		
				  </div>
       
      </div>
      <h2>Download our brochure</h2>
          <p>Stay upto date and afreshed with our 2017 Brochure.</p>
          <a class="btn btn-danger" href="">Click here to download</a>
    </div>
    <!--/.container--> 
  </div>
</section>
<footer>
  <div class="container">
    <div class="social text-center"> <a href="http://twitter.com/poise_nigeria"><i class="fa fa-twitter"></i></a> <a href="http://facebook.com/poisegroup"><i class="fa fa-facebook"></i></a> <a href="http://plus.google.com/poisenigeria"><i class="fa fa-google"></i></a><a href="http://instagram.com/poisenigeria"><i class="fa fa-instagram"></i></a> </div>
    <div class="clear"></div>
    <!--CLEAR FLOATS--> 
  </div>
</footer>
<!--/.page-section-->
<section class="copyright">
  <div class="container">
    <div class="row">
      <p>
        <p><strong>Address:</strong> Plot 5A, Pinnock Beach Estate, Lekki, Lagos Nigeria </p>
        <p><strong>Email:</strong> poise@poisenigeria.org </p>
        <p><strong>Phone:</strong> 01-3427871</p>
      </p>
      <div class="col-sm-12 text-center"> Copyright 2017 | All Rights Reserved <a href="http://poisenigeria.org">Poise Nigeria</a> </div>
    </div>
    <!-- / .row --> 
  </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 

<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]--> 
<script src="js/modernizr-latest.js"></script> 
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/jquery.nav.js" type="text/javascript"></script> 
<script src="js/waypoints.js"></script>
<script src="js/Backstretch.js" type="text/javascript"></script> 
<script src="js/custom.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery.countdown.js"></script>
</body>
</html>
