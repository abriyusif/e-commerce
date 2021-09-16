<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>ECOMMERCE</title>
	<!--/tags -->
	<meta name="csrf-token" content="{{ csrf_token()}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Top Ecommerce Website in Nairobi" />
	
	<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{asset('frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/jquery-ui1.css')}}">
	<!-- fonts -->
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}" type="text/css" media="all">
	<!-- Select 2 -->
	<link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/w3school.css') }}" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>We Offer Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="#">
						<span>E</span>commerce
					
						
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-envelope-o" aria-hidden="true"></span>Email</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 0708599451
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
				</ul>
				<!-- //header lists -->
				
				<!-- cart details -->
				<!-- <div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div> -->
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form id="formSignin" method="post">
							<div id="signinErrors"><ul style="display:none;" class="w3-ul alert alert-danger alert-dismissable"></ul></div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Email" name="user_email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="user_password" required="">
							</div>
							<input type="submit" id="signin" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Ecommerce Place! Let's set up your Account.
						</p>
						<form action="#" id="signUpForm">
							<div id="singupErrors" style="display:none;"> <ul style="list-style:none;" class="w3-ul alert alert-danger alert-dismissable"></ul></div>
							<div class="styled-input agile-styled-input-top col-md-6 col-lg-6 col-sm-6">
								<input type="text" placeholder="Name" name="name" required="">
							</div>
							<div class="styled-input agile-styled-input-top col-md-6 col-lg-6 col-sm-6">
								<input type="text" placeholder="Username" name="username" required="">
							</div>
							<div class="styled-input col-md-6 col-lg-6 col-sm-6">
								<input type="email" placeholder="email" name="email" required="">
							</div>
							<div class="styled-input col-md-6 col-lg-6 col-sm-6">
								<input type="number" placeholder="Phone Number" class="" name="phone_number" required="">
							</div>
							
							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="" style="font-size:12px;">Card No</label>
								<input type="text" placeholder="1234 1234 1234 1234" name="card_no" required="">
							</div>
							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="" style="font-size:12px;"> Expiry Date</label>
								<input type="text" placeholder="MM / YY " class="" name="expiry_date" required="">
							</div>

							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="cvc" style="font-size:12px;">CVC</label>
								<input type="number" placeholder="CVC" class="" name="cvc" required="">
							</div>
							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="" style="font-size:12px;">Which City Were You Born?</label>
								<input type="text"  name="first_question_answer" required="">
							</div>
							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="" style="font-size:12px;">Name of Your Favourite Pet?</label>
								<input type="text"  class="" name="second_question_answer" required="">
							</div>

							<div class="styled-input col-md-4 col-lg-4 col-sm-4">
							<label for="cvc" style="font-size:12px;">Which Year Did You Start Schooling?</label>
								<input type="text"  class="" name="third_question_answer" required="">
							</div>
							<div class="styled-input col-md-6 col-lg-6 col-sm-6">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input col-md-6 col-lg-6 col-sm-6">
								<input type="password" placeholder="Confirm Password" name="user_confirm_password" id="password2" required="">
							</div>
							<input type="submit" id="signup" value="Sign Up">
						</form>
						<!-- <p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p> -->
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top" style="max-height:100px;">
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="#">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead scroll" href="#about">About Us</a>
								</li>
								<li class="">
									<a href="#products" class="scroll nav-stylehead" role="button" aria-haspopup="true" aria-expanded="false">Products
										
									</a>
									
								</li>
								
								<li class="">
									<a class="nav-stylehead scroll" href="#testimonials">Reviews</a>
								</li>
								
								<li class="">
									<a class="nav-stylehea scroll" href="#contact">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div id="myCarousel"  class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" style="max-height:150px;" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Save</span>
						</h3>
						<p>Get flat
							<span>10%</span> Cashback</p>
						<a class="button2" href="#">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>30%</span> Off</p>
						<a class="button2" href="#">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Deal</span>
						</h3>
						<p>Get Best Offer Upto
							<span>20%</span>
						</p>
						<a class="button2" href="#">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today
							<span>Discount</span>
						</h3>
						<p>Get Now
							<span>40%</span> Discount</p>
						<a class="button2" href="#">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid" id="products">
		<div class="container">
			<!-- tittle heading -->
			<!-- <h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3> -->
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<!-- <div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div> -->
				<!-- price range start -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range end -->
				
				<!-- Categories start -->
				<div class="categories">
					<h3 class="agileits-sear-head w3-border-bottom w3-padding-16 w3-padding-left">Categories List</h3>
					<ul id="categories-list" style="list-style:none;" class="w3-ul">
                      
					</ul>

				</div>
				<!-- End Categories List -->
				
				<!-- Sub Categories -->
				<div class="sub-categories">
					<h3 class="agileits-sear-head w3-border-bottom w3-padding-16 w3-padding-left">Sub Categories List</h3>
					<ul id="sub-categories-list" style="list-style:none;" class="w3-ul">
                      
					</ul>

				</div>
				<!-- End Sub Categories List -->

				<!-- Brand List -->
				<div class="brands">
					<h3 class="agileits-sear-head w3-border-bottom w3-padding-16 w3-padding-left">Brands List</h3>
					<ul id="brands-list" style="list-style:none;" class="w3-ul">

                      
					</ul>

				</div>
				<!-- End Brands List -->
			
				
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- Categories -->
					<div id="eachCategory" class="product-sec1" style="display:none">
						<h3 class="heading-tittle">Product Categories</h3>
					
						
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="clearfix"></div>
					<!-- //Categories section  -->
					<!-- Sub Categories -->
					<div id="eachSubCategory" class="product-sec1" style="display:none">
						<h3 class="heading-tittle">Product Sub Categories</h3>
					
						
					
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="clearfix"></div>
					<!-- //Categories section  -->
					<!-- Brands Section -->
					<div id="eachBrand" class="product-sec1" style="display:none">
						<h3 class="heading-tittle">Product Brands</h3>
					
						
					
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="clearfix"></div>
					<!-- //Categories section  -->
					<!-- first section (top products) -->
					<div id="topproducts" class="product-sec1">
						
						
					
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<!-- //first section (top products) -->
				
					
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	
	<!-- About Us  -->
	 <div class="clearfix"> </div>

	<div class="welcome py-5 w3-padding-16 w3-card-4" id="about"> 
	<div class="container py-md-3">
		<div class="row">
		<h3 class="agileits-title w3-center w3-bottombar">Welcome To Ecommerce</h3>
		<div class="col-lg-6 col-md-6 col-sm-6 welcome-w3lright">
			<div class="video-grid-single-page-agileits">
			 <img src="images/about2.jpg" alt="" class="img-responsive img-fluid" />
			</div>
		</div> 
		<div class="col-lg-6 col-md-6 col-sm-6 welcome_left">
			
			<h4>We Deliver Products Everywhere </h4>
			<h4>At Ecommerce  Shop we pride ourselves on efficiency, variety and customer service </h4>
			<p> Ecommerce  Shop  is the premiere online delivery service for ordering from Nairobi’s best electronics stores. 
				Browse through our diverse range of menus and when you order online from your favourite places they are always saved for easy and faster reordering.
				 </p>   
		</div>
			</div>
		<div class="clearfix"> </div>
	</div> 
