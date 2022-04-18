<?php 
$price_from_select  = isset($price_from) ? $price_from :0;
$price_from_to      = isset($price_to)   ? $price_to :0;
?>
<div class="list-content-product-tour container">
<p class="title-cat-list-content-product-tour">Home/ <?= $catalog->name ?></p>
	<div class="form-search-tour">
		<h3 class="title-cat-list-content-product-tour-bold"><?= $catalog->name ?></h3>
		<form class="form_action-search-tour" method="get" style="padding:10px" action="<?= site_url('product/search_price_catalog') ?>" name="search">

			<div class="form-row-option">
				<input style="display:none" value="<?= $catalog->id?>" name="catalog_id">
				<label for="param_price_from" class="form-label" style="width:60px">Price :</label>
				<div class="form-item" style="width:90px">
					<select class="input" id="price_from" name="price_from">
					<?php for ($i=0;$i<=5000;$i+=100):?>
						<option value="<?=$i ?>" <?=($i==$price_from_select)?'selected': ''?>><?=$i?>$</option>
						<?php endfor;?>
					</select>
					<div class="clear"></div>
					<div class="error" id="price_from_error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="form-row-option">
				<label for="param_price_from" class="form-label" style="width:50px;padding-left:10px">To :</label>
				<div class="form-item" style="width:90px">
					<select class="input" id="price_to" name="price_to">
					<?php for ($i=0;$i<=10000;$i+=100):?>
						<option value="<?=$i ?>" <?=($i==$price_from_to)?'selected': ''?>><?=$i?>$</option>
						<?php endfor;?>
					</select>
					<div class="clear"></div>
					<div class="error" id="price_from_error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row-btn">
				<label class="form-label">&nbsp;</label>
				<div class="form-item">
					<input type="submit" class="btn btn-success" name="search" value="Search Price">
				</div>
				<div class="clear"></div>
			</div>
		</form>
	</div>

	<hr>
	<?php foreach ($list as $row) : ?>
		<div class="content-product-tour container">
			<div class="br_ tourLink_info col-4">
				<a href="<?= base_url('product/view/'.$row->id)?>" class="img_tourLink_info">
					<div class="them">Discovery</div> <img src="<?= public_url('/upload/product/' . $row->image_link) ?>">
				</a>
			</div>
			<div class="bm col-5 content-info-tourLink">
				<h4><?= $row->name ?> - 12 Day</h4>
				<div class="content-info-tourLink-reviews ">
					<div class="star-tourLink-reviews ">
						<span><i class="fas fa-star"></i></span> <span><i class="fas fa-star"></i></span> <span><i class="fas fa-star"></i></span>
						<span><i class="fas fa-star"></i></span> <span><i class="fas fa-star-half-alt"></i></span> <span class="count-info-tourLink-reviews">1,159 reviews</span>
					</div>
				</div>
				<hr>
				<div class="values">
					<div class="title_values">
						<div class="dl">Destinations</div>
						<div class="dd">Canggu, Lovina, Gili Trawangan, Gili Islands, Ubud
						</div>
						<div class="dl">Age range</div>
						<div class="dd">18 to 45 year olds</div>
						<div class="dl">Islands</div>
						<div class="dd">
							<a href="">Bali</a>
						</div>
						<div class="dl">Travel style</div>
						<div class="dd">
							<a href="">Beach</a>, <a href="">Discovery</a><span class="hid">,
								<a href="">Sightseeing</a>
							</span><span class="show-more"> +1 more</span>
						</div>
						<div class="dl">Operator</div>
						<div class="dd">
							<a href="">INTRO Travel</a><a href="" class="ttip"></a>
						</div>
					</div>

				</div>
			</div>
			<div class="br__price-wrapper-content col-3">
				<div class="br__price-wrapper">
					<div class="discount-tour-badeg">
						<div class="tour-discount-badeg-value">50<?php $price_new = $row->price ?> %</div>
					</div>
					<div class="price-content-wrapper-info col-12">
						<div class="br__price-wrapper-info col-6">
							<div class="br__price-wrapper-info-title">Tour length</div>
							<div class="br__price-wrapper-info-description">12 days</div>
							<div class="br__price-wrapper-info-title">Price per day</div>
							<div class="br__price-wrapper-info-description">$90</div>
						</div>
						<div class="br__price-wrapper-price-container ">
							<div itemprop="offers" itemscope="" itemtype="" class="br__price-wrapper-price">
								<div class="br__price-wrapper-price-title">From</div>
								<span class="br__price-wrapper-price-description-currency--short">US</span>
								<span class="br__price-wrapper-price-description-value">$ <?= intval($row->price) ?></span>
							</div>
						</div>
					</div>

					<div class="btn-view-product-tour">
						<a href="<?= base_url('product/view/'.$row->id)?>"><div class="btn btn-success btn-view-tour">View Tour</div></a>
						<div class="btn btn-success btn-dl-br">Download Brochure</div>
					</div>

				</div>

			</div>
		</div>
	<?php endforeach; ?>
</div>