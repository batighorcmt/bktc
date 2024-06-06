<?php
include 'db_conn.php';
 $notice_id = isset($_GET['notice_id']) ? intval($_GET['notice_id']) : null;

if ($notice_id === null) {
    die("notice_id number not provided.");
}
    $sqln = "select * from notice WHERE page_id=$notice_id";
    $resultn = mysqli_query($conn,$sqln);
    $row = mysqli_fetch_array($resultn);

    ?>



<!DOCTYPE html>
<!-- saved from url=(0023)https://www.bktc.edu.bd/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?=$row['notice_text'];?>s">
  <meta name="keywords" content="<?=$row['notice_text'];?>">
    
 <title><?=$row['notice_title'];?> | Bamundi Karigori Training Center</title>	
    
    <link href="../site_images/icon.ico" rel="icon">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="../elements/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../elements/animate.css">
    
    <link rel="stylesheet" href="../elements/all-fonts.css">
    
    <link href="../elements/style.css" rel="stylesheet">
    
     <link href="../elements/owl.carousel.min.css" rel="stylesheet">
	 
	 <link rel="stylesheet" href="../elements/carlous.css">
	   <script src="../elements/jquery.min.js.download"></script>
  <script src="../elements/bootstrap.min.js.download"></script>
     
   <link href="../elements/font.css" rel="stylesheet">
   <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

   
    
  </head>
  <body>
<style>
      .blink {
        animation: blinker 1.2s linear infinite;
        color: #F00;
        font-size: 14px;
        font-weight: bold;
        font-family: 'kalpurush', sans-serif;
		text-align:right;
		line-height:30px;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
	  .blink a{
		  text-decoration:none;
		  color:#FFFFFF;
	  }
	  
	  .blink a:hover{
		  text-decoration:none;
		  color:#F00;
    }
    .newss {
      background: #eee}.news{width: 160px}.news-scroll a{text-decoration: none}.dot{height: 6px;width: 6px;margin-left: 3px;margin-right: 3px;margin-top: 2px !important;background-color: rgb(207,23,23);border-radius: 50%;display: inline-block}
	  }
	  
</style>

      <!-- Start your project here-->   
      <div class="main-container">
      <div class="custom-container">
<!-- Global Header-->

      <!--Up-header-->
            	<div class="top-header">

      	<div class="container p-0">
        	            <div class="row no-gutters">
            
            	<div class="col-md-8"> 
                	<ul class="m-0">
<li> <strong>যোগাযোগ করুন!</strong> <i class="fa fa-phone"></i> 01719799089, 01701315034</li>                        <li> | </li>
                        <li> <i class="fa fa-envelope"></i> <strong>ইমেইল</strong> : bktc28042@gmail.com </li>
                    </ul>
                 </div>
                 
				<div class="col-md-2"> 
<p class="blink"><a href="application_copy.php">আবেদন পত্র রিসিভ কপি</a></p>
				</div>

            <div class="col-md-1"> 
                	<div class="top-ber-right-icon">
                    	<a href="#"> <i class="fa fa-facebook-square"></i> </a> 
                        <a href="#"> <i class="fa fa-youtube-square"></i> </a> 
                       
                    </div>
                 </div>

                </div>
            </div>
        	
        </div>
      <!--Up-header-->
      
      <!--Lower-header-->
      		<div class="container">
            	<div class="row">
                	<div class="col-md-2"> <div class="main-logo"> <img width="100" class="img-fluid" src="../site_images/bktc_logo.png"> </div> </div>
                    <div class="col-md-10"> 
                    	<div class="main-manu">
                        	
<?php
include '../mainnav.php';
?>

                            
                        </div>
                     </div>
                </div>
            </div>
<hr>

        <div class="container">
        <div class="row" style="margin-top:10px;">
            <div class="col-md-12"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong><?=$row['notice_title'];?></strong></h5>
                <div class="card-body">

<?=$row['notice_text'];?>

<hr>
<small></small>
              </div>
            </div>
          </div>
              </div>
  </div>



            <div class="footer" style="margin-top: 10px;">
                	<div class="container">
                    	<div class="row" style="margin-top: 10px;">
                        	<div class="col-md-4" >
                              <div class="h4">Bamundi Karigori Training Center</div>
                              <div>BTEB Code-28042, NSDA Code-000050</div>
                              <div>Bamundi Poshu Hat Road, Bamundi, Gangni, Meherpur.</div>
                              <div>Mobile: 01719799089, 01701315034</div>
                              <div>Email: bktc28042@gmail.com</div>
                              <div>Website: www.bktc.edu.bd</div>
                           </div>
                          <div class="col-md-4">  
                                <p class="h3">Important Links</p>
                                <p><a class="link-offset-2 link-underline link-underline-opacity-10" href="https://bteb.gov.bd">BTEB</a></p>
                                <p><a class="link-offset-2 link-underline link-underline-opacity-10" href="https://nsda.gov.bd">NSDA</a></p>
                          </div>
                          <div class="col-md-4">
                            	<ul class="footer-nav">
                                	<li> <a href="https://bktc.edu.bd">হোম</a></li>
                                    <li> <a href="notice.php">বিজ্ঞপ্তি</a></li>
                                    <li> <a href="downloads.php">ডাউনলোড</a></li>
                                    <li> <a href="contacts.php">যোগাযোগ</a></li>
                                </ul>
                                <p class="copyright-text"> BKTC-Meherpur © Copyright 2024. All Rights Reserved. </p>
                            </div>
                        </div>
                    </div>
             

      <!-- End your project here-->
 
<a href="#" class="scrollup border-0" style="display: none;"> <i class="fa fa-angle-double-up" aria-hidden="true"></i> </a>


	<script type="text/javascript" src="elements/jquery-3.3.1.min.js.download"></script>
    <script type="text/javascript" src="elements/wow.js.download"></script>
    <script type="text/javascript" src="elements/owl.carousel.min.js.download"></script>
    <script src="elements/jquery-ui.js.download"></script>

          <script>
$(document).ready(function(){ 
	var touch 	= $('#resp-menu');
	var menu 	= $('.menu');
 
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
});

  $( function() {
    $( "#tabs" ).tabs();
  } );
  
  $('#manufacturers').owlCarousel({
			dots:true,
			autoplay:true,
			nav:true,
			responsive:{
				0:{
					items:3
				},
				600:{
					items:5
				},
				1000:{
					items:6
				}
			}
		});
		
</script> 

  
<script>	 
		//scroll to top
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
				} else {
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		});
        
		
		new WOW().init();
		
 
</script>
</body>
</html>