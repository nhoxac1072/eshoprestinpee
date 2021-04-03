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
    <title>Gio hang</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{{asset('frontend/css/bootstrap.min.css')}}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{{asset('frontend/css/font-awesome.min.css')}}}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{{asset('frontend/css/owl.carousel.css')}}}">
    <link rel="stylesheet" href="{{{asset('frontend/css/style.css')}}}">
    <link rel="stylesheet" href="{{{asset('frontend/css/responsive.css')}}}">

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
                        <li class="active"><a>Cart&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i><span class="product-count" style="background-color:red;">{{Cart::count()}}</span></a></li>
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
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    @if(Cart::count() > 0 )
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="{{URL::to('/checkout')}}">
                                {{csrf_field()}}
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-size">Size</th>
                                            <th class="product-subtotal">Subtotal</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
										@foreach (Cart::content() as $item)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{URL::to('/delcart', $item->id )}}">X</a> 
                                            </td>
                                            <td class="product-thumbnail">
                                                <a>
												<img src="{{{'hinhanh/product/'.($item->options->has('image') ? $item->options->image : '')}}}" alt="">
												</a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">{{$item->name}}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">${{$item->price}}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
													<a class="add_to_cart_button" href="{{URL::to('/incqtycart', $item->id )}}">+</a>
                                                    
                                                    <input type="number" size="4" class="input-text qty text" value="{{$item->qty}}" min="0" readonly>
													
													<a class="add_to_cart_button" href="{{URL::to('/decqtycart', $item->id )}}">-</a>

                                                    
                                                </div>
                                            </td>
                                            
                                            <td>
                                                 {{($item->options->has('size') ? $item->options->size : '')}}
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">${{$item->subtotal}}</span> 
                                            </td>
                                        </tr>
										@endforeach

                                        <tr>
                                            <td class="actions" colspan="6" style="text-align:right"> 
                                                <label>Total:</label>
                                                <span class="amount">${{Cart::initial(0,'.','.')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>   
                                                <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">                          
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">


							@else
                            <div class="container">
                                         <div class="col-md-12">
                                             <div class="product-bit-title text-center">
                                                <h2 style="color:red"><strong>No item in cart</strong></h2>
                                                <h2><a href="{{URL::to('/')}}"><strong>Return homepage</strong></a></h2>
                                            </div>
                                            </div>
                                </div>
							@endif
                        
                            </div>
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
    <script src="{{{asset('frontend/js/owl.carousel.min.js')}}}"></script>
    <script src="{{{asset('frontend/js/jquery.sticky.js')}}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{{asset('frontend/js/jquery.easing.1.3.min.js')}}}"></script>
    
    <!-- Main Script -->
    <script src="{{{asset('frontend/js/main2.js')}}}"></script>


  </body>
</html>