
<div class="container pt-4 ">
    <div class="col-lg-12">
        <div class="container-fluid">
                <div class="card" style="border-radius:25px;" >
                    <div class="card-body">
                        <div class="fr-view">
                            <?php echo isset($_SESSION['system']['about_content']) ? html_entity_decode($_SESSION['system']['about_content']) : '' ?>
                        </div>
                    </div>
                </div>
            
           
            
            </div>
    </div>
</div>
 <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            @$name = $_POST['name'];
            @$email = $_POST['email'];
            @$subject = $_POST['subject']; 
            @$message = $_POST['message'];

                $query = "INSERT INTO message(name,email,subject,message)
                VALUES('$name','$email','$subject','$message')";
                $res = mysqli_query($con, $query);
                if (isset($res)) {
                    $success = "<div class='alert alert-success' > " . "تم الارسال بنجاح" . "</div>";
                }
            }

        ?>

       
  
        
            <div class="container">
               
                <section class="page-section" id="contact">
	 <div class="row1 justify-content-center">
                    <div class="col-lg-8 text-center">
                       
                        <h2 class="mt-0 text-white">send your message</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
		<?php
            if (isset($error)) {
                echo $error;
            } elseif (isset($success)) {
                echo $success;
            }

            ?>
		<form id="contactForm" method="POST" >
			<div class="row1 align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group">
						<!-- Name input-->
						<input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
					</div>
					<div class="form-group">
						<!-- Email address input-->
						<input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-0">
						<!-- Message input-->
						<textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="send">Send Message</button></div>
		</form>

                </section></div>