</div>

	<!-- End -->

<!-- I Removed testmonials from here -->

	<!-- Contact Us -->
		<!-- contact page -->
		<div class="contact-w3l" id="contact">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Contact Us
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form id="formMessage" method="post">
							<div id="messageErrors">
								<ul class="w3-ul" style="list-style:none;"></ul>
							</div>
							<div class="">
								<input type="text" name="contact_name" placeholder="Name" required="">
							</div>
							<div class="">
								<input class="text" type="text" name="contact_subject" placeholder="Subject" required="">
							</div>
							<div class="">
								<input class="email" type="email" name="contact_email" placeholder="Email" required="">
							</div>
							<div class="">
								<textarea placeholder="Message" name="contact_message" required=""></textarea>
							</div>
							<input type="submit" id="msg-btn" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>GET IN TOUCH :</h4>
							<p>
								<i class="fa fa-map-marker"></i> Ecommerce, Nairobi 10002, Kenya.</p>
							<p>
								<i class="fa fa-phone"></i> Telephone : +254708599451</p>
							
								<i class="fa fa-envelope-o"></i> Email :
								<a href="mailto:example@mail.com">abri@ecommerce.com</a>
							</p>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			</div>
			</div>
			<!-- //contact -->
	<!-- End -->
	<div class="clearfix"> </div>
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2020 Ecommerce. All rights reserved | Design & Developed by
				<a href="#"> ABRI</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
	<script>
		  


