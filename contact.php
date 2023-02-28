<?php

    session_start();
    
    require_once 'connect.php';
    
    function authenticated() {
        // make sure user is authenticated
    }

    if(isset($_POST['message_btn'])) {
        if(authenticated())
            redirect('index.php');
    
        $f_name = strip_tags($_POST['f_name']);
        $l_name = strip_tags($_POST['l_name']);
        $subject = strip_tags($_POST['subject']);
        $email = strip_tags($_POST['email']);
        $message = strip_tags($_POST['message']);
       
        $f_name = $DBcon->real_escape_string($f_name);
        $l_name = $DBcon->real_escape_string($l_name);
        $subject = $DBcon->real_escape_string($subject);
        $email = $DBcon->real_escape_string($email);
        $message = $DBcon->real_escape_string($message);

        $check_email = $DBcon->query("SELECT email FROM contact_messages WHERE email='$email'");
        $count=$check_email->num_rows;
    
        if ($count==0){
            
            $query = "INSERT INTO contact_messages(f_name,l_name,subject,email,message) VALUES('$f_name','$l_name','$subject','$email','$message')";
    
    
            if ($DBcon->query($query)) {
                $msg = "<div class='alert alert-success'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Message sent successfully !   
                        </div>";
                        //header("Location: index.php");
            }else {
                $msg = "<div class='alert alert-danger'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while sending message !
                        </div>";
            }
            
        } else { 
            $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while sending message !
                    </div>";
                
        }
        
        $DBcon->close();
    }
?>


<?php
include('includes/header.php');
?>


   <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/bg/green.png);">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Contact Us</h2>
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->

      <?php
      if (isset($msg)) {
         echo $msg;
      }
      ?>
      <!-- ts intro start -->
      <section style="background-color:#fff;" class="ts-contact">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h2 class="section-title text-center">
                     <span>Get Information</span>
                     Ministry Of Information and Communicaton
                  </h2>
               </div><!-- col end-->
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div style="height:250px;" class="single-intro-text single-contact-feature">
                     <h3 class="ts-title">Venue</h3>
                     <p>
                     3rd Floor, State Secretariate Port Harcourt, Rivers State, Nigeria
                     </p>
                     <br>
                     <h3 class="ts-title">Ministry executive</h3>
                     <p>
                     Dr. Austin Tam George, <span style="font-size:12px;"> Commissioner</span>
                     </p>
                     <span class="count-number fa fa-paper-plane"></span>
                  </div><!-- single intro text end-->
                  <div class="border-shap left"></div>
               </div><!-- col end-->
               
            </div><!-- row end-->
         </div><!-- container end--> 
      </section>
      <!-- ts contact end-->

      <section  style="background-color:#fff;" class="ts-contact-map no-padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12 no-padding">
                  <div class="mapouter">
                     <div class="gmap_canvas">
								<!-- <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Park%20Street%2C%20Jacksonville%2C%20IL%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"
									frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> -->
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63611.140799195215!2d6.9722052693478584!3d4.8221161814521345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1069cbf89b2970ed%3A0xca3c6c2c2913edda!2sRivers%20State%20Ministry%20Of%20Information%20And%20Communication%20Technology!5e0!3m2!1sen!2sng!4v1582902150858!5m2!1sen!2sng" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>            
                              <!-- <a href="https://www.pureblack.de">werbeagentur</a></div> -->
           
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section style="background-color:#fff;" class="ts-contact-form">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h2 class="section-title text-center">
                     <span>Have Questions?</span>
                     Send Message
                  </h2>
               </div><!-- col end-->
            </div>
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <form id="contact-form" class="contact-form" method="post" enctype="multipart/form-data">
                     <div class="error-container"></div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-name" placeholder="First Name" name="f_name" id="f_name"
                                 type="text" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-name" placeholder="Last Name" name=" l_name" id="l_name"
                                 type="text" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-subject" placeholder="Subject" name="subject" id="subject"
                                 type="text" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-email" placeholder="Email" name="email" id="email"
                                 type="email" required>
                           </div>
                        </div>

                     </div>
                     <div class="form-group">
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder="Your message...*"
                           rows="6" required></textarea>
                     </div>
                     <div class="text-center"><br>
                        <button class="btn" id="message_btn" name="message_btn" type="submit"> Send Message</button>
                     </div>
                  </form><!-- Contact form end -->
               </div>
            </div>
         </div>
         <div class="speaker-shap">
            <img class="shap1" src="images/shap/home_schedule_memphis2.png" alt="">
         </div>
      </section>
        
        <?php
            include('includes/footer.php');
        ?>