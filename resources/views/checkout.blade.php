<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{{'frontend/css/bootstrap.min.css'}}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{{'frontend/css/font-awesome.min.css'}}}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{{'frontend/css/owl.carousel.css'}}}">
    <link rel="stylesheet" href="{{{'frontend/css/style.css'}}}">
    <link rel="stylesheet" href="{{{'frontend/css/responsive.css'}}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    
  <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo" style="text-align: right;">
                        <a><img style="margin: -60px;" width="250px" height="250px" src="{{{asset('hinhanh/logo/logo1.jpg')}}}"></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{URL::to('/cart')}}">Cart&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></a></li>
                        <li class="active"><a>Checkout</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                       

                            <form enctype="multipart/form-data" action="{{URL::to('/order')}}" class="checkout" method="post" name="checkout">
                            {{csrf_field()}}
                                <div id="customer_details" class="col2-set">
                                    <div class="col-8">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>  

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name" name="name" class="input-text " required>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input required type="text" value="" placeholder="Street address" id="billing_address_1" name="address" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input required type="text" value="" placeholder="Town / City" id="billing_city" name="city" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input required type="text" value="" placeholder="" id="billing_email" name="email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input required type="text" value="" placeholder="" id="billing_phone" name="phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                        </div>
                                    </div> 

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                            <td class="product-name">
                                            @foreach (Cart::content() as $item)
                                                
                                                     {{$item->name}}<strong class="product-quantity">×{{$item->qty}}&nbsp;&nbsp;</strong>
                                                     Size: <strong class="product-quantity">{{($item->options->has('size') ? $item->options->size : '')}}</strong>
                                                <br/>
                                                @endforeach
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">${{Cart::initial(0,'.','.')}}</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
        
                                        <div class="form-row place-order" style="text-align:right">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
   
     <!-- Latest jQuery form server -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	

    <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{{'frontend/js/owl.carousel.min.js'}}}"></script>
    <script src="{{{'frontend/js/jquery.sticky.js'}}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{{'frontend/js/jquery.easing.1.3.min.js'}}}"></script>
    
    <!-- Main Script -->
    <script src="{{{'frontend/js/main2.js'}}}"></script>
  </body>
</html>