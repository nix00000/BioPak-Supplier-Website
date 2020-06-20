<?php
require_once 'includes/header.inc.php';
 ?>

<link rel="stylesheet" href="css/contact.css">



<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
        <form action="includes/email.handle.php" method="post">
            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i> Email Us</h3>
                        <p class="m-0">We try to respons as fast as we can</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <input type="email" class="form-control" id="mail" name="email" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <textarea class="form-control" name="msg" placeholder="Your message..." required></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Send" name="send" class="btn btn-info btn-block rounded-0 py-2">
                    </div>
                </div>

            </div>
        </form>
      </div>
      <!-- end of column 1 -->


      <div class="col-6 col-md-8 col-lg-6">
        <h1 class="text-center"><b>Company Infomration</b></h1>
        <hr>
        <div class="hours">
          <img src="images/opentimes.PNG" alt="Opening times">
        </div>

        <hr>

        <?php
        if (isset($_SESSION['id'])) {
          echo '
          <h4><b>Phone:</b> +44 5676 4675646</h4>
          <h4><b>Email:</b> office@biopak.com</h4>
          <h4><b>Address:</b> London, United Kingdom</h4>
          <hr>
          ';
        }

        ?>


      </div>

      <!-- end of column 2 -->



	</div>
  <!-- end of row -->


  <!-- End of main -->
</div>


 <?php
 require_once 'includes/footer.inc.php';
  ?>
