<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.kutethemes.com/leka/html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 May 2023 03:03:18 GMT -->

<head>
    <base href="/public">
    @include('client.css')
</head>

<body class="home">
    <header class="header header-style3">
        @include('client.header')
    </header>
    <section class="banner bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <p style="font-size: 35px" class="page-title">SHOP DETAIL</p>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <a href="#">SHOP DETAIL</a>
                </div>
            </div>
        </div>
    </section>
    <div class="maincontainer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-images">
                        <a class="popup-image" href=""><img class="main-image" src="/upload/{{$product->image}}"  alt=""/></a>
                        <div class="single-product-thumbnails">
                            <span data-image_full="client/images/products/product-full1.jpg"><img src="client/images/products/p-thumb1.jpg" /></span>
                            <span data-image_full="client/images/products/product-full2.jpg"><img src="client/images/products/p-thumb2.jpg" /></span>
                            <span  class="selected" data-image_full="client/images/products/product-full3.jpg"><img src="client/images/products/p-thumb3.jpg" /></span>
                            <span data-image_full="client/images/products/product-full4.jpg"><img src="client/images/products/p-thumb4.jpg" /></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="summary entry-summary">
                        <h1 class="product_title entry-title">{{$product->title}}</h1>
                        <div class="product-star edo-star" title="Rated 1 out of 5">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a href="#reviews" class="woocommerce-review-link review-link">1 Review(s)  |  Add Your Review</a>
                        <span class="in-stock"><i class="fa fa-check-circle-o"></i> In stock</span>
                        <div class="description">
                        	<p>{{$product->description}}</p>
                        </div>
                        <p class="price">
                            <ins><span class="amount">{{number_format($product->price)}}VNĐ</span></ins>
                            <del><span class="amount">{{number_format($product->discount_price)}}VNĐ</span></del> 
                        </p>
                        <form class="variations_form ">
                            <div class="single_variation_wrap">
                                <div class="box-qty">
                                    <a href="#" class="quantity-plus"><i class="fa fa-angle-up"></i></a>
                                    <input type="text" step="1" min="1" name="quantity" value="01" title="Qty" class="input-text qty text" size="4">
                                    <a href="#" class="quantity-minus"><i class="fa fa-angle-down"></i></a>
                                </div>
                                <button type="submit" class="single_add_to_cart_button ">Add to cart</button>
                                <a href="#" class="buttom-compare"><i class="fa fa-retweet"></i></a>
                                <a href="#" class="buttom-wishlist"><i class="fa fa-heart-o"></i></a>
                            </div>
                        </form>
                        <div class="sigle-product-services">
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-plane"></i></div>
                                <h5 class="service-name">FREE SHIPPING WORLD WIDE</h5>
                            </div>
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-whatsapp"></i></div>
                                <h5 class="service-name">24/24 ONLINE SUPPORT CUSTOME</h5>
                            </div>
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-usd"></i></div>
                                <h5 class="service-name">30 Days money back</h5>
                            </div>
                        </div>
                        <div class="product-share">
                            <strong>Share:</strong>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tencent-weibo"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product tab -->
            <div class="product-tabs">
                <ul class="nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab1">DESCRITIOPN</a></li>
                    <li><a  data-toggle="tab" href="#tab2">Reviews</a></li>
                    <li><a data-toggle="tab" href="#tab3">Product tags</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="active tab-pane">
                        <p><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <p><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong></p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p> 
                    </div>
                    <div id="tab2" class="tab-pane">
                        <div class="reviews">
                            <div class="comments">
                                <h2>CUSTOMER REVIEWS (3)</h2>
                                <ol class="commentlist">
                                    <li class="comment">
                                        <div class="comment_container">
                                            <img class="avatar" src="client/images/avatars/1.png" alt="" />
                                            <div class="comment-text">
                                                <div itemprop="description" class="description">
                                                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."</p>
                                                </div>
                                                <p class="meta">
                                					<strong itemprop="author">student</strong> – <time itemprop="datePublished" datetime="2013-06-07T12:14:53+00:00">June 7, 2013</time>:
                                				</p>
                                                <div class="product-star" title="Rated 5 out of 5">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment">
                                        <div class="comment_container">
                                            <img class="avatar" src="client/images/avatars/2.png" alt="" />
                                            <div class="comment-text">
                                                <div itemprop="description" class="description">
                                                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."</p>
                                                </div>
                                                <p class="meta">
                                					<strong itemprop="author">student</strong> – <time itemprop="datePublished" datetime="2013-06-07T12:14:53+00:00">June 7, 2013</time>:
                                				</p>
                                                <div class="product-star" title="Rated 5 out of 5">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment">
                                        <div class="comment_container">
                                            <img class="avatar" src="client/images/avatars/3.png" alt="" />
                                            <div class="comment-text">
                                                <div itemprop="description" class="description">
                                                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."</p>
                                                </div>
                                                <p class="meta">
                                					<strong itemprop="author">student</strong> – <time itemprop="datePublished" datetime="2013-06-07T12:14:53+00:00">June 7, 2013</time>:
                                				</p>
                                                <div class="product-star" title="Rated 5 out of 5">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- Review form -->
                        <div class="review_form_wrapper" class="review_form_wrapper">
                            <div class="review_form">
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">WRITE YOUR OWN REVIEW</h3>
                                    <div class="rating">
                                        <div class="attribute">
                                            <span class="title">Quality</span>
                                            <span class="star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                        <div class="attribute">
                                            <span class="title">PRICE</span>
                                            <span class="star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                        <div class="attribute">
                                            <span class="title">VALUE</span>
                                            <span class="star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <form action="#" method="post"class="comment-form">
    								    <p class="comment-form-author">
                                            <label for="author">Name <span class="required">*</span></label>
                                            <input id="author" name="author" type="text" value="" size="30" placeholder="Name">
                                        </p>
                                        <p class="comment-form-email">
                                            <label for="email">Email <span class="required">*</span></label> 
                                            <input id="email" name="email" type="text" value="" size="30" placeholder="Email">
                                        </p>
                                        <p class="comment-form-comment">
                                            <label for="comment">Your Review</label>
                                            <textarea id="comment" name="comment" cols="45" rows="8" placeholder="Your Review"></textarea>
                                        </p>						
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--./review form -->
                    </div>
                    <div id="tab3" class="tab-pane">
                        <div class="tagcloud">
                            <a href="#">Cotton</a>
                            <a href="#">Leggings</a>
                            <a href="#">Men</a>
                            <a href="#">Shirt</a>
                            <a href="#">T-shirt</a>
                            <a href="#">COSMETIC</a>
                            <a href="#">SOFT WEAR</a>
                            <a href="#">ACCESSORIES</a>
                            <a href="#">LIFE STYLE</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Product tab -->
            <!--related products-->
            <div class="related-products">
                <div class="title-section text-center">
        			<h2 class="title">Similar products</h2>
        		</div>
                <div class="product-slide owl-carousel"  data-dots="false" data-nav = "true" data-margin = "30" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product8.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    						</div>
    				</div>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product7.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    					</div>
    				</div>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product6.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    					</div>
    				</div>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product5.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    						</div>
    				</div>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product4.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    					</div>
    				</div>
    				<div class="product">
    					<div  class="product-thumb">
    						<a href="single-product.html">
    							<img src="client/images/products/product3.png" alt="">
    						</a>
    						<div class="product-button">
    							<a href="#" class="button-compare">Compare</a>
    							<a href="#" class="button-wishlist">Wishlist</a>
    							<a href="#" class="button-quickview">Quick view</a>
    						</div>
    					</div>
    					<div class="product-info">
    						<h3><a href="#">Ledtead Predae</a></h3>
    						<span class="product-price">$89.00</span>
    						<a href="#" class="button-add-to-cart">ADD TO CART</a>
    					</div>
    				</div>
    			</div>
            </div>
            <!--./related products-->
        </div>
    </div>
    <footer class="footer">
        @include('client.footer')
    </footer>
    @include('client.js')
</body>

</html>