// Fetch  Categories List
function fetchCategories()
{
var categories = '';
$.ajax({
	type:"GET",
	 url:"getCats",
	 dataType:'json',
	 success:function(data)
	 {
       
	   $.each(data,function(index,element){

		categories += '<li class="w3-padding-8"><a href="' + element.text +'" class="each-category"  id="' + element.text + '">' +  element.text + '</a></li>';

	   });

	   $('#categories-list').html(categories);
	 }
})
}
// End Categories List
// Fetch Sub Categories List
function fetchSubCategories()
{
var subcategories = '';
$.ajax({
	type:"GET",
	 url:"getSubCats",
	 dataType:'json',
	 success:function(data)
	 {
       
	   $.each(data,function(index,element){

		subcategories += '<li class="w3-padding-8"><a href="' + element.text +'"h-brand" id="' + element.text + '">' +  element.text + '</a></li>';

	   });

	   $('#sub-categories-list').html(subcategories);
	 }
})
}
// End Sub Categories List

// Fetch Brands List
function fetchBrands()
{
var brands = '';
$.ajax({
	type:"GET",
	 url:"getBrans",
	 dataType:'json',
	 success:function(data)
	 {
       
	   $.each(data,function(index,element){

		brands += '<li class="w3-padding-8"><a href="' + element.text +'" class="each-brand" id="' + element.text + '">' +  element.text + '</a></li>';

	   });

	   $('#brands-list').html(brands);
	 }
})
}
// End Brands List
		//fetch Top Products
function fetchTopProducts()
      {
        var topproducts=" ";
        $.ajax({
              type:"GET",
              url:"getLatest",
              dataType:'json',
              success:function(data)
              {
                
      
				topproducts += '<h3 class="heading-tittle">New Products In Store</h3>';
    
          $.each(data,function(index,element){
            // var photo=JSON.parse(element.photo); 

			var route='fetchSingle/' + element.id;
        var img1 = '<img  style="max-height:150px;max-width:150px;" alt="Images Goes Here"   src="public/uploads/'+ element.product_image +'">' ;
        

	topproducts += `<div class="col-md-4 product-men">` +
							`<div class="men-pro-item simpleCart_shelfItem">` +
								`<div class="men-thumb-item">` + img1 +
									`<div class="men-cart-pro">` +
										`<div class="inner-men-cart-pro">` +
											`<a href=`  + route +  ` class="link-product-add-cart">Quick View</a>` +
										`</div>` +
									`</div><span class="product-new-top">New</span></div>` +
								`<div class="item-info-product ">` +
									`<h4><a href="#">` + element.product_name + `</a></h4>` +
									`<div class="info-product-price">` +
										`<span class="item_price">Kshs ` + element.selling_price +`</span>` +
										`` +
									`</div>` +
									`<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">` +
										`<form action="#" method="post">` +
											`<fieldset>` +
											`	<input type="hidden" name="cmd" value="_cart" />` +
												`<input type="hidden" name="add" value="1" />` +
												`<input type="hidden" name="business" value=" " />` +
												`<input type="hidden" name="item_name" value="` + element.product_name +  `" />` +
												`<input type="hidden" name="amount" value="` + element.selling_price + `" />` +
												`<input type="hidden" name="discount_amount" value="1.00" />` +
												`<input type="hidden" name="currency_code" value="USD" />` +
												`<input type="hidden" name="return" value=" " />` +
												`<input type="hidden" name="cancel_return" value=" " />` +
											
											`</fieldset>` +
										`</form>` +
									`</div>` +

								`</div>` +
							`</div>` +
						`</div>`;
    
          });
          $('#topproducts').html(topproducts);
              }
        });
      }
