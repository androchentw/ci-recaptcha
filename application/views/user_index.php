<?php 
  $template_name = "CI-reCaptcha";
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <?php include("_site_header.php");?>
</head>
<body>
  <div id="home-body-container">
      <div id="home-content">
        <!-- home-content -->
      <div class="container container-fluid">
        <div class="row-fluid">
          <div class="span2">
          </div>
          <div class="span10">
            <!-- body-content -->
            <div id="body">              
              <h1>Welcome to <?=$template_name?> - Index</h1>
              <?php
                if ($username != null) { ?>
                  <p>Hello! <?=$username?></p>
                  <p><a href="<?=site_url("user/logout")?>">Logout</a></p>
                <?php 
                } else { ?>
                  <h3>You haven't logined!</h3>
                  <p>Let's go to <a href="<?=site_url("user/login")?>">reCaptcha Login page</a>!</p>
                <?php } ?>              
            </div>
            <!-- body-content ends -->
          </div>
        </div>
      </div>  
      </div>
      <!-- home-content ends -->
  </div>
  <div id="footer">
    <?php include("_site_footer.php");?>
    <a href="https://github.com/andro0929/ci-recaptcha"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>
  </div>  
</body>
</html>