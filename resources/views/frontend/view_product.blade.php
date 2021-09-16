<?php
if(Auth::check())
{
	// echo "User is Logged In" . "<br>";
	 $user= Auth::user();
	// //  $user->email;
}

?>

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
	<link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/w3school.css') }}" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	 <!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>We Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="#">
						<span>E</span>Commerce
						
					
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Nairobi Parklands</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-envelope-o" aria-hidden="true"></span>Email</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 0708599451
					</li>
					<li>
						<a href="#" id="logout" >
							<span class="fa fa-sign-out-alt" aria-hidden="true"></span> LOG OUT</a>
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
<!-- Modal2 -->
<div class="modal fade" id="questionsModal" tabindex="-1" role="dialog">
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

					
						<h3 class="agileinfo_sign">SECURITY QUESTIONS</h3>
						<p>
							Your Buying Patterns Have Changed, Answer Questions below in in order To Proceed
						</p>
						<form action="#" id="questionsForm">
							<div id="questionErrors" style="display:none;"> <ul style="list-style:none;" class="w3-ul alert alert-danger alert-dismissable"></ul></div>
						
						<input type="hidden" value="{{ $user->email }}" name="email_questions" id="email_questions" class="field form-control"  required="">

							<div class="styled-input col-md-12 col-lg-12 col-sm-12">
							<label for="" style="font-size:12px;">Which City Were You Born?</label>
								<input type="text"  name="first_question_answer" required="">
							</div>
							<div class="styled-input col-md-12 col-lg-12 col-sm-12">
							<label for="" style="font-size:12px;">Name of Your Favourite Pet?</label>
								<input type="text"  class="" name="second_question_answer" required="">
							</div>

							<div class="styled-input col-md-12 col-lg-12 col-sm-12">
							<label for="cvc" style="font-size:12px;">Which Year Did You Start Schooling?</label>
								<input type="text"  class="" name="third_question_answer" required="">
							</div>
							
							<input type="submit" id="questionsBtn" value="SUBMIT">
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
	<!-- Place Order Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="placeOrder" tabindex="-1" role="dialog">
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
						<h3 class="agileinfo_sign">ORDER </h3>
						<p>
							Place Order For This Product .
						</p>
						<!-- Display errors returned by createToken -->
						<div id="paymentResponse">
						<ul></ul>
						</div>
        
							<!-- Payment form -->
							<form action="#" id="paymentFrm">
							<input type="hidden" id="product_hidden_id" name="product_hidden_id">
							<input type="hidden" id="product_hidden_price" name="product_hidden_price">
							<!-- <div class="form-group">
							<label>NAME</label>
							<input type="text" name="name" id="name"  class="field form-control" placeholder="Enter name" required="" autofocus="">
							</div> -->
							<input type="hidden" id="validate_status" value="notvalidated" name="validate_status">
							<input type="hidden" value="{{ $user->email }}" name="email_profile" id="email_profile" class="field form-control"  required="">
						
							<div class="form-group">
							<label>QUANTITY</label>
							<input type="number" name="product_quantity" id="product_quantity"  class="field form-control"  required="" autofocus="">
							</div>
							<div class="form-group">
							<label>CARD NUMBER</label>
							<div id="card_number" class="field form-control"></div>
							</div>
							<div class="row">
							<div class="left">
							<div class="form-group">
							<label>EXPIRY DATE</label>
							<div id="card_expiry" class="field form-control"></div>
							</div>
							</div>
							<div class="right">
							<div class="form-group">
							<label>CVC CODE</label>
							<div id="card_cvc" class="field form-control"></div>
							</div>
							</div>
							</div>
							<button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
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
									<a class="nav-stylehead" href="#">About Us</a>
								</li>
								<li class="">
									<a href="#" class=" nav-stylehead" role="button" aria-haspopup="true" aria-expanded="false">Products
										<span class="caret"></span>
									</a>
									
								</li>
								
								<li class="">
									<a class="nav-stylehead" href="#">Reviews</a>
								</li>
								
								<li class="">
									<a class="nav-stylehead" href="#">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<!-- <div class="page-head_agile_info_w3l">

	</div> -->
	<!-- //banner-2 -->

	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="http://127.0.0.1:8000">Home</a>
						<i>|</i>
					</li>
					<li>Single  Product View</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Single Product
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides" id="slides-img">
							
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h3 id="product_name"></h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
				<p>
					<span id="item_price" class="item_price"></span>
					
					<label>Free delivery</label>
				</p>
				<div class="single-infoagile">
					<ul>
						<li>
							Cash on Delivery Eligible.
						</li>
						<li>
							Shipping Speed to Delivery.
						</li>
						<li id="product_description">
							
                        </li>
                        <li id="product_category">

                        </li>
                        <li id="product_sub_category">

                        </li>
                        <li id="product_brand">

                        </li>

						
					</ul>
				</div>
				
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								
								<input type="hidden" id="product_hidden_id_one">
								<input value="PLACE ORDER" id="place_order_btn"  data-toggle="modal" data-target="#placeOrder" class="button" />
							</fieldset>
						</form>
					
					</div>

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	
	
	
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2020 ECOMMERCE. All rights reserved | Design & Developed by
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

