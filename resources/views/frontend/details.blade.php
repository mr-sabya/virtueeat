<x-app-layout>
    
        <!--Search Bar Style One -->
		<section class="search_bar_style_one">
			<div class="container">
				<div class="search_bar_outer">
					<div class="location_box">
						<div class="location_icon"><i class="icon-map-pin"></i></div>
						<div class="location_name">New York • Now</div>
					</div>
					<form action="#" class="search_box">
                        <div class="form-group">
                            <input type="text" id="locationInput" placeholder="Search in Mcdonald’s Restaurant">
                            <i class="icon-search" id="searchIcon"></i>
                            <span id="clearIcon">Clear</span>
                            <div id="suggestionsContainer"></div>
                        </div>
					</form>
					<div class="dealivary_box_selector">
                        <div id="selectorButtons">
                            <button class="selector-button active" onclick="selectOption('delivery')">Delivery</button>
                            <button class="selector-button" onclick="selectOption('pickup')">Pickup</button>
                        </div>
					</div>
					<div class="cart_box dropdown">
						<h6 class="cart_title">Cart . 5</h6>
						<div class="cart_icon">
							<i class="icon-bag"></i>
						</div>
                        <div class="cart_box_outer">
                            <div class="close_cart_btn"><img src="assets/images/cross-btn.svg" alt=""></div>
                            <div class="cart_title_box">
                                <h3 class="outer_title">Your Cart</h3>
                                <div class="count_cart">(5)</div>
                            </div>
                            <div class="cart_product_item">
                                <div class="product_info">
                                    <h6 class="product_name">Chicken Over Rice</h6>
                                    <span class="rate">$15.99</span>
                                </div>
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                            </div>
                            <div class="cart_product_item">
                                <div class="product_info">
                                    <h6 class="product_name">Chicken Over Rice</h6>
                                    <span class="rate">$15.99</span>
                                </div>
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                            </div>
                            <div class="cart_product_item">
                                <div class="product_info">
                                    <h6 class="product_name">Chicken Over Rice</h6>
                                    <span class="rate">$15.99</span>
                                </div>
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                            </div>
                            <div class="go_to_checkout"><a href="checkout.html" class="theme-btn-two">Go to checkout • $150.99</a></div>
                        </div>
					</div>
				</div>
			</div>
		</section>
        <!--Search Bar Style One End -->

        <!--Product Order Page -->
        <section class="product_order_page">
            <div class="container">
                <a href="restaurant-page.html" class="back_to_product_btn"><i class="icon-arrow-left"></i> Back to Mcdonald’s Restaurant</a>
                <div class="product_outer_box">                    
                    <div class="product_image_box">
                        <img src="assets/images/gallery.png" alt="">
                    </div>
                    <div class="product_info_box">
                        <h3 class="product_title">Chicken Over Rice and</h3>
                        <span class="product_price">$11.99</span>
                        <p>Grilled chicken served with rice, salad, white sauce, and a free can soda.</p>
                        <div class="product_like_btn"><i class="icon-like"></i>89% (50)</div>
                        <div class="border_bottom"></div>
                        <form action="#" class="instructions_form">
                            <label for="instructions">Special Instructions</label>
                            <textarea id="instructions"  name="instructions_box" placeholder="Add a note"></textarea>
                            <span>You may be charged for extras.</span>
                        </form>
                        <div class="quantity_outer_box">
                            <div class="item-quantity">
                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                            </div>
                            <div class="go_to_checkout"><a href="checkout.html" class="theme-btn-two">Add to Cart • $11.99</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Product Order Page End -->

        <!-- Suggest Product -->
        <section class="suggest_product">
            <div class="container">
                <h3 class="section_title">Frequently bought together</h3>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Arizona</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="suggest_product_block">
                            <div class="product_content">
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">$5.40</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn"><img src="assets/images/gallery.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Suggest Product End -->

</x-app-layout>