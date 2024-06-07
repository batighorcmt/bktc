<?php
include 'manage/db_conn.php';
$sld = "SELECT * FROM slider";
$qry = mysqli_query($conn,$sld); 
$li =''; 
$i = 0; 
$div = '';
while ($row = mysqli_fetch_array($qry)) { 
  if($i == 0)
  {
  $li .='<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>'; 
  $div .='<div class="item active"> 
          <img src="slider/'.$row['photo'].'" alt="'.$row['title'].'" width="100%" height="400px"›
          </div>';
  }
  else
  {
    $li .='<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>'; 
  $div .='<div class="item"> 
          <img  src="slider/'.$row['photo'].'" alt="'.$row['title'].'" width="100%" height="400px"›
          </div>';
}
$div .='</div>';
$i++;
}

?>



<!DOCTYPE html>
<!-- saved from url=(0023)https://www.bktc.edu.bd/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
 <title>Bamundi Karigori Training Center</title>	
    
    <link href="https://ctmibd.com/assets/images/fb-icon.ico" rel="icon">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="elements/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="elements/animate.css">
    
    <link rel="stylesheet" href="elements/all-fonts.css">
    
    <link href="elements/style.css" rel="stylesheet">
    
     <link href="elements/owl.carousel.min.css" rel="stylesheet">
	 
	 <link rel="stylesheet" href="elements/carlous.css">
	   <script src="elements/jquery.min.js.download"></script>
  <script src="elements/bootstrap.min.js.download"></script>
     
   <link href="elements/font.css" rel="stylesheet">
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
.carousel {

height:360px;

}

.carousel-inner &gt; .item &gt; img {

height:360px;

object-fit: contain;

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
<p class="blink"><a href="#">আবেদন পত্র রিসিভ কপি</a></p>
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
      		<div class="container p-0">
            	<div class="row">
                	<div class="col-md-2"> <div class="main-logo"> <img width="100" class="img-fluid" src="site_images/bktc_logo.png"> </div> </div>
                    <div class="col-md-10"> 
                    	<div class="main-manu">
                        	
<?php
include 'mainnav.php';
?>
                            
                        </div>
                     </div>
                </div>
            </div>
<hr>
      <!--Lower-header--><!--SLIDER-->
     	<div class="banner-container">
            <div class="container">
				<div class="row">
					<!--carlous-->
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php echo $li ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
           <?php echo $div ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
					
					<!--carlous-->
					
                </div>
			</div>
        </div>
     <!--SLIDER-->
      
                
                
                
        
<div class="body-container"><!--Top Notice-->
        
        <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white newss">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;জরুরী বিজ্ঞপ্তি</span></div>
                <marquee class="news-scroll bg-success py-2 px-1" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="#">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </a> <span class="dot"></span> <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </a> <span class="dot"></span> <a href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse </a>
                </marquee>
            </div>
        </div>
    </div>
</div>
        <div class="container">
        <div class="row" style="margin-top:10px;">
            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>নোটিশ বোর্ড</strong></h5>
                <div class="card-body">
                  <ul class="notice-board1">
                    <?php
                                $i=1;
                                $sqln = "SELECT * from notice order by notice_id desc limit 10";
                                $resultn = $conn->query($sqln);
                                while($row = $resultn->fetch_array())
                                {
                                ?>
                  <li> <p class="calendar-icon1"> <i class="fa fa-dot-circle-o"></i>   <a href="manage/notice_view.php?notice_id=<?=$row['notice_id'];?>"> <?=$row['notice_title'];?></a></p> </li>
                  <?php $i++; } ?> 
                </ul>
                   
                <hr><div align="right"> <a href="notice.php"> All Notice</a></div>
              </div>
            </div>
          </div>

            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>অনলাইন আবেদন</strong></h5>
                <div class="card-body">
                  <a href="adv_reg_info.php"><div class=""><img src="site_images/1yearr.png" height="50px" width="50px"> <span align="left">১ বছর মেয়াদী অ্যাডভান্সড সার্টিফিকেট কোর্স ( ফাইন আর্টস/চারুকলা , কম্পিউটার টেকনোলজি/আইসিটি ভর্তি ও ফিজিক্যাল এডুকেশন)</span></div> </a><br>
                  
                  <a href="short_reg_info.php"><div class=""><img src="site_images/6month.jpg" height="50px" width="50px"> <span align="left">৩৬০ ঘন্টা/৬ মাস মেয়াদী বেসিক কোর্স</span></div> </a>
                <!--<button> Details </button>-->
              </div>
            </div>
          </div>
        </div>
      </div>


       <div class="container">
        <div class="row" style="margin-top:10px;">
            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>১ বছর মেয়াদী কোর্স </strong></h5>
                <div class="card-body">
                  

              </div>
            </div>
          </div>

            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>৬ মাস মেয়াদী কোর্স</strong></h5>
                <div class="card-body">
                 
                 
              </div>
            </div>
          </div>
        </div>
      </div>


       <div class="container">
        <div class="row" style="margin-top:10px;">
            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>সকল প্রকার ফি</strong></h5>
                <div class="card-body">
                  <a href="online_payment.php"><img src="site_images/mf_logo.jpg" height="200px" weight="200px" align="center" style="margin:10px;"></a>

              </div>
            </div>
          </div>

            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>অনলাইন প্রশংসাপত্র</strong></h5>
                <div class="card-body">
                 <img src="site_images/bktc_testimonial.jpg" height="100px" weight="100px" align="left" style="margin-right:10px;"> <div class="card-text">আপনি যদি আমাদের প্রতিষ্ঠান হতে কোন বিষয়ে পরীক্ষায় অংশগ্রহণ করে উত্তীর্ণ হয়ে থাকেন এবং বোর্ড হতে সার্টিফিকেট অত্র প্রতিষ্ঠানে না এসে থাকলে প্রশংসাপত্রের আবেদন করতে নিচের লিংকে ক্লিক করুন। </div>
                  <a href="#" class="btn btn-primary">প্রশংসাপত্রের জন্য আবেদন</a>
                 
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="container">
         <div class="row"  style="margin-top:10px;">
            <div class="col-md-6"> 
              <div class="card">
                <h5 class="card-header" style="background-color:#00a953; color:#FFFFFF; margin:10px; border-radius:5px;"><strong>সনদপত্রের জন্য আবেদন</strong></h5>
                <div class="card-body">
                  <img src="site_images/bktc_certificate.png" height="100px" weight="100px" align="left" style="margin-right:10px;"> 
                  <div class="card-text">আপনি যদি আমাদের প্রতিষ্ঠান হতে কোন বিষয়ে পরীক্ষায় অংশগ্রহণ করে উত্তীর্ণ হয়ে থাকেন তবে সার্টিফিকেট এর আবেদন করতে নিচের লিংকে ক্লিক করুন। 
                  </div>
                  <a href="#" class="btn btn-primary">সার্টিফিকেটের জন্য আবেদন</a>
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