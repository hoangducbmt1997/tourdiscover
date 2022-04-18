<div id="slide-content">
	<section class="slideshow">
		<div class="slideshow-inner">
			<div class="slides">
			<?php foreach ($slide_list as $row):?>
				<div class="slide <?php if($row->sort_order == 0) echo "is-active" ?>">
					<div class="slide-content">
						<div class="caption">
							<div class="title">
								<p><?php echo $row->name?></p>
							</div>
							<div class="text">
								<p><?php echo $row->info?></p>
							</div>
							<a href="#" class="btn"> <span class="btn-inner">GET IN TOUCH</span>
							</a>
						</div>
					</div>
					<div class="image-container">
						<img src="<?= public_url('/upload/slide/'.$row->image_link)?>" alt=""
						class="image" />
					</div>
				</div>
				<!--SLIDER ACTIVE-->
				<?php endforeach;?>
			</div>
			<div class="pagination">
				<div class="item is-active">
					<span class="icon">1</span>
				</div>
				<div class="item">
					<span class="icon">2</span>
				</div>
				<div class="item">
					<span class="icon">3</span>
				</div>
				<div class="item">
					<span class="icon">4</span>
				</div>
			</div>
			<!--PAGI SLIDER-->
		</div>
	</section>
</div>
<!-------------------------------------------- EVENT TOUR-------------------------------------------------------->
<div id="container-event-tour">
	<div class="container-img-event-tour container">
		<div class="event-img wow fadeLeft" data-wow-delay="0.5s"
			style="visibility: visible; animation-name: fadeInLeft;">
			<div class="title-event-tour">
				<p>
					<i class="fas fa-globe-asia"></i>&nbsp;Theyyam India
				</p>
			</div>
			<img src="<?php echo public_url()?>site/image/event-1.jpg">
		</div>
		<!--EVENT ONE-->
		<div class="event-img wow fadeInUp" data-wow-delay="0.5s"
			style="visibility: visible; animation-name: fadeInUp;">
			<div class="title-event-tour ">
				<p>
					<i class="fas fa-globe-asia"></i>&nbsp;EDM Festival
				</p>
			</div>
			<img src="<?php echo public_url()?>site/image/event-2.jpg">
		</div>
		<!--EVENT TWO-->
		<div class="event-img wow wow fadeInRight" data-wow-delay="0.5s"
			style="visibility: visible; animation-name: fadeInRight;">
			<div class="title-event-tour">
				<p>
					<i class="fas fa-globe-asia"></i>&nbsp;Holi Holidays
				</p>
			</div>
			<img src="<?php echo public_url()?>site/image/event-3.jpg">
		</div>
		<!--EVENT THREE-->
		<a href="#">Other Event Tours<span></span></a>
	</div>
</div>
<!------------------------------------------------- SlOGAN---------------------------------------------------->
<div class="container-sologan container">
	<h2 class="title-slogan wow slideInDown"
		style="visibility: visible; animation-name: slideInDown;">Our Services</h2>
	<div class="sub-title"></div>
	<div class="container-service container">
		<div class="article-service ">
			<div class="container-unit">
				<div class="unit-left">
					<div
						class="box-icon-classic-icon flaticon-big-map-placeholder-outlined-symbol-of-interface"></div>
				</div>
				<div class="unit-right">
					<a>Best Selection</a>
					<p>Our strict screening process means that you're only seeing the
						best quality tours.</p>
				</div>
			</div>
		</div>
		<div class="article-service">
			<div class="container-unit">
				<div class="unit-left">
					<div
						class="box-icon-classic-icon flaticon-checkmark-verify-interface-symbol-button"></div>
				</div>
				<div class="unit-right">
					<a>Best Price Guarantee</a>
					<p>Find a lower price? We find you a good and lowest price that
						suits your finances.</p>
				</div>
			</div>
		</div>
		<div class="article-service">
			<div class="container-unit">
				<div class="unit-left">
					<div class="box-icon-classic-icon flaticon-shopping-cart-outline-1"></div>
				</div>
				<div class="unit-right">
					<a>Secure Payments</a>
					<p>We use Braintree, a subsidiary of PayPal, to make payments safe
						and secure.</p>
				</div>
			</div>
		</div>
		<div class="article-service">
			<div class="container-unit">
				<div class="unit-left">
					<div class="box-icon-classic-icon flaticon-headphones-audio-symbol"></div>
				</div>
				<div class="unit-right">
					<a>24/7 Support</a>
					<p>You can always get professional support from our staff 24/7 and
						ask any question you have.</p>
				</div>
			</div>
		</div>
		<div class="article-service">
			<div class="container-unit">
				<div class="unit-left">
					<div
						class="box-icon-classic-icon flaticon-circular-outlined-badge-with-ribbon-recognition-prize-symbol"></div>
				</div>
				<div class="unit-right">
					<a>Wide Variety of Tours</a>
					<p>We offer a wide variety of personally picked tours with
						destinations all over the globe.</p>
				</div>
			</div>
		</div>
		<div class="article-service">
			<div class="container-unit">
				<div class="unit-left">
					<div
						class="box-icon-classic-icon flaticon-favourites-star-outline-interface-symbol"></div>
				</div>
				<div class="unit-right">
					<a>Handpicked Hotels</a>
					<p>Our team offers only the best selection of affordable and luxury
						hotels to our clients.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!----------------------------------------------------PARALLAX CONTENT-------------------------------------------------------->