</script>
	<script>
		  
		
	


</script>
<!-- // End Brands List
// Fetch Single Product -->
<!--End of Header Area !-->
<script type="text/javascript">
	// function checkAuth()
	// {
	// 	alert("You Are Good To Go");
	// 	$.ajax({
	// 		type:"GET",
	// 		url:"getData",
	// 		dataType:"json",
	// 		success:function(data)
	// 		{
	// 			alert("You Are Good To Go");
	// 			alert(data);
	// 			alert(data['id']);
				
	// 			$('#email_profile').val(data['email']);
				
				
	// 		}
	// 	})
	// }	
function fetchSingleProduct()
{
  //var response = {{{ str_replace("'", "\'", json_encode($json)) }}};
    var response =  JSON.stringify({!! $json !!});
  var data = JSON.parse(response);
//   alert(data[0]['product_image']);
     
 // var photo=JSON.parse(data[0]['photo']);
  //alert(photo[0]);
  //src="public/uploads/'+ photo[1] +'"
   var price = "KSHS . " +  data[0]['selling_price'];
   //alert(img1);
  $('#product_name').html(data[0]['product_name']);
  $('#product_description').html(data[0]['product_description']);
  $('#product_category').html(data[0]['product_category']);
  $('#product_sub_category').html(data[0]['product_sub_category']);
  $('#product_brand').html(data[0]['product_brand']);
  $('#item_price').html(price);
  //$('#product_hidden_id_one').val($data[0]['id']);
$('#product_hidden_id').val(data[0]['id']);
$('#product_hidden_price').val(data[0]['selling_price']);

 

	
		//alert(photo[i]);
   var img2="{{asset('public/uploads')}}/"+data[0]['product_image'];
   
   var html = ` <li data-thumb="` + img2 +`">` +
								`<div class="thumb-image" id="">` +
									`<img src="`+ img2 +`" data-imagezoom="true" class="img-responsive" alt=""> </div>` +
						`</li>`;

		
	//alert(html);
	
$('#slides-img').html(html);
}
// End
// Stripe
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('pk_test_51HxIurJ6n8C3ZeylJ6YApxqjeY8mXCeWRBJqiHxaBRZaGR7Fra8zf7JniHEX2XjwtfexdjiKJ5sHzKXyOQEe6JNA00QDm1LA7D');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
// form.addEventListener('submit', function(e) {
//     e.preventDefault();
   
// });

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
   // form.submit();
     // alert("You Are Good To Go");

	
}
//End Stripe
//Send Payment
// function sendPayment()
// {
	
