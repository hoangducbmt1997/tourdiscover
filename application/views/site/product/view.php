
<!-------------------------------------------------BOOK TOUR------------------------------------------------------>
<div class="container container-view-product-info">

	<div id="product-testimonials" class="owl-carousel col-lg-6">
	<div class="item"><img src="<?= public_url('/upload/product/' . $product->image_link) ?>"></div>
	</div>
	<div id="tour-detail" class="col-lg-6">
		<div class="container-tour-detail">
			<p class="day-detail">12 DAYS</p>
			<h2><?= $product->name?></h2>
			<p>From <strong> HO CHI MINH City</strong> to <strong>HA NOI</strong></p>
			<div class="planing-your-tour">
				<p class="col-lg-6"><i class="fal fa-sign"></i><strong>&nbsp;&nbsp;Tour Operator:</strong> Contiki</p>
				<p class="col-lg-6"><i class="fal fa-users"></i><strong>&nbsp;&nbsp;Max group size:</strong> 30</p>
			</div>
			<div class="planing-your-tour">
				<p class="col-lg-6"><i class="fal fa-user-plus"></i><strong>&nbsp;&nbsp;Age range:</strong> 18 to 35</p>
				<p class="col-lg-6"><i class="fal fa-comment"></i> <strong>&nbsp;&nbsp;Operated in:</strong> English</p>
			</div>
			<p class="col-lg-12"><i class="fal fa-ticket"></i> <strong>&nbsp;&nbsp;Tour id:</strong> 4786</p>
			<div class="price-book-tour">
				<p class="price-tour">From $<?= intval($product->price)  ?></p> 
				<p class="price-discount">-<?= intval($discount_percent=100-($new_price=(($product->price-$product->discount))/$product->price)*100)?>%</p>

			</div>
			<h1><strong>US $<?= $new_price=($product->price-$product->discount)?></strong></h1>
		</div>
	</div>

</div>