<section id="container-parallax"
	class=" bg-default text-center offset-top-50 hero">
	<div class="layer-black-parallax"></div>
	<div class="parallax-content section-xl context-dark">
		<div class="container">
			<h2 class="heading-2 wow fadeInDown" data-wow-delay="0.5s"
				style="visibility: visible; animation-name: fadeInDown;">
				<span class="d-block font-weight-semi-bold ">First class Impressions</span><span
					class="d-block font-weight-light">are Waiting for You!</span>
			</h2>
			<p class="text-width-medium text-spacing-75 wow fadeInLeft"
				data-wow-delay="0.2s"
				style="visibility: visible; animation-name: fadeInLeft;">Our agency
				offers travelers various tours and excursions with destinations all
				over the world. Browse our website to find your dream tour!</p>
			<button class="button button--antiman button--text-medium">
				<i class="button__icon icon icon-plus"></i><span>Book a Tour Now</span>
			</button>
		</div>
	</div>
</section>
<!----------------------------------------------------HOT TOUR-------------------------------------------------------->

<div id="container-tour-hot">
	<div class="container-tour-hot container">
		<h2 class="title-hot-tour wow slideInDown"
			style="visibility: visible; animation-name: slideInDown;">Hot Tour</h2>
		<div class="sub-title"></div>
		<?php foreach ($product_hot_list as $row):?>
		
		<div class="container-tour-destination wow slideInRight"
			style="visibility: visible; animation-name: slideIn<?= ($product_hot_list[0]->id != $row->id)?'Right':'Left'?>;">
			<div class="big-price-wrap">
				<span class="big-price"><?= '$'.number_format($row->price)?></span>
			</div>
			<div class="container-img-tour-hot">
			<a href="<?= base_url('product/view/'.$row->id)?>">
				<img
					src="<?= public_url()?>/upload/product/<?= $row->image_link ?>"
					width="100%" height="100%"></a>
			</div>
			<div class="container-tour-product">
				<div class="product-body">
					<div class="product-big-body">
						<p class="title-product"><?= $row->name ?></p>
						<div class="title-ratting">
							<p>
								<i class="fa fa-star fa-1x"></i> <i class="fa fa-star fa-1x"></i>
								<i class="fa fa-star fa-1x"></i> <i class="fa fa-star fa-1x"></i>
								<i class="fas fa-star-half-alt"></i> &emsp;4 customer reviews
							</p>
						</div>
						<div class="content-decripstion">
							<p><?=$row->content_decrip?>...</p>
						</div>
						<a href="<?= base_url('product/view/'.$row->id)?>">
						<button class="button button--push button--border-thin ">Buy This
							Tour</button>
							</a>
					</div>
				</div>
			</div>
		</div>
		
		<?php endforeach;?>

	</div>
