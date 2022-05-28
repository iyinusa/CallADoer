<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>

    <meta name="description" content="<?php echo app_meta_desc; ?>"/>
    <meta name="keywords" content=""/>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/icons/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/icons/linea.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/plugins/loaders.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/plugins/photoswipe.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/icons/photoswipe/icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/coming/css/style.css">
    <link href="<?php echo base_url(); ?>assets/coming/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body data-spy="scroll" data-target=".scrollspy" class="bg-doer">

<!-- Preloader  -->
<div class="loader bg-dark">
  <div class="loader-inner ball-scale-ripple-multiple ball-scale-ripple-multiple-color">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- /End Preloader  -->


<div id="page">
  <div id="page-particle" class="section-overlay" data-line-color="#999"  data-dot-color="#999">
  </div>

  <div class="section-overlay bg-black overlay-opacity"></div>
  
  <div id="modal-notify" class="modal fade modal-scale" tabindex="-1" role="dialog" aria-labelledby="meinModalLabel">
    <div class="modal-dialog" role="document">
      <div>
        <div class="modal-content text-center bg-doer text-light">
          <button class="button-close" data-dismiss="modal" aria-label="Close"><i class="icon icon-lg icon-arrows-remove"></i></button>

          <div class="wrap-line border-dark">
            <h3><span class="font-weight-200">Call A</span> Doer</h3>
          </div>
          <div class="p-t-b-15">
            <p>We launching Artisans Network soon.<br>
              Please stay updated and follow.</p>
          </div>

          <div class="p-t-b-30">

            <!-- Newsletter Form:
             alternative newsletter form via email;
             write your email in newsletter-process.php and use:
             <form action="php/newsletter-process.php" id="newsletter-form" method="post"> insted of
             <form id="mc-form"> -->
            <!-- <form id="mc-form"> -->
              <div class="input-group">
                <input type="email" id="email" class="form-control form-control-light" name="email" placeholder="Enter your Email here...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-color" onclick="subscribe();"><i class="icon icon-sm icon-arrows-slim-right-dashed"></i>
                    </button>
                  </span>
              </div>

              <div id="message-newsletter" class="message-wrapper text-white message">
                <span><i class="icon icon-sm icon-arrows-slim-right-dashed"></i><label class="message-text" for="email">Thank you!</label></span>
              </div>

              <div id="error-newsletter" class="message-wrapper text-white message error" style="display:none;">
                <span><i class="icon icon-sm icon-arrows-slim-right-dashed"></i><label class="message-text" for="email">Enter Email</label></span>
              </div>

            <!-- </form> -->
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div id="info" class="col-md-12 text-white text-center page-info col-transform">
        <div class="vert-middle">
          <div class="reveal scale-out">
            <div class="count-down p-t-b-15" data-end-date="Aug 21, 2019 00:00:00"></div>
            
            <div class="p-t-b-15">
              <img src="<?php echo base_url(); ?>assets/coming/images/logo.png" height="120" alt="">
            </div>

            <div class="p-t-b-15">
              <h2><span class="font-weight-200">Artisans Network coming</span><br>Call A Doer</h2>

              <p>We're coming soon! Awesome artisans network platform.<br>We're
                working hard to give you the best experience! Don't miss out!<br>
              </p>
            </div>
            
            <div class="p-t-b-20">
              <i class="icon icon-sm icon-arrows-slim-down-dashed"></i>
            </div>
            
            <div class="p-t-b-15 btn-row">
              <button class="btn btn-color" data-toggle="modal" data-target="#modal-notify" role="button">Notify me
              </button>
            </div>
            
            <div class="p-t-b-30">
              <p>
                <a href="javascript:;" class="link-white"><i class="fa fa-facebook"></i></a>
                <a href="javascript:;" class="link-white"><i class="fa fa-twitter"></i></a>
                <a href="javascript:;" class="link-white"><i class="fa fa-google-plus"></i></a>
                <a href="javascript:;" class="link-white"><i class="fa fa-behance"></i></a>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<div id="photoswipe"></div>

<script src="<?php echo base_url(); ?>assets/coming/js/plugins/jquery1.11.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/scrollreveal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/contact-form.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/newsletter-form.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/photoswipe/photoswipe.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/jquery.particleground.min.js"></script>
<script src="<?php echo base_url(); ?>assets/coming/js/plugins/prefixfree.min.js"></script>

<script>var base_url = '<?php echo base_url(); ?>';</script>
<script src="<?php echo base_url(); ?>assets/coming/js/custom.js"></script>

<script>
    function subscribe() {
        var email = $('#email').val();
        if(email === '' || email === null) {
            $('#error-newsletter').show(500);
            $('#message-newsletter').hide(500);
        } else {
            $.ajax({
                url: base_url + 'coming/subscribe/?email='+email,
                success: function(data) {
                     $('#message-newsletter').show(500);
                    $('#error-newsletter').hide(500);
                }
            })
        }
    }
</script>

</body>
</html>