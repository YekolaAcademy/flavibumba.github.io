<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
    $details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));
    
    if ($name == "" || $email == "" || $details == "") {
        echo "Please fill in the required fields: Name, Email and Details";
        exit;
    }
    if ($_POST["address"] != "") {
        echo "Bad form input";
        exit;
    }
    
    require("inc/phpmailer/class.phpmailer.php");
    
    $mail = new PHPMailer;
    
    if (!$mail->ValidateAddress($email)) {
        echo "Invalid Email Address";
        exit;
    }
    
    $email_body = "";
    $email_body .= "Name " . $name . "\n";
    $email_body .= "Email " . $email . "\n";
    $email_body .= "Details " . $details . "\n";
    
    $mail->setFrom($email, $name);
    $mail->addAddress('diversityunited.fc@gmail.com', 'DiversityUnitedFC');     // Add a recipient
    
    $mail->isHTML(false);                                  // Set email format to HTML
    
    $mail->Subject = 'New message from DiversityUnitedFC Site ' . $name;
    $mail->Body    = $email_body;
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    
    
    header("location:contact.php?status=thanks");
}


//$pageTitle = "";


include("inc/header.php"); ?>

	<section id="content" role="main">
  <article id="contact" class="cf">
    <section class="social">
    <h2>Feel free to call us.</h2>
    <p><a href="tel:07949812463" title="ring ring ring" class="phone">079-4981-2463</a></p>
    <h2>Or, maybe you're the more social type...</h2>
    <ul class="connect">
    <li><a href="http://twitter.com/" title="follow us on Twitter" class="twitter">Twitter</a></li>
    <li><a href="http://www.flickr.com/" title="Join our Flickr group" class="flickr">Flickr</a></li>
    <li><a href="https://www.facebook.com/DiversityUnitedFC/?ref=bookmarks" title="Be our friend...PLEASE" class="facebook">Facebook</a></li>
    <li><a href="https://www.youtube.com/channel/UCplayer-containern0rBi32XbEAKyeKyJrNg" class="youtube">YouTube</a></li>
    </ul>
    </section>
    <section class="contact">
    <h2>Or drop us a line....</h2>
	 <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
            echo "<p>Thanks for the email! We will be in touch shortly!</p>";
        } else { ?>
    <form id="frmContact" action="contact.php" method="post" >
    <fieldset title="About you">
    <legend><span>About you</span></legend>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" tabindex="10" placeholder="Your name" required>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" tabindex="20" placeholder="valid email" required>
	  
    </fieldset>
    <fieldset title="What, exactly then, are you after?">
    <legend><span>What, exactly then, are you after?</span></legend>

         <label for="details">Your message:</label>
         <textarea id="details" name="details" tabindex="80" rows="7" placeholder="This is where your thoughts go">
         </textarea>
         <input type="submit" name="submit" id="submit" value="Send Message" tabindex="90">
    </fieldset>
    </form>
	 <?php } ?>
    </section>
  </article>
		<aside role="complementary">
		
      	<h3 class="staff">Secretary</h3>
	<ul class="list">
	<li>
	<strong>Flavi Bumba</strong></li>
	<li>
	<strong>Email:</strong> flavib@ymail.com</li>
	</ul>
	<hr/>
	<h3 class="staff">Fixture Secretary</h3>
	<ul class="list">
	<li>
	<strong>Arnold Fombasso </strong></li>
	<li>
	<strong>Email:</strong> Arney52hotmail.co.uk</li>
	</ul>
	<hr/>
	<h3 class="staff">Treasurer</h3>
	<ul class="list">
	<li>
	<strong>Raymond Pietersen</strong></li>
	<li>
	<strong>Email:</strong>diversityunited.fc@gmail.com</li>
	</ul>
	<hr/>
	<h3 class="staff">Chairman</h3>
	<ul class="list">
	<li>
	<strong>Aidah Aboubacar</strong></li>
	</ul>
	<hr/>
    <section class="contest">
       <h2 class="facebookheader">Find us on Facebook</h2>
	  <h2 class="hidden">Find us on social media</h2>
    
	 <div class="facebookpage"> 
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDiversityUnitedFC%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"  -->
		 width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"> 
		 </iframe> 
	</div> 
	  </section>
  </aside>
</section>		  
			  
</section>
	
</article>







<?php include("inc/footer.php"); ?>