</div>
<!-------------------------------------------------DISCOUNT TOUR------------------------------------------------------>
<section id="testimonials">
	<h2 class="title-discount wow slideInDown"
		style="visibility: visible; animation-name: slideInDown;">Discount
		Tour</h2>
	<div class="sub-title"></div>
	<div id="customers-testimonials" class="owl-carousel container">
		<?php foreach ($product_list as $row):?>
		<?php if($row->discount>0):?>
		<a style="text-decoration: none" href="<?= base_url('product/view/'.$row->id) ?>">
		<div class="item">
			<div class="shadow-effect">
				<div class="discount-tour">
					<div class="discount-tour-item-badeg"><?= intval((($row->discount/$row->price)*100)) ?>%</div>
				</div>
				<img class="img-responsive"
					src="<?= public_url('upload/product/')?><?= $row->image_link?>"
					alt="" height="220px">
				<div class="item-details">
				<div class="content-item-details">
					<h6><?= $row->name?></h6>
					<p class="title-ratting">
						<i class="fa fa-star fa-1x"></i> <i class="fa fa-star fa-1x"></i>
						<i class="fa fa-star fa-1x"></i> <i class="fa fa-star fa-1x"></i>
						<i class="fas fa-star-half-alt"></i>&emsp;4.8&emsp;165 reviews
					</p>
					<p>
						<i class="far fa-calendar-minus"></i>&emsp;16 days from
					
					<p class="price-cost"><?= number_format($row->price).'$'?></p>
					<p class="price-discount">&nbsp;<?= $price_new = $row->price - $row->discount.'$'?>.</p>
					</div>
				</div>
			</div>
		</div>
		</a>
		<?php endif;?>
		<?php endforeach;?>

	</div>
</section>
<!----------------------------------------------------PARALLAX EMAIL-------------------------------------------------------->
<section id="container-parallax-email">
	<div class="layer-black-parallax-email"></div>
	<div class="parallax-content section-xl">
		<h2 class="heading-2 oh wow fadeInDown" data-wow-delay="0.2s"
			style="visibility: visible; animation-name: fadeInDown;">
			<span class="d-block font-weight-semi-bold ">Sign Up for 25% Discount</span>
		</h2>
		<p class="text-spacing-75 wow fadeInRight" data-wow-delay="0.5s"
			style="visibility: visible; animation-name: fadeInRight;">Want to get
			an instant discount for your next tour? Leave your email and sign up
			for our newsletter with 25% off all our offers.</p>
		<div class="text-center container-text-email">
			<div class="form-email">
				<div class="form-wrap ">
					<input class="form-input" placeholder="Enter Your E-mail"
						type="email" name="email" data-constraints="#">
				</div>
				<div class="form-button">
					<button class="button button-primary" type="submit">Subscribe</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------------------------------------------RECOMMENTDED DESTINATIONS----------------------------------------->
<div class="container-travel">
	<h2 class="title-recommended wow fadeInDown" data-wow-delay="0.2s"
		style="visibility: visible; animation-name: fadeInDown;">Recommended
		Destinations</h2>
	<div class="sub-title"></div>
	<div class="grid-row container">
	<?php foreach ($catalog_list as $row):?>
	<?php if(!empty($row->subs)):?>
	<?php foreach ($row->subs as $row):?>
		<div class="grid-item">
			<a class="wrapping-link" href="<?= base_url('product/catalog/').$row->id?>"></a>
			<div class="grid-item-wrapper">
				<div class="grid-item-container">
					<div class="grid-image-top rex-ray">
						<span class="centered project-image-bg rex-ray-image"> <img
							style="height: 200px; width: 270px"
							src="<?= public_url('/upload/catalog/'.$row->image_link)?>">
						</span>
					</div>
					<div class="grid-item-content">
						<span class="item-title"><?= $row->name ?></span> <span
							class="item-category"><?= $row->site_title ?></span> <span
							class="item-excerpt"><?= $row->title_info ?>...</span> <span
							class="more-info">View Tour <i
							class="fas fa-long-arrow-alt-right"></i></span>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<?php endif;?>
		<?php endforeach;?>
		
	</div>
</div>