<!-------------------------------------------------ITINERARY------------------------------------------------------>
<div class="container-itinerary container">
	<div class="start-planning-your-tour">
		<p class="col-lg-4"><i class="fab fa-telegram-plane">&nbsp;&nbsp;</i>Start planning your tour</p>
		<p class="col-lg-4"><i class="fas fa-download"></i>&nbsp;&nbsp;Download brochure</p>
		<p class="col-lg-4"><i class="fas fa-comments-alt"></i>&nbsp;&nbsp;Ask a Question</p>
	</div>
	<h3>Places You’ll See</h3>
	<div class="image-place">
		<div id="container-image-place" class="owl-carousel">
			<?php if(is_array($image_list)):?>
			<?php foreach ($image_list as $row):?>
			<div class="item"><img class="img-responsive" src="<?= public_url('/upload/product/' . $row) ?>" alt="" ></div>
			<?php endforeach;?>
			<?php endif;?>
		</div>	
	</div>

	<h3>Itinerary</h3>
	<p>Start in Ho Chi Minh City and end in Hanoi! With the discovery tour Vietnam Experience, you have a 12 day tour package taking you through Ho Chi Minh City, Vietnam and 6 other destinations in Vietnam. Vietnam Experience includes accommodation in a hotel as well as an expert guide, meals, transport and more.</p>
	<div id="accordion" class="col-7">
						<div class="card">
							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									<i class="fas fa-info-circle"></i>Introduction<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseOne" class="collapse " data-parent="#accordion">
								<div class="card-body">
									Looking for the full experience tour of Vietnam? This trip takes you through Ho Chi Minh, Hoi An, Hanoi & Halong Bay with plenty of action and highlights to immerse yourself into this enchanting culture. Picture yourself relishing the rice region of Mekong Delta by taking a traditional boat through floating markets & local fruit farms, stopping in exciting & iconic hot spots & popular local foodie haunts for a true Vietnam experience.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									<i class="fas fa-map-marker-alt"></i>Day 1: Arrive Ho Chi Minh City<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
									<i class="far fa-calendar-minus"></i>Day 2: Ho Chi Minh City to Mekong Delta<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseThree" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
									<i class="far fa-calendar-minus"></i>Day 3: Mekong Delta to Ho Chi Minh City<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseFour" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
									<i class="far fa-calendar-minus"></i>Day 4: Ho Chi Minh City to Nha Trang<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseFive" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
									<i class="far fa-calendar-minus"></i>Day 5: Hanoi to Halong Bay<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseSix" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
									<i class="fas fa-pennant"></i>Day 6: Depart Hanoi<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseSeven" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<h3>What's Included</h3>
					<div id="accordion" class="col-7">
						<div class="card">
							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									<i class="far fa-check-circle"></i>Accommodation<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseOne" class="collapse " data-parent="#accordion">
								<div class="card-body">
									Looking for the full experience tour of Vietnam? This trip takes you through Ho Chi Minh, Hoi An, Hanoi & Halong Bay with plenty of action and highlights to immerse yourself into this enchanting culture. Picture yourself relishing the rice region of Mekong Delta by taking a traditional boat through floating markets & local fruit farms, stopping in exciting & iconic hot spots & popular local foodie haunts for a true Vietnam experience.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									<i class="far fa-check-circle"></i>Guide<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
									<i class="far fa-check-circle"></i>Meals<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseThree" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
									<i class="far fa-check-circle"></i>Transport<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseFour" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
									<i class="far fa-check-circle"></i>Additional Services<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseFive" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
									<i class="far fa-times-circle"></i>Flights<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseSix" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
									<i class="far fa-times-circle"></i>Insurance<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseSeven" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseEight">
									<i class="far fa-times-circle"></i>Additional Services<i class="fas fa-angle-down"></i>
								</a>
							</div>
							<div id="collapseEight" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-----------------------------------------------------CUSTOMER------------------------------------------------------>
			<div class="container container-customer">
				<h3>Customer Photos</h3>
				<div id="container-image-customer" class="owl-carousel">
					<!--TESTIMONIAL 1 -->
					<div class="item">
						<div class="shadow-effect">
							<img class="img-customer" src="image/photo-1522780300892-b25a6ec89734.jpg" alt="" ">
			</div>
		</div>
		<!--TESTIMONIAL 2 -->
		<div class=" item">
							<div class="shadow-effect">
								<img class="img-customer" src="image/photo-1576863555490-b0025d04a7c3.jpg" alt="" ">
			</div>
		</div>
		<!--TESTIMONIAL 3 -->
		<div class=" item">
								<div class="shadow-effect">
									<img class="img-customer" src="image/photo-1486056997767-09578eee7de1.jpg" alt="" ">
			</div>
		</div>
		<!--TESTIMONIAL 4 -->
		<div class=" item">
									<div class="shadow-effect">
										<img class="img-customer" src="image/photo-1494832944834-a08818c634b0.jpg" alt="" ">
			</div>
		</div>
		<!--TESTIMONIAL 5 -->
		<div class=" item">
										<div class="shadow-effect">
											<img class="img-customer" src="image/photo-1506917980821-213681597089.jpg" alt="">
										</div>
									</div>
								</div>
								<h3>Customer Reviews</h3>
								<div class="tour-reviews col-7">
									<div class="col-12 container-overall-rating">
										<div class="col-6 container-rating-list-item">
											<i class="fal fa-list-alt col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Itinerary</p>
												<p>Excellent</p>
											</div>
											<div class="col-2">
											</div>
										</div>
										<div class="col-6 container-rating-list-item">
											<i class="col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title"></p>
												<p></p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-12 container-list-rating">
										<div class="col-6 container-rating-list-item">
											<i class="fal fa-list-alt col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Itinerary</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>

										<div class="col-6 container-rating-list-item">

											<i class="fas fa-hat-cowboy col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Guide</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-12 container-list-rating">
										<div class="col-6 container-rating-list-item">
											<i class="fal fa-bus-alt col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Transport</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>

										<div class="col-6 container-rating-list-item">
											<i class="fas fa-bed col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Accommodation</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-12 container-list-rating">
										<div class="col-6 container-rating-list-item">
											<i class="fas fa-utensils col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Food</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>

										<div class="col-6 container-rating-list-item">
											<i class="fas fa-flag col-1"></i>
											<div class="container-overview-title col-8">
												<p class="main-title">Tour Operator</p>
												<p>Excellent</p>
											</div>
											<div class="container-star-rating col-2">
												<p>4.8</p>
												<i class="fas fa-star"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="container-button-rating">
									<button type="button" class="btn btn-outline-info btn-rating-active">Most Recent</button>
									<button type="button" class="btn btn-outline-info">Most Popular</button>
									<button type="button" class="btn btn-outline-info">Highest First</button>
									<button type="button" class="btn btn-outline-info">Lowest First</button>
								</div>
							</div>
							<!------------------------------------------TOUR AVAILABILITY---------------------------------------------------------->
							<div class="container container-tour-availability">
								<h3>Availability</h3>
								<h5>Upcoming departures</h5>
								<div class="container-tour-availability-variant col-7">
									<div class="tour-availability-variant">
										<p class="tour-availability-label">Get Instant Confirmation</p>
										<p class="tour-availability-discount">20%</p>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 10, 2020</p>
										</div>
										<div class="col-1"><i class="far fa-arrow-circle-right"></i></div>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 17, 2020</p>
										</div>
										<div class="col-2">
											<p class="tour-availability-discount-text">$799</p>
											<p class="tour-availability-bold-text">$599</p>
										</div>
										<div class="col-3">
										<a href="<?= base_url('cart/add/'.$product->id)?>">
											<button type="button" class="btn btn-success">Book Tour</button>
											</a>
										</div>
									</div>
									<div class="status-tour-availability-variant">
										<div class="col-1">
											<i class="fas fa-bell"></i>
										</div>
										<p>Almost Sold Out</p>
									</div>
								</div>
								<div class="container-tour-availability-variant col-7">
									<div class="tour-availability-variant">
										<p class="tour-availability-label">Get Instant Confirmation</p>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 10, 2020</p>
										</div>
										<div class="col-1"><i class="far fa-arrow-circle-right"></i></div>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 17, 2020</p>
										</div>
										<div class="col-2">
											<p class="tour-availability-bold-text">$799</p>
										</div>
										<div class="col-3">
										<a href="<?= base_url('cart/add/'.$product->id)?>">
											<button type="button" class="btn btn-success">Book Tour</button>
											</a>
										</div>
									</div>
									<div class="status-tour-availability-variant">
										<div class="col-1">
											<i class="fas fa-bell"></i>
										</div>
										<p>Almost Sold Out</p>
									</div>
								</div>
								<div class="container-tour-availability-variant col-7">
									<div class="tour-availability-variant">
										<p class="tour-availability-label">Get Instant Confirmation</p>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 10, 2020</p>
										</div>
										<div class="col-1"><i class="far fa-arrow-circle-right"></i></div>
										<div class="col-3">
											<p>Tuesday</p>
											<p class="tour-availability-bold-text">Mar 17, 2020</p>
										</div>
										<div class="col-2">
											<p class="tour-availability-bold-text">$799</p>
										</div>
										<div class="col-3">
											<a href="<?= base_url('cart/add/'.$product->id)?>">
											<button type="button" class="btn btn-success">Book Tour</button>
											</a>
										</div>
									</div>
									<div class="status-tour-availability-variant">
										<div class="col-1">
											<i class="fas fa-bell"></i>
										</div>
										<p>Almost Sold Out</p>
									</div>
								</div>
								<div class="container-tour-availability-variant col-7">
									<div class="tour-availability-variant">
										<p class="tour-availability-label">Get Instant Confirmation</p>
										<div class="col-3">
											<p>Friday</p>
											<p class="tour-availability-bold-text">Mar 13, 2020</p>
										</div>
										<div class="col-1"><i class="far fa-arrow-circle-right"></i></div>
										<div class="col-3">
											<p>Friday</p>
											<p class="tour-availability-bold-text">Mar 20, 2020</p>
										</div>
										<div class="col-2">
											<p class="tour-availability-bold-text">$799</p>
										</div>
										<div class="col-3">
											<a href="<?= base_url('cart/add/'.$product->id)?>">
											<button type="button" class="btn btn-success">Book Tour</button>
											</a>
										</div>
									</div>
									<div class="status-tour-availability-variant">
										<div class="col-1">
											<i class="fas fa-bell"></i>
										</div>
										<p>Almost Sold Out</p>
									</div>
								</div>
							</div>



							<