//End



		$(document).ready(function () {
			$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
			fetchTopProducts();
			fetchCategories();
			fetchSubCategories();
			fetchBrands();
			// Fetch Specific Categories

        $(document).on('click','.each-category',function(e){
			e.preventDefault();
			//alert("You Are Good To Go");
			

			var mod = $(this).attr('id');
			var eachCategory=" ";
        $.ajax({
              type:"GET",
              url:"getSpecificCategories/{mod}",
              dataType:'json',
			  data:{mod:mod},
			 
              success:function(data)
              {
                
       
				eachCategory += '<h3 class="heading-tittle">'+ mod + ' Product Category</h3>';
				
				if(data.length>0)
				{
			$('#eachSubCategory').fadeOut('slow');
			$('#eachBrand').fadeOut('slow');
			$('#eachCategory').fadeIn('slow');
					$.each(data,function(index,element){
            // var photo=JSON.parse(element.photo); 

  
        var img1 = '<img  style="max-height:150px;max-width:150px;" alt="Images Goes Here"   src="public/uploads/'+ element.product_image +'">' ;
        
		var route='fetchSingle/' + element.id;
	eachCategory += `<div class="col-md-4 product-men">` +
							`<div class="men-pro-item simpleCart_shelfItem">` +
								`<div class="men-thumb-item">` + img1 +
									`<div class="men-cart-pro">` +
										`<div class="inner-men-cart-pro">` +
											`<a href=`  + route +  ` class="link-product-add-cart">Quick View</a>` +
										`</div>` +
									`</div></div>` +
								`<div class="item-info-product ">` +
									`<h4><a href="#">` + element.product_name + `</a></h4>` +
									`<div class="info-product-price">` +
										`<span class="item_price">Kshs ` + element.selling_price + `</span>` +
										`` +
									`</div>` +
									`<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">` +
										`<form action="#" method="post">` +
											`<fieldset>` +
											`	<input type="hidden" name="cmd" value="_cart" />` +
												`<input type="hidden" name="add" value="1" />` +
												`<input type="hidden" name="business" value=" " />` +
												`<input type="hidden" name="item_name" value="` + element.product_name +  `" />` +
												`<input type="hidden" name="amount" value="` + element.selling_price + `" />` +
												`<input type="hidden" name="discount_amount" value="1.00" />` +
												`<input type="hidden" name="currency_code" value="USD" />` +
												`<input type="hidden" name="return" value=" " />` +
												`<input type="hidden" name="cancel_return" value=" " />` +
												
											`</fieldset>` +
										`</form>` +
									`</div>` +

								`</div>` +
							`</div>` +
						`</div>`;
    
          });
          $('#eachCategory').html(eachCategory);

				}
				else
				{
					alert("Products Under " + mod + " Are Out Of Stock,Check Out Laer");
				}
    
        
              }
        });
		})
      
//End

// Fetch Specific Sub Categories

$(document).on('click','.each-sub-category',function(e){
			e.preventDefault();
			//alert("You Are Good To Go");
			

			var mod = $(this).attr('id');
			var eachSubCategory=" ";
        $.ajax({
              type:"GET",
              url:"getSpecificSubCategories/{mod}",
              dataType:'json',
			  data:{mod:mod},
			 
              success:function(data)
              {
                
       
				eachSubCategory += '<h3 class="heading-tittle">'+ mod + ' Product Sub Category</h3>';
				
				if(data.length>0)
				{
			$('#eachCategory').fadeOut('slow');
			$('#eachBrand').fadeOut('slow');
			$('#eachSubCategory').fadeIn('slow');
					$.each(data,function(index,element){
            // var photo=JSON.parse(element.photo); 

  
  
        var img1 = '<img  style="max-height:150px;max-width:150px;" alt="Images Goes Here"   src="public/uploads/'+ element.product_image +'">' ;
        
		var route='fetchSingle/' + element.id;
	eachSubCategory += `<div class="col-md-4 product-men">` +
							`<div class="men-pro-item simpleCart_shelfItem">` +
								`<div class="men-thumb-item">` + img1 +
									`<div class="men-cart-pro">` +
										`<div class="inner-men-cart-pro">` +
											`<a href=`  + route +  ` class="link-product-add-cart">Quick View</a>` +
										`</div>` +
									`</div></div>` +
								`<div class="item-info-product ">` +
									`<h4><a href="#">` + element.product_name + `</a></h4>` +
									`<div class="info-product-price">` +
										`<span class="item_price">Kshs ` + element.selling_price + `</span>` +
										`` +
									`</div>` +
									`<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">` +
										`<form action="#" method="post">` +
											`<fieldset>` +
											`	<input type="hidden" name="cmd" value="_cart" />` +
												`<input type="hidden" name="add" value="1" />` +
												`<input type="hidden" name="business" value=" " />` +
												`<input type="hidden" name="item_name" value="` + element.product_name +  `" />` +
												`<input type="hidden" name="amount" value="` + element.selling_price + `" />` +
												`<input type="hidden" name="discount_amount" value="1.00" />` +
												`<input type="hidden" name="currency_code" value="USD" />` +
												`<input type="hidden" name="return" value=" " />` +
												`<input type="hidden" name="cancel_return" value=" " />` +
												
											`</fieldset>` +
										`</form>` +
									`</div>` +

								`</div>` +
							`</div>` +
						`</div>`;
    
          });
          $('#eachSubCategory').html(eachSubCategory);

				}
				else
				{
					alert("Products Under " + mod + " Are Out Of Stock,Check Out Laer");
				}
    
        
              }
        });
		})
      
//End

// Fetch Specific Brand

$(document).on('click','.each-brand',function(e){
			e.preventDefault();
			//alert("You Are Good To Go");
			

			var mod = $(this).attr('id');
			var eachBrand =" ";
        $.ajax({
              type:"GET",
              url:"getSpecificBrands/{mod}",
              dataType:'json',
			  data:{mod:mod},
			 
              success:function(data)
              {
                
       
				eachBrand += '<h3 class="heading-tittle">'+ mod + ' Product Brands</h3>';
				
				if(data.length>0)
				{
			$('#eachCategory').fadeOut('slow');
			$('#eachBrand').fadeIn('slow');
			$('#eachSubCategory').fadeOut('slow');
					$.each(data,function(index,element){
            // var photo=JSON.parse(element.photo); 

  
        var img1 = '<img  style="max-height:150px;max-width:150px;" alt="Images Goes Here"   src="public/uploads/'+ element.product_image +'">' ;
        
		var route='fetchSingle/' + element.id;
	eachBrand += `<div class="col-md-4 product-men">` +
							`<div class="men-pro-item simpleCart_shelfItem">` +
								`<div class="men-thumb-item">` + img1 +
									`<div class="men-cart-pro">` +
										`<div class="inner-men-cart-pro">` +
											`<a href=`  + route +  ` class="link-product-add-cart">Quick View</a>` +
										`</div>` +
									`</div></div>` +
								`<div class="item-info-product ">` +
									`<h4><a href="#">` + element.product_name + `</a></h4>` +
									`<div class="info-product-price">` +
										`<span class="item_price">Kshs ` + element.selling_price + `</span>` +
										`` +
									`</div>` +
									`<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">` +
										`<form action="#" method="post">` +
											`<fieldset>` +
											`	<input type="hidden" name="cmd" value="_cart" />` +
												`<input type="hidden" name="add" value="1" />` +
												`<input type="hidden" name="business" value=" " />` +
												`<input type="hidden" name="item_name" value="` + element.product_name +  `" />` +
												`<input type="hidden" name="amount" value="` + element.selling_price + `" />` +
												`<input type="hidden" name="discount_amount" value="1.00" />` +
												`<input type="hidden" name="currency_code" value="USD" />` +
												`<input type="hidden" name="return" value=" " />` +
												`<input type="hidden" name="cancel_return" value=" " />` +
												
											`</fieldset>` +
										`</form>` +
									`</div>` +

								`</div>` +
							`</div>` +
						`</div>`;
    
          });
          $('#eachBrand').html(eachBrand);

				}
				else
				{
					alert("Products Under " + mod + " Brand Are Out Of Stock,Check Out Laer");
				}
    
        
              }
        });
		})
      
//End

//Create User Account

       // alert("You Are Good To Go");
       $('#signUpForm').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('users.store')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#signup').html('Creating Account');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.user_insert_errors))
							 {
								 $('#singupErrors').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success_insert_user,
									 icon:"success",
									 button:"OK"
								 });
								 $("#signup").html("SIGN UP");
								 $("#signUpForm").trigger("reset");
								 $('#myModal2').modal('hide');
								 $('#myModal1').modal('show');
							 }
							 else
							 {
								 $("#singupErrors").fadeIn(1000,function(){
									 printErrorMsg(response.user_insert_errors,"singupErrors");
									 $("#signup").html("SIGN UP")
								 });
							 }
						 }
					 })
				 });
