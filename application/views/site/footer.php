<footer class="footer-corporate context-dark">
	<div class="footer-corporate-inset">
		<div class="container">
			<div class="content-footer">
				<div class="col-sm-6 col-md-12 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0.5s" style="visibility: visible; animation-name: fadeInRight;">
					<div class="oh-desktop">
						<h6 class="text-spacing-100 text-uppercase">Contact us</h6>
						<ul class="footer-contacts">
							<li>
								<div class="unit-footer">
									<div class="unit-left-footer"><span class="icon fa fa-phone"></span></div>
									<div class="unit-body"><a class="link-phone" href="#">+036-282-3931</a></div>
								</div>
							</li>
							<li>
								<div class="unit-footer">
									<div class="unit-left-footer"><span class="icon fa fa-envelope"></span></div>
									<div class="unit-body"><a class="link-aemail" href="#">info@songvedem.org</a></div>
								</div>
							</li>
							<li>
								<div class="unit-footer">
									<div class="unit-left-footer"><span class="icon fa fa-location-arrow"></span></div>
									<div class="unit-body"><a class="link-location" href="#">TayNguyen University, BuonMaThuot, DakLak.</a></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeInUp;">
					<div class="oh-desktop">
						<h6 class="text-spacing-100 text-uppercase">Popular news</h6>
						<?php foreach ($news_list as $row):?>
						<article class="post post-minimal-2">
							<p class="post-minimal-2-title"><a href="#"><?= $row->title?></a></p>
							<div class="post-minimal-2-time">
								<time datetime="2018-05-04"><?= get_date_vn($row->created)?></time>
							</div>
						</article>
						<?php endforeach;?>

					</div>
				</div>
				<div class="col-sm-11 col-md-7 col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeInLeft;">
					<div class="oh-desktop">
						<h6 class="text-spacing-100">Quick links</h6>
						<ul class="row-6 list-0 list-marked list-marked-md list-marked-secondary list-custom-2">
							
							<li><a href="#">Destinations</a></li>
							<li><a href="#">Travel Styles</a></li>
							<li><a href="#">Gallery</a></li>
							<li><a href="#">Deals</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!--FOOTER CONTRACT-->
<div class="footer-corporate-bottom-panel">
	<div class="container">
		<div class=" justfy-content-xl-space-berween content-footer align-items-md-center2">
			<div class="col-sm-6 col-md-4  text-sm-right text-md-center">
				<div>
					<ul class="list-inline list-inline-sm footer-social-list-2">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 order-sm-first">
				<p class="rights"><span>&#169;&nbsp;</span><span class="copyright-year">2020</span> <span>Tour Discover</span>. All rights reserved<span>.</span><span> Design&nbsp;by&nbsp;<a href="#">Songvedem.</a></span>
				</p>
			</div>
			<div class="col-sm-6 col-md-4 text-md-right">
				<p class="rights"><a href="#">Privacy Policy</a></p>
			</div>
		</div>
	</div>
</div><!--FOOTER PANEL-->