// }

		$(document).ready(function () {
			//Logout User
$('#logout').click(function(){
	//alert("YOU ARE GOOD TO GO");
	$.ajax({
	type:"GET",
	url:"{{route('normal.logout')}}",
    dataType:"json",
	success:function(data)
	{
		if(data.user_logged_out == "loggedout")
		{
			setTimeout("window.location.href = 'http://127.0.0.1:8000'; ",3000);

		}
	}
})
});
//End 
			$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

$('#paymentFrm').on('submit',function(e){
	
					 e.preventDefault();
					 $('#payBtn').html('Processing Payment....');
					 var validate_status = $('#validate_status').val();
					 createToken();
					 //var input = $("input[name=nameGoesHere]").val();
					setTimeout(() => {

						
                        $.ajax({
						 url:"/normal/processnewPayment",
						 method:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('#payBtn').html('Processing Payment....');
						 },
						 success : function(response)
						 {
							 if(response.change == "Changed" && validate_status == "notvalidated")
							 {
								 $('#questionsModal').modal('show');
								 $('#place_order_btn').fadeOut('slow');
								 $('#placeOrder').modal('hide');
								 $('#payBtn').html('SUBMIT');
								 

							 }
							 else
							 {
								if($.isEmptyObject(response.payment_insert_errors))
							 {
								 $('#paymentResponse').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.order_status,
									 icon:"success",
									 button:"OK"
								 });
								 $("#payBtn").html("Submit Payment");
								 $("#paymentFrm").trigger("reset");
								 $('#placeOrder').modal('hide');
								
							 }
							 else
							 {
								 $("#paymentResponse").fadeIn(1000,function(){
									 printErrorMsg(response.payment_insert_errors,"paymentResponse");
									 $("#payBtn").html("Submit Payment")
								 });
							 }

							 }
							 
						 }
					 });
                  },
					9000);
	                
					//alert(input);
					
				 });
// End 


//Validate Questions
$('#questionsForm').on('submit',function(e){
					 e.preventDefault();
					 $.ajax({
						 url:"/normal/validate",
						 type:"POST",
						 data:new FormData(this),
						 contentType:false,
						 cache:false,
						 processData:false,
						 beforeSend:function()
						 {
							 $('questionsBtn').html('Validating Questions......');
						 },
						 success : function(response)
						 {
							 if($.isEmptyObject(response.question_errors))
							 {
								 $('#questionErrors').fadeOut('slow');
								 swal({
									 title:"Success",
									 text:response.status,
									 icon:"success",
									 button:"OK"
								 });
								 $('#validate_status').val("validated");
								 $("questionsBtn").html("SUBMIT");
								 $("#questionsForm").trigger("reset");
								 $('#questionsModal').modal('hide');
								 $('#place_order_btn').fadeIn('slow');
								 $('#placeOrder').modal('show');
								
							 }
							 else
							 {
								 $("#questionErrors").fadeIn(1000,function(){
									//$("#questionErrors").fadeIn();
									
									$("#questionErrors").find('ul').append('<li>' + response.question_errors + '</li>');
					            
									 $("questionsBtn").html("SUBMIT")
								 });
							 }
						 }
					 })
				 });
// End 
			
fetchSingleProduct();
// checkAuth();

		});


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

<!-- // <script>
// 		window.onload = function () {
// 			document.getElementById("password1").onchange = validatePassword;
// 			document.getElementById("password2").onchange = validatePassword;
// 		}

// 		function validatePassword() {
// 			var pass2 = document.getElementById("password2").value;
// 			var pass1 = document.getElementById("password1").value;
// 			if (pass1 != pass2)
// 				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
// 			else
// 				document.getElementById("password2").setCustomValidity('');
// 			//empty string means no validation error
// 		}
// 	</script> -->
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
     <!-- //for bootstrap working -->
       <!-- Select2 Js -->
  <script src="{{ asset('js/select2.min.js') }}"></script>
	 <!-- //js-files -->


</body>

</html>