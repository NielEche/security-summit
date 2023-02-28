<?php

   //require_once 'sendEmails.php';

    session_start();
    
    require_once 'connect.php';
    
    function authenticated() {
        // make sure user is authenticated
    }

    if(isset($_POST['btn-register'])) {
        if(authenticated())
            redirect('index.php');
    
        $f_name = strip_tags($_POST['f_name']);
        $l_name = strip_tags($_POST['l_name']);
        $email = strip_tags($_POST['email']);
        $phone = strip_tags($_POST['phone']);
        $company = strip_tags($_POST['company']);
        $job_title = strip_tags($_POST['job_title']);
       
        $f_name = $DBcon->real_escape_string($f_name);
        $l_name = $DBcon->real_escape_string($l_name);
        $email = $DBcon->real_escape_string($email);
        $phone = $DBcon->real_escape_string($phone);
        $company = $DBcon->real_escape_string($company);
        $job_title = $DBcon->real_escape_string($job_title);

        $check_email = $DBcon->query("SELECT email FROM attendees WHERE email='$email'");
        $count=$check_email->num_rows;
    
        if ($count==0){
            
            $query = "INSERT INTO attendees(f_name,l_name,email,phone,company,job_title) VALUES('$f_name','$l_name','$email','$phone','$company','$job_title')";
    
    
            if ($DBcon->query($query)) {
                  //sendVerificationEmail($email);

                $msg = "<div class='alert alert-success'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully Registered!
                            Thank you for registering , See you at the Summit !   
                        </div>";
                        //header("Location: index.php");
            }else {
                $msg = "<div class='alert alert-danger'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while adding details !
                        </div>";
            }
            
        } else { 
            $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry details not valid !
                    </div>";
                
        }

        
        $DBcon->close();
    }
?>

<?php 
    include('includes/header.php')
?>

<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/bg/green.png);";>
			<!-- Subpage title start -->
			<div class="page-banner-title">
				<div class="text-center">
					<h2>Register</h2>
				</div>
			</div><!-- Subpage title end -->
		</div><!-- Page Banner end -->

      <?php
      if (isset($msg)) {
         echo $msg;
      }
      ?>
      <section style="background-color:#fff;" class="ts-contact-form">
         <div class="container">
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
                              <input class="form-control form-control-name" placeholder="Last Name" name="l_name" id="l_name"
                                 type="text" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-email" placeholder="Email" name="email" id="email"
                                 type="email" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-email" placeholder="Phone Number" name="phone" id="phone"
                                 type="phone" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control form-control-subject" placeholder="Company" name="company" id="company"
                                type="text" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-subject" placeholder="Job Title" name="job_title" id="job_title"
                                 required>
                           </div>
                        </div>
                     </div>
                    <div class="text-center"><br>
                        <button class="btn " name="btn-register" id="btn-register" type="submit"> Register</button>
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