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
<title>Poise Nigeria</title>
<meta name="description" content="">
<meta name="author" content="">
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
    <li><a href="#brochure" class="scroll-link">Brochure</a></li>
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
        <strong>Stay tuned for something amazing</strong>
      <!-- <div class="countdown styled"></div> -->
<div class="row">
  <div class="col-sm-4"><a href="#aboutUs" class="scroll-link btn btn-secondary">About Us</a></div>
  <div class="col-sm-4"><a href="#contactUs" class="scroll-link btn btn-secondary">Contact Us</a></div>
  <div class="col-sm-4"><a href="#brochure" class="scroll-link btn btn-secondary">2017 Brochure</a></div>
</div>
</div>
  </div>
</section>
<p></p><p></p><p><p><p>
<section id="aboutUs">
  <div class="container">
    <div class="row feature design">
      <div class="six columns right">
        <h2>Our Company</h2>
        <p>Poise Nigeria Limited is a Consultancy and Training Organization with a first rate, dynamic and highly adaptable training package.</p>
        <p>Poise Nigeria is about Total Personality Development &amp; Impression Management; we create class &amp; brand people.</p>
        <p>Poise Nigeria is certified by The Protocol School of Washington, USA, which is an international consulting firm that specialises in international protocol, etiquette certification and training.</p>
        <p>Poise Nigeria was recently one of the beneficiaries of Nigeria’s 50 fastest growing companies. With a growth rate of 181% in the period of 2009-2011, Poise Nigeria has been awarded the 20th fastest growing company on the listed organisations by AllWorld Network International.</p>
      </div>
      <div class="six columns feature-media left" style="text-align: center;" > <img style="text-align: center;" src="images/phouse.jpg" alt=""> </div>
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
          <p><strong>Address:</strong> Plot 5A, Pinnock Beach Estate, Lekki, Lagos Nigeria </p>
          <p><strong>Email:</strong> poise@poisenigeria.org </p>
          <p><strong>Phone:</strong> 01-3427870</p>
        </div>
      </div>
      <div class="row mrgn30">
	  <div id="contactfrm">
	   <iframe id="JotFormIFrame-70814231801547" onload="window.parent.scrollTo(0,0)" allowtransparency="true" src="https://form.myjotform.com/70814231801547" frameborder="0" style="width:100%; height:539px; border:none;" scrolling="no"> </iframe> <script type="text/javascript"> var ifr = document.getElementById("JotFormIFrame-70814231801547"); if(window.location.href && window.location.href.indexOf("?") > -1) { var get = window.location.href.substr(window.location.href.indexOf("?") + 1); if(ifr && get.length > 0) { var src = ifr.src; src = src.indexOf("?") > -1 ? src + "&" + get : src + "?" + get; ifr.src = src; } } window.handleIFrameMessage = function(e) { var args = e.data.split(":"); if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[2]); } else { iframe = document.getElementById("JotFormIFrame"); } if (!iframe) return; switch (args[0]) { case "scrollIntoView": iframe.scrollIntoView(); break; case "setHeight": iframe.style.height = args[1] + "px"; break; case "collapseErrorPage": if (iframe.clientHeight > window.innerHeight) { iframe.style.height = window.innerHeight + "px"; } break; case "reloadPage": window.location.reload(); break; } var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false; if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) { var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)}; iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*"); } }; if (window.addEventListener) { window.addEventListener("message", handleIFrameMessage, false); } else if (window.attachEvent) { window.attachEvent("onmessage", handleIFrameMessage); } </script>
	  </div>
      </div>
      <section id="brochure">
         <h2>Download our brochure</h2>
          <p>Stay upto date and afreshed with our 2017 Brochure.</p>
          <a class="btn btn-danger" href="https://drive.google.com/open?id=0B4A4gr4J9tIdZFZGanR1MnJ6czg">Click here to download</a>
      </section>
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
        <p><strong>Phone:</strong> 01-3427870</p>
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
