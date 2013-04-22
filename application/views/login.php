<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <?php include("_site_header.php");?>
</head>
<body style="margin-top: 20px; margin-left: 50px;">
    <h1><a href="<?=site_url("/")?>">CI-reCaptcha</a></h1>

    <form action="<?=site_url("user/submit")?>" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input class="btn" type="submit" value="log in">
        <p>Test username/password: 123/456</p>
        <!-- $recaptcha_html must be put in the form too -->
        <?=$recaptcha_html?>
    </form>

    <?php if ($this->session->flashdata('error') !== FALSE) { ?>
        <div id="login-error" class="alert alert-error" style="width: 500px;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p><strong>Error!</strong> <?=$this->session->flashdata('error');?>.</p>
        </div>
    <?php } ?>

    <a href="#test" data-toggle="modal">Forgotten password</a>    
    <p><a href="<?=$this->recaptcha->recaptcha_get_signup_url(); ?>" >Get your API Code HERE</a></p>
</body>
</html>