// End 
//Login User
$('#formSignin').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('normal.login')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#signin').html('Logging In.......');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.login_error))
							 {
								 $('#singinErrors').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.success_login,
									 icon:"success",
									 button:"OK"
								 });
								 $("#signin").html("SIGN IN");
								 $("#formSignin").trigger("reset");
								setTimeout("window.location.href = 'normal/userAuth'; ",3000);
							 }
							 else
							 {
								 $("#singinErrors").fadeIn(1000,function(){
									 printErrorMsg(response.login_error,"singinErrors");
									 $("#signin").html("SIGN IN")
								 })
							 }
						 }
					 })
				 });

//End
//Contact Form Message

       // alert("You Are Good To Go");
       $('#formMessage').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"{{route('messages.store')}}",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#msg-btn').val('Sending Message.....');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.message_errors))
							 {
								 $('#messageErrors').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.message_success,
									 icon:"success",
									 button:"OK"
								 });
								 $("#msg-btn").val("SUBMIT");
								 $("#formMessage").trigger("reset");
								
							 }
							 else
							 {
								 $("#messageErrors").fadeIn(1000,function(){
									 printErrorMsg(response.message_errors,"messageErrors");
									 $("#msg-btn").val("SUBMIT")
								 });
							 }
						 }
					 })
				 });
// End 
$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 1,
						nav: false
					},
					900: {
						items: 1,
						nav: false
					},
					1000: {
						items: 1,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		});
//0702053206
				
		    //Error Messages
 function printErrorMsg(msg,div)
			 {
				 $.each(msg,function(key,value){
                    $("#"+div).fadeIn();
					$("#"+div).find('ul').append('<li>' + value + '</li>');

				 });
			 }
			 //END

	</script>

<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- // end password-script  -->


	<!-- // smoothscroll -->
	<script src="{{asset('frontend/js/SmoothScroll.min.js')}}"></script>
	<!-- // //smoothscroll -->

	<!-- // start-smooth-scrolling -->
	<script src="{{asset('frontend/js/move-top.js')}}"></script>
	<script src="{{asset('frontend/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- // //end-smooth-scrolling -->

	<!-- // smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- ////smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
	<!-- smooth scrolling -->
    <!-- //for bootstrap working -->
       <!-- Select2 Js -->
  <script src="{{ asset('js/select2.min.js') }}"></script>
	<!-- //js-files -->


</body>

</html>